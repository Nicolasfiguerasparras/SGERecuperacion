<?php require_once('header.php') ?>
    
    <div class="container-fluid">

        <div class="row header">
        
            <div class="col-3 logo">
            
            </div>

            <div class="col-9 topNav">
                <form class="d-flex search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>

        </div>
        
        <div class="row">
            
            <div class="col-3 lateralNav">

                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Front end</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../login/logout.php">Logout</a>
                    </li>
                </ul>

            </div>

            <div class="col-9 mainContent">

                <div class="row topContent">
                    <div class="col-10">

                        <h2>Dashboard</h2>

                    </div>

                    <div class="col-2">

                        <button>Refresh</button>

                    </div>
                </div>

                <div class="row centerContent">
                    <h2>Center</h2>
                </div>

                <div class="row bottomContent">
                    <h2>Bottom</h2>
                </div>

                <div class="row footer">
                    <h2>Footer</h2>
                </div>
            
            </div>

        </div>
        
    </div>

<?php require_once('footer.php') ?>