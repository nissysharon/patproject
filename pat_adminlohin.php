
<?php
 require "connection.php";
//   include 'adminScript.php';
//   $ad=new AdminDashboard();
//   $ad->generateData();
//   print_r($ad->orderStudents("Branch")); exit(); 

?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
       
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
       
       <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
.mySlides {display: none}

.loader-cc {  
            position: relative;  
            left: 0px;  
            top: 0px;  
            width: 100%;  
            height: 100%;  
            z-index: 9999;  
            background: url('tranparent_gip.gif') 50% 50% no-repeat rgb(249,249,249);  
            }  
</style>
</head>
<body>
<!-- Sidebar/menu -->

<header class="w3-top" >
  <div class="w3-bar w3-white w3-card w3-black w3-large" id="myNavbar">
    <div class="w3-right w3-hide-small">
        <a href="pat_home.html" class="w3-bar-item w3-button w3-wide">LOGO</a>
    </div>
  </div>
</header>
<br><br><br>
<nav class="w3-sidebar w3-light-grey w3-collapse w3-top" style="z-index:3;width:300px;margin-top: 42px;" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-transparent w3-display-topright"></i>
    <h3>Admin DashBoard</h3>
    <hr>
    <!--<form action="http://localhost/pat/pat_.php" method="post">-->
        <a  id="overall"><button class="btn"> Overall Score</button><br><br></a>
        <a  id="name"><button class="btn"> Name</button><br><br>
        <a  id="year"><button class="btn"> Passout year</button><br><br>
        <a  id="branch"><button class="btn"> Branch</button><br><br>
        <a  id="Spoj"><button class="btn">Spoj</button><br><br>
        <a  id="codechef"><button class="btn"> Codechef</button><br><br>
        <a  id="codeforces"><button class="btn"> CodeForces</button><br><br>
   </div>
  <div class="w3-bar-block">
  </div>
</nav>

<!--<header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
  <span class="w3-bar-item">Resorts</span>
  <a href="javascript:void(0)" class="w3-right w3-bar-item w3-button" onclick="w3_open()"><i class="fa fa-bars"></i></a>
</header>-->

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main w3-white" style="margin-left:230px">

  <!-- Push down content on small screens -->
  <div class="w3-hide-large" style="margin-top:80px"></div>

        <div class="container">
            <div class="row">
                    <div class="col-md-11">
                    <div class="loader-cc" style="display:none;height:228px;"> </div>
                    <div id="response" >
                        <h4>CodeChef</h4>
                    </div>  
                    </div>
            </div>
        </div>

    <script>
            $.ajax({
          url:'pat_AdminChange.php',
          type:'post',
          data:{filter:'OVERALL'},
          beforeSend: function(){
            $('#response').empty();
            $('#response').hide();  
            $(".loader-cc").show();
          },
          success: function(response){
          $('#response').show();
          $('#response').empty();
          $('#response').append(response);
          },
          complete:function(data){
          $(".loader-cc").hide();
          } 
        });

        $('#overall').click(function(){
            console.log("overalll");
            $.ajax({
          url:'pat_AdminChange.php',
          type:'post',
          data:{filter:'OVERALL'},
          beforeSend: function(){
            $('#response').empty();
            $('#response').hide();  
            $(".loader-cc").show();
          },
          success: function(response){
          $('#response').show();
          $('#response').empty();
          $('#response').append(response);
          },
          complete:function(data){
          $(".loader-cc").hide();
          } 
        }); 
        });

        $('#codechef').click(function(){
            console.log("cc");
            $.ajax({
          url:'pat_AdminChange.php',
          type:'post',
          data:{filter:'Codechef'},
          beforeSend: function(){
            $('#response').empty();
            $('#response').hide();  
            $(".loader-cc").show();
          },
          success: function(response){
          $('#response').show();
          $('#response').empty();
          $('#response').append(response);
          },
          complete:function(data){
          $(".loader-cc").hide();
          } 
        }); 
        });

        $('#codeforces').click(function(){
            console.log("cf");
            $.ajax({
          url:'pat_AdminChange.php',
          type:'post',
          data:{filter:'Codeforces'},
          beforeSend: function(){
            $('#response').empty();
            $('#response').hide();  
            $(".loader-cc").show();
          },
          success: function(response){
          $('#response').show();
          $('#response').empty();
          $('#response').append(response);
          },
          complete:function(data){
          $(".loader-cc").hide();
          } 
        }); 
        });

        $('#Spoj').click(function(){
            console.log("sp");
            $.ajax({
          url:'pat_AdminChange.php',
          type:'post',
          data:{filter:'Spoj'},
          beforeSend: function(){
            $('#response').empty();
            $('#response').hide();  
            $(".loader-cc").show();
          },
          success: function(response){
          $('#response').show();
          $('#response').empty();
          $('#response').append(response);
          },
          complete:function(data){
          $(".loader-cc").hide();
          } 
        }); 
        });

        $('#name').click(function(){
            console.log("name");
            $.ajax({
          url:'pat_AdminChange.php',
          type:'post',
          data:{filter:'Name'},
          beforeSend: function(){
            $('#response').empty();
            $('#response').hide();  
            $(".loader-cc").show();
          },
          success: function(response){
          $('#response').show();
          $('#response').empty();
          $('#response').append(response);
          },
          complete:function(data){
          $(".loader-cc").hide();
          } 
        }); 
        });


        $('#year').click(function(){
            console.log("passY");
            $.ajax({
          url:'pat_AdminChange.php',
          type:'post',
          data:{filter:'PYear'},
          beforeSend: function(){
            $('#response').empty();
            $('#response').hide();  
            $(".loader-cc").show();
          },
          success: function(response){
          $('#response').show();
          $('#response').empty();
          $('#response').append(response);
          },
          complete:function(data){
          $(".loader-cc").hide();
          } 
        }); 
        });

        $('#branch').click(function(){
            console.log("br");
            $.ajax({
          url:'pat_AdminChange.php',
          type:'post',
          data:{filter:'Branch'},
          beforeSend: function(){
            $('#response').empty();
            $('#response').hide();  
            $(".loader-cc").show();
          },
          success: function(response){
          $('#response').show();
          $('#response').empty();
          $('#response').append(response);
          },
          complete:function(data){
          $(".loader-cc").hide();
          } 
        }); 
        });

    </script>
</body>
</html>