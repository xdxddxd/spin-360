async function UnlockSelects(id) {
  let idCategory = id.value;
  await $.ajax({
    url: controllerapi + "/Sub/Categoria/Consulta",
    type: "post",
    dataType: "json",
    data: {
      id: idCategory,
    },
    success: async (response) => {
      let arr = Object.values(response);
      let options;
      for (i = 0; i < arr.length; i++) {
        options +=
          '<option value="' + arr[i].id + '">' + arr[i].nome + "</option>";
      }
      $("#subcategory").html(
        "<option value='' selected>Escolha um ...</option>" + options
      );
      $("#subcategory").prop("disabled", false);
    },
  });

  await $.ajax({
    url: controllerapi + "/Marca/Consulta",
    type: "post",
    dataType: "json",
    data: {
      id: idCategory,
    },
    success: async (response) => {
      let arr = Object.values(response);
      let options;
      for (i = 0; i < arr.length; i++) {
        options +=
          '<option value="' + arr[i].id + '">' + arr[i].nome + "</option>";
      }
      $("#marca").html(
        "<option value='' selected>Escolha um ...</option>" + options
      );
      $("#marca").prop("disabled", false);
    },
  });
}

async function cadProduto() {
  let nome = $("#nome-prd"),
    valor = $("#valor"),
    qtd = $("#qtd"),
    marca = $("#marca option:selected"),
    subcategoria = $("#subcategory option:selected");

  $.ajax({
    url: controllerapi + "/Produto/Cadastro",
    type: "post",
    dataType: "json",
    data: {
      nome: nome.val(),
      valor: valor.val(),
      qtd: qtd.val(),
      marca: marca.val(),
      subcategoria: subcategoria.val(),
    },
    success: async (response) => {
      createNotification(response.title, response.message, response.id);
      if (response.code) {
        location.reload();
      }
    },
  });
}
