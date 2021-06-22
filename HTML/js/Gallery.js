jQuery(document).ready(function ($) {
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