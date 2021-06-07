<link rel="stylesheet" href="<?php echo URL_BASE; ?>/assets/themes/css/Perfil.css">
<script src="<?php echo URL_BASE; ?>/assets/themes/js/Perfil.js"></script>
<div class="Perfil">
    <!-- Main Content -->
    <div id="content">


        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Perfil</h1>
                <!--a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a-->
            </div>

            <div class="row">

                <div class="col-md-12">

                    <div class="row">
                        <div class="col-md-3">

                            <?php if ($_SESSION['ADMIN']['USER']['ACCESS_LEVEL']['ID'] == 1) { ?>
                                <div class="change-profile-picture" onmouseover="ShowEdit()" onmouseout="HideEdit()" onclick="ChangePictureModal()">
                                    <div id="change-label" class="hide">
                                        <p>Mudar Foto <i class="fas fa-pencil-alt"></i></p>
                                    </div>
                                    <i class="fas fa-pencil-alt"></i>
                                    <img class="profile-picture" src="<?php echo $_SESSION['ADMIN']['USER']['EMPRESA']['URL_IMG']; ?>" alt="Foto da Empresa" style="max-width: 100%;">
                                </div>
                            <?php } else { ?>
                                <img class="profile-picture" src="<?php echo $_SESSION['ADMIN']['USER']['EMPRESA']['URL_IMG']; ?>" alt="Foto da Empresa" style="max-width: 100%;">
                            <?php } ?>
                        </div>
                        <div class="col-md-9">
                            <h1><?php echo $_SESSION['ADMIN']['USER']['EMPRESA']['RAZAO_SOCIAL'] . '/' . $_SESSION['ADMIN']['USER']['NOME'] ?></h1>
                            <h6>Email: <?php echo $_SESSION['ADMIN']['USER']['EMAIL'] ?></h6>
                            <h6>Função: <?php echo $_SESSION['ADMIN']['USER']['ACCESS_LEVEL']['TITLE'] ?></h6>
                            <br>
                            <br>
                            <button class="btn btn-warning">Mudar Senha</button>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- change picture Modal-->
    <div class="modal fade" id="changepictureModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-pencil-alt"></i> Aletere a Foto da Empresa ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        Selecione a foto e clique em enviar.
                    </p>
                    <form class="user" action="#" onsubmit="changePicture(); return false;" enctype="multipart/form-data">
                        <input type="file" class="" id="profile-picture">
                        <br>
                        <button class="btn btn-success btn-user btn-block" type="submit" id="inputGroupFileAddon04">Enviar</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-danger" type="button" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

</div>