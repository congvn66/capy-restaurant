<?php
    // include
    include('../config/constants.php');

    // get id of admin
    $id = $_GET['id'];

    // sql
    $sql = "DELETE FROM admin WHERE id = $id";

    // execute
    $res = mysqli_query($conn, $sql);

    // check
    if ($res == true) {
        //echo "admin deleted";

        // session
        $_SESSION['delete'] = "<div class='success'>admin deleted.</div>";

        // redirect
        header('location:'.SITE_URL.'admin/manage-admin.php');
    } else {
        //echo "failed to delete admin";

        // session
        $_SESSION['delete'] = "<div class='error'>failed to delete admin.</div>";

        // redirect
        header('location:'.SITE_URL.'admin/manage-admin.php');
    }

    // redirect

?>