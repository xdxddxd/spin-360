async function Login(){
    let email = $('#logemail').val(),
        senha = $('#logsenha').val();

    $.ajax({
        url: controllerapi + '/Session/Login',
        dataType: 'json',
        type: 'post',
        data: {
            email: email,
            senha: senha
        },
        success: async (response) => {
            createNotification(response.title,response.message,response.id);
            if(response.code){
               location.reload();
            }
        }
    });
}