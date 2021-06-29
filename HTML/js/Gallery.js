jQuery(document).ready(function ($) {
    if(!window.localStorage.getItem(`${$('#id-prd').val()}-Gallery-Index`)) {
        window.localStorage.setItem(`${$('#id-prd').val()}-Gallery-Index`, 0);
    }
    $('.upload-area').on('dragover', function (event) {
        event.preventDefault();
        event.stopPropagation();

        $(this).addClass('upload-area-hover');
    });
    $('.upload-area').on('dragleave', function (event) {
        event.preventDefault();
        event.stopPropagation();

        $(this).removeClass('upload-area-hover');
    });
    $('.upload-area').on('drop', function (event) {
        event.preventDefault();
        event.stopPropagation();

        $(this).removeClass('upload-area-hover');

        var formData = new FormData();
        var files = event.originalEvent.dataTransfer.files;

        for (i = 0; i < files.length; i++) {
            formData.append('file', files[i]);
            formData.append('prdid', $('#id-prd').val());


            window.localStorage.setItem(`${$('#id-prd').val()}-Gallery-Index`, (parseInt(window.localStorage.getItem(`${$('#id-prd').val()}-Gallery-Index`)) + 1));

            //console.log(getDataUrl(files[i]))

            var canvas = document.createElement('canvas');
            var ctx = canvas.getContext("2d");
            var dataURL = canvas.toDataURL('image/jpeg',files[i]);
            
            window.localStorage.setItem(`${$('#id-prd').val()}-${window.localStorage.getItem(`${$('#id-prd').val()}-Gallery-Index`)}-Gallery`, dataURL.replace(/^data:image\/(png|jpg);base64,/, ""));

            // $.ajax({
            //     url: controllerapi + '/Output/Picture',
            //     type: "POST",
            //     dataType: 'json',
            //     data: formData,
            //     processData: false, // tell jQuery not to process the data
            //     contentType: false, // tell jQuery not to set contentType
            //     success: async (response) => {
            //         $('#uploaded-files').append(response.message)
            //     },
            // });

            formData.delete('file');
            formData.delete('prdid');
        }

        delete formData, files;
    })

    $('#files').on('change', function (event) {
        var formData = new FormData();
        var files = $("#files")[0].files;

        for (i = 0; i < files.length; i++) {
            formData.append('file', files[i]);
            formData.append('prdid', $('#id-prd').val());

            $.ajax({
                url: controllerapi + '/Output/Picture',
                type: "POST",
                dataType: 'json',
                data: formData,
                processData: false, // tell jQuery not to process the data
                contentType: false, // tell jQuery not to set contentType
                success: async (response) => {
                    $('#uploaded-files').append(response.message)
                },
            });

            formData.delete('file');
            formData.delete('prdid');
        }

        delete formData, files;
        $('#files').val("");
    });
});

async function alterImage(id){
    $.ajax({
        url: controllerapi + '/Output/Image/Update/Get',
        dataType: 'json',
        type: 'post',
        data: {
            id: id
        },
        success: async (response) => {
            if(response.code) {
                $('#alterImageForm').modal('show');

                $('#idimg').val(response.img.id)
                $('#title').val(response.img.title);
                $('#description').val(response.img.description);

            } else {
                createNotification(response.title, response.message, response.id);
            }
        }
    })
}

async function SaveNewInfo(){
    $.ajax({
        url: controllerapi + '/Output/Image/Update',
        dataType: 'json',
        type: 'post',
        data: {
            id: $('#idimg').val(),
            nome: $('#title').val(),
            legenda: $('#description').val()
        },
        success: async (response) => {
            if(response.code) {
                $('#alterImageForm').modal('hide');
                createNotification(response.title, response.message, response.id);
            } else {
                createNotification(response.title, response.message, response.id);
            }
        }
    })
}

async function saveLocalStorage (id, type, index, data) {
    window.localStorage.setItem(id+'|'+type+'|'+index, JSON.stringify(data));
}

function getDataUrl(img) {
    // Create canvas
    const canvas = document.createElement('canvas');
    const ctx = canvas.getContext('2d');
    // Set width and height
    canvas.width = img.width;
    canvas.height = img.height;
    // Draw the image
    ctx.drawImage(img, 0, 0);
    return canvas.toDataURL('image/jpeg');
 }