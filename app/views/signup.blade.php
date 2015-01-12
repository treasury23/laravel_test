@extends('layout')
@section('title')
    User profile
@endsection
@section('content')

<div class="form-signup">
    {{ Form::open(array('url' => 'signup')) }}

        {{ Form::text('username', null,  array('class' => 'form-control', 'placeholder' => 'Логин')) }}
        {{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'E-mail')) }}
        {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Пароль')) }}
        {{ Form::submit('Войти', array('class' => 'btn btn-lg btn-primary btn-block')) }}

    {{ Form::close() }}
</div>
@stop

