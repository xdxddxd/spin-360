async function ShowEdit() {
  var elbl = document.getElementById("change-label");

  elbl.classList.remove("hide");
  elbl.classList.add("show");
}

async function HideEdit() {
  var elbl = document.getElementById("change-label");

  elbl.classList.remove("show");
  elbl.classList.add("hide");
}

async function ChangePictureModal() {
  $("#changepictureModal").modal("show");
}

async function changePicture() {
  var formData = new FormData();
  formData.append("file", $("#profile-picture")[0].files[0]);

  $.ajax({
    url: controllerapi + "/Perfil/Foto/Atualizar",
    type: "POST",
    dataType: 'json',
    data: formData,
    processData: false, // tell jQuery not to process the data
    contentType: false, // tell jQuery not to set contentType
    success: async (response) => {
        createNotification(response.title,response.message,response.id);
        if(response.code){
           location.reload();
        }
    },
  });
}
