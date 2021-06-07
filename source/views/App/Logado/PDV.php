<link rel="stylesheet" href="<?php echo URL_BASE; ?>/assets/themes/css/PDV.css">
<script src="<?php echo URL_BASE; ?>/assets/themes/js/PDV.js"></script>

<script src="<?php echo URL_BASE; ?>/assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo URL_BASE; ?>/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<div class="PDV">
    <!-- Main Content -->
    <div id="content">


        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">PDV (Ponto de Venda)</h1>
                <div id="btn-ct">
                </div>
            </div>

            <div class="row">

                <div class="col-md-12">

                    <div id="pdv-screen">
                        <?php if (isset($_SESSION['ADMIN']['USER']['CAIXA']['OPEN']) && $_SESSION['ADMIN']['USER']['CAIXA']['OPEN']) { ?>

                            <form onsubmit="Add(); return false;">
                                <small>selecione uma opção da lista ou digite diretamente o id do produto.</small>
                                <div class="input-group mb-3">
                                    <input list="produtos" id="productItem" autocomplete="false" class="form-control" placeholder="Nome do Produto . . .">
                                    <div class="input-group-append">
                                        <button class="btn btn-success" type="submit" id="button-addon2">Adicionar</button>
                                    </div>

                                    <datalist id="produtos"></datalist>
                                </div>
                            </form>

                            <div id="cart-list">

                                <div class="col-md-12">

                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">
                                                Lista de Venda
                                            </h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Nome</th>
                                                            <th scope="col">Marca</th>
                                                            <th scope="col">Categoria</th>
                                                            <th scope="col">Quantidade</th>
                                                            <th scope="col">R$ Unitário</th>
                                                            <th scope="col">R$ Total</th>
                                                            <th scope="col">Remover</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th scope="col" colspan="5"></th>
                                                            <th scope="col">Total: </th>
                                                            <th scope="col" id="total-value-table">R$ 00,00</th>
                                                            <th scope="col"><button type="button" onclick="Finalizar('1')" id="final-btn" class="btn btn-outline-success">Finalizar</button></th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>


                        <?php } else { ?>
                            <center>
                                <h1 style="margin-top: 40vh;">
                                    Caixa Fechado
                                </h1>
                            </center>
                        <?php } ?>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- Abrir Caixa Modal-->
<div class="modal fade" id="OpenCaixaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-cash-register"></i> Abertura de Caixa </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" onsubmit="forgotPassword(); return false;">
                    <div class="form-group">
                        <label for="abertura">Valor de Abertura: </label>
                        <input type="text" class="form-control form-control-user" id="abertura" placeholder="Qual o valor inicial da abertura de caixa ..." onkeyup="moeda(this)" autocomplete="email">
                        <small>Valor mínimo R$ 0,01</small>
                    </div>
                    <button type="submit" class="btn btn-success btn-user btn-block" onclick="AbrirCaixa()"><i class="fas fa-cash-register"></i> Abrir Caixa</button>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-danger" type="button" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<!-- Fechar Caixa Modal-->
<div class="modal fade" id="CloseCaixaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-cash-register"></i> Fechamento de Caixa </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <center>
                    <h5>Você está fechando o caixa com:</h5>
                    <div id="final-value">
                        R$ 00,00
                    </div>
                    <button class="btn btn-outline-info" type="button" onclick="getHistorySells()"><i class="fas fa-calendar-check"></i> Histórico de Vendas</button>
                </center>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="FecharCaixa()"><i class="fas fa-cash-register"></i> Confirmar Fechamento</button>
                <button class="btn btn-outline-danger" type="button" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<!-- Fechar Compra Modal-->
