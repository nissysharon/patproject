<?php
   $servername="localhost";
	$username="root";
	$password="";
	$dbname="res";
	$con = mysqli_connect('localhost','root','','res');
	if(!$con)
	{
		die('Error in Connection'.mysqli_error());
	}
	$sel = mysqli_select_db($con , 'res');
	if(!$sel)
	echo " <br> Database not selected";
   session_start();
	$N = $_REQUEST['Name'];
	$E = $_REQUEST['Email'];
	$S =$_REQUEST['Subject'];
	$M = $_REQUEST['Message'];
	$sql="INSERT INTO `messagebox` (`name`, `email`, `subject`, `message`) VALUES ('$N', '$E', '$S', '$M')";
   if(mysqli_query($con, $sql)){
   	header("location:pat_home.html");
   }
   mysqli_close($con);
   ?>
