<?php
    require_once('header.php');

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = sha1($_POST['password']);
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $birth_date = $_POST['birth_date'];
        $address = $_POST['address'];
        $postal_code = $_POST['postal_code'];
        $city = $_POST['city'];
        $state = $_POST['state'];

        $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
        $stmt = $dbh->prepare($sql);

        $stmt = $dbh->prepare("INSERT INTO `users` (`id`, 
                                                    `username`, 
                                                    `password`, 
                                                    `first_name`, 
                                                    `last_name`, 
                                                    `email`, 
                                                    `birth_date`, 
                                                    `address`, 
                                                    `postal_code`, 
                                                    `city`, 
                                                    `state`, 
                                                    `member_from`, 
                                                    `status`, 
                                                    `trash`) 
                                            VALUES (NULL, 
                                                    :username, 
                                                    :password, 
                                                    :first_name, 
                                                    :last_name, 
                                                    :email, 
                                                    :birth_date, 
                                                    :address, 
                                                    :postal_code, 
                                                    :city, 
                                                    :state, 
                                                    :member_from, 
                                                    '1', 
                                                    '0')
                                ");
        $stmt->execute(
                        array(
                            ':username' => $username,
                            ':password' => $password, 
                            ':first_name' => $first_name, 
                            ':last_name' => $last_name, 
                            ':email' => $email, 
                            ':birth_date' => $birth_date, 
                            ':address' => $address, 
                            ':postal_code' => $postal_code, 
                            ':city' => $city, 
                            ':state' => $state, 
                            ':member_from' => date('Y-m-d')
                        )
                    );
        $row = $stmt-> fetch(PDO::FETCH_ASSOC);
        
        header("Location: ../user/");
        
    }
?>
<div class="container">

    <div class="row">

        <div class="col-10 offset-1" style="text-align: center">

            <h1>Create profile</h1>

        </div>

    </div>
    <div class="row">
        <div class="col-10 offset-1">
            <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="password">Password</label>
                        <input type="text" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="birth_date">Birth date</label>
                        <input type="date" class="form-control" id="birth_date" name="birth_date">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="postal_code">Postal Code</label>
                        <input type="text" class="form-control" id="postal_code" name="postal_code">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" name="city">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="state">State</label>
                        <input type="text" class="form-control" id="state" name="state">
                    </div>
                </div>

                <br>
                <button type="submit" class="btn btn-primary" name="submit">Create profile</button>
                <a class="btn btn-danger" href="../login/">Go back</a>
            </form>
        </div>
    </div>
</div>

<?php
    require_once('footer.php');
?>