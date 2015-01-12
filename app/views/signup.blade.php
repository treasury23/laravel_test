@extends('layout')
@section('content')

    {{ Form::open(array('url' => 'signup')) }}
        <?php
        echo Form::label('name', 'Login');
        echo Form::text('username');
        echo Form::label('email', 'E-mail');
        echo Form::text('email');
        echo Form::label('password', 'Password');
        echo Form::password('password');
        echo Form::submit('OK');
        ?>
    {{ Form::close() }}

@stop

