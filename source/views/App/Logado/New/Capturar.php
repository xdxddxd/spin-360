<link rel="stylesheet" href="<?php echo URL_BASE; ?>/assets/themes/css/Mobile.css">
<div class="Mobile">

  <div class="alterar-celular">
    <center>
      <h1>Por Favor !</h1>
      <h2>Vire o Seu Dispositivo</h2>
      <div class="sidebar-brand-icon rotate-n-15" style="font-size: 50px;">
        <i class="fas fa-mobile-alt"></i>
      </div>
      <hr>
      <p>
        Com a tela virada será mais eficiente fazer esta parte do projeto !
      </p>
      <small>
        Infelizmente isso é obrigatório !!!
      </small>
    </center>
  </div>

  <div class="uploaders" style="display: none;">
    <label for="upext">Externo</label>
    <input type="file" accept="video/*" id="upext" />
    <label for="upint">Interno</label>
    <input type="file" accept="video/*" id="upint" />
  </div>
  <div class="options" id="options" style="display: none;">
    <div class="pill-options">
      <div class="option left btn-externo" onclick="showOptions('externo')">Externo</div>
      <div class="option right btn-interno" onclick="showOptions('interno')">Interno</div>
    </div>
  </div>
  <div class="center">
    <div id="pins-externo" class="pins-externo pins-inactive" style="position: absolute;"></div>
    <div class="deg-externo deg-inactive" id="deg-externo"></div>
    <div id="pins-interno" class="pins-interno pins-inactive" style="position: absolute;"></div>
    <div class="deg-interno deg-inactive" id="deg-interno"></div>
  </div>
</div>

<div class="modal" style="display: none;">
  <div class="modal-inside">
    <center>
      <h3>Adicionar Pin !</h3>
    </center>
    <hr>

    <hr>
    <input type="button" value="Fechar" onclick="$('.modal').hide()">
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addPinModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addPinModalCenterTitle">Adicionar Pin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="pins-form">

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<script src="<?php echo URL_BASE; ?>/assets/themes/js/360deg.js"></script>
<script src="<?php echo URL_BASE; ?>/assets/themes/js/Blob.js"></script>
<script src="<?php echo URL_BASE; ?>/assets/themes/js/wheelzoom.js"></script>
<script src="<?php echo URL_BASE; ?>/assets/themes/js/Mobile.js"></script>

<script>
  setInterval(() => {
    //location.reload();
  }, 2000)
</script>