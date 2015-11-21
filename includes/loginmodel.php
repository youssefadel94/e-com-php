<?php
require_once('./core/db_connect.php');


//sign in
if (isset($_POST['sign_in'])) {
    

  
}
//sign-up


?>


<!--DETAILS MODAL-->

    <div class="modal fade details-1" id="log" tabindex="-1" role="dialog" aria-labelledby="details-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-margin-top" >
             
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">
                            &times;
                        </span>
                    </button>
                    <br/>
                    <h4 class="modal-title text-center"></h4>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6 " style="border-right: inset 2px gainsboro;">
                                <div class="center-block">
                                        <h4 style="
    text-align: center;
">Sign-in</h4>
                                    <hr/>
                             
                                    <form class="form-inline" action="index.php" method="post">
                                        <div class="form-group">
                                           <label>User name or e-mail:</label>
                                            <input type="text" name="Name" id="Name" class="form-control" value="<?php if(isset($_POST['Name'])){
    $_POST['Name'];}?>" required>
                                                
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="pass" id="pass" class="form-control" value="<?php if(isset($_POST['pass'])){
    $_POST['pass'];} ?>" required>
                                                
                                           
                                        </div>
                                <div class="form-group">
                                 <input type="submit" name="sign_in" value="sign in" class="btn btn-main-sm" href="/e-com">
                       </div>
                                        
                                    </form>
                                </div>
                              
                            </div>
                            <div class="col-sm-6">
                                 <div class="center-block">
                                    <h4 style="
    text-align: center;
">Sign-up</h4>
                                    <hr/>
                                    
                                     
                                     <form action="index.php" method="post">
                                        <div class="form-group">
                                            <label>User name:</label>
                                            <input type="text" name="Name" id="Name" class="form-control" value="<?php if(isset($_POST['Name'])){
    $_POST['Name'];}?>" required>
                                                
                                           
                                            
                                            
                                             <label>E-mail:</label>
                                            <input type="email" name="email" id="email" class="form-control" value="<?php if(isset($_POST['email'])){
    $_POST['email'];}?>" required>
                                                
                                          
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="pass" id="pass" class="form-control" value="<?php if(isset($_POST['pass'])){
    $_POST['pass'];} ?>" required>
                                                
                                            
                                
                                <label>Repeat Password :</label>
                                            <input type="password" name="passr" id="passr" class="form-control" value="<?php if(isset($_POST['passr'])){
    $_POST['passr'];} ?>" required>
                                                
                                            
                
                                        </div>
                                <div class="form-group">
                                   <input type="submit" name="sign_up" value="sign up" class="btn btn-main-sm">
                          </div>
                                        
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
           
            </div>

        </div>

    </div>
 