<html>
<head>
<title>CodeForces Scores</title>
</head>
<body onload="doOnLoad();">
<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
.mySlides {display: none}
</style>
</head>
<body class="w3-content w3-border-left w3-border-right">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-light-grey w3-collapse w3-top" style="z-index:3;width:200px" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-transparent w3-display-topright"></i>
    <h3>Student Details</h3>
    <hr>
    <!--<form action="http://localhost/pat/pat_.php" method="post">-->
    	<a href="http://localhost/patproject/pat_overallscore.php"><button class="btn active"> Overall Score</button><br><br></a>
		<a href="http://localhost/patproject/pat_name.php"><button class="btn"> Name</button><br><br>
		<a href="http://localhost/patproject/pat_year.php"><button class="btn"> Passout year</button><br><br>
		<a href="http://localhost/patproject/pat_branch.php"><button class="btn"> Branch</button><br><br>
  		<a href="http://localhost/patproject/pat_hackerrank.php"><button class="btn"> Hackerrank</button><br><br>
  		<a href="http://localhost/patproject/pat_codechef.php"><button class="btn"> Codechef</button><br><br>
  		<a href="http://localhost/patproject/pat_codeforces.php"><button class="btn"> CodeForces</button><br><br>
   </div>
  <div class="w3-bar-block">
  </div>
</nav>

<header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
  <span class="w3-bar-item">Resorts</span>
  <a href="javascript:void(0)" class="w3-right w3-bar-item w3-button" onclick="w3_open()"><i class="fa fa-bars"></i></a>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main w3-white" style="margin-left:230px">

  <!-- Push down content on small screens -->
  <div class="w3-hide-large" style="margin-top:80px"></div>


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
	$re = mysqli_query($con ,"SELECT Distinct* From scores");

	
	echo "<center><caption><font color=blue font face='verdana' size='5pt'> Year wise Details </font></caption></center>";
	?>
	<br><br>
	<table id="myTable" border=2>
		<center>
			<?php
				if ($re->num_rows > 0) {
					
					echo "<tr> <th> Name </th> <th> RollNo </th> <th> Branch </th> <th> Year </th>  <th> Hackerrank </th> <th> CodeChef </th> <th> CodeForces </th></tr> ";
					while($row = mysqli_fetch_array($re))
					{
						echo "<tr> <td> ";
						echo $row['name'];
						echo "</td>";
						echo " <td> ";
						echo $row['rollno'];
						echo "</td>";
						
						echo " <td> ";
						echo $row['branch'];
						echo " </td> ";
						echo " <td> ";
						echo $row['year'];
						echo " </td> ";
						echo " <td> ";
						echo $row['hackerrank'];
						echo " </td> ";
						echo " <td> ";
						echo $row['codechef'];
						echo " </td> ";
						echo " <td> ";
						echo $row['codeforces'];
						echo " </td> ";
						echo " <td></tr> ";
						
					}
					
				}
			?>
		</center>
	</table>
</body>
</html>