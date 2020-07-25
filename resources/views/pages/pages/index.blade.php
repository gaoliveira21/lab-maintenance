@extends('adminlte::page')

@section('title', 'Laboratórios')

@section('css')
    <link rel="stylesheet" href="{{ url('css/datatables.css') }}">
    <link rel="stylesheet" href="{{ url('css/styles.css') }}">
@endsection

@section('content_header')
    @component('components.header', [
        'title' => 'Listagem de problemas',
        'route' => 'problems.create',
        'backBtn' => false
    ])@endcomponent
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <table id="problems-table" class="display table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Local</th>
                    <th>Criado em</th>
                    <th>Atualizado em</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
               <tr></tr>
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Local</th>
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
    <script src="js/sweetalert/index.js"></script>
    <script src="js/datatables/problems.js"></script>
@endsection
