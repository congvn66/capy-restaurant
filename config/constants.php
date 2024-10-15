<?php
    // start session
    session_start();

    // constant
    define('SITE_URL', 'http://localhost/capy-restaurant/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'capy-restaurant');
    

    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die("connection failed: " . mysqli_connect_error()); // connect
    $db_select = mysqli_select_db($conn, DB_NAME) or die("wrong or not existed database: ".mysqli_error($conn)); // select database
?>