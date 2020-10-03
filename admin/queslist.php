<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/inc/header.php');
include_once($filepath . '/../classes/Exam.php');
$exm = new Exam();
?>
<?php

if (isset($_GET['delete_que'])) {
    $ques_no = (int)$_GET['delete_que'];
    $delQue = $exm->delQuestion($ques_no);
}
?>

    <div class="main">
        <h1>Admin Panel - Question List</h1>

        <?php
        if (isset($delQue)) {
            echo $delQue;
        }
        ?>

        <div class="quelist">
            <table class="tblone">

                <tr align="center">
                    <th width="10%">No</th>
                    <th width="70%">Questions</th>
                    <th width="20%">Action</th>
                </tr>

                <?php
                $getData = $exm->getQueByOrder();
                if ($getData) {
                    $i = 0;
                    while ($result = $getData->fetch_assoc()) {
                        $i++;
                        ?>

                        <tr align="center" style="color: #333">
                            <td><?= $i; ?></td>
                            <td><?= $result['ques_name']; ?></td>
                            <td>
                                <a onclick="return confirm('Are You Sure to Remove')"
                                   href="?delete_que=<?= $result['ques_no']; ?>">Remove</a>
                            </td>
                        </tr>

                    <?php } } ?>

            </table>

        </div>


    </div>
<?php include 'inc/footer.php'; ?>