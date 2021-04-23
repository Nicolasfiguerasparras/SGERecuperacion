<?php
    require_once('header.php');

    if(isset($_POST['confirmar']))
?>

<div class="container-fluid">

    <div class="row">
    
        <div class="col-10 offset-1">
            <h2>Dar de alta</h2>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <a href="index.php"><button class="btn btn-danger" type="submit" name="cancelar">Cancelar</button></a>
                <button class="btn btn-success" type="submit" name="confirmar">Confirmar</button>
            </form>
            
        </div>

    </div>

</div>

<!-- Modal -->
<!-- <div class="modal fade me-auto" id="altaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Modal Alta
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div> -->