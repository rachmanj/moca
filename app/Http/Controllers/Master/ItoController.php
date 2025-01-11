<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Imports\ItoTempImport;
use App\Models\ItoTemp;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class ItoController extends Controller
{
    public function index()
    {
        $page = request()->query('page', 'dashboard');

        $views = [
            'dashboard' => 'master.ito.dashboard',
            'upload' => 'master.ito.upload',
        ];

        if ($page == 'upload') {
            $recordCount = ItoTemp::count();
            return view($views[$page], compact('recordCount'));
        }

        return view($views[$page]);
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file_upload' => 'required|mimes:xls,xlsx',
        ]);

        $file = $request->file('file_upload');
        $filename = 'daily_' . uniqid() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads'), $filename);

        Excel::import(new ItoTempImport, public_path('uploads/' . $filename));
        unlink(public_path('uploads/' . $filename));

        Alert::success('Success', 'File uploaded successfully');

        return redirect()->back();
    }

    public function truncateItoTemp()
    {
        ItoTemp::truncate();

        Alert::success('Success', 'ItoTemp table truncated successfully');

        return redirect()->back();
    }

    public function itotemp_data()
    {
        $itotemps = ItoTemp::all();

        return datatables()->of($itotemps)
            ->addColumn('upload_by', function ($itotemp) {
                return $itotemp->uploadBy ? $itotemp->uploadBy->name : 'N/A';
            })
            ->addIndexColumn()
            ->toJson();
    }
}
