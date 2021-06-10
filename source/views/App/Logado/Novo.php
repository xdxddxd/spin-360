<link rel="stylesheet" href="<?php echo URL_BASE; ?>/assets/themes/css/Novo.css">
<script src="<?php echo URL_BASE; ?>/assets/themes/js/Novo.js"></script>
<div class="Novo">
    <!-- Main Content -->
    <div id="content">


        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Novo</h1>
                <h6 class="h6 mb-0 text-gray-800">Obrigatório informar no mínimo uma das três opções: Placa, Renavam ou Chassi.</h6>
                <!--a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a-->
            </div>

            <div class="row">

                <div class="col-md-12">

                    <form onsubmit="create(); return false;">

                        <div class="row">

                            <div class="form-group col-md-2">
                                <label for="placa">Placa</label>
                                <input type="text" class="form-control form-control-user" id="placa" placeholder="ABC1234" maxlength="7">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="renavam">Renavam</label>
                                <input type="text" class="form-control form-control-user" id="renavam" placeholder="98215885784" maxlength="11">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="chassi">Chassi</label>
                                <input type="text" class="form-control form-control-user" id="chassi" placeholder="9BW ZZZ377 VT 004251" maxlength="21">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="modo">Modo</label>
                                <select class="form-control form-control-user" id="modo" required>
                                    <option value="">Selecione Uma Opção</option>
                                    <option value="captura">Captura</option>
                                    <option value="galeria">Galeria</option>
                                </select>
                            </div>

                        </div>

                        <div class="row">

                            <div class="form-group col-md-12">
                                <label for="confirmar">Confirme os dados</label>
                                <button class="btn btn-success btn-block" id="confirmar" type="submit">
                                    <i class="fas fa-check-circle"></i>
                                    Salvar
                                </button>
                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>