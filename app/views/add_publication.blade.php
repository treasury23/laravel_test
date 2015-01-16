@extends('layout')
@section('content')

@include('errors', array('errors'=>$errors))

<?php
    $areas = array(0 => 'Выберите область');
        foreach (Area::get(array('id', 'name')) as $area) {
            $areas[$area->id] = $area->name;
        }

    $brands = array(0 => 'Выберите марку');
          foreach (Brand::get(array('id', 'name')) as $brand) {
              $brands[$brand->id] = $brand->name;
          }

    $cities = array(0 => 'Выберите город');
    $models = array(0 => 'Выберите модель');

?>

    {{ Form::open(array('url' => 'add')) }}

        <div>
            {{ Form::label('area_id', 'Область:') }}
            {{ Form::select('area_id', $areas, null, array('required' => 'required')) }}
        </div>
        <div>
            {{ Form::label('city_id', 'Город:') }}
            {{ Form::select('city_id', $cities, null, array('required' => 'required')) }}
        </div>
        <div>
            {{ Form::label('brand_id', 'Марка:') }}
            {{ Form::select('brand_id', $brands, null, array('required' => 'required')) }}
        </div>
        <div>
            {{ Form::label('model_id', 'Модель:') }}
            {{ Form::select('model_id', $models, null, array('required' => 'required')) }}
        </div>
        <div>
            {{ Form::label('engine', 'Объем двигателя:') }}
            {{ Form::text('engine', null, array('required' => 'required')) }}
        </div>
        <div>
             {{ Form::label('run', 'Пробег:') }}
             {{ Form::text('run',null, array('required' => 'required')) }}
        </div>
        <div>
             {{ Form::label('owner', 'Ко-во владельцев:') }}
             {{ Form::text('owner', null, array('required' => 'required')) }}
        </div>
        <div style="padding:20px">{{ Form::submit(Lang::get('messages.submit'), array('class' => 'btn btn-lg btn-primary btn-block')) }}</div>

    {{ Form::close() }}
@stop