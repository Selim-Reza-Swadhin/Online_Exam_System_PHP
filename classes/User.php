<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Session.php');
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');

class User{
    private $db;
    private $fm;
    function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }


    public function userRegistration($name,$username,$password,$email){

        $name = $this->fm->validation($name);
        $username = $this->fm->validation($username);
        $password = $this->fm->validation($password);
        $email = $this->fm->validation($email);

        $name = mysqli_real_escape_string($this->db->link,$name);
        $username = mysqli_real_escape_string($this->db->link,$username);
        //if password field empty, then md5 string enter my database.
        //$password = mysqli_real_escape_string($this->db->link,md5($password));//avoid system
        //echo $password;
        //exit();
        $email = mysqli_real_escape_string($this->db->link,$email);

        if ($name == "" || $username == "" || $password == "" || $email == "") {
            echo "<span class='error'>Fields Must Not be Empty !</span>";
            exit();
        }elseif (filter_var($email,FILTER_VALIDATE_EMAIL) === false) {
            echo "<span class='error'>Invalid Email Address !</span>";
            exit();
        }else{
            $chkquery = "SELECT * FROM tbl_users WHERE email = '$email'";
            $chkresult = $this->db->select($chkquery);
            if ($chkresult != false) {
                echo "<span class='error'>Email Address Already Eixst !</span>";
                exit();
            }else{

                $password = mysqli_real_escape_string($this->db->link,md5($password));//right system
                $query = "INSERT INTO tbl_users(name, username, password, email) VALUES('$name','$username','$password','$email')";
                $inserted_row = $this->db->insert($query);
                if ($inserted_row) {
                    echo "<span class='success'>Registration Successfully !</span>";
                    exit();
                }else{
                    echo "<span class='error'>Error.. Not Registered !</span>";
                    exit();
                }
            }
        }

    }

  public function userLogin($email, $password){
    $email = $this->fm->validation($email);
    $password = $this->fm->validation($password);
    $email = mysqli_real_escape_string($this->db->link, $email);
    //echo $password = mysqli_real_escape_string($this->db->link, $password);
    //exit();
   

    if ($email == "" || $password == "") {
      echo "empty";
      exit();
    }else{
      $password = mysqli_real_escape_string($this->db->link,md5($password));
      $query = "SELECT * FROM tbl_users WHERE email='$email' AND password='$password'";
      $result = $this->db->select($query);
      if ($result != false) {
       $value = $result->fetch_assoc();
       if ($value['status'] == '1') {
         echo "disable";
         exit();
       }else{

            Session::init();
            Session::set("loginUser", true);
            Session::set("userId", $value['user_id']);
            Session::set("userName", $value['username']);
            Session::set("naMe", $value['name']);
            
       }
      }else{
        echo "error";
         exit();
      }
    }
    
  }

    public function getUserData($userid){
        //$query = "SELECT * FROM tbl_users ORDER BY user_id DESC";//wrong format
        //$query = "SELECT * FROM tbl_users WHERE user_id = '$userid'";
        $query = "SELECT * FROM tbl_users WHERE user_id = '$userid' LIMIT 1";
        $result = $this->db->select($query);
        return $result;
    }

  public function updateUserData($userid, $data){

    $name = $this->fm->validation($data['name']);
    $username = $this->fm->validation($data['username']);
    $email = $this->fm->validation($data['email']);

    $name = mysqli_real_escape_string($this->db->link,$name);
    $username = mysqli_real_escape_string($this->db->link,$username);
    $email = mysqli_real_escape_string($this->db->link,$email);

    $query = "UPDATE tbl_users 
                SET
                name = '$name',
                username = '$username',
                email = '$email'
                WHERE user_id = '$userid'";
                $updated_row = $this->db->update($query);
              if ($updated_row) {
                  $msg = "<span class='success'>User Data Updated !  </span>";
                  return $msg;
                }else{
                     $msg = "<span class='error'>User Data Not Updated !  </span>";
                  return $msg;
                } 
  }

     public function getAllUser(){
       $query = "SELECT * FROM tbl_users ORDER BY user_id DESC";
       //$query = "SELECT * FROM tbl_users WHERE user_id = '$userid'";
       $result = $this->db->select($query);
       return $result;
    }

    public function disableUser($disableid){
      $query = "UPDATE tbl_users 
                SET
                status = '1'
                WHERE user_id = '$disableid'";
                $updated_row = $this->db->update($query);
              if ($updated_row) {
                  $msg = "<span class='success'>User Disable !  </span>";
                  return $msg;
                }else{
                     $msg = "<span class='error'>User Not Disable !  </span>";
                  return $msg;
                } 
    }

    public function enableUser($enableid){

         $query = "UPDATE tbl_users 
                   SET
                   status = '0'
                   WHERE user_id = '$enableid'";
                $updated_row = $this->db->update($query);
              if ($updated_row) {
                  $msg = "<span class='success'>User Enable !  </span>";
                  return $msg;
                }else{
                     $msg = "<span class='error'>User Not Enable !  </span>";
                  return $msg;
                } 

    }

    public function deleteUser($removeid){
             $query = "DELETE FROM tbl_users WHERE user_id = '$removeid'";
                $deldata = $this->db->delete($query);
              if ($deldata) {
                  $msg = "<span class='success'>User Removed !  </span>";
                  return $msg;
                }else{
                     $msg = "<span class='error'>Error... User Not Removed  !  </span>";
                  return $msg;
                } 
    }
}


 ?>