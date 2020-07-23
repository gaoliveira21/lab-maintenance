@extends('adminlte::page')

@section('title', 'Laboratórios')

@section('css')
    <link rel="stylesheet" href="{{ url('css/datatables.css') }}">
    <link rel="stylesheet" href="{{ url('css/styles.css') }}">
@endsection

@section('content_header')
    @component('components.header', [
        'title' => 'Listagem de laboratórios',
        'route' => 'labs.create',
        'backBtn' => false
    ])@endcomponent
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <table id="labs-table" class="display table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Criado em</th>
                    <th>Atualizado em</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($laboratories as $laboratory)
                    <tr>
                        <td>{{ $laboratory->id }}</td>
                        <td>{{ $laboratory->name }}</td>
                        <td>{{ date('d-m-Y', strtotime($laboratory->created_at)) }}</td>
                        <td>{{ date('d-m-Y', strtotime($laboratory->updated_at)) }}</td>
                        <td>
                            <a class="btn btn-xs btn-primary mr-2" href="{{ route('labs.edit', $laboratory->id) }}">
                                <i class="fas fa-pen"></i>
                            </a>
                            <a class="btn btn-xs btn-danger" href="#">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
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
    <script src="js/datatables/index.js"></script>
    <script src="js/datatables/labs.js"></script>
@endsection
