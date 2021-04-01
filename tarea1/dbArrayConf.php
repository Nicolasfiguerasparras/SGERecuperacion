<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    $config = array(
            'driver'=> 'mysql',
            'host'=> 'localhost',
            'dbname'=> 'tarea1',
            'username' => 'root',
            'password' => '',
    );
    
    require_once('function.php');
    require_once('DBConnector.php');
    $dbc = new DBConnector($config);

    $dbh = $dbc->getConnection();