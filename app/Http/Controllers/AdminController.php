<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // vista del dashboard
    public function index(){
        return view('admin.dashboard');
    }
    public function createTeacher(Request $request){
        
    }
}