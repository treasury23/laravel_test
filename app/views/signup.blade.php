@extends('layout')
@section('title')
    {{ trans('messages.title') }}
@endsection
@section('content')
@include('errors', array('errors'=>$errors))
<div class="form-signup">


    {{ Form::open(array('url' => 'signup')) }}

        {{ Form::text('name', null,  array('class' => 'form-control', 'placeholder' => Lang::get('messages.login'))) }}
        {{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => Lang::get('messages.email'))) }}
        {{ Form::password('password', array('class' => 'form-control', 'placeholder' => Lang::get('messages.password'))) }}
        <div style="padding:20px">{{ Form::submit(Lang::get('messages.submit'), array('class' => 'btn btn-lg btn-primary btn-block')) }}</div>

    {{ Form::close() }}
</div>
@stop

