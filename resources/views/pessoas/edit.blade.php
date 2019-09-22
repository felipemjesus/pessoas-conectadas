@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Editar Pessoa</h1>
            <a href="{{ route('pessoas.index') }}" class="btn btn-secondary float-right mb-2">Listar</a>
        </div>
    </div>
    @component('pessoas.form', [
        'route' => ['pessoas.update', $pessoa->id],
        'method' => 'put',
        'pessoa' => $pessoa
    ])
    @endcomponent
@endsection
