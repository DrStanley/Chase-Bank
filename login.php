<?php


session_start();
$new = new PDO("mysql:host=localhost;dbname=base1","root","");

?>
<!DOCTYPE html>
<html lang="en-US">
<meta charset="UTF-8"/>
<html>
<head>
	<title>Login</title>
  <link rel="shortcut icon" href="images/yeye.png">

	<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="css/main.css">	
<link rel="stylesheet" href="css/icomoon.css">
<link rel="stylesheet" href="css/animate.css">
<link rel="stylesheet" href="css/transition.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="css/color.css">
<link rel="stylesheet" href="css/responsive.css">

<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i,800|Open+Sans:400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
<!-- JavaScripts -->
<script src="js/vendor/modernizr.js"></script>
</head>
<body>

<li class="login-modal">
<div  id="login-modal">
						  	<div class="login-form position-center-center">
								<h2   style="color: #028fcc; " id=>Sign In</h2>
								<form method="POST">
	 <?php
                
    if (isset($_POST['submit'])) {
    $name = $_POST['username'];
    $pass = $_POST['password'];
    
      $select = $new->prepare("SELECT * FROM login WHERE username='$name' AND password='$pass'");
    $select->setFetchMode(PDO::FETCH_ASSOC);
    $select->execute();
    $data = $select->fetch();
    if ($data['username']!=$name AND  $data['password']!=$pass) { 
        echo "<center style='color:red;'>invalid username 0r password</center>";
    }
    elseif ($data['username']==$name OR $data['password']==$pass) {
        
      $_SESSION['username']=$data['username'];
     
      header("location:profile.php");

    }

}
?>
									<div class="form-group">
										<label for="username" style="color: #028fcc; ">Username:</label>
										<input type="text" class="form-control" name="username" placeholder="username">
										
									</div>
									<div class="form-group">
										<label for="password"  style="color: #028fcc; " >Password:</label>
										<input type="password" class="form-control" name="password" placeholder="**********">
										
									</div>
									<div class="form-group">
									    <button class="btn full-width blue-btn" type="submit" name="submit">Login</button>
									</div>
								</form>
								
								
							</div>
						</div>
</li>
</body>
</html>