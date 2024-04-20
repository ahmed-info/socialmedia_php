<?php
include('dbconfig.php');

include('includes/header.php') ?>
<div class="container-fluid py-4">
    <div class="row min-vh-80 h-100">
        <div class="col-12">
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute"><i class="material-icons opacity-10">weekend</i></div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize">Today's Money</p>
                                <h4 class="mb-0">$53k</h4>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than last week</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute"><i class="material-icons opacity-10">person</i></div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize">Today's Users</p>
                                <h4 class="mb-0">2,
                                    300</h4>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3% </span>than last month</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute"><i class="material-icons opacity-10">person</i></div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize">New Clients</p>
                                <h4 class="mb-0">3,
                                    462</h4>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-2%</span>than yesterday</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute"><i class="material-icons opacity-10">weekend</i></div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize">Sales</p>
                                <h4 class="mb-0">$103,
                                    430</h4>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5% </span>than yesterday</p>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
            ?>
                <div class="alert alert-warning fade show" role="alert">
                    <strong>hey</strong> <?php echo $_SESSION['status'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                </div>
            <?php
                unset($_SESSION['status']);
            }

            ?>
            <div class="card mt-5">
                <div class="card-header">
                    <h4>
                        insert data
                        <a href="insert.php" class="btn btn-primary float-end">insert data</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">username</th>
                                <th scope="col">full name</th>
                                <th scope="col">joined</th>
                                <th scope="col">email</th>
                                <th scope="col">type</th>
                                <th scope="col">activation</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $fetch_query = "SELECT * FROM user_info";
                            $rundata = mysqli_query($connection, $fetch_query);
                            if (mysqli_num_rows($rundata) > 0) {
                                foreach ($rundata as $index => $row) {
                            ?>
                                    <tr>
                                        <th scope="row"><?php echo $index + 1 ?></th>
                                        <td><?php echo $row['username'] ?></td>
                                        <td><?php echo $row['firstname'] . ' ' . $row['lastname'] ?></td>
                                        <td><?php echo $row['joined'] ?></td>
                                        <td><?php echo $row['email'] ?></td>
                                        <td><?php
                                            if ($row['user_type'] == 1) {
                                                echo "student";
                                            } elseif ($row['user_type'] == 2) {
                                                echo "admin";
                                            } else {
                                                echo "teacher";
                                            }
                                            ?></td>
                                        <td><?php echo $row['isActive']==0?  "<span class='text-danger'>pending</span>":"<span class='text-success'>activated</span>" ?></td>
                                        <td>
                                            <?php 
                                            if($row['isActive']==0){
                                                                              
                                           echo '<a href="activated.php?id='.$row['id'].'" class="btn btn-warning btn-sm me-1">active</a>';
                                                
                                            }?>
                                            <form action="code.php" method="post" class="d-flex">
                                                <input type="hidden" name="user_id" value="<?php echo $row['id'] ?>">
                                                <button type="submit" name="delete_btn" class="btn btn-danger btn-sm">delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="7">no data found</td>

                                </tr>
                            <?php
                            }
                            ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php') ?>