$(document).ready(function () {
    function limpa_formulário_cep() {
      // Limpa valores do formulário de cep.
      $("#rua").val("");
      $("#bairro").val("");
      $("#cidade").val("");
      $("#uf").val("");
      $("#ibge").val("");
    }
  
    function bloquear_preenchidos() {
      if ($("#rua").val() != "") {
        $("#rua").prop("disabled", true);
      } else {
        $("#rua").prop("disabled", false);
      }
      if ($("#bairro").val() != "") {
        $("#bairro").prop("disabled", true);
      } else {
        $("#bairro").prop("disabled", false);
      }
      if ($("#cidade").val() != "") {
        $("#cidade").prop("disabled", true);
      } else {
        $("#cidade").prop("disabled", false);
      }
      if ($("#uf").val() != "") {
        $("#uf").prop("disabled", true);
      } else {
        $("#uf").prop("disabled", false);
      }
    }
  
    //Quando o campo cep perde o foco.
    $("#cep").blur(function () {
      //Nova variável "cep" somente com dígitos.
      var cep = $(this).val().replace(/\D/g, "");
  
      //Verifica se campo cep possui valor informado.
      if (cep != "") {
        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;
  
        //Valida o formato do CEP.
        if (validacep.test(cep)) {
          //Preenche os campos com "Procurando . . ." enquanto consulta webservice.
          $("#rua").val("Procurando . . .");
          $("#bairro").val("Procurando . . .");
          $("#cidade").val("Procurando . . .");
          $("#uf").val("Procurando . . .");
          $("#ibge").val("Procurando . . .");
  
          //Consulta o webservice viacep.com.br/
          $.getJSON(
            "https://viacep.com.br/ws/" + cep + "/json/?callback=?",
            function (dados) {
              if (!("erro" in dados)) {
                //Atualiza os campos com os valores da consulta.
                $("#rua").val(dados.logradouro);
                $("#bairro").val(dados.bairro);
                $("#cidade").val(dados.localidade);
                $("#uf").val(dados.uf);
                $("#ibge").val(dados.ibge);
                bloquear_preenchidos();
              } //end if.
              else {
                //CEP pesquisado não foi encontrado.
                limpa_formulário_cep();
                alert("CEP não encontrado.");
              }
            }
          );
        } //end if.
        else {
          //cep é inválido.
          limpa_formulário_cep();
          alert("Formato de CEP inválido.");
        }
      } //end if.
      else {
        //cep sem valor, limpa formulário.
        limpa_formulário_cep();
      }
    });
  });
  
async function Cadastrar(){
    let name = $('#cadname'),
        celular = $('#cadcel'),
        email = $('#cademail'),
        cep = $('#cep'),
        rua = $('#rua'),
        nr = $('#nr'),
        complemento = $('#cadcomplemento'),
        bairro = $('#bairro'),
        cidade = $('#cidade'),
        uf = $('#uf');

        $.ajax({
          url: controllerapi + '/Cliente/Cadastro',
          dataType: 'json',
          type: 'post',
          data: {
            nome: name.val(),
            celular: celular.val(),
            email: email.val(),
            cep: cep.val(),
            rua: rua.val(),
            nr: nr.val(),
            complemento: complemento.val(),
            bairro: bairro.val(),
            cidade: cidade.val(),
            uf: uf.val()
          },
          success: async (response)=> {
            createNotification(response.title,response.message,response.id);
          }
        });


}