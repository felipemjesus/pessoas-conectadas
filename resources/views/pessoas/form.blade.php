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
@section('script')
    <script>
        $('form').submit(function (e) {
            $('.help-block').remove();
            var pessoa = $(this).serializeArray()
            var camposObrigatorios = ['nome', 'foto', 'localidade'];
            var errors = true;

            pessoa.forEach(function (input) {
                // verifica se possuem campos obrigatorios não preenchidos
                if (camposObrigatorios.indexOf(input.name) >= 0 && input.value == "") {
                    $('input[name=' + input.name + ']').parent().append(
                        $('<span/>')
                            .addClass('help-block text-danger')
                            .html('Preenchimento obrigatório')
                    )
                    errors = false
                }

                // verifica se todos os interesses informados possuem no minimo 3 caracteres
                if (input.name == 'interesses' && input.value != "" && !validarInteresses(input.value)) {
                    $('textarea[name=' + input.name + ']').parent().append(
                        $('<span/>')
                            .addClass('help-block text-danger')
                            .html('O interesse deve ter no mínimo 3 caracteres')
                    )
                    errors = false
                }
            })
            return errors
        })

        // metodo verifica se todos os interesses informados possuem no minimo 3 caracteres
        function validarInteresses(value) {
            var interesses = value.split('\r\n')
            for (let interesse of interesses) {
                console.log(interesse.length)
                if (interesse.length < 3) {
                    return false
                }
            }
            return true
        }
    </script>
@endsection
