<html>
<head>
   <title>welcome</title>
   <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
       
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <style>

.w3-bar .w3-button {
  padding: 16px;
}
   /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
   .row.content {height: 550px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
        
    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;} 
    }

    .loader-cc {  
            position: relative;  
            left: 0px;  
            top: 0px;  
            width: 100%;  
            height: 100%;  
            z-index: 9999;  
            background: url('tranparent_gip.gif') 50% 50% no-repeat rgb(249,249,249);  
            }  
            .loader-cf {  
            position: relative;  
            left: 0px;  
            top: 0px;  
            width: 100%;  
            height: 100%;  
            z-index: 9999;  
            background: url('tranparent_gip.gif') 50% 50% no-repeat rgb(249,249,249);  
            }  
            .loader-s {  
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
   
   $ses_sql = "select email from student where email = '$user_check' ";
   $result=mysqli_query($con,$ses_sql);
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   
   $login_session = $row[0];
   
   if(!isset($_SESSION['login_user'])){
      header("location:http://localhost/patproject/pat_login.php");
      die();
   }
?>
<?php include "pat_header.php"?> <br><br><br>
<div class="container-fluid">
  <div class="row content">
    <!--<div class="col-sm-3 sidenav hidden-xs">
      <h2>Coding Platforms</h2>
      <ul class="nav nav-pills nav-stacked">
        <li><a style="cursor:pointer;" id="ccbtn">CodeChef</a></li>
        <li><a style="cursor:pointer;" id="cfbtn">Codeforces</a></li>
        <li><a style="cursor:pointer;" id="sbtn">Spoj</a></li>
        <li><a href="#section3"></a></li>
      </ul><br>
    </div>
    <br>-->
    
    <div class="col-sm-9">
      <div class="well">
        <h4>Student Dashboard</h4>
        <!-- <p>Some text..</p> -->
      </div>
      <div class="row">
        <div class="col-md-4">
        <div class="loader-cc" style="display:none;height:168px;"> </div>
          <div class="well" id="codechef" >
            <h4>CodeChef</h4>
          </div>
        </div>
        <div class="col-md-4"> 
        <div class="loader-cf" style="display:none;height:168px;"> </div>
          <div class="well" id="codforces">
            <h4>Codeforces</h4>
          </div>
        </div>
        <div class="col-md-4">  
        <div class="loader-s" style="display:none;height:168px;"> </div>
          <div class="well" id="spoj">
            <h4>Spoj</h4>
            
          </div>
        </div>
    </div>
  </div>
</div>

    <script>
        // $('#codechef').load('stujudge.php',{platform:'codechef'})
        $.ajax({
          url:'pat_stujudge.php',
          type:'post',
          data:{platform:'codechef'},
          beforeSend: function(){
            $('#codechef').empty();
            $('#codechef').hide();  
            $(".loader-cc").show();
          },
          success: function(response){
          $('#codechef').show();
          $('#codechef').empty();
          $('#codechef').append(response);
          },
          complete:function(data){
          $(".loader-cc").hide();
          } 
        });

        $.ajax({
          url:'pat_stujudge.php',
          type:'post',
          data:{platform:'codeforce'},
          beforeSend: function(){
            $('#codforces').empty();
            $('#codforces').hide();  
            $(".loader-cf").show();
          },
          success: function(response){
          $('#codforces').show();
          $('#codforces').empty();
          $('#codforces').append(response);
          },
          complete:function(data){
          $(".loader-cf").hide();
          } 
        });

        $.ajax({
          url:'pat_stujudge.php',
          type:'post',
          data:{platform:'spoj'},
          beforeSend: function(){
            $('#spoj').empty();
            $('#spoj').hide();  
            $(".loader-s").show();
          },
          success: function(response){
          $('#spoj').show();
          $('#spoj').empty();
          $('#spoj').append(response);
          },
          complete:function(data){
          $(".loader-s").hide();
          } 
        });


        // $('#codforces').load('stujudge.php',{platform:'codeforce'})
        // $('#spoj').load('stujudge.php',{platform:'spoj'})
        $('#ccbtn').click(function(){
          //  $('#codechef').load('stujudge.php',{platform:'codechef'})    
           $.ajax({
          url:'pat_stujudge.php',
          type:'post',
          data:{platform:'codechef'},
          beforeSend: function(){
            $('#codechef').empty();
            $('#codechef').hide();  
            $(".loader-cc").show();
          },
          success: function(response){
          $('#codechef').show();
          $('#codechef').empty();
          $('#codechef').append(response);
          },
          complete:function(data){
          $(".loader-cc").hide();
          } 
        });
        });
        $('#cfbtn').click(function(){
          //  $('#codforces').load('stujudge.php',{platform:'codeforce'})    
          $.ajax({
          url:'pat_stujudge.php',
          type:'post',
          data:{platform:'codeforce'},
          beforeSend: function(){
            $('#codforces').empty();
            $('#codforces').hide();  
            $(".loader-cf").show();
          },
          success: function(response){
          $('#codforces').show();
          $('#codforces').empty();
          $('#codforces').append(response);
          },
          complete:function(data){
          $(".loader-cf").hide();
          } 
        });
        });
        $('#sbtn').click(function(){
          //  $('#spoj').load('stujudge.php',{platform:'spoj'}) 
           $.ajax({
          url:'pat_stujudge.php',
          type:'post',
          data:{platform:'spoj'},
          beforeSend: function(){
            $('#spoj').empty();
            $('#spoj').hide();  
            $(".loader-s").show();
          },
          success: function(response){
          $('#spoj').show();
          $('#spoj').empty();
          $('#spoj').append(response);
          },
          complete:function(data){
          $(".loader-s").hide();
          } 
        });   
        });
    </script>   
  
   
  <!-- <body>
      <h1>Welcome <?php echo $login_session; ?></h1> 
      <h2><a href = "logout.php">Sign Out</a></h2>
   </body>-->
 </div>
 </body>  
</html>