<?php
    require_once('header.php');

    if(isset($_GET['user_id'])){
        $queryUser = "SELECT * FROM users WHERE id = $_GET[user_id]";
        $stmt = $dbh->prepare($queryUser);
        $stmt->execute();
    
        $row = $stmt->fetch();
    }
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
        $queryEdit = "  UPDATE `users` 
                        SET `username` = '$username', 
                                         `first_name` = '$first_name', 
                                         `last_name` = '$last_name', 
                                         `email` = '$email', 
                                         `birth_date` = '$birth_date', 
                                         `address` = '$address', 
                                         `postal_code` = '$postal_code', 
                                         `city` = '$city', 
                                         `state` = '$state' 
                        WHERE `users`.`id` = $id";
        $stmt = $dbh->prepare($queryEdit);
        $stmt->execute();
        header("Location: index.php");
    }
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-10 offset-1">
            <h1>Edit profile</h1>
            <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?php echo $row->username; ?>" readonly>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $row->first_name; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $row->last_name; ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?php echo $row->email; ?>">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="birth_date">Birth date</label>
                        <input type="date" class="form-control" id="birth_date" name="birth_date" value="<?php echo $row->birth_date; ?>">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="<?php echo $row->address; ?>">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="postal_code">Postal Code</label>
                        <input type="text" class="form-control" id="postal_code" name="postal_code" value="<?php echo $row->postal_code; ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" name="city" value="<?php echo $row->city; ?>">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="state">State</label>
                        <input type="text" class="form-control" id="state" name="state" value="<?php echo $row->state; ?>">
                    </div>
                </div>

                <br>
                <button type="submit" class="btn btn-primary" name="submit">Edit profile</button>
                <input type="hidden" name="id" value="<?php echo $row->id; ?>">
            </form>
        </div>
    </div>
</div>




<!-- Modal -->
    <!-- <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-full-height modal-right">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="inputAddress">Username </label>
                            <input type="text" class="form-control" id="inputAddress" value="">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Password</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">First name</label>
                            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Last name</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Email account</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Address</label>
                            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Address</label>
                            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Address</label>
                            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Address</label>
                            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                
                </form>
            </div>
        </div>
    </div> -->