<div class="modal fade" id="CloseCompraModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-cash-register"></i> Finalizando Venda </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form onsubmit="Finalizar('2');return false;">
                    <div class="form-group">
                        <label for="credito-final"> <i class="far fa-credit-card"></i> Crédito</label>
                        <input type="text" class="form-control" onkeydown="moeda(this);CalcRetorno();" onkeyup="moeda(this);CalcRetorno();" id="credito-final" placeholder="R$ 10,00">
                    </div>
                    <div class="form-group">
                        <label for="debito-final"> <i class="fas fa-credit-card"></i> Debito</label>
                        <input type="text" class="form-control" onkeydown="moeda(this);CalcRetorno();" onkeyup="moeda(this);CalcRetorno();" id="debito-final" placeholder="R$ 10,00">
                    </div>
                    <div class="form-group">
                        <label for="dinheiro-final"> <i class="fas fa-money-bill-wave"></i> Dinheiro</label>
                        <input type="text" class="form-control" onkeydown="moeda(this);CalcRetorno();" onkeyup="moeda(this);CalcRetorno();" id="dinheiro-final" placeholder="R$ 10,00">
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="desconto-final"> <i class="fas fa-user-tag"></i> Desconto</label>
                        <input type="text" class="form-control" onkeydown="moeda(this);CalcRetorno();" onkeyup="moeda(this);CalcRetorno();" onchange="moeda(this);CalcRetorno();" id="desconto-final" placeholder="R$ 10,00">
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="sell-type"> <i class="fas fa-truck"></i> Tipo de Venda</label>
                        <div id="tpvnd"></div>
                    </div>
                    <hr>
                    <center>
                        <strong>
                            <div id="return-calc"></div>
                        </strong>
                    </center>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-danger" type="button" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<!-- Selecionar Motoboy Modal-->
<div class="modal fade" id="selectMotoboy" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-motorcycle"></i> Selecione o Motoboy </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form onsubmit="Finalizar('3');return false;">
                    <div class="form-group">
                        <label for="motoboy-select"> <i class="fas fa-motorcycle"></i> Selecione Um Motoboy</label>
                        <select id="motoboy-select" class="form-control" required>

                        </select>
                    </div>

                    <center><button type="submit" class="btn btn-success">Enviar</button></center>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-danger" type="button" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<!-- Historico de Vendas Modal-->
<div class="modal fade" id="sells-history" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-calendar-check"></i> Histórico de Venda </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <div id="vendas-feitas">

                    <table class="table table-hover table-bordered" id="historyy" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Data</th>
                                <th>Hora</th>
                                <th>Valor</th>
                                <th><i class="fas fa-info-circle"></i> Info</th>
                                <th><i class="fas fa-trash-alt"></i> Cancelar</th>
                            </tr>
                        </thead>
                    </table>

                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-danger" type="button" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<!-- Lista de Prdutos (Historico) Modal-->
<div class="modal fade" id="productlisthistory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Lista de Produtos (Histórico)</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
            <table class="table table-hover table-bordered" id="historyyproduct" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Marca</th>
                                <th>Categoria</th>
                                <th>Quantidade</th>
                                <th>R$ Unitário</th>
                                <th>R$ Total</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th id="credit-history">Credito: </th>
                                <th id="debit-history">Débito: </th>
                                <th id="money-history">Dinheiro: </th>
                                <th id="priceoff-history">Desconto: </th>
                                <th id="cashback-history">Troco: </th>
                                <th>Valor Total</th>
                                <th id="prdlist-history-detail">R$ 0,00</th>
                            </tr>
                        </tfoot>
                    </table>
            </div>
        </div>
    </div>
</div>

<!-- Selecionar Motoboy Modal-->
<div class="modal fade" id="deleteSellModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-motorcycle"></i> Selecione o Motoboy </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form onsubmit="RemoveSell();return false;">
                <div class="form-group">
                        <label for="sllid"> <i class="fas fa-info-circle"></i> Id da Venda</label>
                        <input type="text" class="form-control" id="sllid" disabled required>
                    </div>
                    <div class="form-group">
                        <label for="motivo"> <i class="fas fa-thrash-alt"></i> Insira o Motivo do Cancelamento</label>
                        <textarea id="motivo" cols="30" rows="10" class="form-control" placeholder="Motivo . . ." required></textarea>
                    </div>

                    <center><button type="submit" class="btn btn-success">Enviar</button></center>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-danger" type="button" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
