@component('components.alert', [
    'error' => isset($error) ? $error : null,
])@endcomponent

<div class="card">
    <div class="card-body">
        <form
            action="{{ isset($report) ? route('reports.update', $report->id) : route('reports.store') }}"
            method="POST"
        >
            @csrf
            @if(isset($report))
                @method('PUT')
            @endif
            <div class="form-group">
                <label for="title">Título</label>
                <input
                    type="text"
                    name="title"
                    id="title"
                    required
                    class="@error('title') is-invalid @enderror form-control"
                    value="{{ isset($report) ? $report->title : '' }}"
                >
            </div>
            <div class="form-group">
                <label for="labs">Laboratórios</label>
                <select
                    class="select-mult form-control labs"
                    data-selected="{{ isset($report) ? $report->labs()->get() : '[]' }}"
                    name="labs[]"
                    multiple="multiple"
                >
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
            >{{ isset($report) ? $report->text : '' }}</textarea>
            </div>
            <button type="submit" class="btn btn-purple">
                ENVIAR
            </button>
        </form>
    </div>
</div>
