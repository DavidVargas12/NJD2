$("#create_documentos_form").unbind('submit').bind('submit', function(){
    $(".text-danger").remove();
    var form = $(this);

    var titulo = $("#titulo").val();
    var file2 = $('#archivo');   //Ya que utilizas jquery aprovechalo...
    var archivo = file2[0].files;       //el array pertenece al elemento

    if(titulo && archivo) 
    {

        // Crea un formData y lo envías
        var formData = new formData(form);
        formData.append('titulo',titulo);
        formData.append('archivo[]',archivo);

        jQuery.ajax({
            url: 'upload.php',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            success: function(data){
                alert(data);
            }
        });
    }
    return false;
});