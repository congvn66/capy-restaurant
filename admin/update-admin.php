<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>update admin</h1>
        <br><br>
        <?php
            // get id
            $id = $_GET['id'];
            // sql
            $sql = "SELECT * FROM admin WHERE id = '$id'";
            // exe
            $res = mysqli_query($conn, $sql);
            // check
            if($res == true){
                $cnt = mysqli_num_rows($res);
                if($cnt == 1) {
                    $row = mysqli_fetch_assoc($res);
                    $full_name = $row['full_name'];
                    $username = $row['username'];
                } else {
                    header("location:".SITE_URL.'admin/manage-admin.php');
                }
            } else {

            }
        ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>full name:</td>
                    <td>
                        <input type="text" name="full_name" value="<?php echo $full_name;?>">
                    </td>
                </tr>

                <tr>
                    <td>username:</td>
                    <td>
                        <input type="text" name="username" value="<?php echo $username;?>">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" name="submit" value="update admin" class="button-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
    // if the submit is clicked
    if (isset($_POST['submit'])) {
        
        // get data from form
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];

        // sql
        $sql = "UPDATE admin SET
        full_name = '$full_name',
        username = '$username'
        WHERE id = $id";

        // exe
        $res = mysqli_query($conn, $sql);

        // check
        if ($res == true) {
            $_SESSION['update'] = "admin updated.";
            header("location:".SITE_URL.'admin/manage-admin.php');
        } else {
            $_SESSION['update'] = "failed to update admin.";
            header("location:".SITE_URL.'admin/manage-admin.php');
        }
    }
?>

<?php include('partials/footer.php'); ?>