<?php include 'inc/header.php'; ?>
<?php
Session::checkSession();
$userid = Session::get("userId");
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $updateUser = $usr->updateUserData($userid, $_POST);

}

?>
    <style>
        .profile {
            width: 440px;
            margin: 0 auto;
            border: 1px solid #ddd;
            padding: 30px 50px 50px 138px;
        }
    </style>

    <div class="main">
        <h1>Your Profile</h1>
        <div class="profile">

            <?php
            if (isset($updateUser)) {
                echo $updateUser;
            }

            ?>
            <form action="" method="post">
                <?php
                //echo $userid;
                $getData = $usr->getUserData($userid);
                if ($getData) {
                    //here we can skip while loop for fetching 1 row data
                    $result = $getData->fetch_assoc();//use only single data fetch
                    //while ($result = $getData->fetch_assoc()){//use only multiple data fetch
                    ?>
                    <table class="tbl">
                        <tr>
                            <td>Name</td>
                            <td>
                                <!--<input id="hidden_id" type="text" value="<?php echo $result['user_id'] ?>"/>-->
                                <input name="name" type="text" value="<?php echo $result['name'] ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>
                                <input name="username" type="text" value="<?php echo $result['username'] ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>
                                <input name="email" type="text" value="<?php echo $result['email'] ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input onclick="return confirm('Are You Sure to Updated Your Profile !')" type="submit" value="Update">
                            </td>
                        </tr>
                    </table>

                    <?php //}//end while loop ?>
                <?php } ?>
            </form>
        </div>
    </div>
<?php include 'inc/footer.php'; ?>