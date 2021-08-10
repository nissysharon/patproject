<?php
require 'connection.php';
class Student{

    private $name;
    private $rollno;
    private $branch;
    private $email;
    private $Yearofpassout;
    private $Codechef;
    private $Codeforces;
    private $Spoj;
    private $isstatuscc;
    private $isstatuscf;
    private $isstatuss;
    function __construct($na,$rn,$br,$e,$Yp)
    {
            $this->name=$na;
            $this->rollno=$rn;
            $this->branch=$br;
            $this->email=$e;
            $this->Yearofpassout=$Yp;
    }
    public function set_codechef($val){
        $this->Codechef=$val;
    } 
    public function set_codeforces($val){
        $this->Codeforces=$val;
    } 
    public function set_spoj($val){
        $this->Spoj=$val;
    } 
    public function set_status_cc($val){
        $this->isstatuscc=$val;
    }
    public function get_status_cc(){
        return $this->isstatuscc;
    }
    public function set_status_cf($val){
        $this->isstatuscf=$val;
    }
    public function get_status_cf(){
        return $this->isstatuscf;
    }
    public function set_status_s($val){
        $this->isstatuss=$val;
    }
    public function get_status_s(){
        return $this->isstatuss;
    }
    public function get_name(){
          return $this->name;
    }
    public function get_rollno(){
        return $this->rollno;
    }
    public function get_branch(){
        return $this->branch;
    }
    public function get_email(){
        return $this->email;
    }
    public function get_YoPass(){
        return $this->Yearofpassout;
    }
    public function get_Codechef(){
        return $this->Codechef;
    }
    public function get_Codeforces(){
        return $this->Codeforces;
    }
    public function get_Spoj(){
        return $this->Spoj;
    }
}
class Codechef{
    private $username;
    private $rating=0;
    private $globalrank=0;
    private $countryrank=0;
    function __construct($u,$r,$gr,$cr){
        $this->username=$u;
        $this->rating=$r;
        $this->globalrank=$gr;
        $this->countryrank=$cr;
    }
    public function get_username(){
        return $this->username;
    }
    public function get_rating(){
        return $this->rating;
    }
    public function get_globalrank(){
        return $this->globalrank;
    }
    public function get_countryrank(){
        return $this->countryrank;
    }
}

class Codeforces{
    private $username;
    private $rating=0;
    private $contribution=0;
    private $rank=0;
    function __construct($u,$r,$c,$rn)
    {   
        $this->username=$u;
        $this->rating=$r;
        $this->contribution=$c;
        $this->rank=$rn;
    }
    public function get_username(){
        return $this->username;
    }
    public function get_rating(){
        return $this->rating;
    }
    public function get_contribution(){
        return $this->contribution;
    }
    public function get_rank(){
        return $this->rank;
    }
}

class Spoj{
    private $username;
    private $worldRank=0;
    private $problemSolved=0;
    private $solutionSubmmited=0;
    function __construct($u,$wr,$ps,$ss)
    {
           $this->username=$u;
           $this->worldRank=$wr;
           $this->problemSolved=$ps;
           $this->solutionSubmmited=$ss;
    }
    public function get_username(){
        return $this->username;
    }
    public function get_worldrank(){
        return $this->worldRank;
    }
    public function get_problemsolved(){
        return $this->problemSolved;
    }
    public function get_solutionSubmmited(){
        return $this->solutionSubmmited;
    }
}


class AdminDashboard{
      private $listStudents;

      public function __construct()
      {
          $this->listStudents=array();
      }

