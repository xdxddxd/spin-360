<style>
    .draggable-menu {
        position: fixed;

        left: 90vw;
        top: 1vh;

        width: 50px;
        height: 50px;

        background-color: rgba(0, 0, 0, .5);

        border-radius: 25%;
        padding: 10px;

        cursor: pointer;

        z-index: 99999999;
    }

    .draggable-menu .icon {
        padding: 5px;
        width: 30px;
        height: 30px;

        border-radius: 50%;

        background-color: rgba(0, 0, 0, .5);
        color: white;
        font-size: 17px;
        text-align: center;
        justify-content: center;
        align-items: center;
    }

    .switable-menu {
        display: flex;
        justify-content: space-arround;
    }

    .switable-menu img {
        width: 70px;
    }

    .switable-menu a {
        margin-left: 10px;
    }

    .upp {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
</style>

<!-- Logout Modal-->
<div class="modal fade" id="menuModal" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header" id="staticBackdropLabel">
                <h5>
                    Menu
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="switable-menu">
                    <a href="<?php echo URL_BASE; ?>/Home" class="title">
                        <img src="<?php echo URL_BASE; ?>/assets/Icons/favicon.png" alt="Logo">
                    </a>
                    <a href="<?php echo URL_BASE; ?>/Home" role="button" class="btn btn-primary">
                        <i class="fas fa-home"></i>
                        Home
                    </a>
                    <a href="<?php echo URL_BASE; ?>/Capturar" role="button" class="btn btn-primary">
                        <i class="fas fa-plus-circle"></i>
                        Nova Captura
                    </a>
                    <a href="<?php echo URL_BASE; ?>/Perfil" role="button" class="btn btn-primary">
                        <i class="fas fa-user"></i>
                        Perfil
                    </a>
                </div>

                <hr>

                <div class="upp">

                    <div id="progressExt">
                        <button class="btn btn-danger" onclick="$('#upext').click()">
                            <i class="fas fa-unlock"></i>
                            Externo Faltando
                        </button>
                    </div>

                    <div id="progressInt">
                        <button class="btn btn-danger" onclick="$('#upint').click()">
                            <i class="fas fa-unlock"></i>
                            Interno Faltando
                        </button>
                    </div>

                </div>

                <hr>

                <center>
                    <button onclick="modal('externo')" class="btn-add-pins-externo btn-add-pins btn-pins-inactive btn btn-success"> <i class="fas fa-plus-circle"></i> Adicionar Pin Externo</button>
                    <button onclick="modal('interno')" class="btn-add-pins-interno btn-add-pins btn-pins-inactive btn btn-success"> <i class="fas fa-plus-circle"></i> Adicionar Pin Interno</button>
                </center>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">Fechar Menu</button>
            </div>
        </div>
    </div>
</div>

<div class="draggable-menu" onclick="$('#menuModal').modal('toggle')">
    <div class="icon">
        <i class="fas fa-bars"></i>
    </div>
</div>

<script>
    $(`.draggable-menu`).draggable();

    $(`.draggable-menu`).draggable({
        containment: `html`,
        revert: `invalid`,
        snap: `html`
    });

    $(`html`).droppable({
        classes: {
            "ui-droppable-active": "ui-state-active",
            "ui-droppable-hover": "ui-state-hover"
        }
    });
</script>