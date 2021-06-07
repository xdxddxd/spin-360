async function CadNewUser(){
    var name = $('#cadname'),
        celp = $('#cadcel'),
        email = $('#cademail'),
        pos = $('#cadposition'),
        pass = $('#cadsenha');

    $.ajax({
        url: controllerapi + '/SystemUser/Cadastro',
        type: 'post',
        dataType: 'json',
        data: {
            name: name.val(),
            cel_phone: celp.val(),
            email: email.val(),
            posicao: pos.val(),
            password: pass.val(),
        },
        success: async (response) => {
            createNotification(response.title,response.message,response.id);
            if(response.code){
                $('#sendtouser').html('<strong>Salve estas informações para o usuário fazer login</strong><br>Email: '+email.val()+'<br>Senha: '+pass.val());
                name.val('');
                celp.val('');
                email.val('');
                pos.val('');
                pass.val('');
                $("#passRandom").load(" #passRandom");
            }
        }
    });

}

async function getPositionInfo(pos){
    var position = pos.value;

    $.ajax({
        url: controllerapi + '/Cargo/Consulta',
        type: 'post',
        dataType: 'json',
        data: {
            pos: position
        },
        success: async (response) => {
            if(response.response){
                createNotification(response.title,response.message,response.id);
            }
            if(response.code){
               $('#position-info').html(response.info);
            } else {
               $('#position-info').html('');
            }
        }
    });
}