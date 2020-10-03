<?php
$filepath = realpath(dirname(__FILE__));
//echo $filepath;
include_once($filepath . '/../lib/Session.php');
include_once($filepath . '/../lib/Database.php');
include_once($filepath . '/../helpers/Format.php');

class Admin
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function getAdminData($data)
    {
        $admin_user = $this->fm->validation($data['admin_user']);
        $admin_pass = $this->fm->validation($data['admin_pass']);
        $admin_user = mysqli_real_escape_string($this->db->link, $admin_user);
        $admin_pass = mysqli_real_escape_string($this->db->link, md5($admin_pass));

        $query = "SELECT * FROM tbl_admin WHERE admin_user = '$admin_user' AND admin_pass = '$admin_pass'";
        $result = $this->db->select($query);
        if ($result != false){
            $value = $result->fetch_assoc();
            Session::init();
            Session::set('adminLogin', true);
            Session::set('adminUser', $value['admin_user']);
            Session::set('adminID', $value['admin_id']);

            header('Location: index.php');
        }else{
            $msg = '<span class="error">Username or password not match !</span>';
            return $msg;
        }
    }


}