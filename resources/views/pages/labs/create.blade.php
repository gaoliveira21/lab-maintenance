@extends('adminlte::page')

@section('title', 'Novo Laboratório')

@section('css')
    <link rel="stylesheet" href="{{ url('css/styles.css') }}">
@endsection

@section('content_header')
    @component('components.header', [
        'title' => 'Cadastro de laboratório',
        'route' => 'labs.index',
        'backBtn' => true
    ])@endcomponent
@endsection


@section('content')
    @include('pages.labs._form')
@endsection
