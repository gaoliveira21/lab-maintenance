$(document).ready(function () {
    const id = 'problems-table';
    const table = initDataTables(id);

    $('button.remove').click(async function () {
        const trigger = $(this);
        const url = trigger.data('action');
        const result = await SweetAlert.confirmAlert();

        if (result.value) {
            try {
                await axios.delete(url);

                removeRow(table, trigger);
                SweetAlert.success();
            } catch (error) {
                SweetAlert.fails();
            }
        }
    });

});
