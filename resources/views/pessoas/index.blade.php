@extends('layouts.default')

@section('content')
    <h1>Pessoas</h1>
    <a href="{{ url('pessoas/create') }}" class="btn btn-primary float-right mb-2">Cadastrar</a>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Data de nascimento</th>
            <th>Localidade</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($pessoas as $pessoa)
            <tr>{{ $pessoa->nome }}</tr>
            <tr>{{ $pessoa->email }}</tr>
            <tr>{{ $pessoa->data_nascimento }}</tr>
            <tr>{{ $pessoa->localidade }}</tr>
            <tr>
                <a href="{{ url('pessoas/edit', $pessoa->id) }}" class="btn btn-success btn-sm">Editar</a>
                <a href="{{ url('pessoas/destroy', $pessoa->id) }}" class="btn btn-danger btn-sm">Deletar</a>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
