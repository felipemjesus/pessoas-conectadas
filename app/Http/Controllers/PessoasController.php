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
        $pessoaRequest = $request->all();

        // realiza o upload da foto
        $foto = $pessoaRequest['foto']->store('public');
        $pessoaRequest['foto'] = $foto;

        // realiza o cadastro dos interesses e retorna os ids de cada
        $interesses = Interesse::saveMany($pessoaRequest['interesses']);

        // salva os dados da pesso
        $pessoa = Pessoa::create($pessoaRequest);

        // vincula os interesses a pessoa
        $pessoa->interesses()->attach($interesses);

        return redirect('/')->with('success', 'Pessoa cadastrada com sucesso!');
    }

    public function edit($id)
    {
        $pessoa = Pessoa::find($id);
        return view('pessoas.edit', compact('pessoa'));
    }

    public function update(PessoaRequest $request, $id)
    {
        $pessoaRequest = $request->all();

        // realiza o upload da foto
        if (isset($pessoaRequest['foto'])) {
            $foto = $pessoaRequest['foto']->store('public');
            $pessoaRequest['foto'] = $foto;
        }

        // realiza o cadastro dos interesses e retorna os ids de cada
        $interesses = Interesse::saveMany($pessoaRequest['interesses']);

        // atualiza os dados da pessoa
        $pessoa = Pessoa::find($id);
        $pessoa->update($pessoaRequest);

        // remove todos os interesses e vincula os interesses a pessoa
        $pessoa->interesses()->detach();
        $pessoa->interesses()->attach($interesses);

        return redirect('/')->with('success', 'Pessoa editada com sucesso!');
    }
}

