<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function Index()
    {
        $page_data = [
            'module' => 'dashboard',
            'url' => 'dashboard/index',
            'title' =>'Dashboard',


        ];

        return view('layouts.index',compact('page_data'));
    }

}
