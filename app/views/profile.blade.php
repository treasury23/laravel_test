@extends('layout')
@section('content')
Имя пользователя: {{ $name }}<br>
E-mail: {{ $email }}<br>
<a href="logout"><button>Выход</button></a>
@stop