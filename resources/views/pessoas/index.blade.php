@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Pessoas</h1>
            <a href="{{ route('pessoas.create') }}" class="btn btn-primary float-right mb-2">Cadastrar</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col">
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
                    <tr>
                        <td>{{ $pessoa->nome }}</td>
                        <td>{{ $pessoa->email }}</td>
                        <td>{{ date_create_from_format('Y-m-d', $pessoa->data_nascimento)->format('d/m/Y') }}</td>
                        <td>{{ $pessoa->localidade }}</td>
                        <td>
                            <a href="{{ route('pessoas.view', ['id' => $pessoa->id]) }}" class="btn btn-secondary btn-sm">Visualizar</a>
                            <a href="{{ route('pessoas.edit', ['id' => $pessoa->id]) }}" class="btn btn-success btn-sm">Editar</a>
                            <a href="{{ route('pessoas.destroy', ['id' => $pessoa->id]) }}" class="btn btn-danger btn-sm">Deletar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
