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

    public function view($id)
    {
        $pessoa = Pessoa::find($id);
        return view('pessoas.view', compact('pessoa'));
    }

    public function create()
    {
        return view('pessoas.create');
    }

    public function store(PessoaRequest $request)
    {
        Pessoa::saveRequest($request->all());
        return redirect('/')->with('success', 'Pessoa cadastrada com sucesso!');
    }

    public function edit($id)
    {
        $pessoa = Pessoa::find($id);
        return view('pessoas.edit', compact('pessoa'));
    }

    public function update(PessoaRequest $request, $id)
    {
        Pessoa::saveRequest($request->all(), $id);
        return redirect('/')->with('success', 'Pessoa editada com sucesso!');
    }
}

