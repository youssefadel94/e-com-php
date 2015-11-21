<?php
require_once('../core/db_connect.php');


//submit

?>


<!--DETAILS MODAL-->

    <div class="modal fade details-1" id="details-add" tabindex="-1" role="dialog" aria-labelledby="details-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-margin-top" >
             <form class="form-inline" action="index.php" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">
                            &times;
                        </span>
                    </button>
                    <h4 class="modal-title text-center"><input placeholder="Product name" type="text" name="Name" id="Name" class="form-control" value="<?php if(isset($_POST['Name'])){
    $_POST['Name'];
}?>" required>
                                    
                                
                                </input></h4>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="center-block">
                                    <h4>Image URL:</h4>
                                    <p>
                                        <input placeholder="URL" type="url" name="img" id="img" class="form-control" value="<?php if(isset($_POST['img'])){
    $_POST['img'];
}?>"required></input>
                             <hr />           
                                    </p>
                            <p>Category:
                                        <input placeholder="category" type="text" name="cat" id="cat" class="form-control" value="<?php if(isset($_POST['cat'])){
    $_POST['cat'];
}?>"required></input>
                                        
                                    </p>
                                </div>
                              
                            </div>
                            <div class="col-sm-6">
                                <h4>Details</h4>
                                
                                <p><input placeholder="Description" type="text" name="des" id="des" class="form-control" value="<?php if(isset($_POST['des'])){
    $_POST['des'];
}?>"required></input></p>
                                <hr />
                                <p>Price: <input placeholder="$$" type="number" step="0.5" min="0" name="price" id="price" class="form-control" value="<?php if(isset($_POST['price'])){
    $_POST['price'];
}?>"required></input></p>
                                
                                <p>available:  <input placeholder="Stock" type="number" min="0" name="stock" id="stock" class="form-control" value="<?php if(isset($_POST['stock'])){
    $_POST['stock'];
}?>"required></input></p>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default btn-main-sm" data-dismiss="modal">cancel</button>
                   <input type="submit" name="add_submit" value="ADD" class="btn btn-main-sm">
                            </input>
                </div>
            </div>
</forum>
        </div>

    </div>
 