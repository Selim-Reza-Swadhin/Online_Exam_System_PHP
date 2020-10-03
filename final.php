<?php include 'inc/header.php'; ?>
<?php
Session::checkSession();
$total = $exm->getTotalRows();
?>
<div class="main" style="background: #3399ff; color: #dddddd">
<h1>You are done!</h1>

<div class="starttest">
	<p>Congrats! You have just competed the test.</p>
	<p>Final Score :

		<?php 
		if (isset($_SESSION['score'])) {//Process.php
			//echo $_SESSION['score'];
			echo $_SESSION['score'].' Total Number Of '. $total;
			unset($_SESSION['score']);
		}
		 ?>

	</p>

	<a href="viewans.php">View Right Answer</a>
	<a href="starttest.php">Start Again</a>
</div>
	
  </div>
<?php include 'inc/footer.php'; ?>