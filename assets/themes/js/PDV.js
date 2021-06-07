setTimeout(() => {
    isOpen();
}, 0);
async function isOpen() {
    $.ajax({
        url: controllerapi + '/Caixa/isOpen',
        type: 'post',
        dataType: 'json',
        success: async (response) => {
            $('#pdv-screen').load(' #pdv-screen');
            if (response) {
                $('#btn-ct').html('<a href="javascript:" onclick="toogleCaixa(' + response.code + ')" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-cash-register fa-sm text-white-50"></i> Fechar Caixa</a>');

                setTimeout(() => {
                    getProducts();
                    $('#dataTable').DataTable();
                    getCart();
                }, 500);
            } else {
                $('#btn-ct').html('<a href="javascript:" onclick="toogleCaixa(' + response.code + ')" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-cash-register fa-sm text-white-50"></i> Abrir Caixa</a>');
            }
        }
    })
}

async function toogleCaixa() {
    $.ajax({
        url: controllerapi + '/Caixa/Toogle',
        type: 'post',
        dataType: 'json',
        success: async (response) => {
            createNotification(response.title, response.message, response.id);
            if (response.code) {
                $("#OpenCaixaModal").modal('hide');
                $("#CloseCaixaModal").modal('show');

                if (response.desconto == 'R$ 0,00') {
                    $('#final-value').html('<cont><h2 style="padding-bottom: 0px !important;">+' + response.abertura + '</h2><small>Valor da abertura de Caixa</small><br><h2 style="padding-bottom: 0px !important;">+' + response.total + '</h2><small>Total registrado (Vendas)</small><hr><h2 style="margin-bottom: 0px !important;">' + response.resultado + '</h2><small>Total no Caixa</small></cont>')
                } else {
                    $('#final-value').html('<cont><h2 style="padding-bottom: 0px !important;">+' + response.abertura + '</h2><small>Valor da abertura de Caixa</small><br><h2 style="padding-bottom: 0px !important;">+' + response.total + '</h2><small>Total registrado (Vendas)</small><br><h2 style="margin-bottom: 0px !important;color: crimson;">-' + response.desconto + '</h2><small>Descontos aplicados</small><hr><h2 style="margin-bottom: 0px !important;">' + response.resultado + '</h2><small>Total no Caixa</small></cont>')
                }

            } else {
                $("#CloseCaixaModal").modal('hide');
                $("#OpenCaixaModal").modal('show');
            }
        }
    });
}

async function getProducts() {
    $.ajax({
        url: controllerapi + '/Caixa/Produtos',
        type: 'post',
        dataType: 'json',
        success: async (response) => {
            $('#produtos').html();
            let prd = Object.values(response);
            for (i = 0; i < prd.length; i++) {
                $('#produtos').append('<option value="' + prd[i].string + '"></option>');
            }
        }
    });
}

