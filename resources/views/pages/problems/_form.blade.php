@component('components.alert', [
    'error' => isset($error) ? $error : null,
])@endcomponent

<div class="card">
    <div class="card-body">
        <form
            action="{{ route('problems.store') }}"
            method="POST"
        >
            @csrf
            <div class="form-group">
                <label for="title">Título</label>
                <input
                    type="text"
                    name="title"
                    id="title"
                    required
                    class="@error('title') is-invalid @enderror form-control"
                >
            </div>
            <div class="form-group row">
                <div class="col-6">
                    <label for="laboratory">Local</label>
                    <select
                        name="laboratory_id"
                        id="laboratory"
                        class="form-control"
                    >
                        <option value="0" selected>Selecione o local do problema</option>
                        @foreach ($laboratories as $laboratory)
                            <option value="{{ $laboratory->id }}">{{ $laboratory->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="0" selected>Pendente</option>
                        <option value="1">Resolvido</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="body">Descrição</label>
                <textarea
                    name="body"
                    id="body"
                    required
                    class="@error('body') is-invalid @enderror form-control"
                    rows="4"
                ></textarea>
            </div>
            <button type="submit" class="btn btn-purple">
                ENVIAR
            </button>
        </form>
    </div>
</div>
