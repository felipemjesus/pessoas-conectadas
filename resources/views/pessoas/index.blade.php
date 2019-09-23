@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Pessoas</h1>
            <a href="{{ route('pessoas.create') }}" class="btn btn-primary float-right mb-2">Cadastrar</a>
        </div>
    </div>
    @if (session('success'))
        @component('components.alert', ['type' => 'success'])
            {{ session('success') }}
        @endcomponent
    @endif
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
                        <td>{{ $pessoa->data_nascimento ? date_create_from_format('Y-m-d', $pessoa->data_nascimento)->format('d/m/Y') : null }}</td>
                        <td>{{ $pessoa->localidade }}</td>
                        <td>
                            <a href="{{ route('pessoas.view', ['id' => $pessoa->id]) }}" class="btn btn-sm btn-info text-white">Visualizar</a>
                            <a href="{{ route('pessoas.edit', ['id' => $pessoa->id]) }}" class="btn btn-sm btn-success">Editar</a>
                            <a href="#" class="btn btn-sm btn-danger"
                               onclick="if (confirm('Tem certeza que deseja deletar?')) { document.getElementById('destroy{{ $pessoa->id }}').submit(); } event.returnValue = false; return false;">
                                Deletar
                            </a>
                            {!! Form::open(['route' => ['pessoas.destroy', $pessoa->id], 'method' => 'delete', 'class' => 'hidden', 'id' => 'destroy' . $pessoa->id]) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
