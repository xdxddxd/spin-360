async function create(){

    var placa = $('#placa'),
        renavam = $('#renavam'),
        chassi = $('#chassi'),
        modo = $('#modo');

    if(placa.val() == '' || renavam.val() == '' || chassi.val() == ''){
        createNotification('Erro', 'Preencha um dos Campos: Placa, Renavam ou Chassi', Math.floor(Math.random() * 999));
        return;
    }

    $.ajax({
        url: controllerapi + '/',
        type: 'post',
        dataType: 'json',
        data:{

        },
        success: async (response) => {

        }
    });
}