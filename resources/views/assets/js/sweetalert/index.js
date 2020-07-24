class SweetAlert {
    static confirmAlert() {
        return Swal.fire({
            title: 'Tem certeza que deseja excluir o registro?',
            text: 'A ação não poderá ser revertida',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Confirmar',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar'
        });
    }

    static success() {
        Swal.fire(
            'Removido',
            'O registro foi removido com sucesso!',
            'success'
        );
    }

    static fails() {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Falha ao remover registro, tente novamente.',
        });
    }
}

