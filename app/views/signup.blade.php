@extends('layout')
@section('title')
    User profile
@endsection
@section('content')

<div class="form-signup">
    @if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
    @endif

    {{ Form::open(array('url' => 'signup')) }}

        {{ Form::text('username', null,  array('class' => 'form-control', 'placeholder' => 'Логин')) }}
        {{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'E-mail')) }}
        {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Пароль')) }}
        <div style="padding:20px">{{ Form::submit('Отправить', array('class' => 'btn btn-lg btn-primary btn-block')) }}</div>

    {{ Form::close() }}
</div>
@stop

