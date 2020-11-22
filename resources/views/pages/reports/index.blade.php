@extends('adminlte::page')

@section('title', 'Relatórios')

@section('css')
    <link rel="stylesheet" href="{{ url('css/datatables.css') }}">
    <link rel="stylesheet" href="{{ url('css/styles.css') }}">
@endsection

@section('content_header')
    @component('components.header', [
        'title' => 'Listagem de relatórios',
        'route' => 'reports.create',
        'backBtn' => false
    ])@endcomponent
@endsection

@section('content')
<div class="card">
    <div class="card-body table-responsive">
        <table id="reports-table" class="display table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Criado em</th>
                    <th>Atualizado em</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reports as $report)
                    @can('view-reports', $report)
                    <tr>
                        <td>{{ $report->id }}</td>
                        <td>{{ $report->title }}</td>
                        <td>{{ $report->author->name }}</td>
                        <td>{{ date('d-m-Y', strtotime($report->created_at)) }}</td>
                        <td>{{ date('d-m-Y', strtotime($report->updated_at)) }}</td>
                        <td>
                            <a class="btn btn-xs btn-info mr-1" href="{{ route('reports.show', $report->id) }}">
                                <i class="far fa-eye"></i>
                            </a>
                            @can('edit-reports', $report)
                            <a class="btn btn-xs btn-primary mr-1" href="{{ route('reports.edit', $report->id) }}">
                                <i class="fas fa-pen"></i>
                            </a>
                            @endcan
                        </td>
                    </tr>
                    @endcan
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Criado em</th>
                    <th>Atualizado em</th>
                    <th>Ações</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection

@section('js')
    <script src="{{ url('js/datatables/index.js') }}"></script>
    <script src="{{ url('js/sweetalert/index.js') }}"></script>
    <script src="{{ url('js/datatables/reports.js') }}"></script>
@endsection
