async function create(){

    var placa = $('#placa'),
        renavam = $('#renavam'),
        chassi = $('#chassi'),
        modo = $('#modo');

    if(placa.val() == '' && renavam.val() == '' && chassi.val() == ''){
        createNotification('Erro', 'Preencha um dos Campos: Placa, Renavam ou Chassi', Math.floor(Math.random() * 999));
        return;
    }

    if(modo.children("option:selected").val() == 'captura') {
        var tp = 1;
    } else if (modo.children("option:selected").val() == 'galeria') {
        var tp = 0;
    }

    $.ajax({
        url: controllerapi + '/Produto/Create',
        type: 'post',
        dataType: 'json',
        data:{
            "placa": placa.val(),
            "renavam": renavam.val(),
            "chassi": chassi.val(),
            "modo": tp,
        },
        success: async (response) => {
            if(response.code) {
                if(response.tipo_produto == 1){
                    window.location.href = URL_BASE + '/New/Capture/'+response.produto;
                } else if (response.tipo_produto == 0) {
                    window.location.href = URL_BASE + '/New/Gallery/'+response.produto;
                }
            } else {
                createNotification(response.title, response.message, response.id);
            }
        }
    });
}