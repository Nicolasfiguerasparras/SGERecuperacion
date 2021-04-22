window.onload = function(){

    $('.btnEdit').click(function(){
        var user_id = $(this).attr('id');
        $.ajax({
            url: "archivo.php",
            method: "post",
            data: {user_id:user_id},
            success: function(data){
                $('#user_details').html(data),
                $('#atencion').modal('show');
            }
        });
    }

    $('.btnDelete').on('click', function(e){
        var user_id = $(this).attr('id');

    });
}