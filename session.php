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
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($con,"select email from student where email = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['email'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:http://localhost/patproject/pat_login.php");
      die();
   }
?>