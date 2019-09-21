<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PessoasController extends Controller
{
    public function index()
    {
        return view('pessoas.index');
    }
}
