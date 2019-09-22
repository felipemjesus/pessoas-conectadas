@component('components.form.errors')
@endcomponent
<div class="row">
    <div class="col">
        {!! Form::open(['route' => $route, 'files' => true, 'method' => $method]) !!}
        <div class="form-group">
            {!! Form::label('nome', 'Nome') !!}
            {!! Form::text('nome', $pessoa ? $pessoa->nome : null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('foto', 'Foto') !!}
            {!! Form::file('foto', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email', 'E-mail') !!}
            {!! Form::email('email', $pessoa ? $pessoa->email : null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('data_nascimento', 'Data de nascimento') !!}
            {!! Form::date('data_nascimento', $pessoa->data_nascimento ?? null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('localidade', 'Localidade') !!}
            {!! Form::text('localidade', $pessoa ? $pessoa->localidade : null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('interesses', 'Interesses') !!}
            {!! Form::textarea('interesses', $pessoa ? $pessoa->interessesTextarea() : null, ['class' => 'form-control']) !!}
        </div>
        {!! Form::submit('Salvar', ['class' => 'btn btn-primary btn-block']) !!}
        {!! Form::close() !!}
    </div>
</div>
