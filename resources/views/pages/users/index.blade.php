@extends('adminlte::page')

@section('title', 'Usuários')

@section('css')
    <link rel="stylesheet" href="{{ url('css/datatables.css') }}">
    <link rel="stylesheet" href="{{ url('css/styles.css') }}">
@endsection

@section('content_header')
    @component('components.header', [
        'title' => 'Listagem de usuários',
        'route' => 'users.create',
        'backBtn' => false
    ])@endcomponent
@endsection

@section('content')
<div class="card">
    <div class="card-body table-responsive">
        <table id="users-table" class="display table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Função</th>
                    <th>Criado em</th>
                    <th>Atualizado em</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ date('d-m-Y', strtotime($user->created_at)) }}</td>
                        <td>{{ date('d-m-Y', strtotime($user->updated_at)) }}</td>
                        <td>
                            <button
                                data-action="{{ route('users.destroy', $user->id) }}"
                                class="btn btn-xs btn-danger remove" type="button"
                            >
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Função</th>
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
    {{-- <script src="{{ url('js/datatables/labs.js') }}"></script> --}}
@endsection
