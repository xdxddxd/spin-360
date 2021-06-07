<link rel="stylesheet" href="<?php echo URL_BASE; ?>/assets/themes/css/CadUser.css">
<script src="<?php echo URL_BASE; ?>/assets/themes/js/CadUser.js"></script>
<div class="CadUser">
    <!-- Main Content -->
    <div id="content">


        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Cadastro de Usuário</h1>
                <!--a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a-->
            </div>

            <div class="row">

                <div class="col-md-12">

                <form class="user" onsubmit="CadNewUser(); return false;">
                                        <div class="form-group">
                                            <label for="cadadm">Nome do Usuário:<strong>*</strong></label>
                                            <input type="text" class="form-control form-control-user" id="cadname" aria-describedby="admHelp" placeholder="Insira o nome e sobrenome do usuário..." required>
                                        </div>
                                        <div class="form-group">
                                            <label for="cadcel">Celular:<strong>*</strong></label>
                                            <input type="text" class="form-control form-control-user" id="cadcel" aria-describedby="cnpjHelp" onkeydown="mascara(this,celular)" placeholder="Insira o Celular para contato..." maxlength="15" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="cademail">Email:<strong>*</strong></label>
                                            <input type="email" class="form-control form-control-user" id="cademail" aria-describedby="emailHelp" placeholder="Insira o Endereço de Email..." required>
                                        </div>
                                        <div class="form-group">
                                            <label for="cadposition">Posição:<strong>*</strong></label>
                                            <select class="form-control" id="cadposition" style="border-radius: 10rem;" onchange="getPositionInfo(this)" required>
                                                <option value="" selected>Selecione uma Posição para seu funcionário . . .</option>
                                                <option value="2">Gerente</option>
                                                <option value="3">Sub Gerente</option>
                                                <option value="4">Vendedor</option>
                                                <option value="5">Motoboy</option>
                                            </select>
                                            <div id="position-info"></div>
                                        </div>
                                        <div class="form-group" id="passRandom">
                                            <label for="cadsenha">Senha:<strong>*</strong></label>
                                            <input type="text" class="form-control form-control-user" id="cadsenha" placeholder="Senha" value="<?php echo uniqid();?>" required readonly>
                                            <small><strong>lembre-se de passar esta senha para que o usuário possa fazer o primeiro login, lembrando que ele pode troca-la a qualquer momento na tela de perfil.</strong></small>
                                        </div>
                                        <div id="sendtouser"></div>
                                        <button type="submit" class="btn btn-success btn-user btn-block"><i class="fas fa-users"></i> Cadastrar</button>
                                    </form>

                </div>

            </div>

        </div>

    </div>

</div>