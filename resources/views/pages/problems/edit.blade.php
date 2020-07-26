@extends('adminlte::page')

@section('title', 'Editar problema')

@section('css')
    <link rel="stylesheet" href="{{ url('css/styles.css') }}">
@endsection

@section('content_header')
    @component('components.header', [
        'title' => 'Edição de problema',
        'route' => 'problems.index',
        'backBtn' => true
    ])@endcomponent
@endsection

@section('content')
    @include('pages.problems._form', ['laboratories' => $laboratories])
@endsection
