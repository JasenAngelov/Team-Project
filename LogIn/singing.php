<?php 
	if (isset($_POST['creat-button'])){
		$newUser = htmlentities($_POST['new-name']);
		$newPass= htmlentities($_POST['new-pass']) ;
		$newPass2=  htmlentities($_POST['new-pass2']);
		$allData = "";		
		if ((strlen($newUser) > 0) && (strlen($newPass) > 0) && (strlen($newPass2) > 0)){	
		// check to exist incoming input data
			$handle = fopen('assets/pass/pass.txt', 'a+');
			while (!feof($handle)){
				$line = fgets($handle);
				$allData = $allData . $line;
			}
			//check to existing username
			if (substr_count($allData, $newUser)){
				echo "tozi user go ima ! opitaj s drug!";
			} else {
				// check for corec pass
				if ($newPass !== $newPass2){
					echo "Molq vyvedete ednakva parola i na dvete poleta!";
				} else {
					// create a data for new User and Password
					$newACC = $newUser."-".$newPass."-";
					file_put_contents('assets/pass/pass.txt', PHP_EOL . $newACC, FILE_APPEND);
					fclose($handle);
					header('Location: ./LogInPage.php', true, 302);
				}
			}
			fclose($handle);
		} else{
			echo "Molq vyvedete vsichki poleta!";
		}
	}
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
</head>
<body>
	<div id="container">
		<main>
			<form action="./singing.php" method="post">
				<article class="login" >
					<label for="username">Username :</label>
					<input type="text" name="new-name"/>
				<br />
				</article>
				<article class="login">
					<label for="pass">Password :</label>
					<input type="password" name="new-pass" />
				<br />
				</article>
				<article class="login">
					<label for="pass">Repeet password :</label>
					<input type="password" name="new-pass2" />
				<br />
				</article>
				<article class="login">
					<input type="submit" name="creat-button" value="Create"/>
				</article>
			</form>
		</main>
	</div>	
</body>
</html>