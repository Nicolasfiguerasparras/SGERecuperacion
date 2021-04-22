window.onload = function(){

    $('.btnEdit').click(function(){
        var user_id = $(this).attr('id');
        $.ajax({
            url: "editModal.php",
            method: "post",
            data: {user_id:user_id},
            success: function(data){
                $('#user_details').html(data);
            }
        });
    });
}