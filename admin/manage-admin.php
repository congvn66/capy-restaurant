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
                                            <a href="#" class="button-secondary">update</a>
                                            <a href="#" class="button-danger">delete</a>
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