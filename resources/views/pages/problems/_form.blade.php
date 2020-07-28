@component('components.alert', [
    'error' => isset($error) ? $error : null,
])@endcomponent

<div class="card">
    <div class="card-body">
        <form
            action="{{ isset($problem) ? route('problems.update', $problem->id) : route('problems.store') }}"
            method="POST"
        >
            @csrf
            @if(isset($problem))
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
                    value="{{ isset($problem) ? $problem->title : '' }}"
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
                        <option value="0">Selecione o local do problema</option>
                        @foreach ($laboratories as $laboratory)
                            @if (isset($problem) && $laboratory->id === $problem->id)
                            <option value="{{ $laboratory->id }}" selected>{{ $laboratory->name }}</option>
                            @else
                                <option value="{{ $laboratory->id }}">{{ $laboratory->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-6">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option
                            value="0"
                            {{ isset($problem) && $problem->status === 0 ? 'selected' : '' }}
                        >Pendente</option>
                        <option
                            value="1"
                            {{ isset($problem) && $problem->status === 1 ? 'selected' : '' }}
                        >Resolvido</option>
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
                    maxlength="1024"
            >{{ isset($problem) ? $problem->body : ''}}</textarea>
            </div>
            <button type="submit" class="btn btn-purple">
                ENVIAR
            </button>
        </form>
    </div>
</div>
