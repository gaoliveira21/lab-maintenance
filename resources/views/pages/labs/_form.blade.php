@component('components.alert', [
    'error' => isset($error) ? $error : null,
])@endcomponent

<div class="card">
    <div class="card-body">
        <form action="{{ route('labs.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nome da sala</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <button type="submit" class="btn btn-purple">
                CADASTRAR
            </button>
        </form>
    </div>
</div>
