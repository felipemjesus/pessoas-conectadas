@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Cadastrar Pessoa</h1>
            <a href="{{ route('pessoas.index') }}" class="btn btn-secondary float-right mb-2">Listar</a>
        </div>
    </div>
    @component('pessoas.form', [
        'route' => ['pessoas.store'],
        'method' => 'post',
        'pessoa' => null
    ])
    @endcomponent
@endsection
