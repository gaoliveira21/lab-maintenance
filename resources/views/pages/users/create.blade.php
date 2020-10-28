@extends('adminlte::page')

@section('title', 'Novo Usuário')

@section('css')
    <link rel="stylesheet" href="{{ url('css/styles.css') }}">
@endsection

@section('content_header')
    @component('components.header', [
        'title' => 'Cadastro de usuário',
        'route' => 'users.index',
        'backBtn' => true
    ])@endcomponent
@endsection

@section('content')
    @include('pages.users._form')
@endsection
