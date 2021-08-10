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
   if(!$sel){
   echo " <br> Database not selected";
   }


   session_start();
    $username = $_POST['username'];  
    $password = $_POST['pwd'];  
   

      // username and password sent from form 
      $myusername = stripcslashes($username);  
      $mypassword = stripcslashes($password);  
      $myusername = mysqli_real_escape_string($con,$username);
      $mypassword = mysqli_real_escape_string($con,$password); 
      
      $sql = "SELECT * FROM student WHERE email = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_row($result);
      
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         header("location: http://localhost/patproject/welcome.php"); 
         
      }else {
         echo "<center><h1 style='color:blue;backgroud-color:whitesmoke;padding:16px'>Your Login Name or Password is invalid</h1></center>";
         header("refresh:3;url=pat_login.html");
      }
?>
