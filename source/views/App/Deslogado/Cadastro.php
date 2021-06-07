<link rel="stylesheet" href="<?php echo URL_BASE; ?>/assets/themes/css/registerNewSystemUser.css">
<script src="<?php echo URL_BASE; ?>/assets/themes/js/registerNewSystemUser.js"></script>
<div class="registerNewSystemUser">

<nav class="navbar navbar-expand-lg navbar-light bg-gradient-light">
    <a class="navbar-brand" href="<?php echo URL_BASE; ?>/Home">Spin 360</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo URL_BASE; ?>/Home">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="<?php echo URL_BASE; ?>/" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Produtos
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?php echo URL_BASE; ?>/">Action</a>
            <a class="dropdown-item" href="<?php echo URL_BASE; ?>/">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo URL_BASE; ?>/">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="<?php echo URL_BASE; ?>/" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Preços
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?php echo URL_BASE; ?>/">P 1</a>
            <a class="dropdown-item" href="<?php echo URL_BASE; ?>/">P 2</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo URL_BASE; ?>/">Pro Version</a>
          </div>
        </li>
      </ul>

      <?php if (isset($_SESSION['ADMIN']['USER'])) { ?>
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="<?php echo URL_BASE; ?>/" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user"></i> <?php echo($_SESSION['ADMIN']['USER']['NOME']) ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?php echo URL_BASE; ?>/Dashboard">Dashboard</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item bg-danger text-white" onclick="logout()">Logout</a>
            </div>
          </li>
        </ul>
      <?php } else { ?>
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="<?php echo URL_BASE; ?>/" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Fazer Cadastro/Login
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?php echo URL_BASE; ?>/Login">Login</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?php echo URL_BASE; ?>/Cadastro">Cadastro</a>
            </div>
          </li>
        </ul>
      <?php } ?>

    </div>
  </nav>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block">
                                <img src="<?php echo URL_BASE; ?>/assets/img/logo.png" alt="Logo" style="width: 90%;margin-left:10%;margin-top:10%;margin-bottom:10%;" />
                                <center style="width: 90%;margin-left:10%;margin-top:20%;margin-bottom:20%;">
                                    <h3>
                                        .
                                    </h3>
                                </center>
                                <center style="width: 90%;margin-left:10%;margin-top:20%;margin-bottom:20%;">
                                    <h3>
                                        .
                                    </h3>
                                </center>
                                <center style="width: 90%;margin-left:10%;margin-top:20%;margin-bottom:20%;">
                                    <h3>
                                        .
                                    </h3>
                                </center>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Cadastro!</h1>
                                    </div>
                                    <form class="user" onsubmit="registerNewSystemUser(); return false;">
                                        <div class="form-group">
                                            <label for="cadrs">Razão Social:<strong>*</strong></label>
                                            <input type="text" class="form-control form-control-user" id="cadrs" aria-describedby="nameHelp" placeholder="Insira a Razão Social..." required>
                                        </div>
                                        <div class="form-group">
                                            <label for="cadadm">Nome do Responsavel:<strong>*</strong></label>
                                            <input type="text" class="form-control form-control-user" id="cadadm" aria-describedby="admHelp" placeholder="Insira o nome do administrador..." required>
                                        </div>
                                        <div class="form-group">
                                            <label for="cadcnpj">CNPJ:<strong>*</strong></label>
                                            <input type="text" class="form-control form-control-user" id="cadcnpj" aria-describedby="cnpjHelp" onkeydown="mascara(this,cnpj)" placeholder="Insira o CNPJ..." maxlength="18" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="cadcel">Celular:<strong>*</strong></label>
                                            <input type="text" class="form-control form-control-user" id="cadcel" aria-describedby="cnpjHelp" onkeydown="mascara(this,celular)" placeholder="Insira o Celular para contato..." maxlength="15" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="cep">CEP:<strong>*</strong></label>
                                            <input type="text" class="form-control form-control-user" onkeypress="mascara(this, soNumeros)" maxlength="8" id="cep" placeholder="00000-000">

                                            <!-- Campo Obrigatório Não Retirar -->
                                            <input type="text" class="form-control form-control-user" id="ibge" style="display: none;">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-8">
                                                <label for="rua">Rua:<strong>*</strong></label>
                                                <input type="text" class="form-control form-control-user" id="rua" placeholder="Rua Tal" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="rua">NRº:<strong>*</strong></label>
                                                <input type="text" class="form-control form-control-user" id="nr" placeholder="000" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="cademail">Complemento:</label>
                                            <input type="texr" class="form-control form-control-user" id="cadcomplemento" placeholder="Insira o complemento . . .">
                                        </div>
                                        <div class="form-group">
                                            <label for="bairro">Bairro:<strong>*</strong></label>
                                            <input type="text" class="form-control form-control-user" id="bairro" placeholder="Vila Tal" required>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-8">
                                                <label for="cidade">Cidade:<strong>*</strong></label>
                                                <input type="text" class="form-control form-control-user" id="cidade" placeholder="São Paulo" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="uf">UF:<strong>*</strong></label>
                                                <input type="text" class="form-control form-control-user" id="uf" placeholder="SP" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="cademail">Email:<strong>*</strong></label>
                                            <input type="email" class="form-control form-control-user" id="cademail" aria-describedby="emailHelp" placeholder="Insira o Endereço de Email..." required>
                                        </div>
                                        <div class="form-group">
                                            <label for="cadsenha">Senha:<strong>*</strong></label>
                                            <input type="password" class="form-control form-control-user" id="cadsenha" placeholder="Senha" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="cadconsenha">Confirme sua Senha:<strong>*</strong></label>
                                            <input type="password" class="form-control form-control-user" id="cadconsenha" placeholder="Confirme sua Senha" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="checkuseterm" required>
                                                <label class="custom-control-label" for="checkuseterm">Eu concordo com os <a href="javascript::" onclick="$('#useterm').modal('show');">Termos de Uso</a>.<strong>*</strong></label>
                                            </div>
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="checkmails">
                                                <label class="custom-control-label" for="checkmails">Eu concordo em receber correios eletronicos sobre promoções e atualizações deste site.</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success btn-user btn-block"><i class="fas fa-users"></i> Cadastrar</button>
                                        <hr>
                                        <a href="<?php echo URL_BASE; ?>/Login" class="btn btn-warning btn-user btn-block">
                                            <i class="fas fa-lock fa-fw"></i> Já tenho Login
                                        </a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>

