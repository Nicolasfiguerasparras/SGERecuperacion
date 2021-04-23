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


    if(isset($_POST['search'])){
        $text = $_POST['search'];
        $searchQuery = "SELECT * FROM users WHERE username LIKE '%$text%'";
        $stmtSearch = $dbh->prepare($searchQuery);
        $stmtSearch->execute();
    }
?>
        
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Tarea 1</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="form-inline"  style="width: 100%;">
            <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search" name="search">
        </form>
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
                            <a class="nav-link active" aria-current="page" href="index.php">
                                <span data-feather="home"></span>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../index.php">
                                <span data-feather="file"></span>
                                Front end
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../login/logout.php">
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
                                if(isset($_GET['pag'])){
                                    $start = ($_GET['pag']-1)*5;
                                    $pag = $_GET['pag'];
                                }else{
                                    $start = 0;
                                    $pag = 1;
                                    if(isset($_GET['type'])){
                                        $type = $_GET['type'];
                                        header("Location: index.php?type=$type&pag=$pag");
                                    }else{
                                        header("Loaction: index.php?type=0&pag=$pag");
                                    }
                                }

                                $totalPages = ceil($totalMembers/5);
                                

                                if(isset($stmtSearch)){
                                    if($row = $stmtSearch->fetch()){
                                        do{
                                            echo "
                                                <tr>
                                                    <td>$row->username</td>
                                                    <td>$row->first_name $row->last_name</td>
                                                    <td>graduation year</td>
                                                    <td>".date('d-m-Y', strtotime($row->member_from))."</td>
                                                    <td>
                                                        <button id='$row->id' type='button' class='btn btnEdit' data-bs-toggle='modal' data-bs-target='#editModal'><i class='far fa-edit'></i></button>";
                                            if($row->status == 1){
                                                echo "
                                                    <button id=".$row->id." type='button' class='btn btnAlta' data-bs-toggle='modal' data-bs-target='#altaModal'><i class='far fa-user'></i></button>
                                                ";
                                            }else{
                                                echo "
                                                    <button id=".$row->id." type='button' class='btn btnAlta' data-bs-toggle='modal' data-bs-target='#altaModal' disabled><i class='far fa-user'></i></button>
                                                ";
                                            }

                                            if($row->trash == 0){
                                                echo "
                                                    <button id=".$row->id." type='button' class='btn btnBorrar' data-bs-toggle='modal' data-bs-target='#borrarModal'><i class='fas fa-user-slash'></i></button>
                                                ";
                                            }else{
                                                echo "
                                                    <button id=".$row->id." type='button' class='btn btnBorrar' data-bs-toggle='modal' data-bs-target='#borrarModal' disabled><i class='fas fa-user-slash'></i></button>
                                                ";
                                            }
                                            echo "
                                                    </td>
                                                </tr>
                                            ";
                                        }while($row = $stmtSearch->fetch());
                                    }else{
                                        echo "No se encontraron resultados";
                                    }
                                }else{

                                    if(isset($_GET['type'])){
                                        if($_GET['type'] == 0){
                                            $type = $_GET['type'];
                                            $members = "SELECT * FROM users LIMIT $start,5";
                                        }elseif($_GET['type'] == 1){
                                            $type = $_GET['type'];
                                            $members = "SELECT * FROM users WHERE status = 1 LIMIT $start,5";
                                        }elseif($_GET['type'] == 2){
                                            $type = $_GET['type'];
                                            $members = "SELECT * FROM users WHERE trash = 1 LIMIT $start,5";
                                        }
                                    }else{
                                        $type = 0;
                                        $members = "SELECT * FROM users LIMIT $start,5";
                                    }
                                    // Members
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
                                                    <button id='$row->id' type='button' class='btn btnEdit' data-bs-toggle='modal' data-bs-target='#editModal'><i class='far fa-edit'></i></button>";
                                        if($row->status == 1){
                                            echo "
                                                <button id=".$row->id." type='button' class='btn btnAlta' data-bs-toggle='modal' data-bs-target='#altaModal'><i class='far fa-user'></i></button>
                                            ";
                                        }else{
                                            echo "
                                                <button id=".$row->id." type='button' class='btn btnAlta' data-bs-toggle='modal' data-bs-target='#altaModal' disabled><i class='far fa-user'></i></button>
                                            ";
                                        }

                                        if($row->trash == 0){
                                            echo "
                                                <button id=".$row->id." type='button' class='btn btnBorrar' data-bs-toggle='modal' data-bs-target='#borrarModal'><i class='fas fa-user-slash'></i></button>
                                            ";
                                        }else{
                                            echo "
                                                <button id=".$row->id." type='button' class='btn btnBorrar' data-bs-toggle='modal' data-bs-target='#borrarModal' disabled><i class='fas fa-user-slash'></i></button>
                                            ";
                                        }
                                        echo "
                                                </td>
                                            </tr>
                                        ";
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end">
                            <?php
                                if($pag == 1){
                                    echo "
                            <li class='page-item disabled'>
                                    ";
                                }else{
                                    echo "
                            <li class='page-item'>
                                    ";
                                }
                            ?>
                                <a class="page-link" href="index.php?type=<?php echo $type; ?>&pag=<?php echo $pag-1; ?>" tabindex="-1">Previous</a>
                            </li>
                            <?php
                                if($pag == $totalPages){
                                    echo "
                            <li class='page-item disabled'>
                                    ";
                                }else{
                                    echo "
                            <li class='page-item'>
                                    ";
                                }
                            ?>
                                <a class="page-link" href="index.php?type=<?php echo $type; ?>&pag=<?php echo $pag+1; ?>">Next</a>
                            </li>
                        </ul>
                    </nav>
                    <a href='index.php?type=0'><button class="btn btn-secondary">Todos</button></a>
                    <a href='index.php?type=1'><button class="btn btn-secondary">Alta</button></a>
                    <a href='index.php?type=2'><button class="btn btn-secondary">Baja</button></a>

                </div>
            </main>
        </div>
    </div>

<?php
    require_once("editModal.php");
    require_once("altaModal.php");
    require_once("borrarModal.php");
    require_once("footer.php");
?>