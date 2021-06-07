setTimeout(() => {
    getInfo();
}, 1000);

async function getInfo(){
    $.ajax({
        url: controllerapi + '/Dashboard/Info',
        type: 'post',
        dataType: 'json',
        data: {

        },
        success: async (response) => {
            if(response.code){
                $('#capturas-realizadas').html(response.info.capturasRealizadas);
                $('#capturas-pendentes').html(response.info.capturasPendentes);
                $('#creditos-disponiveis').html(response.info.creditosDisponiveis);

            } else {
                createNotification(response.title, response.message, response.id);
            }
        }
    });
}