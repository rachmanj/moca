<?php

namespace App\Imports;

use App\Models\ItoTemp;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ItoTempImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new ItoTemp([
            'document_number' => $row['document_number'],
            'creation_date' => $this->convert_date($row['creation_date']),
            'document_date' => $this->convert_date($row['document_date']),
            'wo_number' => $row['wo_number'],
            'subject' => $row['subject'],
            'category' => $row['category'],
            'line' => $row['line'],
            'issue_purpose' => $row['issue_purpose'],
            'job_category' => $row['job_category'],
            'job_name' => $row['job_name'],
            'unit_number' => $row['unit_number'],
            'model_number' => $row['model_number'],
            'serial_number' => $row['serial_number'],
            'hours_meter' => $row['hours_meter'],
            'item_code' => $row['item_code'],
            'desc' => $row['desc'],
            'qty' => $row['qty'],
            'stock_price' => $row['stock_price'],
            'total_price' => $row['total_price'],
            'project_code' => $row['project_code'],
            'warehouse_name' => $row['warehouse_name'],
            'no_ba_oldcore' => $row['no_ba_oldcore'],
            'order_type' => $row['order_type'],
            'status_gi' => $row['status_gi'],
            'gr_no' => $row['gr_no'],
            'm_ret_no' => $row['m_ret_no'],
            'wo_item_code' => $row['wo_item_code'],
            'wo_desc' => $row['wo_desc'],
            'wo_qty' => $row['wo_qty'],
            'keterangan' => $row['keterangan'],
            'upload_by' => Auth::user()->id,
        ]);
    }

    private function convert_date($date)
    {
        if ($date) {
            $year = substr($date, 6, 4);
            $month = substr($date, 3, 2);
            $day = substr($date, 0, 2);
            $new_date = $year . '-' . $month . '-' . $day;
            return $new_date;
        } else {
            return null;
        }
    }
}
