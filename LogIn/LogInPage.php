	
<?php 
	if (isset($_POST['relog-button'])){
		$cookie_name = "c_user";
		$cookie_value = ""; // remove logged-in
		$cookie_exp = time() - 3600;// remove login time, and end of cookie
		setcookie($cookie_name, $cookie_value , $cookie_exp , "/");
	}
	
	if (isset($_POST['login-button'])){
		$user = $_POST['username'];
		$pass = $_POST['pass'];
		$data = "";
		$handlePass= fopen('assets/pass/pass.txt', 'r');
			// read row by row
			while (!feof($handlePass)){
				$line = fgets($handlePass);
				// create array whit row data, and compare them with a database
				$arr= explode("-", $line);
				if ($user === $arr[0] && $pass === $arr[1]){
					fclose($handlePass);
					// cookie paramether
					$cookie_name = "c_user";
					$cookie_value  = "logged-in";
					$cookie_exp = time() + 3600; // login time 1hour
					// create cookie
					setcookie($cookie_name, $cookie_value , $cookie_exp , "/");
					// redirect to main-page
					header("Location: main-page.php", true , 302);
					break;
				} else {
					echo "Wrong Username or Password <br />";
				}
			}
		fclose($handlePass);
		}
		
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
	<link rel="stylesheet" href="assets/css/css.css" type="text/css"/>
</head>
<body>	

	<div id="container">
		<main>
			<form action="LogInPage.php" method="post">
				<article class="text" >
					<label for="username">Username :</label>
					<input type="text" name="username"/>
				<br />
				</article>
				<article class="text">
					<label for="pass">Password :</label>
					<input type="password" name="pass" />
				<br />
				</article>
				<article class="login">
					<input type="submit" name="login-button" value="login"/>
				</article>
			</form>
			
			<form action="./singing.php" method="get">
				<article class="login">
					<input type="submit" name="singin-button" value="Singign"/> 	 	
				</article>
			</form>
		</main>
	</div>	
</body>
</html>