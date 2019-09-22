@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Editar Pessoa</h1>
            <a href="{{ route('pessoas.index') }}" class="btn btn-secondary float-right mb-2">Listar</a>
        </div>
    </div>
    @component('components.errors')
    @endcomponent
    <div class="row">
        <div class="col">
            {!! Form::open(['route' => ['pessoas.update', $pessoa->id], 'files' => true, 'method' => 'put']) !!}
            <div class="form-group">
                {!! Form::label('nome', 'Nome') !!}
                {!! Form::text('nome', $pessoa->nome, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('foto', 'Foto') !!}
                {!! Form::file('foto', ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email', 'E-mail') !!}
                {!! Form::email('email', $pessoa->email, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('data_nascimento', 'Data de nascimento') !!}
                {!! Form::date('data_nascimento', $pessoa->data_nascimento, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('localidade', 'Localidade') !!}
                {!! Form::text('localidade', $pessoa->localidade, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('interesses', 'Interesses') !!}
                {!! Form::textarea('interesses', $pessoa->interessesTextarea(), ['class' => 'form-control']) !!}
            </div>
            {!! Form::submit('Salvar', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
