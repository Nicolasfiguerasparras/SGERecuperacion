<?php 
    require_once("header.php");

    // Total members count
    $queryTotal = "SELECT * FROM users";
    $resultsetTotal = $dbh->query($queryTotal);
    $totalMembers = $resultsetTotal->rowCount();

    // Members last week
    $queryLastWeek = "SELECT * FROM users WHERE member_from > DATE_SUB(NOW(), INTERVAL 7 DAY)";
    $stmt = $dbh->prepare($queryLastWeek);
    $stmt->execute();

    $totalLastWeek = 0;
    while($row = $stmt->fetch()) {
        $totalLastWeek++;
    }

    // Members last year
    $queryLastWeek = "SELECT * FROM users WHERE member_from > DATE_SUB(NOW(), INTERVAL 365 DAY)";
    $stmt = $dbh->prepare($queryLastWeek);
    $stmt->execute();

    $totalLastYear = 0;
    while($row = $stmt->fetch()) {
        $totalLastYear++;
    }

    // Members today
    $queryToday = "SELECT * FROM users WHERE member_from = CURDATE()";
    $stmt = $dbh->prepare($queryToday);
    $stmt->execute();

    $totalToday = 0;
    while($row = $stmt->fetch()){
        $totalToday++;
    }

    // Percentajes
    $lastweek_percent = $totalLastWeek/$totalMembers*100;
    $today_percent = $totalToday/$totalMembers*100;
    $lastweek_percent = number_format($lastweek_percent, 2);
    $lastyear_percent = $totalLastYear/$totalMembers*100;
?>
        
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Tarea 1</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1200px-Circle-icons-profile.svg.png" alt="" style="width: 30px; color: white;"></a>
            </li>
        </ul>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="dashboard.php">
                                <span data-feather="home"></span>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">
                                <span data-feather="file"></span>
                                Front end
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="users"></span>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <a href='index.php'><button type="button" class="btn btn-sm btn-outline-secondary">Refresh</button></a>
                        </div>
                    
                    </div>
                </div>

                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

                    <div style="border: 2px solid gray; border-radius: 5px; width: 45%">
                        <div class="row">
                            <div class="col-6">
                                <h2>New members on the last week</h2>
                            </div>
                            <div class="col-6">
                                <h2>New members today</h2>
                                <h5><?php echo $totalToday; ?></h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: <?php echo intval($lastweek_percent); ?>%" aria-valuenow="<?php echo intval($lastweek_percent)."%"; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo intval($lastweek_percent); ?>%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="border: 2px solid gray; border-radius: 5px; width: 45%">
                        <div class="row">
                            <div class="col-6">
                                <h2>New members on this year</h2>
                            </div>
                            <div class="col-6">
                                <h2>Total members</h2>
                                <h5><?php echo $totalMembers; ?></h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: <?php echo intval($lastyear_percent); ?>%" aria-valuenow="<?php echo intval($lastyear_percent)."%"; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $lastyear_percent; ?>%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                

                
                <div class="table-responsive">
                    <h2>Membership</h2>
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Graduation Year</th>
                                <th>Member from</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // Members
                                $members = "SELECT * FROM users";
                                $stmt = $dbh->prepare($members);
                                $stmt->execute();

                                while($row = $stmt->fetch()) {
                                    echo "
                                        <tr>
                                            <td>$row->username</td>
                                            <td>$row->first_name $row->last_name</td>
                                            <td>graduation year</td>
                                            <td>".date('d-m-Y', strtotime($row->member_from))."</td>
                                            <td>
                                                <a href='editModal.php?user_id=$row->id'><button id='$row->id' type='button' class='btn btnEdit' data-bs-toggle='modal' data-bs-target='#editModal'><i class='far fa-edit'></i></button></a>";
                                    if($row->status == 0){
                                        echo "
                                            <a href='altaModal.php?user_id=$row->id'><button id=".$row->id." type='button' class='btn' data-bs-toggle='modal' data-bs-target='#altaModal'><i class='far fa-user'></i></button></a>
                                        ";
                                    }else{
                                        echo "
                                            <button id=".$row->id." type='button' class='btn' data-bs-toggle='modal' data-bs-target='#altaModal' disabled><i class='far fa-user'></i></button>
                                        ";
                                    }

                                    if($row->trash == 0){
                                        echo "
                                            <a href='borrarModal.php?user_id=$row->id'><button id=".$row->id." type='button' class='btn' data-bs-toggle='modal' data-bs-target='#borrarModal'><i class='fas fa-user-slash'></i></button></a>
                                        ";
                                    }else{
                                        echo "
                                            <button id=".$row->id." type='button' class='btn' data-bs-toggle='modal' data-bs-target='#borrarModal' disabled><i class='fas fa-user-slash'></i></button>
                                        ";
                                    }
                                    echo "
                                            </td>
                                        </tr>
                                    ";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

<?php
    // require_once("editModal.php");
    // require_once("altaModal.php");
    // require_once("borrarModal.php");
    require_once("footer.php");
?>