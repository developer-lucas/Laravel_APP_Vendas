<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use View;

class VendasController extends Controller
{
    public function index($id)
    {	
		
		# Retorna a view para o usuário com o ID do vendedor
        return View('vendas.index')
			->with('vendedor_id', $id);
		
    } 	
	
}
