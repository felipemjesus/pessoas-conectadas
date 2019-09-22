<?php

namespace App\Http\Controllers;

use App\Http\Requests\PessoaRequest;
use App\Interesse;
use App\Pessoa;
use Illuminate\Http\Request;

class PessoasController extends Controller
{
    public function index()
    {
        $pessoas = Pessoa::all();
        return view('pessoas.index', compact('pessoas'));
    }

    public function create()
    {
        return view('pessoas.create');
    }

    public function store(PessoaRequest $request)
    {
        $pessoa = $request->all();

        // realiza o upload da foto
        $foto = $pessoa['foto']->store('public');
        $pessoa['foto'] = $foto;

        // realiza o cadastro dos interesses e retorna os ids de cada
        $interesses = Interesse::saveMany($pessoa['interesses']);

        $pessoa = Pessoa::create($pessoa);
        $pessoa->interesses()->attach($interesses);

        return redirect('/')->with('success', 'Pessoa cadastrada com sucesso!');
    }
}

