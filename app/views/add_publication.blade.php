@extends('layout')
@section('content')
    Область: {{$obl->name}}

{{$obl->cities}}
<?php var_dump($obl); ?>
@stop