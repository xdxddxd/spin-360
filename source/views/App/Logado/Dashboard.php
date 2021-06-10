<link rel="stylesheet" href="<?php echo URL_BASE ?>/assets/themes/css/Dashboard.css">
<script src="<?php echo URL_BASE ?>/assets/themes/js/Dashboard.js"></script>
<!-- Page level plugins -->
<script src="<?php echo URL_BASE ?>/assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo URL_BASE ?>/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<div class="Dashboard">
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">


            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    <!--a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a-->
                </div>

                <!-- Content Row -->
                <div class="row">

                    <!-- Capturas Realizadas -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Capturas Realizadas</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="capturas-realizadas"><small>Carregando . . .</small></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-check-circle fa-2x text-success"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Capturas Pendentes -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Capturas Pendentes</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="capturas-pendentes"><small>Carregando . . .</small></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-exclamation-circle fa-2x text-warning"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Créditos Disponiveis -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Créditos Disponiveis</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="creditos-disponiveis"><small>Carregando . . .</small></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-dollar-sign fa-2x text-info"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Content Row -->

                <div class="row">

                    <!-- Area Chart -->
                    <div class="col-xl-8 col-lg-7">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Histórico</h6>
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                        <div class="dropdown-header">Filtrar Por:</div>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Completos</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Pendentes</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Rascunhos</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">

                                <div class="row">

                                    <div class="col-xl-4 col-md-6 mb-4">
                                        <div class="card border-left-success shadow h-100 py-2">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">ABC1234</div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">Ford Focus</div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fas fa-check-circle fa-2x text-success"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-md-6 mb-4">
                                        <div class="card border-left-success shadow h-100 py-2">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Ford Focus</div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">ABC1234</div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fas fa-check-circle fa-2x text-success"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Pie Chart -->
                    <div class="col-xl-4 col-lg-5">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Jogos Mais Rentaveis</h6>
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <!--div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                        <div class="dropdown-header">Dropdown Header:</div>
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div-->
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="chart-pie pt-4 pb-2">
                                    <canvas id="myPieChart"></canvas>
                                </div>
                                <div class="mt-4 text-center small">
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-primary"></i> League of Legends
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-success"></i> TeamFight Tatics
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-info"></i> Valorant
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--
                <div class="row">
                    -->
                <!-- Produtos Mais Vendidos -->
                <!--
                    <div class="col-xl-12 col-lg-7">
                        <div class="card shadow mb-4">
                            -->
                <!-- Card Header - Dropdown -->
                <!--
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Produtos Mais Vendidos</h6>
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    -->
                <!--div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                        <div class="dropdown-header">Dropdown Header:</div>
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div-->
                <!--
                                </div>
                            </div>
                            -->
                <!-- Card Body -->
                <!--
                            <div class="card-body">
                                <div class="chart-area">
                                    <canvas id="myBarChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                -->

                <!-- <div class="row"> -->

                <!-- Produtos Mais Vendidos -->

                <!-- <div class="col-xl-12 col-lg-7"> -->
                <!-- <div class="card shadow mb-4"> -->
                <!-- Card Header - Dropdown -->
                <!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between"> -->
                <!-- <h6 class="m-0 font-weight-bold text-primary">Pedidos Pendentes</h6> -->
                <!-- <div class="dropdown no-arrow"> -->
                <!-- <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> -->
                <!-- <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i> -->
                <!-- </a> -->
                <!--
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                                <div class="dropdown-header">Dropdown Header:</div>
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                            </div>
                                            -->
                <!-- </div> -->
                <!-- </div> -->
                <!-- Card Body -->
                <!-- <div class="card-body"> -->
                <!--  -->
                <!-- <div class="table-responsive"> -->
                <!-- <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> -->
                <!-- <thead> -->
                <!-- <tr> -->
                <!-- <th>ID</th> -->
                <!-- <th>Nome</th> -->
                <!-- <th>Email</th> -->
                <!-- <th>WhatsApp</th> -->
                <!-- <th>Discord</th> -->
                <!-- <th>Jogo</th> -->
                <!-- <th>Produto</th> -->
                <!-- <th>Valor</th> -->
                <!-- <th>Ações</th> -->
                <!-- </tr> -->
                <!-- </thead> -->
                <!-- <tfoot> -->
                <!-- <tr> -->
                <!-- <th>ID</th> -->
                <!-- <th>Nome</th> -->
                <!-- <th>Email</th> -->
                <!-- <th>WhatsApp</th> -->
                <!-- <th>Discord</th> -->
                <!-- <th>Jogo</th> -->
                <!-- <th>Produto</th> -->
                <!-- <th>Valor</th> -->
                <!-- <th>Ações</th> -->
                <!-- </tr> -->
                <!-- </tfoot> -->
                <!-- <tbody> -->
                <!--  -->
                <!-- </tbody> -->
                <!-- </table> -->
                <!-- </div> -->
                <!--  -->
                <!-- </div> -->
                <!-- </div> -->
                <!-- </div> -->

                <!-- </div> -->
                <!-- /.container-fluid -->

                <!-- </div> -->
                <!-- End of Main Content -->

                <!-- </div> -->
                <!-- Page level plugins -->
                <script src="<?php echo URL_BASE ?>/assets/vendor/chart.js/Chart.min.js"></script>

                <!-- Page level custom scripts -->
                <script src="<?php echo URL_BASE ?>/assets/js/data/chart-area.js"></script>
                <script src="<?php echo URL_BASE ?>/assets/js/data/chart-pie.js"></script>
                <!--script src="src/js/data/chart-bar.js"></script-->