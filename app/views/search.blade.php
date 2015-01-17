@extends('layout')
@section('title')
    {{ trans('messages.title') }}
@endsection
@section('content')
@foreach ($publications as $publication)
    <div>id={{$publication->id}} engine={{$publication->engine}} Город={{$publication->city->name}}</div>
@endforeach

@stop