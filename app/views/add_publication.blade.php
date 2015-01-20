@extends('layout')
@section('content')

@include('errors', array('errors'=>$errors))
<?php $city= Session::get('city');$model= Session::get('model'); ?>
<script>$( document ).ready(function() {

_add_publication_js({{$city}})
});</script>
<?php
    $areas = array('' => 'Выберите область');
        foreach (Area::get(array('id', 'name')) as $area) {
            $areas[$area->id] = $area->name;
        }

    $brands = array('' => 'Выберите марку');
          foreach (Brand::get(array('id', 'name')) as $brand) {
              $brands[$brand->id] = $brand->name;
          }

    $cities = array('' => 'Выберите город');
    $models = array('' => 'Выберите модель');

?>

    {{ Form::open(array('url' => 'add', 'files' => true)) }}
    <legend>Форма добавления материала</legend>
        <div>
            {{ Form::label('area_id', 'Область:') }}
            {{ Form::select('area_id', $areas, null, array('required' => 'required', 'class' => 'form-control')) }}
        </div>
        <div>
            {{ Form::label('city_id', 'Город:') }}
            {{ Form::select('city_id', $cities, null, array('required' => 'required', 'class' => 'form-control')) }}
        </div>
        <div>
            {{ Form::label('brand_id', 'Марка:') }}
            {{ Form::select('brand_id', $brands, null, array('required' => 'required', 'class' => 'form-control')) }}
        </div>
        <div>
            {{ Form::label('model_id', 'Модель:') }}
            {{ Form::select('model_id', $models, null, array('required' => 'required', 'class' => 'form-control')) }}
        </div>
            {{ Form::label('engine', 'Объем двигателя:') }}
        <div class="input-group">
            {{ Form::text('engine', null, array('required' => 'required', 'maxlength' => 10, 'class' => 'form-control')) }}
            <div class="input-group-addon">л.</div>
        </div>
        <div>
             {{ Form::label('run', 'Пробег:') }}
        <div class="input-group">
             {{ Form::text('run',null, array('required' => 'required', 'maxlength' => 20, 'class' => 'form-control')) }}
             <div class="input-group-addon">км.</div>
        </div>
        <div>
             {{ Form::label('owner', 'Количество владельцев:') }}
             {{ Form::text('owner', null, array('required' => 'required', 'maxlength' => 3, 'class' => 'form-control')) }}
        </div>
        <div>
             {{ Form::label('image', 'Изображение:') }}
             {{ Form::file('image') }}
        </div>
        <div class="submit">{{ Form::submit('Добавить', array('class' => 'btn btn-lg btn-primary btn-block')) }}</div>
        {{ Form::hidden('ses_city_id','') }}
        {{ Form::hidden('ses_model_id','') }}
    {{ Form::close() }}

@stop