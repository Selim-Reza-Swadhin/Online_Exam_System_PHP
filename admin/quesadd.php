<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/inc/header.php');
include_once($filepath . '/../classes/Exam.php');
$exm = new Exam();
?>
<style>
    .adminpanel {
        width: 480px;
        color: #fff;
        margin: 20px auto 0;
        padding: 30px;
        border: 1px solid #ddd;
    }

</style>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $addQue = $exm->addQuestions($_POST);
}
//Get Total
$total = $exm->getTotalRows();
$next = $total + 1;

?>

<div class="main">
    <h1>Admin Panel - Add Question</h1>

    <?php
    if (isset($addQue)) {
        echo $addQue;
    }

    ?>

    <div class="adminpanel">

        <form action="" method="post">
            <table>
                <tr>
                    <td>Question No</td>
                    <td>:</td>
                    <td>
                        <input type="number"  name="ques_no" value="<?php
                        if (isset($next)) {
                            echo $next;
                        }
                        ?>">
                    </td>
                </tr>

                <tr>
                    <td>Write Question</td>
                    <td>:</td>
                    <td>
                        <input type="text" name="ques_name" placeholder="Enter Question Name..." required>
                    </td>
                </tr>

                <tr>
                    <td>Choice One</td>
                    <td>:</td>
                    <td>
                        <input type="text" name="ans1" placeholder="Enter Question Ans One..." required>
                    </td>
                </tr>

                <tr>
                    <td>Choice Two</td>
                    <td>:</td>
                    <td>
                        <input type="text" name="ans2" placeholder="Enter Question Ans Two..." required>
                    </td>
                </tr>

                <tr>
                    <td>Choice Three</td>
                    <td>:</td>
                    <td>
                        <input type="text" name="ans3" placeholder="Enter Question Ans Three..." required>
                    </td>
                </tr>

                <tr>
                    <td>Choice Four</td>
                    <td>:</td>
                    <td>
                        <input type="text" name="ans4" placeholder="Enter Question Ans Four..." required>
                    </td>
                </tr>

                <tr>
                    <td>Correct No.</td>
                    <td>:</td>
                    <td>
                        <input type="number" name="right_ans" placeholder="Enter Correct Ans Number..." required>
                    </td>
                </tr>

                <tr>
                    <td colspan="3" align="center">
                        <br>
                        <input type="submit" value="Add A Question">
                    </td>
                </tr>

            </table>


        </form>

    </div>


</div>
<?php include 'inc/footer.php'; ?>
