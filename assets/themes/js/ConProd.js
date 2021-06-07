setTimeout(() => {
    // Call the dataTables jQuery plugin
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });

    UpdateTable();
}, 0)

async function UpdateTable(){
    $.ajax({
        url: controllerapi + '/Produto/Consultar',
        type: 'post',
        dataType: 'json',
        success: async (response) => {
            let table = $('#dataTable').DataTable();
            table.clear();

            let btn;

            let usrarray = Object.values(response);
            for (i = 0; i < usrarray.length; i++) {
                table.row.add([
                    usrarray[i].name,
                    usrarray[i].marca,
                    usrarray[i].subcategoria,
                    usrarray[i].value,
                    usrarray[i].qtd,
                ]).draw();
            }
        }
    });
}