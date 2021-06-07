<link rel="stylesheet" href="<?php echo URL_BASE; ?>/assets/themes/css/CadCliente.css">
<script src="<?php echo URL_BASE; ?>/assets/themes/js/CadCliente.js"></script>
<div class="CadCliente">
    <!-- Main Content -->
    <div id="content">


        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Cadastro de Clientes</h1>
                <!--a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a-->
            </div>

            <div class="row">

                <div class="col-md-12">

                    <div class="row">

                        <div class="col-md-12">

                            <form class="user" onsubmit="Cadastrar(); return false;">
                                <div class="form-group">
                                    <label for="cadadm">Nome do Cliente:<strong>*</strong></label>
                                    <input type="text" class="form-control form-control-user" id="cadname" aria-describedby="admHelp" placeholder="Insira o nome e sobrenome do cliente..." required>
                                </div>
                                <div class="form-group">
                                    <label for="cadcel">Celular:<strong>*</strong></label>
                                    <input type="text" class="form-control form-control-user" id="cadcel" onkeydown="mascara(this,celular)" placeholder="Insira o Celular para contato..." maxlength="15" required>
                                </div>
                                <div class="form-group">
                                    <label for="cadcel">Email:</label>
                                    <input type="email" class="form-control form-control-user" id="cademail" placeholder="Insira o Email para contato..." required>
                                </div>
                                <div class="form-group">
                                            <label for="cep">CEP:<strong>*</strong></label>
                                            <input type="text" class="form-control form-control-user" onkeypress="mascara(this, soNumeros)" maxlength="8" id="cep" placeholder="00000-000">

                                            <!-- Campo Obrigatório Não Retirar -->
                                            <input type="text" class="form-control form-control-user" id="ibge" style="display: none;">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-8">
                                                <label for="rua">Rua:<strong>*</strong></label>
                                                <input type="text" class="form-control form-control-user" id="rua" placeholder="Rua Tal" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="rua">NRº:<strong>*</strong></label>
                                                <input type="text" class="form-control form-control-user" id="nr" placeholder="000" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="cademail">Complemento:</label>
                                            <input type="texr" class="form-control form-control-user" id="cadcomplemento" placeholder="Insira o complemento . . .">
                                        </div>
                                        <div class="form-group">
                                            <label for="bairro">Bairro:<strong>*</strong></label>
                                            <input type="text" class="form-control form-control-user" id="bairro" placeholder="Vila Tal" required>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-8">
                                                <label for="cidade">Cidade:<strong>*</strong></label>
                                                <input type="text" class="form-control form-control-user" id="cidade" placeholder="São Paulo" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="uf">UF:<strong>*</strong></label>
                                                <input type="text" class="form-control form-control-user" id="uf" placeholder="SP" required>
                                            </div>
                                        </div>
                                <button type="submit" class="btn btn-success btn-user btn-block"><i class="fas fa-users"></i> Cadastrar</button>
                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>