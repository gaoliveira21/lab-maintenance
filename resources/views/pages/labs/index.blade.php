@extends('adminlte::page')

@section('title', 'Laboratórios')

@section('css')
    <link rel="stylesheet" href="css/datatables.css">
@endsection

@section('content_header')
<h1>Listagem de laboratórios</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <table id="labs-table" class="display table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Sala</th>
                    <th>Criado em</th>
                    <th>Atualizado em</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($laboratories as $laboratory)
                        <td>{{ $laboratory->id }}</td>
                        <td>{{ $laboratory->name }}</td>
                        <td>{{ date('d-m-Y', strtotime($laboratory->created_at)) }}</td>
                        <td>{{ date('d-m-Y', strtotime($laboratory->updated_at)) }}</td>
                    @endforeach
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Sala</th>
                    <th>Criado em</th>
                    <th>Atualizado em</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@stop

@section('js')
    <script src="js/datatables/index.js"></script>
    <script src="js/datatables/labs.js"></script>
@endsection
