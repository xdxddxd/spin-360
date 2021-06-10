var controllerapi = "https://localhost/spin-360/WS",
  logo = "https://localhost/spin-360/assets/Icons/favicon.png";

async function createNotification(title, message, id) {
  if (document.getElementById(id)) {
    $("#" + id).remove();
  }

  if (!document.getElementById(id)) {
    let date = new Date();

    var toast =
      '<div style="z-index: 9999;" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000" id="' +
      id +
      '" class="toast fade show wow bounceInRight">' +
      '<div class="toast-header">' +
      '<img src="' + logo + '" class="rounded mr-2" alt="Car View">' +
      '<strong class="mr-auto">' +
      title +
      "</strong>" +
      "<small> Agora </small>" +
      '<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">' +
      '<span aria-hidden="true">&times;</span>' +
      "</button>" +
      "</div>" +
      '<div class="toast-body">' +
      message +
      "</div>" +
      "</div>";

    $("#notification").append(`${toast}`);
  }

  $(`#${id}`).toast("show");
}

function logout() {
  $.ajax({
    url: controllerapi + "/Session/Logout",
    type: "post",
    dataType: "json",
    success: async (response) => {
      createNotification(response.title, response.message, response.id);
      if (response.code) {
        location.reload();
      }
    },
  });
}

async function goTo(page) {
  $.ajax({
    type: "post",
    url: "src/pages/" + page + ".php",
    success: async (response) => {
      $(".page").html(response);
      $("title").html(page);
    },
    error: () => {
      $.ajax({
        type: "post",
        url: "src/pages/static/erro.php",
        success: async (response) => {
          $(".page").html(response);
          $("title").html("Erro 404");
        },
      });
    },
  });
}

function moeda(z) {
  v = z.value;
  v = v.replace(/\D/g, ""); // permite digitar apenas numero
  v = v.replace(/(\d{1})(\d{20})$/, "$1.$2"); // coloca ponto antes dos ultimos 20 digitos
  v = v.replace(/(\d{1})(\d{17})$/, "$1.$2"); // coloca ponto antes dos ultimos 17 digitos
  v = v.replace(/(\d{1})(\d{14})$/, "$1.$2"); // coloca ponto antes dos ultimos 14 digitos
  v = v.replace(/(\d{1})(\d{11})$/, "$1.$2"); // coloca ponto antes dos ultimos 11 digitos
  v = v.replace(/(\d{1})(\d{8})$/, "$1.$2"); // coloca ponto antes dos ultimos 8 digitos
  v = v.replace(/(\d{1})(\d{5})$/, "$1.$2"); // coloca ponto antes dos ultimos 5 digitos
  v = v.replace(/(\d{1})(\d{2})$/, "$1,$2"); // coloca virgula antes dos ultimos 2 digitos
  if (v) {
    z.value = "R$ " + v;
  } else {
    z.value = "";
  }
}

/* Mask's */
function numberToReal(numero) {
  var numero = numero.replace("R$ ", "");
  numero - numero.replace(",", ".");
  numero = parseFloat(numero).toFixed(2).split(".");
  numero[0] = "R$ " + numero[0].split(/(?=(?:...)*$)/).join(".");
  return numero.join(",");
}

function mascara(o, f) {
  v_obj = o;
  v_fun = f;
  setTimeout("execmascara()", 1);
}
function execmascara() {
  v_obj.value = v_fun(v_obj.value);
}
function leech(v) {
  v = v.replace(/o/gi, "0");
  v = v.replace(/i/gi, "1");
  v = v.replace(/z/gi, "2");
  v = v.replace(/e/gi, "3");
  v = v.replace(/a/gi, "4");
  v = v.replace(/s/gi, "5");
  v = v.replace(/t/gi, "7");
  return v;
}
function soNumeros(v) {
  return v.replace(/\D/g, "");
}
function celular(v) {
  v = v.replace(/\D/g, ""); //Remove tudo o que não é dígito
  v = v.replace(/^(\d\d)(\d)/g, "($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
  v = v.replace(/(\d{5})(\d)/, "$1-$2"); //Coloca hífen entre o quinto e o sexto dígito
  return v;
}
function cpf(v) {
  v = v.replace(/\D/g, ""); //Remove tudo o que não é dígito
  v = v.replace(/(\d{3})(\d)/, "$1.$2"); //Coloca um ponto entre o terceiro e o quarto dígitos
  v = v.replace(/(\d{3})(\d)/, "$1.$2"); //Coloca um ponto entre o terceiro e o quarto dígitos
  //de novo (para o segundo bloco de números)
  v = v.replace(/(\d{3})(\d{1,2})$/, "$1-$2"); //Coloca um hífen entre o terceiro e o quarto dígitos
  return v;
}
function telefone(v) {
  v = v.replace(/\D/g, ""); //Remove tudo o que não é dígito
  v = v.replace(/^(\d\d)(\d)/g, "($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
  v = v.replace(/(\d{4})(\d)/, "$1-$2"); //Coloca hífen entre o quarto e o quinto dígitos
  return v;
}
function cnpj(v) {
  v = v.replace(/\D/g, ""); //Remove tudo o que não é dígito
  v = v.replace(/(\d{2})(\d)/, "$1.$2"); //Coloca um ponto entre o segundo e o terceiro dígito
  v = v.replace(/(\d{3})(\d)/, "$1.$2"); //Coloca um ponto entre o quinto e o sexto dígitos
  v = v.replace(/(\d{3})(\d)/, "$1/$2"); //Coloca uma barra entre o oitavo e o nono dígitos
  //de novo (para o segundo bloco de números)
  v = v.replace(/(\d{4})(\d{1,2})$/, "$1-$2"); //Coloca um hífen entre o terceiro e o quarto dígitos
  return v;
}
function mdata(v) {
  v = v.replace(/\D/g, "");
  v = v.replace(/(\d{2})(\d)/, "$1/$2");
  v = v.replace(/(\d{2})(\d)/, "$1/$2");

  v = v.replace(/(\d{2})(\d{2})$/, "$1$2");
  return v;
}
function mcc(v) {
  v = v.replace(/\D/g, "");
  v = v.replace(/^(\d{4})(\d)/g, "$1 $2");
  v = v.replace(/^(\d{4})\s(\d{4})(\d)/g, "$1 $2 $3");
  v = v.replace(/^(\d{4})\s(\d{4})\s(\d{4})(\d)/g, "$1 $2 $3 $4");
  return v;
}

setTimeout(() => {
  $("#sidebarToggle").click();
}, 1000);
