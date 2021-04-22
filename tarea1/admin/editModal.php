<?php
    require_once('../dbArrayConf.php');
    if(isset($_POST['user_id'])){
        $queryUser = "SELECT * FROM users WHERE id = $_POST[user_id]";
        $stmt = $dbh->prepare($queryUser);
        $stmt->execute();
    
        $row = $stmt->fetch();
    }
?>
<!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-full-height modal-right">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="inputAddress">Username <?php print_r($row); ?></label>
                            <input type="text" class="form-control" id="inputAddress" value="<?php echo $row['username']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Password</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">First name</label>
                            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Last name</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Email account</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Address</label>
                            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Address</label>
                            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Address</label>
                            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Address</label>
                            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                        </div>
                        <!-- <div class="form-group">
                            <label for="inputAddress2">Address</label>
                            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Address</label>
                            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Address</label>
                            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Address</label>
                            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                        </div> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                
                </form>
            </div>
        </div>
    </div>