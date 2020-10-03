<?php
class Session{
	 public static function init(){
	 	session_start();
	 }
	 
	 public static function set($key, $val){
	 	$_SESSION[$key] = $val;
	 }

	 public static function get($key){
	 	if (isset($_SESSION[$key])) {
	 		return $_SESSION[$key];
	 	} else {
	 		return false;
	 	}
	 }

	 public static function checkAdminSession(){
	 	self::init();
	 	if (self::get("adminLogin") == false) {//Admin.php page
	 		self::destroy();
	 		header("Location:login.php");
	 	}
	 }


    public static function checkAdminLogin(){
        self::init();
        if (self::get("adminLogin") == true) {//Admin.php
            header("Location:index.php");
        }
    }

	 public static function checkSession(){
	 	//self::init();
	 	if (self::get("loginUser") == false) {
	 		self::destroy();
	 		header("Location:index.php");
	 	}
	 }

	 public static function checkLogin(){
	 	//self::init();
	 	if (self::get("loginUser") == true) {
	 		header("Location:exam.php");
	 	}
	 }

	 public static function destroy(){
	 	session_destroy();
	 	session_unset();
	 	//header("Location:login.php");
	 }
}

?>