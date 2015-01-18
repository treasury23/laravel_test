@extends('layout')
@section('title')
    {{ trans('messages.title') }}
@endsection
@section('content')
<div class="form-login">
@include('errors', array('errors'=>$errors))

    {{ Form::open(array('url' => 'signup')) }}
    <div class="controls">
        {{ Form::text('name', null,  array('class' => 'form-control', 'placeholder' => Lang::get('messages.login'))) }}
    </div>
    <div class="controls">
        {{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => Lang::get('messages.email'))) }}
    </div>
    <div class="controls">
        {{ Form::password('password', array('class' => 'form-control', 'placeholder' => Lang::get('messages.password'))) }}
    </div>
    {{ Form::submit('Зарегистрироваться', array('class' => 'btn btn-lg btn-primary btn-block')) }}

    {{ Form::close() }}
</div>
@stop

