@extends('adminlte::page')

@section('title', 'Dashboard')

@section('css')
    <link rel="stylesheet" href="{{ url('css/datatables.css') }}">
    <link rel="stylesheet" href="{{ url('css/styles.css') }}">
@endsection

@section('content_header')
    <h1>Dashboard</h1>
    <hr>
    <h5>Problemas pendentes</h5>
@endsection

@section('content')
<div class="card">
    <div class="card-body table-responsive">
        <table id="dashboard-table" class="display table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Local</th>
                    <th>Status</th>
                    <th>Criado em</th>
                    <th>Atualizado em</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($problems as $problem)
                    <tr>
                        <td>{{ $problem->id }}</td>
                        <td>{{ Str::limit($problem->title, $limit = 20, $end = '...') }}</td>
                        <td>{{ $problem->author->name }}</td>
                        <td>{{ $problem->locale->name }}</td>
                        <td>
                            @if ($problem->status)
                                <span class="badge badge-success">Resolvido</span>
                            @else
                                <span class="badge badge-warning">Pendente</span>
                            @endif
                        </td>
                        <td>{{ date('d-m-Y', strtotime($problem->created_at)) }}</td>
                        <td>{{ date('d-m-Y', strtotime($problem->updated_at)) }}</td>
                        <td>
                            <a class="btn btn-xs btn-info mr-1" href="{{ route('problems.show', $problem->id) }}">
                                <i class="far fa-eye"></i>
                            </a>
                            @can('edit-problems', $problem)
                            <a class="btn btn-xs btn-primary mr-1" href="{{ route('problems.edit', $problem->id) }}">
                                <i class="fas fa-pen"></i>
                            </a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Local</th>
                    <th>Status</th>
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
    <script src="{{ url('js/datatables/dashboard.js') }}"></script>
@endsection
