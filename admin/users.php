<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/User.php');
	$usrs = new User();
?>
<?php
  // Session::checkLogin();
?>

<?php

if (isset($_GET['disable'])){
    $disable_id = (int) $_GET['disable'];
    $disable_user = $usrs->disableUser($disable_id);
}

if (isset($_GET['enable'])) {
    $enable_id = (int)$_GET['enable'];
    $enable_user = $usrs->enableUser($enable_id);
}

if (isset($_GET['remove'])) {
    $remove_id = (int)$_GET['remove'];
    $remove_user = $usrs->deleteUser($remove_id);
}
?>

<div class="main" style="color: #333">

    <h1>Admin Panel - Manage User</h1>

    <?php
    if (isset($disable_user)) {
        echo $disable_user;
    }

    if (isset($enable_user)) {
        echo $enable_user;
    }

    if (isset($remove_user)) {
        echo $remove_user;
    }

    ?>

<div class="manageuser">

    <table class="tblone">

        <tr align="center">
            <th>No</th>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Action</th>
        </tr>

        <?php
        $userData = $usrs->getAllUser();
        if($userData) {
            $i = 0;
            while ($result = $userData->fetch_assoc()) {
                $i++;
                ?>
                <tr align="center">
                    <td>
                        <?php
                        if ($result['status'] == '1') {
                            echo "<span class='error'>" . $i . "</span>";
                        } else {
                            echo $i;
                        }?>
                    </td>
                    <td><?= $result['name']; ?></td>
                    <td><?= $result['username']; ?></td>
            <!--<td>--><?////= $result['email']; ?><!--</td>-->
                    <td>
                        <?php
                        if ($result['status'] == '1') {
                            echo "<span class='error'>" . $result['email'] . "</span>";
                        } else {
                            echo $result['email'];
                        }?>
                    </td>
                    <td>
                        <?php
                        if ($result['status'] == '0') { ?>
                            <a title="Are You Sure to Disable" onclick="return confirm('Are You Sure to Disable')"
                               href="?disable=<?= $result['user_id']; ?>">Disable</a>
                        <?php } else { ?>
                            <a title="Are You Sure to Enable" onclick="return confirm('Are You Sure to Enable')"
                               href="?enable=<?= $result['user_id']; ?>">Enable</a>
                        <?php } ?>
                        || <a onclick="return confirm('Are You Sure to Remove')"
                             href="?remove=<?= $result['user_id']; ?>">Remove</a>
                    </td>

                </tr>

            <?php } } ?>

    </table>
</div>

	
</div>


<?php include 'inc/footer.php'; ?>