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
?>