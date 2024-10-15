<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>change password</h1>
        <br><br>

        <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>old password:</td>
                    <td>
                        <input type="password" name="old_password" placeholder="old password">
                    </td>
                </tr>

                <tr>
                    <td>new password:</td>
                    <td>
                        <input type="password" name="new_password" placeholder="new password">
                    </td>
                </tr>

                <tr>
                    <td>confirm password:</td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="confirm password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" name="submit" value="change password" class="button-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
    // check if clicked
    if (isset($_POST['submit'])) {

        // get data
        $id = $_POST['id'];
        $old_password = md5($_POST['old_password']);
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']);

        // check if the admin exist or not
        $sql = "SELECT * FROM admin WHERE id = $id AND password = '$old_password'";

        // exe
        $res = mysqli_query($conn, $sql);

        //check
        if ($res == true) {
            $count = mysqli_num_rows($res);
            if ($count == 1) {
                if ($new_password == $confirm_password) {
                    $sql2 = "UPDATE admin SET
                    password = '$new_password' WHERE id = $id";

                    $res2 = mysqli_query($conn, $sql2);

                    if ($res2 == true) {
                        $_SESSION['change-password'] = "password changed.";
                        header("location:".SITE_URL.'admin/manage-admin.php');
                    } else {
                        $_SESSION['change-password'] = "failed to change password.";
                        header("location:".SITE_URL.'admin/manage-admin.php');
                    }
                } else {
                    $_SESSION['password-not-match'] = "please confirm your password again.";
                    header("location:".SITE_URL.'admin/manage-admin.php');
                }

            } else {
                $_SESSION['admin-not-found'] = "admin not found.";
                header("location:".SITE_URL.'admin/manage-admin.php');
            }
        } else {
            
        }

        // check if password match

        // change password
    }
?>

<?php include('partials/footer.php'); ?>