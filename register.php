<html>
<html lang="en-US">
<meta charset="UTF-8"/>
<head>
<title>Register</title>
  <link rel="shortcut icon" href="images/yeye.png">
<link type="text/css" rel="stylesheet" href="css/reg.css"/>
<script type="text/javascript" src="js/jquery-3.3.1.js"></script>
<script type="text/javascript" src="js/jvsc.js"></script>

  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet"> 
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/lightbox.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
  <link id="css-preset" href="css/presets/preset1.css" rel="stylesheet">
  <link href="css/responsive.css" rel="stylesheet">
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>  
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
</head>
<body>
	<?php 	
$con = new PDO("mysql:dbname=cscfunai_g2_user_account","cscfunai_g2","Cf3NCEs6tRXm");


if(isset($_POST["submit"])){
	$uln =  $_POST['fname'];
	$up  =  $_POST['sname'];
	$day =  $_POST['day'];
	$mon =  $_POST['month'];
	$yr =  $_POST['year'];
	$un =  $_POST['user'];
	$pw =  $_POST['pass'];
	$cpw =  $_POST['conpass'];
	$uel = $yr."-".$mon."-".$day;
	$ust =  $_POST['sex'];
	$checkbox = join(", ", $_POST['hobbies']);
	if ($pw != $cpw) {
    echo "inconsistent password";
	exit();
	}
	$p = sha1($pw);
	//echo $yr;
	$send = $con->prepare("INSERT INTO  user_data (first_name,surname,dob,gender,hobbies)VALUES(:uln,:up,:uel,:ust,:checkbox)");
			$send->bindParam(':uln',$uln);
			$send->bindParam(':up',$up);
			$send->bindParam(':uel',$uel);
			$send->bindParam(':ust',$ust);
			$send->bindparam(':checkbox',$checkbox);
			$den = $send->execute();
			$last =	$con->lastInsertId();
			if ($den) {
				$cpass = $con->prepare("INSERT INTO user_authentication(user_id,username,password,date_time_created)VALUES( :last, :un, :p, NOW())");
				$cpass->bindParam(':last',$last);
				$cpass->bindParam(':un',$un);
				$cpass->bindParam(':p',$p);
				$submited = $cpass->execute();
				if ($submited) {
					echo "<script> alert(\"Registration Successful\");
					window.location = \"Login.php\";</script>";
				}
			}else{
				echo "Not Good $last";
			}
			/*	
			}
			*/
		
	
	exit();
}

?>

<form method ="POST">
	<div id = "reg"> <h1>Register </h1>
	<p>pls fill out the form</p></div>
<div id="formcon" >

 Firstname: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<input type="text" name="fname" size="30"></br><br/>
 Surname:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; <input type="text" name="sname"size="30"></br><br/>



Date of Birth: &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
 Year: <select name="year">
 <option value="2018">2018</option>
	  <option name="year" value="2017">2017</option>
	  <option value="2016">2016</option>
	  <option value="2015">2015</option>
	  <option value="2014">2014</option>
	  <option value="2013">2013</option>
	  <option value="2012">2012</option>
	  <option value="2011">2011</option>
	  <option value="2010">2010</option>
	  <option value="2009">2009</option>
	  <option value="2008">2008</option> 
	  <option value="2007">2007</option>
	  <option value="2006">2006</option>
	  <option value="2005">2005</option>
	  <option value="2004">2004</option>
	  <option value="2003">2003</option>
	  <option value="2002">2002</option>
	  <option value="2001">2001</option>
	  <option value="2000">2000</option>
	  <option value="1999">1999</option>
	  <option value="1998">1998</option>
	  <option value="1997">1997</option>
	  <option value="1996">1996</option>
	  <option value="1995">1995</option>
	  <option value="1994">1994</option>
	  <option value="1993">1993</option>
	  <option value="1992">1992</option>
	  <option value="1991">1991</option>
	  <option value="1990">1990</option>
	  <option value="1989">1989</option>
	  <option value="1988">1988</option>
	  <option value="1987">1987</option>
	  <option value="1986">1986</option>
	  <option value="1985">1985</option>
	  <option value="1984">1984</option>
	  <option value="1983">1983</option>
	  <option value="1982">1982</option>
</select> 
 Month: <select name="month">
<option name="month" value="january">Jan</option>
<option value="febuary">Feb</option>
<option value="march">Mar</option>
<option value="april">Apr</option>
<option value="may">May</option>
<option value="june">Jun</option>
<option value="july">Jul</option>
<option value="august">Aug</option>
<option value="september">Sep</option>
<option value="october">Oct</option>
<option value="november">Nov</option>
<option value="december">Dec</option>

</select> 
Day: <select name="day">

<option name="day" value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>

</select> 


 </br> </br>
 Sex : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; <input type="radio" name="sex" value="M">Male   <input type="radio" name="sex" value="F">Female
 </br> </br>

 Hobies: 
 &nbsp;&nbsp;&nbsp;&nbsp; 	<li><input id= "read" type="checkbox" name="hobbies[]"value="Reading">Reading</li>
 <li><input type="checkbox" name="hobbies[]"value="Playing games">Playing games</li>
 <li><input type="checkbox" name="hobbies[]"value="Swimming">Swimming</li>
 <li><input type="checkbox" name="hobbies[]"value="Eating">Eating</li>
<li><input type="checkbox" name="hobbies[]"value="Sleeping">Sleeping</li>
<li><div id="otheres"><input id="b" type="checkbox" name="hobbies[]" value="Reading">Others</br>
<span id="new"></span></div></li>
</ul> </br> 

Username:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<input type="text" name="user"><br/><br/>
Password: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<input type="password" name="pass"><br/><br/>
Confirm password:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<input type="password" name="conpass"><br/><br/>
	<div id="sub"><input type="submit" name="submit" value="Register"></div>




</div>


</form>


</body>

</html>