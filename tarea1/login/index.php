<?php 
	require_once('header.php'); 

	$error = "";

	if(func::checkLogin($dbh)){
		header('Location: index.php');
	}else{
		if(isset($_POST['submit'])){
			if(isset($_POST['user']) && isset($_POST['password']) && !empty($_POST['user']) && !empty($_POST['password'])){
				$username = $_POST['user'];
				$password = sha1($_POST['password']);
				$sql = "SELECT * FROM users WHERE username = :username AND password = :password";
				$stmt = $dbh->prepare($sql);
				$stmt->bindValue(':username', $username);
				$stmt->bindValue(':password', $password);
				$stmt->execute();
				$row = $stmt-> fetch(PDO::FETCH_ASSOC);
				if($row){
					// Check if user wants to remember session
					if(isset($_POST['remember'])){
						if($_POST['remember'] == 1){
							func::recordSession($dbh, $row['users_id'], $username, 1);
						}else{
							func::recordSession($dbh, $row['users_id'], $username, 0);
						}
					}
					header('Location: ../index.php');
				}else{
					$error = 1; // No user with those credentials
				}
			}else{
				$error = 2; // User or password empty
			}
		}
	}
?>


    <div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="https://static.thenounproject.com/png/178831-200.png" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="user" class="form-control input_user" placeholder="username">
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="password" class="form-control input_pass" placeholder="password">
						</div>
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" name="remember" class="custom-control-input" id="remember">
								<label class="custom-control-label" for="remember">Remember me</label>
							</div>
						</div>
						<div class="d-flex justify-content-center mt-3 login_container">
							<button type="submit" name="submit" class="btn login_btn">Login</button>
						</div>
					</form>
				</div>
		
				<div class="mt-4">
					<div class="d-flex justify-content-center links">
						Don't have an account? <a href="register.php" class="ml-2">Sign Up</a>
					</div>
				</div>

				<div class="d-flex justify-content-center">
					<?php
						if($error == 1){
							echo "<h3 style='color: blue'>Wrong credentials</h3>";
						}
					?>
				</div>
			</div>
		</div>
	</div>


    
<?php require_once('footer.php'); ?>