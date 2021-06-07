<link rel="stylesheet" href="<?php echo URL_BASE; ?>/assets/themes/css/Login.css">
<script src="<?php echo URL_BASE; ?>/assets/themes/js/Login.js"></script>
<div class="Login">

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
                                <center style="width: 90%;margin-left:10%;margin-top:10%;margin-bottom:10%;">
                                    <h3>
                                        Nunca foi tão fácil se organizar.
                                    </h3>
                                </center>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login!</h1>
                                    </div>
                                    <form class="user" onsubmit="Login(); return false;">
                                        <div class="form-group">
                                        <label for="logemail">Email:</label>
                                            <input type="email" class="form-control form-control-user" id="logemail" aria-describedby="emailHelp" placeholder="Insira o endereço de email..." required>
                                        </div>
                                        <div class="form-group">
                                        <label for="logsenha">Senha:</label>
                                            <input type="password" class="form-control form-control-user" id="logsenha" placeholder="Insira sua senha..." required>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck" checked>
                                                <label class="custom-control-label" for="customCheck">Manter-me conectado</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success btn-user btn-block"><i class="fas fa-lock"></i> Fazer Login</button>
                                        <hr>
                                        <a href="<?php echo URL_BASE; ?>/Cadastro" class="btn btn-warning btn-user btn-block">
                                            <i class="fas fa-users fa-fw"></i> Cadastre-Se
                                        </a>
                                    </form>
                                    <hr>
                                    <center>
                                        <a href="#" data-toggle="modal" data-target="#forgotpasswordModal">Esqueceu sua senha ?</a>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>

<!-- forgot password Modal-->
<div class="modal fade" id="forgotpasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-lock"></i> Esqueceu sua senha ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Enviaremos um código para o email inserido abaixo, confirme-o e altere sua senha.
                </p>
                <form action="#" onsubmit="forgotPassword(); return false;">
                    <div class="form-group">
                        <input type="email" class="form-control form-control-user" id="forgotpasswordemail" aria-describedby="emailHelp" placeholder="Insira o endereço de email..." autocomplete="email">
                    </div>
                    <button type="submit" class="btn btn-success btn-user btn-block"><i class="fas fa-lock"></i> Solicitar Código</button>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-danger" type="button" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>