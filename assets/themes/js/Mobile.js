window.onresize = function(){
  if(window.innerHeight > window.innerWidth){
    $('.alterar-celular').show();
  } else {
    $('.alterar-celular').hide();
  }
};

var btnCount = 0, atual_pic = 0, total_pic = 0, pins = [], pinCount = 0;

async function popover(pin, option) {
  if(option == 'show') {
    var popover = document.createElement('div');
    popover.className += 'popover';
    popover.innerHTML = pin.getAttribute('popover');

    let pinLeft = pin.style.left, pinTop = pin.style.top;

    pinLeft = parseFloat(pinLeft.replace("px", ''));
    pinTop = parseFloat(pinTop.replace("px", ''));

    popover.style.left = `${pinLeft - 10}px`;
    popover.style.top = `${pinTop - 30}px`;

    document.getElementById('pins-externo').appendChild(popover);
    console.log(option);
  }else if( option == 'hide'){
    var el = document.querySelector( '.popover' );
    el.parentNode.removeChild( el );
    console.log(option)
  }
}

async function modal(where) {
  $('#addPinModal').modal('show');
  //$('.modal-inside').draggable();

  $(`.pins-form`).html(`
  <form onsubmit="AddPin('${where}'); return false;" action='#'>

        <label for="type-pin">Tipo de Pin</label><br>
        <select id="type-pin" required>
            <option value="">Selecione Uma Opção</option>
            <option value="recurso">Recurso</option>
            <option value="avaria">Avaria</option>
        </select><br>

        <label for="desc-pin">Titulo do Pin</label><br>
        <input type="text" id="desc-pin" placeholder="Risco na Lataria" required><br>

        <label for="where-pin">Local do Pin</label><br>
        <input type="text" id="where-pin" placeholder="Porta Esquerda" required><br>

        <input type="submit" value="Cadastrar">
    </form>
  `)
}

async function AddPin(where) {
  var type = $('#type-pin :selected').val(),
      title = $('#desc-pin').val(),
      local = $('#where-pin').val();

  var btn = document.createElement('div');
  btn.id += `pin-${where}-${btnCount}`;
  btn.className += `pin-${type}`;

  if(type == 'recurso') {
    btn.innerHTML = '+';
  } else if(type == 'avaria') {
    btn.innerHTML = '!';
  }
  btn.setAttribute("popover", `${title} - ${local}`);
  btn.setAttribute("onmouseover", `popover(this, 'show')`);
  btn.setAttribute("onmouseout", `popover(this, 'hide')`);
  
  document.getElementById(`pins-${where}`).appendChild(btn);

  pinCount ++;
  
  $(`#pin-${where}-${btnCount}`).draggable({
    containment: `#deg-${where}`,
    revert: `invalid`,
    snap: `deg-${where}`
  });

  $(`#deg-${where}`).droppable({
    classes: {
      "ui-droppable-active": "ui-state-active",
      "ui-droppable-hover": "ui-state-hover"
    },
    drop: function (event, ui) {
      pins["count"] = (pinCount);
      pins[ui.helper[0].id] = [];
      pins[ui.helper[0].id]["name"] = ui.helper[0].id;
      pins[ui.helper[0].id]["top"] = ui.position.top;
      pins[ui.helper[0].id]["left"] = ui.position.left;
      pins[ui.helper[0].id]["foto_inicial"] = atual_pic;
      pins[ui.helper[0].id]["total_fotos"] = total_pic == 0 ? $("#deg-externo > .imgExt").length : total_pic;

      console.table(pins);
    }
  });


  btnCount++;
}

