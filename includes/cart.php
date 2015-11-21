<?php
require_once('./core/db_connect.php');





?>


<!--DETAILS MODAL-->

    <div class="modal fade details-1" id="cart" tabindex="-1" role="dialog" aria-labelledby="details-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-margin-top" >
             
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">
                            &times;
                        </span>
                    </button>
                    <br/>
                    <h4 class="modal-title text-center">Cart</h4>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4 text-center"><p>Name</p></div>
                            <div class="col-md-2 text-center"><p>Price</p></div>
                                
                            <div class="col-md-3 text-center"><p>Quantity</p></div>
                                
                            <div class="col-md-2 text-center"><p>Remove</p></div>
                                
                           
                        </div>
                        <hr/>
                      <?php   $user_id = $_SESSION['siuser'];
    $sql="SELECT * FROM `products` JOIN `cart` ON `cart`.`p_id` = `products`.`ID_Int` WHERE user_id = '$user_id' AND order_no = '0'"; 
    $query=mysql_query($sql); 
     
    while ($row=mysql_fetch_array($query)) { ?>
                        
                        <div class="row">
                                <div class="col-md-4 text-center"><a href="#" onclick="detailsmodal(<?php echo $row['ID_Int'] ?>)"><?php echo $row['Name'] ?></a></div>
                            <div class="col-md-2 text-center"><p>$ <?php echo $row['price'] ?></p></div>
                                
                            <div class="col-md-3 text-center"><p><?php echo $row['quantity'] ?></p></div>
                                
                            <div class="col-md-2 text-center"><a href="index.php?delete=<?php echo $row['p_id']?>" class="btn btn-xs btn-main-sm"><span class="glyphicon glyphicon-remove-sign"></span></a></div>
                            
                        </div>
                        <?php } ?>
                        <hr/>
                       <div class="row">
                           <div class="col-md-8" ></div>
                           <div class="col-md-4" >
                               <div class="row text-center">  <h4>Total</h4></div><hr/>
                               <?php   $user_id = $_SESSION['siuser'];
    $sql="SELECT price , quantity FROM `products` JOIN `cart` ON `cart`.`p_id` = `products`.`ID_Int` WHERE user_id = '$user_id' AND order_no = '0'"; 
    $query=mysql_query($sql); 
     $total = (int) 0 ;
    while ($row=mysql_fetch_array($query)) {
       $mtotal = $row['price'] * $row['quantity'];
        $total = $total + $mtotal;
    } 
                             echo  "<h4 class='text-center'>$  $total</h4>";
                                   ?>
                           </div></div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <a class="btn btn-main" href="invoice" ><span class="glyphicon glyphicon-ok"></span> Check out</a>
                </div>
            </div>

        </div>

    </div>
 