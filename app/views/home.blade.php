@extends('layout')
@section('title')
    {{ trans('messages.title') }}
@endsection
@section('content')
@include('errors', array('errors'=>$errors))

{{ Form::open(array('url' => 'search', 'id' => 'search-form', 'onsubmit' => 'return false')) }}

        <div>
            {{ Form::label('area_id', 'Область:') }}
            {{ Form::select('area_id', $areas) }}
        </div>
        <div>
            {{ Form::label('city_id', 'Город:') }}
            {{ Form::select('city_id', $cities) }}
        </div>
        <div>
            {{ Form::label('brand_id', 'Марка:') }}
            {{ Form::select('brand_id', $brands) }}
        </div>
        <div>
            {{ Form::label('model_id', 'Модель:') }}
            {{ Form::select('model_id', $models) }}
        </div>
        <div>
            {{ Form::label('engine_from', 'Объем двигателя:') }}
            {{ Form::text('engine_from', null, array('placeholder' => 'от')) }}
            {{ Form::text('engine_to', null, array('placeholder' => 'до')) }}
        </div>
        {{ Form::submit(Lang::get('messages.search'), array('class' => 'btn btn-lg btn-primary btn-block', 'id' => 'search')) }}</div>

{{ Form::close() }}

<div id="content"></div>

@stop