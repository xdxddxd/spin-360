<link rel="stylesheet" href="<?php echo URL_BASE; ?>/assets/themes/css/CadProd.css">
<script src="<?php echo URL_BASE; ?>/assets/themes/js/CadProd.js"></script>
<div class="CadProd">
    <!-- Main Content -->
    <div id="content">


        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Cadastrar Produto</h1>
                <!--a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a-->
            </div>

            <div class="row">

                <div class="col-md-12">

                    <form enctype="multipart/form-data" class="user" method="post" onsubmit="cadProduto(); return false;" action="#">

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="nome">Nome</label>
                                <input type="text" class="form-control form-control-user" name="nome-prd" id="nome-prd" required placeholder="Nome do produto . . .">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="valor">Preço</label>
                                <input type="text" name="valor" required class="form-control form-control-user" id="valor" maxlength="33" onkeydown="moeda(this)" onkeypress="moeda(this)" onkeyup="moeda(this)" onchange="moeda(this)" placeholder="Valor do produto . . .">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="qtd">qtd</label>
                                <input type="text" name="quantidade" required class="form-control form-control-user" id="qtd" onkeypress="mascara(this, soNumeros)" placeholder="Quantidade em estoque . . .">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="category">Categoria</label>
                                <select id="category" name="category" class="form-control" onchange="UnlockSelects(this)" style="border-radius: 10rem;" required>
                                    <option value='' selected>Escolha um ...</option>
                                    <option value="1">Tabacaria</option>
                                    <option value="2">Adega</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="subcategory">Sub Categoria</label>
                                <select id="subcategory" name="subcategory" class="form-control" style="border-radius: 10rem;" required disabled>
                                    <option value='' selected>Escolha um ...</option>
                                    <option value="1">Lanche</option>
                                    <option value="2">Porção</option>
                                    <option value="3">Bebida</option>
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="marca">Marca</label>
                                <select id="marca" name="marca" class="form-control" style="border-radius: 10rem;" required disabled>
                                    <option value='' selected>Escolha um ...</option>
                                    <option value="1">Lanche</option>
                                    <option value="2">Porção</option>
                                    <option value="3">Bebida</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    </form>

                </div>

            </div>

        </div>

    </div>

</div>