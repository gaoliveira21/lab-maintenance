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
            <select class="select-mult form-control" name="labs[]" multiple="multiple">
                <option value="AL">Alabama</option>
                <option value="WY">Wyoming</option>
            </select>
        </form>
    </div>
</div>
