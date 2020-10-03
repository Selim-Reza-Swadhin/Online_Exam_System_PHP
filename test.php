<?php include 'inc/header.php'; ?>
<?php
Session::checkSession();
if (isset($_GET['question-id_no'])) {
    $number = (int) $_GET['question-id_no'];

}else{
    header("Location:exam.php");
    exit();
}

$total = $exm->getTotalRows();
$question = $exm->getQuesByNumber($number);
?>

<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    //$_POST parameter means all data send from from
    $process = $pro->processData($_POST);
}

?>
    <div class="main" style="background: #3399ff; color: #fff">
        <h1>Question <?= $question['ques_no']; ?> of <?= $total; ?></h1>
        <div class="test">
            <form method="post" action="">
                <table>
                    <tr>
                        <td colspan="2">
                            <h3>Que <?= $question['ques_no']; ?>: <?= $question['ques_name']; ?></h3>
                        </td>
                    </tr>

                    <?php
                    $answer = $exm->getAnswer($number);
                    if ($answer) {
                        while ($result = $answer->fetch_assoc()) {?>
                            <tr>
                                <td>
                                    <input type="radio" name="answer" value="<?= $result['id']; ?>" /><?= $result['answer']; ?>
                                </td>
                            </tr>
                        <?php }} ?>

                    <tr>
                        <td>
                            <input type="test" name="number" value="<?= $number; ?>" /> <!--hidden button-->
                            <input type="submit" name="submit" value="Next Question"/>
                        </td>
                    </tr>

                </table>
            </form>
        </div>
    </div>
<?php include 'inc/footer.php'; ?>