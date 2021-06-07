<link rel="stylesheet" href="<?php echo URL_BASE; ?>/assets/themes/css/ConUser.css">
<script src="<?php echo URL_BASE; ?>/assets/themes/js/ConUser.js"></script>

<script src="<?php echo URL_BASE; ?>/assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo URL_BASE; ?>/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<div class="ConUser">
    <!-- Main Content -->
    <div id="content">


        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Consultar Usuários</h1>
                <button onclick="UpdateTable()" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-sync-alt fa-sm text-white-50"></i> Atualizar Tabela</button>
            </div>

            <div class="row">

                <div class="col-md-12">

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                Usuários
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Email</th>
                                            <th>Celular</th>
                                            <th>Posição</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Email</th>
                                            <th>Celular</th>
                                            <th>Posição</th>
                                            <th>Ações</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>