<?php
include 'pat_adminscript.php';
//   print_r($ad->orderStudents("Branch")); exit();	

$filter=null;
if(isset($_POST) and !empty($_POST)){
    if(isset($_POST['filter']) and !empty($_POST['filter'])){
        $filter=$_POST['filter'];
        $ad=new AdminDashboard();
        $ad->generateData();
        $result=$ad->get_list();
        // print_r($result);exit();
        if($filter=="OVERALL"){
            ?>
            <h2>Overall Score</h2>
            <div class="table-responsive" style="height:510px;border:1px solid black">
            <table class="table">
                <thead>
                    <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Roll No</th>
                            <th>Branch</th>
                            <th>Passout Year</th>
                            <th>CodeChef Username</th>
                            <th>Codechef rating</th>
                            <th>Codeforces Username</th>
                            <th>Codeforce rating</th>
                            <th>Spoj Username</th>
                            <th>Spoj rank</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($result as $key => $val){ ?>
                        <tr>
                            <td><?php echo $key+1; ?></td>
                            <td><?php  echo $val->get_name();  ?></td>
                            <td><?php  echo $val->get_rollno();  ?></td>
                            <td><?php  echo $val->get_branch();  ?></td>
                            <td><?php  echo $val->get_YoPass(); ?></td>
                            <td><?php if($val->get_status_cc()){echo $val->get_Codechef()->get_username();}else{ echo '<span style="color:red;">invalid username</span>';}  ?></td>
                            <td><?php if($val->get_status_cc()){echo $val->get_Codechef()->get_rating();}else{ echo '-';}  ?></td>
                            <td><?php if($val->get_status_cf()){echo $val->get_Codeforces()->get_username();}else{ echo '<span style="color:red;">invalid username</span>';}  ?></td>
                            <td><?php if($val->get_status_cf()){echo $val->get_Codeforces()->get_rating();}else{ echo '-';}  ?></td>
                            <td><?php if($val->get_status_s()){echo $val->get_Spoj()->get_username();}else{ echo '<span style="color:red;">invalid username</span>';}  ?></td>
                            <td><?php if($val->get_status_s()){echo $val->get_Spoj()->get_worldrank();}else{ echo '-';}  ?></td>
                            
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            </div>  

        <?php
        }
        else if($filter=="Name"){
               $temp=$ad->orderStudents("Name");
               ?>
                
                <h2>Filtred By Name</h2>
            <div class="table-responsive" style="height:430px;border:1px solid black">
            <table class="table">
                <thead>
                    <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Roll No</th>
                            <th>Branch</th>
                            <th>Passout Year</th>
                            <th>CodeChef Username</th>
                            <th>Codechef rating</th>
                            <th>Codeforces Username</th>
                            <th>Codeforce rating</th>
                            <th>Spoj Username</th>
                            <th>Spoj rank</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($temp as $key => $val){ ?>
                        <tr>
                            <td><?php echo $key+1; ?></td>
                            <td><?php  echo $val->get_name();  ?></td>
                            <td><?php  echo $val->get_rollno();  ?></td>
                            <td><?php  echo $val->get_branch();  ?></td>
                            <td><?php  echo $val->get_YoPass(); ?></td>
                            <td><?php if($val->get_status_cc()){echo $val->get_Codechef()->get_username();}else{ echo '<span style="color:red;">invalid username</span>';}  ?></td>
                            <td><?php if($val->get_status_cc()){echo $val->get_Codechef()->get_rating();}else{ echo '-';}  ?></td>
                            <td><?php if($val->get_status_cf()){echo $val->get_Codeforces()->get_username();}else{ echo '<span style="color:red;">invalid username</span>';}  ?></td>
                            <td><?php if($val->get_status_cf()){echo $val->get_Codeforces()->get_rating();}else{ echo '-';}  ?></td>
                            <td><?php if($val->get_status_s()){echo $val->get_Spoj()->get_username();}else{ echo '<span style="color:red;">invalid username</span>';}  ?></td>
                            <td><?php if($val->get_status_s()){echo $val->get_Spoj()->get_worldrank();}else{ echo '-';}  ?></td>
                           
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            </div>  


        <?php
        }
        else if($filter=="Branch"){
            $temp=$ad->orderStudents("Branch");
            ?>
                 <h2>Filtred By Branch</h2>
            <div class="table-responsive" style="height:430px;border:1px solid black">
            <table class="table">
                <thead>
                    <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Roll No</th>
                            <th>Branch</th>
                            <th>Passout Year</th>
                            <th>CodeChef Username</th>
                            <th>Codechef rating</th>
                            <th>Codeforces Username</th>
                            <th>Codeforce rating</th>
                            <th>Spoj Username</th>
                            <th>Spoj rank</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($temp as $key => $val){ ?>
                        <tr>
                            <td><?php echo $key+1; ?></td>
                            <td><?php  echo $val->get_name();  ?></td>
                            <td><?php  echo $val->get_rollno();  ?></td>
                            <td><?php  echo $val->get_branch();  ?></td>
                            <td><?php  echo $val->get_YoPass(); ?></td>
                            <td><?php if($val->get_status_cc()){echo $val->get_Codechef()->get_username();}else{ echo '<span style="color:red;">invalid username</span>';}  ?></td>
                            <td><?php if($val->get_status_cc()){echo $val->get_Codechef()->get_rating();}else{ echo '-';}  ?></td>
                            <td><?php if($val->get_status_cf()){echo $val->get_Codeforces()->get_username();}else{ echo '<span style="color:red;">invalid username</span>';}  ?></td>
                            <td><?php if($val->get_status_cf()){echo $val->get_Codeforces()->get_rating();}else{ echo '-';}  ?></td>
                            <td><?php if($val->get_status_s()){echo $val->get_Spoj()->get_username();}else{ echo '<span style="color:red;">invalid username</span>';}  ?></td>
                            <td><?php if($val->get_status_s()){echo $val->get_Spoj()->get_worldrank();}else{ echo '-';}  ?></td>
                           
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            </div>  

            <?php
        }
        else if($filter=="PYear"){
            $temp=$ad->orderStudents("PYear");
            ?>
                 <h2>Filtred By Pass out Year</h2>
            <div class="table-responsive" style="height:430px;border:1px solid black">
            <table class="table">
                <thead>
                    <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Roll No</th>
                            <th>Branch</th>
                            <th>Passout Year</th>
                            <th>CodeChef Username</th>
                            <th>Codechef rating</th>
                            <th>Codeforces Username</th>
                            <th>Codeforce rating</th>
                            <th>Spoj Username</th>
                            <th>Spoj rank</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($temp as $key => $val){ ?>
                        <tr>
                            <td><?php echo $key+1; ?></td>
                            <td><?php  echo $val->get_name();  ?></td>
                            <td><?php  echo $val->get_rollno();  ?></td>
                            <td><?php  echo $val->get_branch();  ?></td>
                            <td><?php  echo $val->get_YoPass(); ?></td>
                            <td><?php if($val->get_status_cc()){echo $val->get_Codechef()->get_username();}else{ echo '<span style="color:red;">invalid username</span>';}  ?></td>
                            <td><?php if($val->get_status_cc()){echo $val->get_Codechef()->get_rating();}else{ echo '-';}  ?></td>
                            <td><?php if($val->get_status_cf()){echo $val->get_Codeforces()->get_username();}else{ echo '<span style="color:red;">invalid username</span>';}  ?></td>
                            <td><?php if($val->get_status_cf()){echo $val->get_Codeforces()->get_rating();}else{ echo '-';}  ?></td>
                            <td><?php if($val->get_status_s()){echo $val->get_Spoj()->get_username();}else{ echo '<span style="color:red;">invalid username</span>';}  ?></td>
                            <td><?php if($val->get_status_s()){echo $val->get_Spoj()->get_worldrank();}else{ echo '-';}  ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            </div>  

            <?php
        }
        else if($filter=="Codechef"){
            $temp=$ad->orderStudents("Codechef");
            ?>
                 <h2>Filtred By Codechef</h2>
            <div class="table-responsive" style="height:430px;border:1px solid black">
            <table class="table">
                <thead>
                    <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Roll No</th>
                            <th>Branch</th>
                            <th>Passout Year</th>
                            <th>CodeChef Username</th>
                            <th>Codechef rating</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($temp as $key => $val){ ?>
                        <tr>
                            <td><?php echo $key+1; ?></td>
                            <td><?php  echo $val->get_name();  ?></td>
                            <td><?php  echo $val->get_rollno();  ?></td>
                            <td><?php  echo $val->get_branch();  ?></td>
                            <td><?php  echo $val->get_YoPass(); ?></td>
                            <td><?php if($val->get_status_cc()){echo $val->get_Codechef()->get_username();}else{ echo '<span style="color:red;">invalid username</span>';}  ?></td>
                            <td><?php if($val->get_status_cc()){echo $val->get_Codechef()->get_rating();}else{ echo '-';}  ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            </div>  

            <?php
        }
        else if($filter=="Codeforces"){
            $temp=$ad->orderStudents("Codeforces");
            ?>
                 <h2>Filtred By Codeforces</h2>
            <div class="table-responsive" style="height:430px;border:1px solid black">
            <table class="table">
                <thead>
                    <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Roll No</th>
                            <th>Branch</th>
                            <th>Passout Year</th>
                            <th>Codeforces Username</th>
                            <th>Codeforce rating</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($temp as $key => $val){ ?>
                        <tr>
                            <td><?php echo $key+1; ?></td>
                            <td><?php  echo $val->get_name();  ?></td>
                            <td><?php  echo $val->get_rollno();  ?></td>
                            <td><?php  echo $val->get_branch();  ?></td>
                            <td><?php  echo $val->get_YoPass(); ?></td>
                            <td><?php if($val->get_status_cf()){echo $val->get_Codeforces()->get_username();}else{ echo '<span style="color:red;">invalid username</span>';}  ?></td>
                            <td><?php if($val->get_status_cf()){echo $val->get_Codeforces()->get_rating();}else{ echo '-';}  ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            </div>  

            <?php
        }
        else if($filter=="Spoj"){
            $temp=$ad->orderStudents("Spoj");
            ?>
                 <h2>Filtred By Spoj</h2>
            <div class="table-responsive" style="height:430px;border:1px solid black">
            <table class="table">
                <thead>
                    <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Roll No</th>
                            <th>Branch</th>
                            <th>Passout Year</th>
                            <th>Spoj Username</th>
                            <th>Spoj rank</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($temp as $key => $val){ ?>
                        <tr>
                            <td><?php echo $key+1; ?></td>
                            <td><?php  echo $val->get_name();  ?></td>
                            <td><?php  echo $val->get_rollno();  ?></td>
                            <td><?php  echo $val->get_branch();  ?></td>
                            <td><?php  echo $val->get_YoPass(); ?></td>
                            <td><?php if($val->get_status_s()){echo $val->get_Spoj()->get_username();}else{ echo '<span style="color:red;">invalid username</span>';}  ?></td>
                            <td><?php if($val->get_status_s()){echo $val->get_Spoj()->get_worldrank();}else{ echo '-';}  ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            </div>  

            <?php
        }
    }
    else{
        echo "somthing went worng....";
    }
}
else{
    echo "somthing went worng......";
}







?>