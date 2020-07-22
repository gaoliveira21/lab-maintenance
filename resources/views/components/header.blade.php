<div class="row">
    <div class="col-6">
        <h1>{{ $title }}</h1>
    </div>
    <div class="col-6 text-right">
        @if (!$backBtn)
            <a href="{{ route($route) }}" class="btn btn-purple">
                <i class="fas fa-plus"></i>
                CADASTRAR
            </a>
        @else
            <a href="{{ route($route) }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i>
                VOLTAR
            </a>
        @endif
    </div>

</div>
