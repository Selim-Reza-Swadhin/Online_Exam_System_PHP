<?php include 'inc/header.php'; ?>

<?php
Session::checkSession();
$total = $exm->getTotalRows();
?>

<div class="main" style="background: #3399ff; color: #fff">
<h1>All Question & Ans : <?= $total; ?></h1>
	<div class="viewans">
		<table> 
			<?php 
			$getQues = $exm->getQueByOrder();
			if ($getQues) {
				while ($question = $getQues->fetch_assoc()) {?>
			<tr>
				<td colspan="2">
				 <h3 style="text-align: center;">Que <?= $question['ques_no']; ?> : <?= $question['ques_name']; ?></h3>
				</td>
			</tr>

			<?php 
				$number = $question['ques_no'];
				$answer = $exm->getAnswer($number);
				if ($answer) {
					while ($result = $answer->fetch_assoc()) { ?>

			<tr>
				<td>
				 <input type="radio"/>
				 <?php 
				 if ($result['right_ans'] == '1') {
				 	echo "<span style='color:blue'>".$result['answer']."</span>";
				 }else{
				 echo $result['answer'];
				}
				 ?>
				</td>
			</tr>
		<?php }} ?>
		<?php }} ?>

			
		</table>
		<a href="starttest.php">Start Again</a>
</div>
 </div>
<?php include 'inc/footer.php'; ?>