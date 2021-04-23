<?php
    require_once('header.php');
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-10 offset-1">
            <h1>Create profile</h1>
            <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username">
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
            </form>
        </div>
    </div>
</div>

<?php
    require_once('footer.php');
?>