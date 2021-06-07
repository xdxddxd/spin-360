async function VerifySession() {
    $.ajax({
        url: controllerapi+'/Session/Verify',
        type: 'post',
        dataType: 'json',
        success: async (response) => {
            createNotification(response.title,response.message,response.id);
            if(!response.code){
               location.reload();
            }
        }
    });
}

setTimeout(()=>{
    VerifySession()
},1000);

setInterval(()=>{
    VerifySession();
}, 15000);