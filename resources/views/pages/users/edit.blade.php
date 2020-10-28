@extends('adminlte::page')

@section('title', 'Editar Perfil')

@section('css')
    <link rel="stylesheet" href="{{ url('css/styles.css') }}">
@endsection

@section('content_header')
<div class="row">
    <div class="col-6">
        <h1>Editar perfil</h1>
    </div>
</div>
@endsection

@section('content')
@component('components.alert', [
    'error' => isset($error) ? $error : null,
])@endcomponent
@component('components.success')@endcomponent
<div class="card">
    <div class="card-body">
        <form
            action="{{ route('users.update') }}"
            method="POST"
        >
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nome</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    required
                    class="@error('name') is-invalid @enderror form-control"
                    value="{{ $user->name }}"
                >
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    required
                    class="@error('email') is-invalid @enderror form-control"
                    value="{{ $user->email }}"
                >
            </div>
            <button type="submit" class="btn btn-danger">
                ATUALIZAR PERFIL
            </button>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <h2>Alterar senha</h2>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <form
            action="{{ route('users.changePassword') }}"
            method="POST"
        >
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="oldPassword">Senha atual</label>
                <input
                    type="password"
                    name="oldPassword"
                    id="oldPassword"
                    required
                    class="@error('oldPassword') is-invalid @enderror form-control"
                >
            </div>
            <div class="form-group">
                <label for="newPassword">Nova senha</label>
                <input
                    type="password"
                    name="newPassword"
                    id="newPassword"
                    required
                    class="@error('newPassword') is-invalid @enderror form-control"
                >
            </div>
            <div class="form-group">
                <label for="confirmNewPassword">Confirmar nova senha</label>
                <input
                    type="password"
                    name="confirmNewPassword"
                    id="confirmNewPassword"
                    required
                    class="@error('confirmNewPassword') is-invalid @enderror form-control"
                >
            </div>
            <button type="submit" class="btn btn-danger">
                ATUALIZAR SENHA
            </button>
        </form>
    </div>
</div>
@endsection
