<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
?>
<?php
  // Session::checkLogin();
?>

    <style>
        .adminpanel{
            width: 500px;
            color: #fff;
            margin: 30px auto 0;
            padding: 50px;
            border: 1px solid #ddd;
        }
    </style>

<div class="main" style="background: #3399ff; color: #fff">
<h1>Admin Panel</h1>

<div class="adminpanel">
    <h2>Welcome to control Admin Panel</h2>
    <p>You can manage your user and online exam system from here...</p>
</div>

	
</div>


<?php include 'inc/footer.php'; ?>