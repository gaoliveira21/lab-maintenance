@extends('adminlte::page')

@section('title', 'Novo Relatório')

@section('css')
    <link rel="stylesheet" href="{{ url('css/styles.css') }}">
@endsection

@section('content_header')
    @component('components.header', [
        'title' => 'Edição de relatório',
        'route' => 'reports.index',
        'backBtn' => true
    ])@endcomponent
@endsection

@section('content')
    @include('pages.reports._form', ['laboratories' => $laboratories])
@endsection

@section('js')
    <script src="{{ url('js/select2/reports.js') }}"></script>
@endsection
