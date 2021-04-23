window.onload = function(){

    $('.btnEdit').click(function(){
        var user_id = $(this).attr('id');
        $.ajax({
            url: "selectEdit.php",
            method: "post",
            data: {user_id:user_id},
            success: function(data){
                $('#user_details_edit').html(data);
                $('#editModal').modal('show');
            }
        });
    });

    $('.btnAlta').click(function(){
        var user_id = $(this).attr('id');
        $.ajax({
            url: "selectAlta.php",
            method: "post",
            data: {user_id:user_id},
            success: function(data){
                $('#user_details_alta').html(data);
                $('#altaModal').modal('show');
            }
        });
    });

    $('.btnBorrar').click(function(){
        var user_id = $(this).attr('id');
        $.ajax({
            url: "selectBorrar.php",
            method: "post",
            data: {user_id:user_id},
            success: function(data){
                $('#user_details_borrar').html(data);
                $('#borrarModal').modal('show');
            }
        });
    });
}