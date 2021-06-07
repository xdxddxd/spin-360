jQuery(document).ready(function($) {
    $('.upload-area').on('dragover', function(event) {
        event.preventDefault();
        event.stopPropagation();

        $(this).addClass('upload-area-hover');
    });
    $('.upload-area').on('dragleave', function(event) {
        event.preventDefault();
        event.stopPropagation();

        $(this).removeClass('upload-area-hover');
    });
    $('.upload-area').on('drop', function(event) {
        event.preventDefault();
        event.stopPropagation();

        $(this).removeClass('upload-area-hover');
        
        var data = new FormData();
        var files = event.originalEvent.dataTransfer.files;
        console.log(files);

        for (i = 0; i < files.length; i++){
            data.append('file[]', files[i]);
        }
        $.ajax({
            url: 'upload.php',
            method: 'post',
            dataType: 'json',
            data: data,
            contentType: false,
            cache: false,
            processData: false,
            success: async (response) => {
                $('#uploaded-files').html(result);
            }
        })
    })
});