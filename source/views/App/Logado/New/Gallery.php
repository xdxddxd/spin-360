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
                        <div id="uploaded-files"></div>
                        <!-- <div class="upload-area">
                            Solte o Arquivo Aqui
                        </div> -->
                    </fieldset>

                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <form onsubmit="return false;" enctype="multipart/form-data">
                        <label for="files" class="btn btn-success btn-block"><i class="fas fa-camera"></i> Adicionar Foto</label>
                        <input type="file" id="files" style="display: none;" multiple>
                    </form>
                </div>
            </div>

        </div>

    </div>

</div>