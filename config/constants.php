<?php
    // constant
    define('LOCALHOST', 'localhost');
    

    $conn = mysqli_connect(LOCALHOST, 'root', '') or die(mysqli_error()); // connect
    $db_select = mysqli_select_db($conn, 'capy-restaurant') or die(mysqli_error()); // select database
?>