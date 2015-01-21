@extends('layout')
@section('title')
    {{ trans('messages.title') }}
@endsection
@section('content')
<div class="form-login">
@include('errors', array('errors'=>$errors))
{{ Form::open(array('url' => 'login', 'class' => 'form-horizontal')) }}
    <div class="controls">
        {{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => Lang::get('messages.email'))) }}
    </div>
    <div class="controls">
        {{ Form::password('password', array('class' => 'form-control', 'placeholder' => Lang::get('messages.password'))) }}
    </div>
    <div class="controls">
        {{ Form::submit('Вход', array('class' => 'btn btn-lg btn-primary btn-block')) }}
    </div>

{{ Form::close() }}
        <a href="/signup"><button class="btn btn-lg btn-primary btn-block">Регистрация</button></a>
</div>
</div>
@stop