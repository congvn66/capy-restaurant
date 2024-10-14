<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>add admin</h1>

        <br />
        
        <form action="" method="POST">
            <table class="tbl-30">      
                <tr>
                    <td>full name:</td>
                    <td>
                        <input type="text" name="full_name" placeholder="enter your name">
                    </td>
                </tr>

                <tr>
                    <td>username:</td>
                    <td>
                        <input type="text" name="username" placeholder="enter your username">
                    </td>
                </tr>

                <tr>
                    <td>password:</td>
                    <td>
                        <input type="password" name="password" placeholder="enter your password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="add admin" class="button-secondary">
                     </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>

<?php
    // process data from form and insert to database.
    // check if submit button is clicked.

    if (isset($_POST['submit'])) {
        // clicked.
        //echo "clicked";

        // get data
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); // encrypt

        // sql
        $sql = "INSERT INTO admin SET
            full_name = '$full_name',
            username = '$username',
            password = '$password'
        ";

        // execute query
        $conn = mysqli_connect('localhost', 'root', '') or die(mysqli_error()); // connect
        $db_select = mysqli_select_db($conn, 'capy-restaurant') or die(mysqli_error()); // select database
        $res = mysqli_query($conn, $sql) or die(mysqli_error());
    } else {
        // not clicked.
        //echo "not clicked";
    }
?>
