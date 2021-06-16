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
                                for ($i=0; $i < $pics->count(); $i++) { 
                                    echo $i;
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