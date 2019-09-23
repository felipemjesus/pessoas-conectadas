@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Visualizar Pessoa</h1>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col text-right">
            <a href="{{ route('pessoas.index') }}" class="btn btn-secondary">Listar</a>
            <a href="{{ route('pessoas.edit', ['id' => $pessoa->id]) }}" class="btn btn-success">Editar</a>
            <a href="#" class="btn btn-danger"
               onclick="if (confirm('Tem certeza que deseja deletar?')) { document.getElementById('destroy{{ $pessoa->id }}').submit(); } event.returnValue = false; return false;">
                Deletar
            </a>
            {!! Form::open(['route' => ['pessoas.destroy', $pessoa->id], 'method' => 'delete', 'class' => 'hidden', 'id' => 'destroy' . $pessoa->id]) !!}
            {!! Form::close() !!}
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card mb-3 p-2">
                <div class="row no-gutters">
                    <div class="col-md-2">
                        <img src="{{ asset(str_replace('public', 'storage', $pessoa->foto)) }}" class="card-img" alt="...">
                    </div>
                    <div class="col-md-10">
                        <div class="card-body">
                            <h5 class="card-title">{{ $pessoa->nome }}</h5>
                            <p class="card-text text-muted"><strong>Localidade:</strong> {{ $pessoa->localidade }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h3>Pessoas Relacionadas</h3>
        </div>
    </div>
    <div class="row">
        @forelse ($pessoa->pessoasRelacionadas() as $pessoasRelacionada)
            <div class="card col-2 p-2 m-3">
                <img src="{{ asset(str_replace('public', 'storage', $pessoasRelacionada['foto'])) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $pessoasRelacionada['nome'] }}</h5>
                    <p class="card-text text-muted"><strong>Localidade:</strong> {{ $pessoasRelacionada['localidade'] }}</p>
                </div>
            </div>
        @empty
            <h6 class="col m-3">nenhuma pessoa relacionada</h6>
        @endforelse
    </div>
@endsection
