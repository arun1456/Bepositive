<?php

namespace App\Http\Controllers;
use App\Models\District;
use App\Models\Bgroup;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin()
    {

        $bgroups=Bgroup::all();
        $districts=District::all();
        return view('console.admin',compact('districts','bgroups'));
    }

    public function consolelogin()
    {
        
        return view('console.console');
    }
}
