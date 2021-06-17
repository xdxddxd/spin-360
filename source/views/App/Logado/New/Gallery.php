<link rel="stylesheet" href="<?php echo URL_BASE; ?>/assets/themes/css/Gallery.css">
<script src="<?php echo URL_BASE; ?>/assets/themes/js/Gallery.js"></script>
<div class="Gallery">
    <!-- Main Content -->
    <div id="content">


        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Nova Galeria</h1>
                <!--a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a-->
            </div>

            <div class="row">

                <div class="col-md-12">

                    <fieldset class="row" id="nav-gallery">
                        <legend>Galeria</legend>
                        <div id="uploaded-files">
                            <?php
                            foreach ($_SESSION['pics'] as $pic) {
                                echo '<img src="' . $pic->url . '" class="uploaded-image" alt="Uploaded Image" onclick="alterImage(' . $pic->id . ')">';
                            }
                            ?>
                        </div>
                        <label for="files" class="upload-area">
                            <div>
                                <i class="fas fa-camera"></i>
                            </div>
                            <div>
                                Clique ou Solte o Arquivo Aqui
                            </div>
                        </label>
                        <input type="file" id="files" style="display: none;" multiple>
                        <input type="text" id="id-prd" value="<?php echo $data['id'] ?>" disabled style="display: none;">
                    </fieldset>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="alterImageForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Atualizar Dados da Imagem</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="text" id="idimg" disabled style="display: none;">
                <div class="form-group">
                    <label for="title">Titulo</label>
                    <input type="text" class="form-control" id="title" placeholder="Porta Malas">
                </div>
                <div class="form-group">
                    <label for="description">Descrição</label>
                    <textarea class="form-control" id="description" placeholder="Está em perfeito estado e ainda carrega muita bagagem . . ."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success" onclick="SaveNewInfo()">Salvar</button>
            </div>
        </div>
    </div>
</div>