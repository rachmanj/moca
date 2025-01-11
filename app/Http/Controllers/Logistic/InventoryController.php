<?php

namespace App\Http\Controllers\Logistic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $page = request()->query('page', 'dashboard');
        $views = [
            'dashboard' => 'logistic.inventories.dashboard',
            'list' => 'logistic.inventories.list',
        ];

        return view($views[$page]);
    }
}
