@extends('adminlte::page')

@section('title', 'Dashboard')

@section('css')
<link rel="stylesheet" href="{{ url(mix('css/styles.css')) }}">
@endsection

@section('content_header')
<h1>Dashboard</h1>
@stop

@section('content')
<p class="red">Welcome to this beautiful admin panel.</p>
@stop
