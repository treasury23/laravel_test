@extends('layout')
@section('title')
    {{ trans('messages.home') }}
@endsection
@section('content')
@include('errors', array('errors'=>$errors))

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

<a href="/add"><button class="btn btn-danger float-right">Создать публикацию</button></a>

{{ Form::open(array('url' => 'search', 'id' => 'search-form', 'onsubmit' => 'return false')) }}
<legend>Форма поиска</legend>
        <div>
            {{ Form::label('area_id', 'Область:') }}
            {{ Form::select('area_id', $areas, null, array('class' => 'form-control')) }}
        </div>
        <div>
            {{ Form::label('city_id', 'Город:') }}
            {{ Form::select('city_id', $cities, null, array('class' => 'form-control')) }}
        </div>
        <div>
            {{ Form::label('brand_id', 'Марка:') }}
            {{ Form::select('brand_id', $brands, null, array('class' => 'form-control')) }}
        </div>
        <div>
            {{ Form::label('model_id', 'Модель:') }}
            {{ Form::select('model_id', $models, null, array('class' => 'form-control')) }}
        </div>

            {{ Form::label('engine_from', 'Объем двигателя:') }}
        <div class="input-width">
        <div class="input-group float-left">
            {{ Form::text('engine_from', null, array('placeholder' => 'от', 'maxlength' => 10, 'class' => 'form-control')) }}
            <div class="input-group-addon">л.</div>
        </div>
        </div>
        <div class="input-group">
            {{ Form::text('engine_to', null, array('placeholder' => 'до', 'maxlength' => 10, 'class' => 'form-control')) }}
            <div class="input-group-addon">л.</div>
        </div>
            {{ Form::label('run_from', 'Пробег:') }}
        <div class="input-width">
        <div class="input-group float-left">
            {{ Form::text('run_from', null, array('placeholder' => 'от', 'maxlength' => 20, 'class' => 'form-control')) }}
        <div class="input-group-addon">км.</div>
        </div>
        </div>
        <div class="input-group">
            {{ Form::text('run_to', null, array('placeholder' => 'до', 'maxlength' => 20, 'class' => 'form-control')) }}
        <div class="input-group-addon">км.</div>
        </div>
            {{ Form::label('owner_from', 'Количество хозяев:') }}
        <div class="input-width">
        <div class="input-group float-left">
            {{ Form::text('owner_from', null, array('placeholder' => 'от', 'maxlength' => 3, 'class' => 'form-control')) }}
        <div class="input-group-addon"></div>
        </div>
        </div>
        <div class="input-group">
            {{ Form::text('owner_to', null, array('placeholder' => 'до', 'maxlength' => 3, 'class' => 'form-control')) }}
        <div class="input-group-addon"></div>
        </div>

        <div class="submit">{{ Form::submit(Lang::get('messages.search'), array('class' => 'btn btn-lg btn-primary btn-block', 'id' => 'search')) }}</div>

{{ Form::close() }}

<div id="content"></div>

@stop