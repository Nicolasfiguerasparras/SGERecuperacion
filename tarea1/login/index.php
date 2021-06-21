<?php 
	require_once('header.php'); 

	$error = "";

	if(func::checkLogin($dbh)){
		if($_SESSION['user_id'] == 1){
			header("Location: ../admin/");
		}else{
			header('Location: ../user/');
		}
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
							// Delete the old session for that user if exists
							$dbh->prepare("DELETE FROM sessions WHERE session_userid = :session_userid")->execute(array(':session_userid'=>$row['id']));
            
							// create token and serial strings
							$token = func::createSerial(40);
							$serial = func::createSerial(40);
						
							setcookie('user_id', $row['id'], time() + (3600 * 24 * 7), "/");
							setcookie('username', $user_username, time() + (3600 * 24 * 7), "/");
							setcookie('token', $token, time() + (3600 * 24 * 7), "/");
							setcookie('serial', $serial, time() + (3600 * 24 * 7), "/");
							
							$_SESSION['user_id'] = $row['id'];
							$_SESSION['username'] = $username;
							$_SESSION['token'] = $token;
							$_SESSION['serial'] = $serial;
													 
							// Restore session in DB with the new data
							$stmt = $dbh->prepare("INSERT INTO `sessions`(`session_id`, `session_token`, `session_serial`, `session_date`, `session_userid`) VALUES (NULL, :token, :serial, now(), :session_userid);");
							$stmt->execute(array(':token'=>$token, ':serial'=>$serial, ':session_userid'=>$row['id']));
						}else{
							// Delete the old session for that user if exists
							$dbh->prepare("DELETE FROM sessions WHERE session_userid = :session_userid")->execute(array(':session_userid'=>$row['id']));
            
							// create token and serial strings
							$token = func::createSerial(40);
							$serial = func::createSerial(40);
							
							$_SESSION['user_id'] = $row['id'];
							$_SESSION['username'] = $username;
							$_SESSION['token'] = $token;
							$_SESSION['serial'] = $serial;
													 
							// Restore session in DB with the new data
							$stmt = $dbh->prepare("INSERT INTO `sessions`(`session_id`, `session_token`, `session_serial`, `session_date`, `session_userid`) VALUES (NULL, :token, :serial, now(), :session_userid);");
							$stmt->execute(array(':token'=>$token, ':serial'=>$serial, ':session_userid'=>$row['id']));
						}
					}else{
						$dbh->prepare("DELETE FROM sessions WHERE session_userid = :session_userid")->execute(array(':session_userid'=>$row['id']));
            
						// create token and serial strings
						$token = func::createSerial(40);
						$serial = func::createSerial(40);
						
						$_SESSION['user_id'] = $row['id'];
						$_SESSION['username'] = $username;
						$_SESSION['token'] = $token;
						$_SESSION['serial'] = $serial;
													
						// Restore session in DB with the new data
						$stmt = $dbh->prepare("INSERT INTO `sessions`(`session_id`, `session_token`, `session_serial`, `session_date`, `session_userid`) VALUES (NULL, :token, :serial, now(), :session_userid);");
						$stmt->execute(array(':token'=>$token, ':serial'=>$serial, ':session_userid'=>$row['id']));
					}
					if($row['id'] == 1){
						header("Location: ../admin/");
					}else{
						header('Location: ../user/');
					}
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