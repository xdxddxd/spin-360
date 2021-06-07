<link rel="stylesheet" href="<?php echo URL_BASE; ?>/assets/themes/css/Home.css">
<script src="<?php echo URL_BASE; ?>/assets/themes/js/Home.js"></script>
<div class="Home">

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

  <!-- Main Content -->
  <div id="content">


    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Spin 360</h1>
        <!--a href="<?php echo URL_BASE; ?>/" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a-->
      </div>

      <div class="row">

        <div class="col-md-12">

          <p>
            Faça seu Cadastro/Login e Utilize da nossa Biblioteca.
          </p>

        </div>

      </div>

    </div>

  </div>

</div>