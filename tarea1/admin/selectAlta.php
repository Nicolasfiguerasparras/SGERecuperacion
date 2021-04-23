<?php
    if(isset($_POST['user_id'])){
        require_once('../dbArrayConf.php');
        
        $queryUser = "SELECT * FROM users WHERE id = $_POST[user_id]";
        $stmt = $dbh->prepare($queryUser);
        $stmt->execute();

        $row = $stmt->fetch();

        $output = "
                    <form action='altaModal.php' method='POST'>
                        <input type='hidden' name='id' value='$_POST[user_id]'>
                        <button class='btn btn-danger' type='submit' name='cancelar'>Cancelar</button></a>
                        <button class='btn btn-success' type='submit' name='confirmar'>Confirmar</button>
                    </form>
        ";
        
        echo $output;
    }