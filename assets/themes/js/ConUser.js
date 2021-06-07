setTimeout(() => {
    // Call the dataTables jQuery plugin
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });

    UpdateTable();
}, 0)

async function UpdateTable(){
    $.ajax({
        url: controllerapi + '/SystemUser/Consulta',
        type: 'post',
        dataType: 'json',
        success: async (response) => {
            let table = $('#dataTable').DataTable();
            table.clear();

            let btn;

            let usrarray = Object.values(response);
            for (i = 0; i < usrarray.length; i++) {
                if(usrarray[i].isAdm){
                    if(usrarray[i].posicao !== "Administrador"){
                        if(usrarray[i].active){
                            btn = '<button class="btn btn-outline-danger" onclick="BlockUser(' + usrarray[i].id + ')"><i class="fas fa-lock"></i> Bloquear</button>';
                        }else{
                            btn = '<button class="btn btn-outline-success" onclick="BlockUser(' + usrarray[i].id + ')"><i class="fas fa-unlock"></i> Desbloquear</button>';
                        }
                    } else {
                        btn = '<button class="btn btn-secondary" disabled><DEL><i class="fas fa-user"></i> Sem Permissão<DEL></button>';
                    }
                } else {
                    btn = '<button class="btn btn-secondary" disabled><DEL><i class="fas fa-user"></i> Sem Permissão<DEL></button>';
                }
                table.row.add([
                    usrarray[i].nome,
                    usrarray[i].email,
                    usrarray[i].celular,
                    usrarray[i].posicao,
                    btn
                ]).draw();
            }
        }
    });
}

async function BlockUser(id){
    $.ajax({
        url: controllerapi + '/SystemUser/Block',
        type: 'post',
        dataType: 'json',
        data:{
            BlockID: id
        },
        success: async (response) => {
            createNotification(response.title,response.message,response.id);
            if(response.code){
               UpdateTable();
            }
        }
    });
}