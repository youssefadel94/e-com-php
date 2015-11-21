<?php
require_once('./core/db_connect.php');





?>


<!--DETAILS MODAL-->

    <div class="modal fade details-1" id="editprofile" tabindex="-1" role="dialog" aria-labelledby="details-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-margin-top" >
             <form class="form-inline" action="index.php" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">
                            &times;
                        </span>
                    </button>
                    <h4 class="modal-title text-center">Edit your profile</h4>
                </div>
                
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="center-block">
                                    <label>Uplad image:</label>
                                            <input
                                                    type="file" name="pic" id="pic" class="form-control" value="<?php if(isset($_POST['pic'])){
    $_POST['pic'];}?>" >
                                </div>
                               
                                    <div class="form-group">
                                        <div class="col-9">
                                          <label>User name or e-mail:</label>
                                            <input type="text" name="Name" id="Name" class="form-control" value="<?php if(isset($_POST['Name'])){
    $_POST['Name'];}?>" >
                                            <label>Password</label>
                                            <input type="password" name="pass" id="pass" class="form-control" value="<?php if(isset($_POST['pass'])){
    $_POST['pass'];} ?>" >
                                            <label>Repeat Password :</label>
                                            <input type="password" name="passr" id="passr" class="form-control" value="<?php if(isset($_POST['passr'])){
    $_POST['passr'];} ?>" >
                                            
                                            
                                        </div>

                                    </div>
                                 
                               
                            </div>
                            <div class="col-sm-6">
                                <label>E-mail:</label>
                                            <input type="email" name="email" id="email" class="form-control" value="<?php if(isset($_POST['email'])){
    $_POST['email'];}?>">
                                
                                
                               
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default btn-main-sm" data-dismiss="modal">close</button>
                   
                  
               
                         <button class="btn btn-main-sm" type="submit" name="edit" >Update profile</button>
                   
                    
         
                    
                    
                    
                
                </div>
                     
            </div>
            </form>

        </div>

    </div>
 