async function mv(op, pic_active, old_pic, pic_lenght){
  for (let i = 0; i < pins["count"]; i++) {
    let pin = (pins[`pin-externo-${i}`]);
    let divPin = document.getElementById(pin['name']);
    let a_left = divPin.style.left;
    let a_top = divPin.style.top;

    let img = document.getElementById('imgExt');
    let width = img.width;

    if (pic_active != pin['foto_inicial']) {
      if(op == '-'){
        var n_left = (parseFloat(a_left.replace("px", '')) - (width * 0.01));
        var n_top = (parseFloat(a_top.replace("px", '')) - (width * 0.01));
      } else if(op == '+'){
        var n_left = (parseFloat(a_left.replace("px", '')) + (width * 0.01));
        var n_top = (parseFloat(a_top.replace("px", '')) + (width * 0.01));
      }
    }
    else {
      var n_left = pin['left'];
      var n_top = pin['top'];
    }

    let hide = 0;

    if (pin['foto_inicial'] == 0 || pin['foto_inicial'] == 1 || pin['foto_inicial'] == 2) {
      if(pin['foto_inicial'] == 0 && ((pic_active < (pic_lenght -4) && pic_active > (pic_lenght -7)) || (pic_active >= 6 && pic_active <= 10))) {
        hide = 1;
      }
      else if(pin['foto_inicial'] == 1 && ((pic_active < (pic_lenght -3) && pic_active > (pic_lenght -7)) || (pic_active >= 7 && pic_active <= 10))) {
        hide = 1;
      }
      else if(pin['foto_inicial'] == 2 && ((pic_active < (pic_lenght -2) && pic_active > (pic_lenght -7)) || (pic_active >= 8 && pic_active <= 10))) {
        hide = 1;
      } else if (pic_active >= 10 && pic_active <= (pic_lenght -7)) {
        hide = 1;
      }
    } else if (pin['foto_inicial'] == (pic_lenght -1) || pin['foto_inicial'] == (pic_lenght -2) || pin['foto_inicial'] == (pic_lenght -3)) {
      if(pin['foto_inicial'] == (pic_lenght -1) && ((pic_active < (pic_lenght -6) && pic_active > (pic_lenght -9)) || (pic_active >= 6 && pic_active <= 10))) {
        hide = 1;
      }
      else if(pin['foto_inicial'] == (pic_lenght -2) && ((pic_active < (pic_lenght -5) && pic_active > (pic_lenght -9)) || (pic_active >= 7 && pic_active <= 10))) {
        hide = 1;
      }
      else if(pin['foto_inicial'] == (pic_lenght -3) && ((pic_active < (pic_lenght -4) && pic_active > (pic_lenght -9)) || (pic_active >= 8 && pic_active <= 10))) {
        hide = 1;
      } else if (pic_active >= 10 && pic_active <= (pic_lenght -7)) {
        hide = 1;
      }
    }  else if(((pic_active < (pin['foto_inicial'] +3) && pic_active < (pin['foto_inicial'] +8) || (pic_active > (pin['foto_inicial'] -3) && pic_active > (pin['foto_inicial'] -8))))){
      console.log(((pic_active < (pin['foto_inicial'] +3) && pic_active < (pin['foto_inicial'] +8) || (pic_active > (pin['foto_inicial'] +3) && pic_active > (pin['foto_inicial'] +8)))));
      hide = 0;
    }
    else {
      console.log(((pic_active < (pin['foto_inicial'] +3) && pic_active < (pin['foto_inicial'] +8) || (pic_active < (pin['foto_inicial'] -3) && pic_active < (pin['foto_inicial'] -8)))));
      hide = 1;
    }

    if(hide) {
      document.getElementById(pin['name']).style.display = `none`;
    } else {
      document.getElementById(pin['name']).style.left = `${n_left}px`;
      document.getElementById(pin['name']).style.display = `flex`;
    }
  }
}

async function movePins(pic_active, old_pic, pic_lenght) {
  // for (let i = 0; i < pins.length; i++) {
  //   console.log(pins[`pin-externo-${i}`]);
  // }

  if (pic_active == 0 && old_pic == (pic_lenght - 1)) { // NEXT
    mv('-', pic_active, old_pic, pic_lenght);
  } else if (pic_active == (pic_lenght - 1) && old_pic == 0) { // PREV
    mv('+', pic_active, old_pic, pic_lenght);
  } else if (pic_active > old_pic) { // NEXT
    mv('-', pic_active, old_pic, pic_lenght);
  } else if (pic_active < old_pic) { // PREV
    mv('+', pic_active, old_pic, pic_lenght);
  } else {
    console.log('Tem Algo Errado');
  }

  console.log(pic_active, old_pic, pic_lenght);
}

// const zoomElement = document.querySelector(".deg-externo");
// let zoom = 1;
// const ZOOM_SPEED = 0.1;

// document.addEventListener("wheel", function (e) {

//     if (e.deltaY < 0) {
//       zoomElement.style.transform = `scale(${(zoom += ZOOM_SPEED)})`;
//     } else {
//       zoomElement.style.transform = `scale(${(zoom -= ZOOM_SPEED)})`;
//     }
// });

