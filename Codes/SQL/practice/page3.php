<?php 
session_start ();
if(!isset($_SESSION["login"])) {
}else {
	header("location:login.php");
	}
?>

<center><h1> Welcome to page 3 </h1></center>
<a href="page1.php"><h2><font color="blue">PAGE 1</font></h2>
<a href="page2.php"><h2><font color="blue">PAGE 2</font></h2>
<br>
<a href="logout.php"><h2><font color="red">Logout</font></h2></a>