<!-- Modal Confirmar Limpeza -->
<div class="modal fade" id="useterm" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">
                    <i class="fas fa-users"></i>
                    &nbsp;
                    Termos de Uso
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <p>
                        Ao concordar com os Termos de Uso do site, você estara concordando com:
                    </p>
                    <ul>
                        <li>Participar do Beta Fechado da aplicação.</li>
                        <li>No caso da aplicação ser finalizada a sua conta poderá ser encerrada caso não deseje adiquirir um plano mensal.</li>
                        <li>Aceitará em ceder os dados do fomulário de cadastro para que ele seja guardado em segurança na nossa base de dados sob a nova lei de segurança digital.</li>
                        <li>Aceitará receber pelo menos uma ligação mensal durante horario comercial para responder um questionário sobre as funcionalidades do site em questão.</li>
                        <li>Aceitará em não compartilhar os seus dados de login com qualquer pessoa.</li>
                        <li>Aceitará que por erro de sua parte (por parte do usuário) a empresa não se responsabilizará com os danos causados ou com dados vazados.</li>
                        <li>Durante o periodo de desenvolvimento do site, pode occorer que ele ficará sem conexão ou que alguns ou todos os dados podem ser perdidos.</li>
                        <li>A empresa não tem reponsabilidade pelos atos dos funcionários que o usuário cadastrará.</li>
                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <i class="fas fa-ban"></i>
                    Fechar Termos
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    var password = document.getElementById("cadsenha"),
        confirm_password = document.getElementById("cadconsenha");

    function validatePassword() {
        if (password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Senha Não Confere");
        } else {
            confirm_password.setCustomValidity('');
        }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
</script>