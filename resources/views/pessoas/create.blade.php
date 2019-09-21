@extends('layouts.default')

@section('content')
    <h1>Cadastrar Pessoa</h1>

    {!! Form::open() !!}

    <div class="form-group">
        {!! Form::label('nome', 'Nome') !!}
        {!! Form::text('nome', null, ['class' => 'form-control']) !!}
    </div>

    {!! Form::close() !!}
@endsection
