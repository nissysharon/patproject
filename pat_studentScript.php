<?php
	require "connection.php";

 $name=$email=$rollno=$branch=$passoutyear=$spoj=$codechef=$codeforces=$password=null;
	if ( isset($_POST) and !empty($_POST)) {
		if(isset($_POST['name']) and !empty($_POST['name'])){
			
			if(isset($_POST['email']) and !empty($_POST['email'])){

				if(isset($_POST['rollno']) and !empty($_POST['rollno'])){

					if(isset($_POST['branch']) and !empty($_POST['branch'])){

						if(isset($_POST['pyear']) and !empty($_POST['pyear'])){

							if(isset($_POST['spoj']) and !empty($_POST['spoj'])){

								if(isset($_POST['codechef']) and !empty($_POST['codechef'])){

									if(isset($_POST['codeforces']) and !empty($_POST['codeforces'])){
										 if(isset($_POST['password']) and !empty($_POST['password'])){
											$name=$_POST['name'];
											$email=$_POST['email'];
											$rollno=$_POST['rollno'];
											$branch=$_POST['branch'];
											$passoutyear=$_POST['pyear'];
											$passoutyear=(int)$_POST['pyear'];
											$spoj=$_POST['spoj'];
											$codechef=$_POST['codechef'];
											$codeforces=$_POST['codeforces'];	
											$password=md5($_POST['password']);
										$select_email="select * from student where email ='$email'";		
										$result_email=mysqli_query($con,$select_email) or die(mysqli_error($con));	
										if(mysqli_num_rows($result_email)==0){
											
											$insert_query="insert into student(name,email,rollno,branch,passoutYear,codechef,codeforces,spoj,password) values('$name','$email','$rollno','$branch',$passoutyear,'$codechef','$codeforces','$spoj','$password')";
											$result_insert=mysqli_query($con,$insert_query) or die(mysqli_error($con));
											$_SESSION['email']=$email;
											$_SESSION['name']=$name;
											header('location:studentDashboard.php');
										}
										else{
											  header('location:pat_signup.php?error=emailexist');
										}
									}
										else{
											header('location:pat_signup.php?error=invalidpassword');
										}
									 }
									else{
										header("location:pat_signup.php?error=invalidcodeforce");
									}
								}
								else{
									header("location:pat_signup.php?error=invalidcodechef");
								}
							}
							else{
								header("location:pat_signup.php?error=invalidspoj");
							}
						}
						else{
							header("location:pat_signup.php?error=invalidPyear");
						}	
					}
					else{
						header("location:pat_signup.php?error=invalidbranch");
					}	
				}
				else{
					header("location:pat_signup.php?error=invalidrollno");
				}
			}
			else{
				header("location:pat_signup.php?error=invalidemail");
			}	
		}	
		else {
			header("location:pat_signup.php?error=invalidname");
		}	
	}
	else{
		header("location:pat_signup.php");						
	}
	
	
	
	
	
	?>