async function getCart() {
    $.ajax({
        url: controllerapi + '/Cart/Get',
        type: 'post',
        dataType: 'json',
        success: async (response) => {
            let table = $('#dataTable').DataTable();
            let button = document.getElementById('final-btn');

            button.disabled = true;

            if (response.code) {

                table.clear().draw();
                let ttl = 0;

                let prdarray = Object.values(response.products);
                for (i = 0; i < prdarray.length; i++) {
                    table.row.add([
                        prdarray[i].id,
                        prdarray[i].nome,
                        prdarray[i].marca,
                        prdarray[i].subcategoria,
                        '<button type="button" onclick="Diminuir(' + prdarray[i].id + ')" class="btn btn-outline-danger btn-sm">-</button> ' + prdarray[i].qtd + ' <button type="button" onclick="Aumentar(' + prdarray[i].id + ')" class="btn btn-outline-success btn-sm">+</button>',
                        prdarray[i].rsvalue,
                        'R$ ' + (prdarray[i].vl_un * prdarray[i].qtd).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&.'),
                        '<button class="btn btn-outline-danger" onclick="Remover(' + prdarray[i].id + ')"><i class="fas fa-trash-alt"></i></button>'
                    ]).draw();

                    ttl = ttl + ((prdarray[i].vl_un * prdarray[i].qtd));

                }


                button.disabled = false;
                $('#total-value-table').html('R$ ' + (ttl).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&.'));
            } else {
                createNotification(response.title, response.message, response.id);
                table.clear().draw();
                button.disabled = true;
            }
        }
    });
}

async function Add() {
    let product = $('#productItem');

    $.ajax({
        url: controllerapi + '/Cart/Add',
        type: 'post',
        dataType: 'json',
        data: {
            product: product.val()
        },
        success: async (response) => {
            if (response.code) {
                getCart();
            } else {
                createNotification(response.title, response.message, response.id);
            }
            product.val('');
        }
    });

}

async function Update(op, id) {

    $.ajax({
        url: controllerapi + '/Cart/Atualizar',
        type: 'post',
        dataType: 'json',
        data: {
            operador: op,
            id: id
        },
        success: async (response) => {
            if (response.code) {
                getCart();
            } else {
                createNotification(response.title, response.message, response.id);
            }
        }
    });
}

function Diminuir(id) {
    Update('-', id);
}

function Aumentar(id) {
    Update('+', id);
}

async function Finalizar(fase) {

    let credito = $('#credito-final'),
        debito = $('#debito-final'),
        dinheiro = $('#dinheiro-final'),
        desconto = $('#desconto-final'),
        selltype = $('#sell-type'),
        motoboy = $('#motoboy-select');

    $.ajax({
        url: controllerapi + '/Cart/Finalizar',
        type: 'post',
        dataType: 'json',
        data: {
            fase: fase,
            credito: credito.val(),
            debito: debito.val(),
            dinheiro: dinheiro.val(),
            desconto: desconto.val(),
            tipo: selltype.val(),
            motoboy: motoboy.val()
        },
        success: async (response) => {
            if (response.code) {

                if (response.fase == '1') {
                    credito.val('');
                    debito.val('');
                    dinheiro.val('');
                    desconto.val('');
                    $('#CloseCompraModal').modal('show');

                    if (response.mtb) {
                        $('#tpvnd').html('<select id="sell-type" class="form-control" required><option value="" selected> Selecione Uma . . .</option><option value="0">Balcão</option><option value="1">Delivery</option></select> ');
                    } else {
                        $('#tpvnd').html('<select id="sell-type" class="form-control" disabled><option value="0">Balcão</option></select><small>Delivery Indisponivel. Nenhum motoboy encontrado.</small> ')
                    }


                    CalcRetorno();
                } else if (response.fase == '2') {

                    if (response.motoboys) {
                        $('#motoboy-select').html('<option value="" selected> Selecione Um(a) . . .</option>');

                        let mtbarr = Object.values(response.motoboys);
                        for (i = 0; i < mtbarr.length; i++) {
                            await $('#motoboy-select').append('<option value="' + mtbarr[i].id + '">' + mtbarr[i].name + '</option>')
                        }

                        $('#selectMotoboy').modal('show');
                    } else {
                        Finalizar('3');
                    }

                } else if (response.fase == '3') {

                    await $('#CloseCompraModal').modal('hide');
                    await $('#selectMotoboy').modal('hide');
                    await createNotification(response.title, response.message, response.id);

                    getCart();

                }

            } else {
                createNotification(response.title, response.message, response.id);
            }
        }
    });
}

async function Remover(id) {
    $.ajax({
        url: controllerapi + '/Cart/Remover',
        type: 'post',
        dataType: 'json',
        data: {
            id: id
        },
        success: async (response) => {
            if (response.code) {
                getCart();
            } else {
                createNotification(response.title, response.message, response.id);
            }
        }
    });
}

async function CalcRetorno() {
    let credito = $('#credito-final'),
        debito = $('#debito-final'),
        dinheiro = $('#dinheiro-final'),
        desconto = $('#desconto-final');

    $.ajax({
        url: controllerapi + '/Cart/CalcRetorno',
        type: 'post',
        dataType: 'json',
        data: {
            credito: credito.val(),
            debito: debito.val(),
            dinheiro: dinheiro.val(),
            desconto: desconto.val()
        },
        success: async (response) => {
            if (response.type == "Faltam") {
                $('#return-calc').html('Faltam: ' + response.valor);
            } else if (response.type == "Certo") {
                $('#return-calc').html('<button type="submit" class="btn btn-success">Finalizar</button>');
            } else if (response.type == "Troco") {
                $('#return-calc').html('Troco: ' + response.valor + '<br><br><button type="submit" class="btn btn-outline-success">Finalizar</button>');
            } else {
                alert('Erro, Contate o Suporte.');
            }
        }
    });
}

async function FecharCaixa() {
    $.ajax({
        url: controllerapi + '/Caixa/Fechar',
        type: 'post',
        dataType: 'json',
        success: async (response) => {
            if (response.code) {
                location.reload();
            } else {
                createNotification(response.title, response.message, response.id);
            }
        }
    });
}

async function AbrirCaixa() {
    let value = $('#abertura');
    $.ajax({
        url: controllerapi + '/Caixa/Abrir',
        type: 'post',
        dataType: 'json',
        data: {
            ab: value.val()
        },
        success: async (response) => {
            if (response.code) {
                location.reload();
            } else {
                createNotification(response.title, response.message, response.id);
            }
        }
    });
}

async function getHistorySells() {
    $.ajax({
        url: controllerapi + '/Sells/Historico',
        type: 'post',
        dataType: 'json',
        success: async (response) => {
            if (response.code) {
                let table = $('#historyy').DataTable();

                table.clear().draw();

                let hstr = Object.values(response.history);
                for (i = 0; i < hstr.length; i++) {
                    table.row.add([
                        hstr[i].id,
                        hstr[i].date,
                        hstr[i].time,
                        hstr[i].total,
                        '<button class="btn btn-outline-info" onclick="showSellDetail(' + hstr[i].id + ')"><i class="fas fa-info-circle"></i></button>',
                        '<button class="btn btn-outline-danger" onclick="RemoveSellModal(' + hstr[i].id + ')"><i class="fas fa-trash-alt"></i></button>',
                    ]).draw();
                }

                $('#sells-history').modal('show');
            } else {
                createNotification(response.title, response.message, response.id);
            }

        }
    });
}

async function showSellDetail(id) {

    $.ajax({
        url: controllerapi + '/Sells/ProductList',
        type: 'post',
        dataType: 'json',
        data: {
            id: id
        },
        success: async (response) => {
            if (response.code) {
                let table = $('#historyyproduct').DataTable();

                table.clear().draw();

                let hstr = Object.values(response.history);
                for (i = 0; i < hstr.length; i++) {
                    $('#prdlist-history-detail').html(hstr[i].total);
                    $('#credit-history').html(hstr[i].credito);
                    $('#debit-history').html(hstr[i].debito);
                    $('#money-history').html(hstr[i].dinheiro);
                    $('#priceoff-history').html(hstr[i].desconto);
                    $('#cashback-history').html(hstr[i].troco);
                    let prds = Object.values(hstr[i].products);
                    for (i = 0; i < prds.length; i++) {
                        table.row.add([
                            prds[i].id,
                            prds[i].name,
                            prds[i].brand,
                            prds[i].subcategoria,
                            prds[i].qtd,
                            'R$ '+prds[i].valuestr,
                            'R$ '+prds[i].total,
                        ]).draw();
                    }
                }


                $('#productlisthistory').modal('show');
            } else {
                createNotification(response.title, response.message, response.id);
            }

        }
    });
}

async function RemoveSellModal(id){
    
    $('#sllid').val(id);
    $('#deleteSellModal').modal('show');

}

async function RemoveSell(){
    let id = $('#sllid'),
        mt = $('#motivo');

    $.ajax({
        url: controllerapi + '/Sells/Cancelar',
        type: 'post',
        dataType: 'json',
        data: {
            id: id.val(),
            motivo: mt.val()
        },
        success: async (response) => {
            if(response.code){
                id.val('');
                mt.val('');
                $("#CloseCaixaModal").modal('hide');
                $("#sells-history").modal('hide');
                $('#deleteSellModal').modal('hide');
                getHistorySells();
            } else {
                createNotification(response.title, response.message, response.id);
            }
        }
    });
}