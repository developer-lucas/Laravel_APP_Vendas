<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use View;

class DashboardController extends Controller
{
    public function index()
    {		
        return View('dashboard');
		
    } 	
	
}
