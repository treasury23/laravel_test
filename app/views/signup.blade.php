@extends('layout')
@section('title')
    {{ trans('messages.title') }}
@endsection
@section('content')

<div class="form-signup">
    @if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
    @endif

    {{ Form::open(array('url' => 'signup')) }}

        {{ Form::text('username', null,  array('class' => 'form-control', 'placeholder' => Lang::get('messages.login'))) }}
        {{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => Lang::get('messages.email'))) }}
        {{ Form::password('password', array('class' => 'form-control', 'placeholder' => Lang::get('messages.password'))) }}
        <div style="padding:20px">{{ Form::submit(Lang::get('messages.submit'), array('class' => 'btn btn-lg btn-primary btn-block')) }}</div>

    {{ Form::close() }}
</div>
@stop

