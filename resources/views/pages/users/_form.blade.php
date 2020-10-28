@component('components.alert', [
    'error' => isset($error) ? $error : null,
])@endcomponent

<div class="card">
    <div class="card-body">
        <form
            action="{{ route('users.store') }}"
            method="POST"
        >
            @csrf
            <div class="form-group">
                <label for="name">Nome</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    required
                    class="@error('name') is-invalid @enderror form-control"
                    value="{{ isset($user) ? $user->name : '' }}"
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
                    value="{{ isset($user) ? $user->email : '' }}"
                >
            </div>
            <div class="form-group">
                <label for="password">Senha</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    required
                    class="@error('password') is-invalid @enderror form-control"
                    value="{{ isset($user) ? $user->password : '' }}"
                >
            </div>
            <div class="form-group">
                <label for="role">Função</label>
                <select
                    name="role"
                    id="role"
                    class="form-control"
                >
                    <option value="0" selected>Selecione a função do usuário</option>
                    <option value="80">Moderador</option>
                    <option value="60">Professor</option>
                </select>
            </div>
            <button type="submit" class="btn btn-danger">
                ENVIAR
            </button>
        </form>
    </div>
</div>
