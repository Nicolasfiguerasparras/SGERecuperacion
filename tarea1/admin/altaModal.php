<?php
    require_once('header.php');

    if(isset($_POST['confirmar'])){
        $id = $_POST['id'];
        $queryUser = "UPDATE `users` SET `status` = '0' WHERE `users`.`id` = $id";
        $stmt = $dbh->prepare($queryUser);
        $stmt->execute();
        header('Location: index.php');
    }elseif(isset($_POST['cancelar'])){
        header('Location: index.php');
    }
?>

<div class="modal fade" id="altaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class='modal-dialog modal-full-height modal-right'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='exampleModalLabel'>Dar de alta</h5>
                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
            </div>
            <div class='modal-body' id='user_details_alta'>
                
            </div>
        </div>
    </div>
</div>