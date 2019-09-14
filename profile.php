
<?php


session_start();
if (!isset($_SESSION['username'])) {
    header('location:login.php');
}else{
    
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>admin</title>
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
</head>
<body><SCRIPT TYPE="text/javascript">
alert("Login Successfull !!!");
</SCRIPT>
<header style="background-color: brown; height: 90px; width: auto; color: #CCC;">
<center><h4 style="font-size: 37px; color: blue;" >MY ADMIN</h4></center>
</header>
<div class="jumbotron" style="height: 200px;">
	<?php
     $wel = "HELLO";
     echo"<center style='font-size:36px;'>";
     echo ($wel."  ".strtoupper($_SESSION['username']." "."welcome to Base1 Database"));
      echo"</center>";
	?>
	<a href="logout.php" type="button" class="btn btn-danger">Sign Out</a>
	</center>
</div>


<footer style="background-color: "></footer>
</body>
</html>