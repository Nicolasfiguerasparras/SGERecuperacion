<?php require_once('header.php') ?>
    
    <div class="container-fluid">

        <div class="row header">
        
            <div class="col-2 logo-container">
                <div class="logo">
                
                </div>
            </div>

            <div class="col-10 top-nav">
                
                <div class="search-box">

                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <input type="search" placeholder="Search" aria-label="Search" results="0" class="search"/>

                            <button type="submit" class="fas fa-search"></button>
                        </form>

                    
                </div>

        </div>
        
        <div class="row">
            
            <div class="col-2 lateral-nav">

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

            <div class="col-10 main-content">

                <div class="row top-content">
                    
                    <div class="col-10">

                        <h2>Dashboard</h2>

                    </div>

                    <div class="col-2">

                        <button>Refresh</button>

                    </div>

                </div>

                <div class="row center-content">

                    <div class="col-12">

                        <div class="row">
                        
                            <h3>Home > Dashboard</h3>

                        </div>

                        <div class="row">

                            <div class="col-3 box-members">

                                <h4>New Members Daily</h4>

                            </div>

                            <div class="col-3">
                            
                                <h4>New Members Daily</h4>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="row bottom-content">
                    <h2>Bottom</h2>
                </div>

                <div class="row footer">
                    <h2>Footer</h2>
                </div>
            
            </div>

        </div>
        
    </div>

<?php require_once('footer.php') ?>