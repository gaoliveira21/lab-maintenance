$(document).ready(function() {
    $('.select-mult').select2({
        theme: 'bootstrap4',
    });

    const labs = $(".labs");

    const values = labs.data('selected').map(value => String(value.id));
    labs.val(values).trigger('change');
});
