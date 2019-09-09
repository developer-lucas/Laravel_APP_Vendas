<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use View;

class VendedoresController extends Controller
{
	# Listagem de vendedores cadastrados
    public function index()
    {		
        return View('vendedores.index');
		
    } 
	
	# Cadastro de novo vendedor
	public function cadastrar()
    {		
        return View('vendedores.cadastrar');
		
    } 	
	
}
