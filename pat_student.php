<html>
<body>

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
		$N = $_REQUEST['uname'];
		$E = $_REQUEST['username'];
		$P =$_REQUEST['pwd'];
		$R = $_REQUEST['rno'];
		$B = $_REQUEST['brh'];
		$Y = $_REQUEST['yr'];
		$SJ = $_REQUEST['sj'];
		$CC = $_REQUEST['cc'];
		$CF = $_REQUEST['cf'];
		$S =$_REQUEST['id'];
		$sql = "INSERT INTO  `student` (`name`, `email`, `password`, `rollno`, `branch`, `year`, `spoj`, `codechef`, `codeforces`, `id`) VALUES('$N','$E','$P','$R','$B',$Y,'$SJ','$CC','$CF',$S)";
		if(mysqli_query($con ,$sql)){
			echo "<center>Registered Successfully</center>";
		}
	header("refresh:3;url=pat_login.html");
	mysqli_close($con);
	?>
	
</body>
</html>
