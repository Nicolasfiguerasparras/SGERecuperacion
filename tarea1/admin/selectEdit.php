<?php
    if(isset($_POST['user_id'])){
        require_once('../dbArrayConf.php');
        
        $queryUser = "SELECT * FROM users WHERE id = $_POST[user_id]";
        $stmt = $dbh->prepare($queryUser);
        $stmt->execute();

        $row = $stmt->fetch();

        $output = "
                    <form method='POST' action='editModal.php'>
                        <div class='form-row'>
                            <div class='form-group col-md-12'>
                                <label for='username'>Username</label>
                                <input type='text' class='form-control' id='username' name='username' value='$row->username' readonly>
                            </div>
                            <div class='form-group col-md-12'>
                                <label for='first_name'>First Name</label>
                                <input type='text' class='form-control' id='first_name' name='first_name' value='$row->first_name'>
                            </div>
                        </div>
                        <div class='form-group'>
                            <label for='last_name'>Last Name</label>
                            <input type='text' class='form-control' id='last_name' name='last_name' value='$row->last_name'>
                        </div>
                        <div class='form-group'>
                            <label for='email'>Email</label>
                            <input type='text' class='form-control' id='email' name='email' value='$row->email'>
                        </div>
                        <div class='form-row'>
                            <div class='form-group col-md-12'>
                                <label for='birth_date'>Birth date</label>
                                <input type='date' class='form-control' id='birth_date' name='birth_date' value='$row->birth_date'>
                            </div>
                            <div class='form-group col-md-12'>
                                <label for='address'>Address</label>
                                <input type='text' class='form-control' id='address' name='address' value='$row->address'>
                            </div>
                            <div class='form-group col-md-12'>
                                <label for='postal_code'>Postal Code</label>
                                <input type='text' class='form-control' id='postal_code' name='postal_code' value='$row->postal_code'>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='form-group col-md-12'>
                                <label for='city'>City</label>
                                <input type='text' class='form-control' id='city' name='city' value='$row->city'>
                            </div>
                            <div class='form-group col-md-12'>
                                <label for='state'>State</label>
                                <input type='text' class='form-control' id='state' name='state' value='$row->state'>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='form-group col-md-12'>
                                <label for='status'>Alta/Baja</label>
                                <select class='form-control' id='status' name='status'>";
                                    if($row->status == 0){
                                        $output.= "
                                            <option value='0' selected>Alta</option>
                                            <option value='1'>Baja</option>
                                        ";
                                    }else{
                                        $output.= "
                                            <option value='0'>Alta</option>
                                            <option value='1' selected>Baja</option>
                                        ";
                                    }
                                $output.= "
                                </select>
                            </div>
                            <div class='form-group col-md-12'>
                                <label for='trash'>Borrado</label>
                                <select class='form-control' id='trash' name='trash'>";
                                if($row->trash == 0){
                                    $output.= "
                                        <option value='0' selected>No</option>
                                        <option value='1'>Si</option>
                                    ";
                                }else{
                                    $output.= "
                                        <option value='0'>No</option>
                                        <option value='1' selected>Si</option>
                                    ";
                                }
                                $output.= "
                                </select>
                            </div>
                        </div>

                        <br>
                        <button type='submit' class='btn btn-primary' name='submit'>Edit profile</button>
                        <input type='hidden' name='id' value='$row->id'>
                    </form>
        ";
        
        echo $output;
    }