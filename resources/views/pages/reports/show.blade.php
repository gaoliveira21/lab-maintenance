@extends('adminlte::page')

@section('title', 'Relatórios')

@section('css')
    <link rel="stylesheet" href="{{ url('css/styles.css') }}">
@endsection

@section('content_header')
    @component('components.header', [
        'title' => 'Detalhes do relatório #' . $report->id,
        'route' => 'reports.index',
        'backBtn' => true
    ])@endcomponent
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <h5>
            {{ $report->title }}
        </h5>
        <hr>
        <p><b>Autor: </b>{{ $report->author->name }}</p>
        <p><b>Laboratórios: </b>
            @foreach($report->labs()->get() as $labs)
                <span class="badge badge-primary">{{ $labs->name }}</span>
            @endforeach
        </p>

        <p><b>Criado em: </b>{{ date('d-m-Y', strtotime($report->created_at)) }}</p>
        <hr>

        <p>{{ $report->text }}</p>
    </div>
</div>
@endsection
