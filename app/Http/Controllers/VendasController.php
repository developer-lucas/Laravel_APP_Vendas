<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use View;

class VendasController extends Controller
{
	# Retorna todas as vendas
    public function index()
    {				
        return View('vendas.index');
		
    } 
	
	# Retorna a view para o usuário com o ID do vendedor
	public function individual($id)
    {			
		
        return View('vendas.individual')
			->with('vendedor_id', $id);
		
    } 
	
}
