@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Editar Pessoa</h1>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col text-right">
            <a href="{{ route('pessoas.index') }}" class="btn btn-secondary">Listar</a>
            <a href="{{ route('pessoas.view', ['id' => $pessoa->id]) }}" class="btn btn-info text-white">Visualizar</a>
            <a href="#" class="btn btn-danger"
               onclick="if (confirm('Tem certeza que deseja deletar?')) { document.getElementById('destroy{{ $pessoa->id }}').submit(); } event.returnValue = false; return false;">
                Deletar
            </a>
            {!! Form::open(['route' => ['pessoas.destroy', $pessoa->id], 'method' => 'delete', 'class' => 'hidden', 'id' => 'destroy' . $pessoa->id]) !!}
            {!! Form::close() !!}
        </div>
    </div>
    @component('pessoas.form', [
        'route' => ['pessoas.update', $pessoa->id],
        'method' => 'put',
        'pessoa' => $pessoa
    ])
    @endcomponent
@endsection
