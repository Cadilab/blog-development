 <?php

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		if(isset($_POST['reg_submit']))
		{
			if(!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['repassword']))
			{
				if($_POST['password'] != $_POST['repassword'])
				{
					$_SESSION['message'] = "Passwords don't match!";
					header("location: register.php");
					exit();					
				}
				else
				{
					$stmt = $connection->prepare("SELECT * FROM users WHERE email = :email OR username = :username");
					$stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
					$stmt->bindParam(':username', $_POST['username'], PDO::PARAM_STR);
					$stmt->execute();

					if($stmt->rowCount() > 0)
					{
						$_SESSION['message'] = "Account with those credentials already exists!";
						header("location: register.php");
						exit();
					}
					else
					{
						$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
						$username = ucfirst($_POST['username']);

						$stmt = $connection->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
						$stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
						$stmt->bindParam(':username', $username, PDO::PARAM_STR);
						$stmt->bindParam(':password', $password, PDO::PARAM_STR);
						$stmt->execute();

						$_SESSION['logged_in'] = true;
						$_SESSION['username'] = $username;

						header("location: index.php");
					}
				}
			}
			else
			{
				$_SESSION['message'] = "All fields are required!";
				header("location: register.php");
				exit();				
			}
		}
		elseif (isset($_POST['login_submit']))
		{
			if(!empty($_POST['username']) && !empty($_POST['password']))
			{
				$stmt = $connection->prepare("SELECT * FROM users WHERE username = :username");
				$stmt->bindParam(':username', $_POST['username'], PDO::PARAM_STR);
				$stmt->execute();

				if($stmt->rowCount() > 0)
				{
					$row = $stmt->fetch(PDO::FETCH_ASSOC);

					$password = $_POST['password'];
					if(password_verify($password, $row['password']))
					{	
						if(isset($_POST['remember_me']))
						{
							$cookiehash = md5(sha1($row['username'] . $row['userid']));
							setcookie("uname", $cookiehash, time()+3600*24*365,'/','.localhost/blog');

							$check = $connection->prepare("UPDATE users SET remember_token = :token WHERE username = :username");
							$check->bindParam(':token', $cookiehash, PDO::PARAM_STR);
							$check->bindParam(':username', $_POST['username'], PDO::PARAM_STR);
							$check->execute();														
						}

						$_SESSION['logged_in'] = true;
						$_SESSION['username'] = $row['username'];
						header("location: index.php");
						exit();
					}	
					else
					{
						$_SESSION['message'] = $lang['INVALID_CREDENTIALS'];
						header("location: login.php");
						exit();
					}
				}
				else
				{
					$_SESSION['message'] = $lang['INVALID_CREDENTIALS'];
					header("location: login.php");
					exit();
				}
			}
		}
	}

 ?>