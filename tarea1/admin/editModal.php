<?php
    require_once('header.php');

    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $username = $_POST['username'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $birth_date = $_POST['birth_date'];
        $address = $_POST['address'];
        $postal_code = $_POST['postal_code'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $status = $_POST['status'];
        $trash = $_POST['trash'];
        $queryEdit = "  UPDATE `users` 
                        SET `username` = '$username', 
                                         `first_name` = '$first_name', 
                                         `last_name` = '$last_name', 
                                         `email` = '$email', 
                                         `birth_date` = '$birth_date', 
                                         `address` = '$address', 
                                         `postal_code` = '$postal_code', 
                                         `city` = '$city', 
                                         `state` = '$state',
                                         `status` = '$status',
                                         `trash` = '$trash'
                        WHERE `users`.`id` = $id";
        $stmt = $dbh->prepare($queryEdit);
        $stmt->execute();
        header("Location: index.php");
    }
?>


<!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class='modal-dialog modal-full-height modal-right'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLabel'>Editar</h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body' id='user_details_edit'>
                    
                </div>
            </div>
        </div>
    </div>