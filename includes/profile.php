<?php
require_once('./core/db_connect.php');
$userid = $_SESSION['siuser'];
  $sql="SELECT * FROM `users`WHERE ID_user = '1' = '$userid'"; 
    $query=mysql_query($sql); 
     
    $user = mysql_fetch_assoc($query);



?>


<!--DETAILS MODAL-->

    <div class="modal fade details-1" id="profile" tabindex="-1" role="dialog" aria-labelledby="details-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-margin-top" >
             
           <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">
                            &times;
                        </span>
                    </button>
                    <h4 class="modal-title text-center"><?php echo $_SESSION['user_name'];?></h4>
                </div>
                
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="center-block">
                                   
                                    <?php 
 $u_ID = $_SESSION['siuser'];
  echo '<img class="details image-responsive" src="data:image/jpeg;base64,'.base64_encode($user['pic']).'"/>'; ?>
                                </div>
                               
                                    <div class="form-group">
                                        <div class="col-9">
                                          
                                        </div>

                                    </div>
                                 
                               
                            </div>
                            <div class="col-sm-6">
                                <h4>E-mail</h4>
                                
                                <p><?php echo $user['email'];?></p>
                                <hr />
                                <p>admin: <?php 

if ($user['admin']==0) {
    
    echo 'no';
}
else{
echo 'yes';}?></p>
                                
                               
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default btn-main-sm" data-dismiss="modal">close</button>
                   
                  
               
                         <button class="btn btn-main-sm" data-toggle="modal" data-target="#editprofile"> Edit profile</button>
                   
                    
         
                    
                    
                    
                
                </div>
                     
            </div>

        </div>

    </div>
 