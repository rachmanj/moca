<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $page = request()->query('page', 'dashboard');

        $views = [
            'dashboard' => 'site.inventories.dashboard',
            'list' => 'site.inventories.list',
        ];

        return view($views[$page]);
    }
}
