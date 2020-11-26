@component('components.alert', [
    'error' => isset($error) ? $error : null,
])@endcomponent

<div class="card">
    <div class="card-body">
        <form
            action="{{ isset($laboratory) ? route('labs.update', $laboratory->id) : route('labs.store') }}"
            method="POST"
        >
            @csrf
            @if (isset($laboratory))
                @method('PUT')
            @endif
            <div class="form-group">
                <label for="name">Nome da sala</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    required
                    class="@error('name') is-invalid @enderror form-control"
                    value="<?= isset($laboratory) ? $laboratory->name : '' ?>"
                >
            </div>
            <div class="form-group">
                <label for="name">Computadores</label>
                <input
                    type="number"
                    name="computers"
                    id="computers"
                    required
                    class="@error('computers') is-invalid @enderror form-control"
                    value="<?= isset($laboratory) ? $laboratory->equipments->computers : '' ?>"
                >
            </div>
            <div class="form-group">
                <label for="name">Projetores</label>
                <input
                    type="number"
                    name="projectors"
                    id="projectors"
                    required
                    class="@error('projectors') is-invalid @enderror form-control"
                    value="<?= isset($laboratory) ? $laboratory->equipments->projectors : '' ?>"
                >
            </div>
            <div class="form-group">
                <label for="name">Televisões</label>
                <input
                    type="number"
                    name="televisions"
                    id="televisions"
                    required
                    class="@error('televisions') is-invalid @enderror form-control"
                    value="<?= isset($laboratory) ? $laboratory->equipments->televisions : '' ?>"
                >
            </div>
            <button type="submit" class="btn btn-danger">
                ENVIAR
            </button>
        </form>
    </div>
</div>
