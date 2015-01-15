@extends('layout')
@section('content')

<?php $areas = array(0 => 'Choose area');
  foreach (Area::get(array('id', 'name')) as $area) {
   $areas[$area->id] = $area->name;
  } ?>

   {{ Form::label('area_id', 'Область:') }}
   {{ Form::select('area_id', $areas) }}

@foreach ($obl->cities as $city)
    <p>{{ $city->name }}</p>
@endforeach

@stop