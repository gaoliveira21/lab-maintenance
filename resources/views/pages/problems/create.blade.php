@extends('adminlte::page')

@section('title', 'Novo Problema')

@section('css')
    <link rel="stylesheet" href="{{ url('css/styles.css') }}">
@endsection

@section('content_header')
    @component('components.header', [
        'title' => 'Cadastro de problema',
        'route' => 'problems.index',
        'backBtn' => true
    ])@endcomponent
@endsection


@section('content')
    @include('pages.problems._form', ['laboratories' => $laboratories])
@endsection
