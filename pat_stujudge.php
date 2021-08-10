<?php
include 'connection.php';
$platform=$codechef_un=$codeforces_us=$spoj_us=null;
session_start();
$email=$_SESSION['login_user'];
if(isset($_POST)){
    if(isset($_POST['platform']) and !empty($_POST['platform'])){
        $platform=$_POST['platform'];
        $select="select codechef,codeforces,spoj from student where email='$email'";
        $result=mysqli_query($con,$select);
        if(mysqli_num_rows($result)>0) {
            $row=mysqli_fetch_row($result) or die(mysqli_error($con));
            $codechef_un=$row[0];
            $codeforces_us=$row[1];
            $spoj_us=$row[2];
            if($platform=="codechef"){
                $curl=curl_init();
                curl_setopt($curl,CURLOPT_URL,'http://all-cp-platforms-api.herokuapp.com/api/codechef/'.$codechef_un);
                curl_setopt($curl,CURLOPT_RETURNTRANSFER,true); 
                $result=curl_exec($curl);
                $result_decode=json_decode($result,true);
             ?>
             <h4>CodeChef </h4>
                <?php if($result_decode['status']=="OK"){ ?>
                <p>Rating : <?php echo $result_decode['rating']."/".$result_decode['max_rating'] ?> </p>  
                <p>Global Rank : <?php echo $result_decode['global_rank'] ?> </p>  
                <p>Country Rank : <?php echo $result_decode['country_rank'] ?> </p>  
                <?php } else if($result_decode['status']=="FAILED"){ ?>
                    <p>Invalid Username</p>
                <?php } ?>
             <?php
            }
            else if($platform=="codeforce"){
                $curl=curl_init();
                curl_setopt($curl,CURLOPT_URL,'http://all-cp-platforms-api.herokuapp.com/api/codeforces/'.$codeforces_us);
                curl_setopt($curl,CURLOPT_RETURNTRANSFER,true); 
                $result=curl_exec($curl);
                $result_decode=json_decode($result,true);
                ?>
                <h4>Codeforces </h4>
                <?php if($result_decode['status']=="OK"){ ?>
                <p>Rating : <?php echo $result_decode['rating']."/".$result_decode['maxRating'] ?> </p>  
                <p>Contribution : <?php echo $result_decode['contribution'] ?> </p>  
                <p>Rank : <?php echo $result_decode['rank'] ?> </p>  
                <?php } else if($result_decode['status']=="FAILED"){ ?>
                    <p>Invalid Username</p>
                <?php } ?>
                <?php   
            }
            else if($platform=="spoj"){
                $curl=curl_init();
                curl_setopt($curl,CURLOPT_URL,'http://all-cp-platforms-api.herokuapp.com/api/spoj/'.$spoj_us);
                curl_setopt($curl,CURLOPT_RETURNTRANSFER,true); 
                $result=curl_exec($curl);
                $result_decode=json_decode($result,true);
                ?>  
                 <h4>Spoj </h4>
                <?php if($result_decode['status']=="OK"){ ?>
                <p>World Rank : <?php echo $result_decode['world_rank']; ?> </p>  
                <p>Problems solved : <?php echo $result_decode['Problems solved'] ?> </p>  
                <p>Solution Submitted : <?php echo $result_decode['Solutions submitted'] ?> </p>  
                <?php } else if($result_decode['status']=="FAILED"){ ?>
                    <p>Invalid Username</p>
                <?php } ?>
                <?php
            }
        }
        else{
            echo "<p>somthing went wrong..</p>";
        }
    }
    else{
        echo "<p>somthing went wrong..</p>";
    }
}




?>