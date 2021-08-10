<?php    

?>
<div class="w3-top">
  <div class="w3-bar w3-white w3-card" id="myNavbar">
    <a href="pat_home.html" class="w3-bar-item w3-button w3-wide">LOGO</a>
    <!-- Right-sided navbar links -->
    <div class="w3-right w3-hide-small">
      <?php if(isset($_SESSION['login_user'])){ ?>
        <span class="w3-bar-item w3-button">Welcome..<?php  echo $_SESSION['login_user'];?></span>
        <a href="http://localhost/patproject/logout.php" class="w3-bar-item w3-button"><i class="fa fa-user"></i>LOGOUT</a> 
      <?php  }else{ ?>
        <a href="#team" class="w3-bar-item w3-button"><i class="fa fa-user"></i> TEAM</a>
      <a href="#contact" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i> CONTACT</a>
      <?php } ?>
    </div>
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</div>
