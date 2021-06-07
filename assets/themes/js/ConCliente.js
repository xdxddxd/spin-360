setTimeout(() => {
    // Call the dataTables jQuery plugin
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });

    UpdateTable();
}, 0)

async function UpdateTable(){
    $.ajax({
        url: controllerapi + '/Cliente/Consulta',
        type: 'post',
        dataType: 'json',
        success: async (response) => {
            let table = $('#dataTable').DataTable();
            table.clear();

            let btn;

            let usrarray = Object.values(response);
            for (i = 0; i < usrarray.length; i++) {
                table.row.add([
                    usrarray[i].id,
                    usrarray[i].nome,
                    usrarray[i].celular,
                    usrarray[i].email,
                    usrarray[i].cep,
                    usrarray[i].rua,
                    usrarray[i].nr,
                    usrarray[i].complemento,
                    usrarray[i].bairro,
                    usrarray[i].cidade,
                    usrarray[i].uf,
                    usrarray[i].pedidos,
                ]).draw();
            }
        }
    });
}