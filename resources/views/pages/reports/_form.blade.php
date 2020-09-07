@component('components.alert', [
    'error' => isset($error) ? $error : null,
])@endcomponent

<div class="card">
    <div class="card-body">
        <form
            action="{{ route('reports.store') }}"
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
                    value="{{ isset($problem) ? $problem->title : '' }}"
                >
            </div>
            <div class="form-group">
                <label for="labs">Laboratórios</label>
                <select class="select-mult form-control" name="labs[]" multiple="multiple">
                    @foreach ($laboratories as $laboratory)
                        <option value="{{ $laboratory->id }}">{{ $laboratory->name }}</option>
                    @endforeach
                </select>
                <small class="text-muted">Selecione os laboratórios</small>
            </div>
            <div class="form-group">
                <label for="text">Relatório</label>
                <textarea
                    name="text"
                    id="text"
                    required
                    class="@error('text') is-invalid @enderror form-control"
                    rows="4"
                    maxlength="1024"
            ></textarea>
            </div>
            <button type="submit" class="btn btn-purple">
                ENVIAR
            </button>
        </form>
    </div>
</div>
