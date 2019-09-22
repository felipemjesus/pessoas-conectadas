@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Visualizar Pessoa</h1>
            <a href="{{ route('pessoas.index') }}" class="btn btn-secondary float-right mb-2">Listar</a>
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
        <div class="col">
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
                    <h6>nenhuma relacionada</h6>
                @endforelse
            </div>
        </div>
    </div>
@endsection
