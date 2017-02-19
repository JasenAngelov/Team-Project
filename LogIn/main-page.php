<?php 
	//chek cookie exist to stay in the page!
	if (count($_COOKIE['c_user']) > 0){
		echo "bravo ti se lognat <br />";
	}else {
		header("Location: ./error.php", true , 302);
	}
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Mine-page</title>
</head>
<body>
	<figure>
		<img alt="logo=name" src="assets/img/logo.png">
		<figcaption>Tova e logoto na naj-qki sait!</figcaption>
	</figure>
	
	<form action="LogInPage.php" method="post">
	<input type="submit" name="relog-button" value="relog"/>
	</form>
</body>
</html>