      public function get_list(){
          return $this->listStudents;
      }
      public function generateData(){
            global $con;
            $select_query="select name,email,rollno,branch,year,codechef,codeforces,spoj from student";
            $result=mysqli_query($con,$select_query) or die(mysqli_error($con)); 
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_row($result)){
                    $stu=new Student($row[0],$row[2],$row[3],$row[1],$row[4]);
                    $res=$this->getCodechefData($row[5]);
                    if(is_bool($res)){
                        $stu->set_status_cc(0);
                        $stu->set_codechef(new Codechef('-',-1,-1,-1));
                    }
                    else{
                        $stu->set_status_cc(1);
                        $stu->set_codechef(new Codechef($row[5],$res['rating'],$res['global_rank'],$res['country_rank']));
                    }

                    $res=$this->getCodeforcesData($row[6]);
                    if(is_bool($res)){
                        $stu->set_status_cf(0);
                        $stu->set_codeforces(new Codeforces('-',-1,-1,-1));
                    }
                    else{
                        $stu->set_status_cf(1);
                        if(isset($res['rating']) and isset($res['rank'])){
                        $stu->set_codeforces(new Codeforces($row[6],$res['rating'],$res['contribution'],$res['rank']));
                        }
                        else{
                            $stu->set_codeforces(new Codeforces($row[6],0,$res['contribution'],'NA'));       
                        }
                    }

                    $res=$this->getCodespojData($row[7]);
                    if(is_bool($res)){
                        $stu->set_status_s(0);
                        $stu->set_spoj(new Spoj('-',9999999,-1,-1));
                    }
                    else{
                        $stu->set_status_s(1);
                        $stu->set_spoj(new Spoj($row[7],$res['world_rank'],$res['Problems solved'],$res['Solutions submitted']));
                    }
                    array_push($this->listStudents,$stu);
                }   
            }
            else{
                return false;
            }
            return true;

      }
      private function getCodechefData($username){
            if(!empty($username)){
                $curl=curl_init();
                curl_setopt($curl,CURLOPT_URL,'http://all-cp-platforms-api.herokuapp.com/api/codechef/'.$username);
                curl_setopt($curl,CURLOPT_RETURNTRANSFER,true); 
                $result=curl_exec($curl);
                $result_decode=json_decode($result,true);
                if($result_decode['status']=="FAILED"){
                    return false;
                }
                else{
                    return $result_decode;
                }
            }
            else{
                return false; 
            }
      }
      private function getCodeforcesData($username){
        if(!empty($username)){
            $curl=curl_init();
            curl_setopt($curl,CURLOPT_URL,'http://all-cp-platforms-api.herokuapp.com/api/codeforces/'.$username);
            curl_setopt($curl,CURLOPT_RETURNTRANSFER,true); 
            $result=curl_exec($curl);
            $result_decode=json_decode($result,true);
            if($result_decode['status']=="FAILED"){
                return false;
            }
            else{
                return $result_decode;
            }
        }
        else{
            return false; 
        }
      }
      private function getCodespojData($username){
        if(!empty($username)){
            $curl=curl_init();
            curl_setopt($curl,CURLOPT_URL,'http://all-cp-platforms-api.herokuapp.com/api/spoj/'.$username);
            curl_setopt($curl,CURLOPT_RETURNTRANSFER,true); 
            $result=curl_exec($curl);
            $result_decode=json_decode($result,true);
            if($result_decode['status']=="FAILED"){
                return false;
            }
            else{
                return $result_decode;
            }
        }
        else{
            return false; 
        }
      }

      public function comparatorcc($obj1,$obj2){
         return $obj1->get_Codechef()->get_rating() > $obj2->get_Codechef()->get_rating();
     }  
    public  function comparatorcf($obj1,$obj2){
         return $obj1->get_Codeforces()->get_rating() > $obj2->get_Codeforces()->get_rating();
     }
    public  function comparators($obj1,$obj2){
        return $obj1->get_Spoj()->get_worldrank() <  $obj2->get_Spoj()->get_worldrank();
     }
      public function orderStudents($platform){
          $result=$this->listStudents;
          if($platform=="Codechef"){
               usort($result,function($obj1,$obj2){
                return $obj1->get_Codechef()->get_rating() < $obj2->get_Codechef()->get_rating();
            });    
          }
          else if($platform=="Codeforces"){
            usort($result,function($obj1,$obj2){
                return $obj1->get_Codeforces()->get_rating() < $obj2->get_Codeforces()->get_rating();
            });
          }
          else if($platform=="Spoj"){
            usort($result,function($obj1,$obj2){
                return $obj1->get_Spoj()->get_worldrank() >  $obj2->get_Spoj()->get_worldrank();
             });   
          }
          else if($platform=="PYear"){
            usort($result,function($obj1,$obj2){
                return $obj1->get_YoPass() >  $obj2->get_YofPass();
             });   
          }
          else if($platform=="Name"){
            usort($result,function($obj1,$obj2){
                return strcmp(strtolower($obj1->get_name()),strtolower($obj2->get_name()));
             });  
          }
          else if($platform=="Branch"){
            usort($result,function($obj1,$obj2){
                return strcmp($obj1->get_branch(),$obj2->get_branch());
             });  
          }
          return $result;
      }

      public function Overall(){
        return ""; 
        
      }  




}





?>