async function showOptions(part) {
  $('#options').show();

  $(`.btn-active`).removeClass('btn-active');
  $(`.btn-${part}`).addClass('btn-active');

  $(`.deg-active`).removeClass('deg-active');
  $(`.deg-${part}`).addClass('deg-active');

  $(`.pins-active`).removeClass('pins-active');
  $(`.pins-${part}`).addClass('pins-active');

  $(`.btn-pins-inactive`).removeClass('btn-pins-active');
  $(`.btn-add-pins-${part}`).addClass('btn-pins-active');
}
//metas - sprint 1
// 0-rodar em uma webview ou PWA mobile
// 1-upload do video 360 graus (interno ou externo do veículo)
// 2-"quebrar? o video em um volume estabelecido de frames (menos=menor qualidade /mais=maior qualidade, mais fluído)
// 3-Possibilidade de em uma das faces do veículo (frente, lateral, traseira, painel, etc) inserir um PIN com uma anotação ou o link para outra foto (ex: pin em uma batida (anotacao) na lateral ou um pin no capô linkando para uma foto ou vídeo do motor )
//   3.1 pensar que esse pin precisa ter posição relativa (% - escala X/Y) 
//   3.2 o pin deve ter uma movimentação de acordo com o giro/spin. 
//   3.2 Após X graus de giro, o pin deve sumir (sugiro parametrizar em até 30º)
// 4-uma vez que estes objetos sejam "montados", postar isto para um ambiente backoffice


// Referência:
// https://spins.spincar.com/triadevirtual/flc4946
// https://www.leilomaster.com.br/leilao/VOLKSWAGEN/VOLKSWAGEN-T-CROSS-HIGHLINE-AE/2020/GOI%C3%82NIA-GO/336829

// Produto similar:
// www.spincar.com


//metas - sprint 2
// receber postagens dos produtos
// possibilitar uma eventual correção ou melhoria no material postado (reposicionamento de pins, correção de ortografia)
// geração de "embedável", whitelabel, link compartilhável
// descrever mais funcionalidades




//listener do campo
document.querySelector('#upext').addEventListener('change', extractFramesExt, false);
document.querySelector('#upint').addEventListener('change', extractFramesInt, false);

function extractFramesExt() {
  var video = document.createElement('video');
  var array = [];
  var canvas = document.createElement('canvas');
  var ctx = canvas.getContext('2d');
  var pro = document.querySelector('#progressExt');
  var pace = 3;
  var cc = 0;


  function initCanvas(e) {
    canvas.width = this.videoWidth;
    canvas.height = this.videoHeight;
  }

  function drawFrame(e) {
    this.pause();
    ctx.drawImage(this, 0, 0);

    canvas.toBlob(saveFrame, 'image/jpeg');
    if (((this.currentTime / this.duration) * 100).toFixed(0) != 100) {
      pro.innerHTML = '<div class="btn btn-warning">'
                        +'<div class="progress-bar bg-transparent" role="progressbar" style="width: ' + ((this.currentTime / this.duration) * 100).toFixed(0) + '%;" aria-valuenow="' + ((this.currentTime / this.duration) * 100).toFixed(0) + '" aria-valuemin="0" aria-valuemax="' + ((this.currentTime / this.duration) * 100).toFixed(0) + '">' + ((this.currentTime / this.duration) * 100).toFixed(0) + '% Externo</div>'
                      +'</div>';
    } else {
      pro.innerHTML = '<div class="btn btn-success disabled">'
                        +'<div class="progress-bar bg-transparent" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"> <i class="fas fa-lock"></i> Externo Concluido</div>'
                      +'</div>';
    }
    if (this.currentTime < this.duration) {
      this.play();
    }
  }

  function saveFrame(blob) {
    array.push(blob);
  }

  function revokeURL(e) {
    URL.revokeObjectURL(this.src);
  }

  function uploadImage(item, name) {

    var jpegFile = new File([item], name);

    // var jpegFile = canvas.toDataURL("image/jpeg", 0.1);

    jpegFile.lastModifiedDate = new Date();
    jpegFile.name = name;
    jpegFile.type = "image/jpeg";

    var formData = new FormData();
    formData.append("file", jpegFile);

    $.ajax({
      url: "https://localhost/uploader-spin/WS/Uploader",
      type: "POST",
      dataType: 'json',
      data: formData,
      processData: false, // tell jQuery not to process the data
      contentType: false, // tell jQuery not to set contentType
      success: async (response) => {
        //createNotification(response.title, response.message, response.id);
        if (response.code) {
          //location.reload();
        }
      },
    });

    cc++;

  }

  async function onend(e) {
    var imgExt;
    ant = null;
    document.getElementById('deg-externo').innerHTML = '';
    // do whatever with the frames
    console.log('este video tem no total ' + array.length + ' frames')
    for (var i = 0; i < array.length; i++) {
      perc = ((i / array.length) * 100).toFixed(0);
      if ((perc % pace == 0 || perc == 0) && ant != perc) {
        ant = perc

        imgExt = new Image();
        imgExt.onload = revokeURL;
        imgExt.src = URL.createObjectURL(array[i]);
        imgExt.className += `imgExt${i}`;
        imgExt.className += ` imgExt`;
        imgExt.id = 'imgExt';
        // uploadImage(imgExt, `Int${i}.jpg`);
        document.getElementById('deg-externo').appendChild(imgExt);

        //wheelzoom(document.querySelector(`img.img${i}`));
      }
    }
    //desconsidera o objeto do vídeo
    URL.revokeObjectURL(this.src);

    await showOptions('externo');
    await externoSpin();
  }

  video.muted = true;

  video.addEventListener('loadedmetadata', initCanvas, false);
  video.addEventListener('timeupdate', drawFrame, false);
  video.addEventListener('ended', onend, false);

  video.src = URL.createObjectURL(this.files[0]);
  video.play();
}

