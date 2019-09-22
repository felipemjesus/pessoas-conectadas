@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Cadastrar Pessoa</h1>
            <a href="{{ route('pessoas.index') }}" class="btn btn-secondary float-right mb-2">Listar</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            @if($errors->any())
                <ul class="alert alert-warning">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col">
            {!! Form::open(['route' => 'pessoas.store', 'files' => true]) !!}
            <div class="form-group">
                {!! Form::label('nome', 'Nome') !!}
                {!! Form::text('nome', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('foto', 'Foto') !!}
                {!! Form::file('foto', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email', 'E-mail') !!}
                {!! Form::email('email', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('data_nascimento', 'Data de nascimento') !!}
                {!! Form::date('data_nascimento', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('localidade', 'Localidade') !!}
                {!! Form::text('localidade', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('interesses', 'Interesses') !!}
                {!! Form::textarea('interesses', null, ['class' => 'form-control']) !!}
            </div>
            {!! Form::submit('Salvar', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
