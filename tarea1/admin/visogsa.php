<?php
    
        $host_name = 'localhost';
        $database = 'visogsa';
        $user_name = 'root';
        $password = '';
        $db = mysqli_connect($host_name, $user_name, $password, $database);
        
        if (!$db) {
            echo "Error: No se pudo conectar a MySQL.". PHP_EOL;
            echo "Error de depuración: ". mysqli_connect_errno() . PHP_EOL;
            echo "Error de depuración: ". mysqli_connect_error() . PHP_EOL;
            exit;
        }
        mysqli_set_charset($db,'utf8');
        

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

        <!-- Font -->
        <link href="https://fonts.googleapis.com/css2?family=Bitter:wght@400;700&display=swap" rel="stylesheet">

        <!-- Title icon -->
        <link rel="icon" type="image/png" href="login/images/icons/home.ico"/>

        <!-- Bootstrap maxcdn -->
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/js/bootstrap-select.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" /> -->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
        <link rel="stylesheet" href="lib/dropzone/dist/dropzone.css">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="styles.css">

        <title>Registro E/S</title>
    </head>
    <body>

    <div class="container-fluid">

        <br>

        <div class="row">
            <div class="col-6 offset-3">
                <h1 class="h1" style="text-align:center">Buscar documento para baja</h1>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-10 offset-1">
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="form-group row">
                        <label for="clave_documento" class="col-2 col-form-label">Código</label>
                        <div class="col-4">
                            <input type="text" class="form-control" name="clave_documento" id="clave_documento" aria-describedby="clave_documento">
                        </div>
                        <label for="fecha" class="col-2 col-form-label">Fecha</label>
                        <div class="input-group input-daterange col-4">
                            <input type="date" name="fecha_inicio" class="form-control">
                            <div class="input-group-addon">a</div>
                            <input type="date" name="fecha_fin" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tercero" class="col-2 col-form-label">Tercero</label>
                        <div class="col-4">
                            <input type="text" class="form-control" name="tercero" id="tercero" aria-describedby="tercero">
                        </div>
                        <label for="centro_coste" class="col-2 col-form-label">Centro de coste</label>
                        <div class="col-4">
                            <input type="text" class="form-control" name="centro_coste" id="centro_coste" aria-describedby="centro_coste">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary" style="width: 100%" name="submit">Buscar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <br><br>

        <?php
            if(isset($_POST['submit'])){
                $clave_documento = $_POST['clave_documento'];
                $fecha_inicio = $_POST['fecha_inicio'];
                $fecha_fin = $_POST['fecha_fin'];
                $tercero = $_POST['tercero'];
                $centro_coste = $_POST['centro_coste'];

                $query = mysqli_query($db, "SELECT * FROM registros WHERE clave_documento LIKE '%$clave_documento%' OR nombre_tercero LIKE '%$tercero%' OR descripcion LIKE '%$centro_coste%' OR fecha BETWEEN '$fecha_inicio' AND '$fecha_fin'");
                $row = mysqli_fetch_array($query, MYSQLI_ASSOC);

                if($row != ""){
        ?>

        <div class="row">
            <div class="col-10 offset-1">
                <table class="table" id="table_id" style="content-align: center">
                    <thead>
                        <tr>
                            <th scope="col">Clave de documento</th>
                            <th scope="col">NIF/CIF</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>

                        <?php
                            
                            echo "<tbody>";
                                do{
                                    echo "
                                        <tr>
                                            <td>".$row['clave_documento']."</td>
                                            <td>".$row['nif_cif']."</td>
                                            <td>".$row['telefono_movil']."</td>
                                            <td><a href='../index.php?id_documento=".$row['id_documento']."'>Escoger</a></td>
                                        </tr>
                                    ";
                                }while($row = mysqli_fetch_array($query, MYSQLI_ASSOC));
                            echo "</tbody>";
                    ?>
                    
                </table>
            </div>
        </div>

        <?php
                }else{
                    echo "<p style='text-align: center'>No se encontraron resultados...</p>";
                }
            }
        ?>
    </div>

    <script>
        $(document).ready(function(){
            $('#table_id').DataTable( {
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
                    // "pagingType": "full_numbers"
                }
            } );
        });
    </script>

    </body>
</html>