function extractFramesInt() {
  var video = document.createElement('video');
  var array = [];
  var canvas = document.createElement('canvas');
  var ctx = canvas.getContext('2d');
  var pro = document.querySelector('#progressInt');
  var pace = 3;
  var cc = 0;


  function initCanvas(e) {
    canvas.width = this.videoWidth;
    canvas.height = this.videoHeight;
  }

  function drawFrame(e) {
    this.pause();
    ctx.drawImage(this, 0, 0);

    canvas.toBlob(saveFrame, 'image/jpeg');
    if (((this.currentTime / this.duration) * 100).toFixed(0) != 100) {
      pro.innerHTML = '<div class="btn btn-warning">'
                        +'<div class="progress-bar bg-transparent" role="progressbar" style="width: ' + ((this.currentTime / this.duration) * 100).toFixed(0) + '%;" aria-valuenow="' + ((this.currentTime / this.duration) * 100).toFixed(0) + '" aria-valuemin="0" aria-valuemax="' + ((this.currentTime / this.duration) * 100).toFixed(0) + '">' + ((this.currentTime / this.duration) * 100).toFixed(0) + '% Interno</div>'
                      +'</div>';
    } else {
      pro.innerHTML = '<div class="btn btn-success disabled">'
                        +'<div class="progress-bar bg-transparent" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"> <i class="fas fa-lock"></i> Interno Concluido</div>'
                      +'</div>';
    }
    if (this.currentTime < this.duration) {
      this.play();
    }
  }

  function saveFrame(blob) {
    array.push(blob);
  }

  function revokeURL(e) {
    URL.revokeObjectURL(this.src);
  }

  function uploadImage(item, name) {

    var jpegFile = new File([item], name);

    // var jpegFile = canvas.toDataURL("image/jpeg", 0.1);

    jpegFile.lastModifiedDate = new Date();
    jpegFile.name = name;

    var formData = new FormData();
    formData.append("file", jpegFile);

    $.ajax({
      url: "https://localhost/uploader-spin/WS/Uploader",
      type: "POST",
      dataType: 'json',
      data: formData,
      processData: false, // tell jQuery not to process the data
      contentType: false, // tell jQuery not to set contentType
      success: async (response) => {
        //createNotification(response.title, response.message, response.id);
        if (response.code) {
          //location.reload();
        }
      },
    });

    cc++;

  }

  async function onend(e) {
    var imgInt;
    ant = null;
    document.getElementById('deg-interno').innerHTML = '';
    // do whatever with the frames
    console.log('este video tem no total ' + array.length + ' frames')
    for (var i = 0; i < array.length; i++) {
      perc = ((i / array.length) * 100).toFixed(0);
      if ((perc % pace == 0 || perc == 0) && ant != perc) {
        ant = perc

        imgInt = new Image();
        imgInt.onload = revokeURL;
        imgInt.src = URL.createObjectURL(array[i]);
        imgInt.className += `imgInt${i}`;
        imgInt.className += ` imgInt`;
        document.getElementById('deg-interno').appendChild(imgInt);
        // uploadImage(imgInt.toJPEG, `imgInt${i}.jpg`);
      }
    }
    //desconsidera o objeto do vídeo
    URL.revokeObjectURL(this.src);

    await showOptions('interno');
    await internoSpin();
  }

  video.muted = true;

  video.addEventListener('loadedmetadata', initCanvas, false);
  video.addEventListener('timeupdate', drawFrame, false);
  video.addEventListener('ended', onend, false);

  video.src = URL.createObjectURL(this.files[0]);
  video.play();
}

async function UIOptions() {

}