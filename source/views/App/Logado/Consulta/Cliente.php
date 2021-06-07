<link rel="stylesheet" href="<?php echo URL_BASE; ?>/assets/themes/css/ConCliente.css">
<script src="<?php echo URL_BASE; ?>/assets/themes/js/ConCliente.js"></script>

<script src="<?php echo URL_BASE; ?>/assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo URL_BASE; ?>/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<div class="ConCliente">
    <!-- Main Content -->
    <div id="content">


        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Consultar Clientes</h1>
                <button onclick="UpdateTable()" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-sync-alt fa-sm text-white-50"></i> Atualizar Tabela</button>
            </div>

            <div class="row">

                <div class="col-md-12">

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                Cliente
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nome</th>
                                            <th>Celular</th>
                                            <th>Email</th>
                                            <th>Cep</th>
                                            <th>Rua</th>
                                            <th>Complemento</th>
                                            <th>Nr</th>
                                            <th>Bairro</th>
                                            <th>Cidade</th>
                                            <th>UF</th>
                                            <th>Pedidos</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Nome</th>
                                            <th>Celular</th>
                                            <th>Email</th>
                                            <th>Cep</th>
                                            <th>Rua</th>
                                            <th>Complemento</th>
                                            <th>Nr</th>
                                            <th>Bairro</th>
                                            <th>Cidade</th>
                                            <th>UF</th>
                                            <th>Pedidos</th>
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