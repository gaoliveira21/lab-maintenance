@extends('adminlte::page')

@section('title', 'Laboratórios')

@section('css')
    <link rel="stylesheet" href="{{ url('css/styles.css') }}">
@endsection

@section('content_header')
    @component('components.header', [
        'title' => 'Detalhes do problema #' . $problem->id,
        'route' => 'problems.index',
        'backBtn' => true
    ])@endcomponent
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <h5>
            {{ $problem->title }}
            @if ($problem->status)
                <span class="badge badge-success">Resolvido</span>
            @else
                <span class="badge badge-warning">Pendente</span>
            @endif
        </h5>
        <hr>
        <p><b>Autor: </b>{{ $problem->author->name }}</p>
        <p><b>Local: </b>{{ $problem->locale->name }}</p>
        <p><b>Criado em: </b>{{ date('d-m-Y', strtotime($problem->created_at)) }}</p>
        <p>{{ $problem->body }}</p>
    </div>
</div>
@endsection
