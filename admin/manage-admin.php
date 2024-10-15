<?php include('partials/menu.php'); ?>
        <!-- main content section starts-->
        <div class="main-content">
            <div class="wrapper">
                <h1>admin management</h1>
                <br />

                <?php
                    if(isset($_SESSION['add'])){
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }
                    
                    if(isset($_SESSION['delete'])) {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }

                    if(isset($_SESSION['update'])) {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }

                    if(isset($_SESSION['admin-not-found'])) {
                        echo $_SESSION['admin-not-found'];
                        unset($_SESSION['admin-not-found']);
                    }

                    if(isset($_SESSION['password-not-match'])) {
                        echo $_SESSION['password-not-match'];
                        unset($_SESSION['password-not-match']);
                    }

                    if(isset($_SESSION['change-password'])) {
                        echo $_SESSION['change-password'];
                        unset($_SESSION['change-password']);
                    }
                ?>
                <br><br><br>

                <!-- button add admin -->
                <a href="add-admin.php" class="button-primary">add admin</a>

                <br /><br />

                <table class="tbl-full">
                    <tr>
                        <th>id</th>
                        <th>full name</th>
                        <th>username</th>
                        <th>actions</th>
                    </tr>
                    
                    <?php
                        $sql = "SELECT * FROM admin";
                        $res = mysqli_query($conn, $sql);
                        $id_on_web = 1;
                        if ($res == true) {
                            $cnt = mysqli_num_rows($res); // get all rows from db
                            if ($cnt > 0) {
                                while($row = mysqli_fetch_assoc($res)) { // same with readLine
                                    $id = $row['id'];
                                    $full_name = $row['full_name'];
                                    $username = $row['username'];

                                    // display value to table
                                    ?>
                                    <tr>
                                        <td><?php echo $id_on_web++?></td>
                                        <td><?php echo $full_name?></td>
                                        <td><?php echo $username?></td>
                                        <td>
                                            <a href="<?php echo SITE_URL;?>admin/change-admin-password.php?id=<?php echo $id?>" class="button-primary">change password</a>
                                            <a href="<?php echo SITE_URL;?>admin/update-admin.php?id=<?php echo $id?>" class="button-secondary">update</a>
                                            <a href="<?php echo SITE_URL;?>admin/delete-admin.php?id=<?php echo $id?>" class="button-danger">delete</a>
                                        </td>
                                    </tr>
                                    <?php

                                }
                            }
                        }
                    ?>
                </table>

            </div>
        </div>
        <!-- main content section ends-->
<?php include('partials/footer.php');  ?>