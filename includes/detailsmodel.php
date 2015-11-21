<?php
require_once('../core/db_connect.php');
$id = $_POST{'ID'};
$id = (int)$id;



//echo "<script type='text/javascript'>alert('$id');</script>";
$sql = "SELECT * FROM products WHERE ID_Int = '$id'";
 
$result=mysql_query($sql); 
 //  $num=mysql_num_rows($result);   
   // if(0==$num)
//{
//echo "<script type='text/javascript'>alert('empty');</script>";


//}

$product = mysql_fetch_assoc($result);

//add to cart


?>

<!--DETAILS MODAL-->
<?php ob_start();?>
    <div class="modal fade details-1" id="details-modal" tabindex="-1" role="dialog" aria-labelledby="details-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-margin-top" >
            
             
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" onclick="closemodal()" aria-label="close">
                        <span aria-hidden="true">
                            &times;
                        </span>
                    </button>
                    <h4 class="modal-title text-center"><?php echo $product['Name'];?></h4>
                </div>
                 <form action="index.php" method="post">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="center-block">
                                    <img src="<?php echo $product['image'];?>" alt="" class="details image-responsive">
                                </div>
                               
                                    <div class="form-group">
                                        <div class="col-9">
                                            <label for="quantity">Quantity:</label>
                                            <input type="number" min="1"
                                                max="<?php echo $product['available'];?>"    class="form-control" id="quantity" name="quantity" value="<?php if(isset($_POST['quantity'])){
    $_POST['quantity'];
}?>" required/>
                                        </div>

                                    </div>
                                    <div class="row">
                                     <!--   <label for="size">Size:</label>
                                        <select name="size" id="size" class="form-control">
                                            <option value="s">s</option>
                                            <option value="m">m</option>
                                            <option value="l">l</option>
                                            <option value="xl">xl</option>
                                        </select>-->
                                    </div>
                               
                            </div>
                            <div class="col-sm-6">
                                <h4>Details</h4>
                                
                                <p><?php echo $product['description'];?></p>
                                <hr />
                                <p>Price: <?php echo $product['price'];?> $</p>
                                
                                <p>available:  <?php
$out = "Out of stock";
if ($product['available'] == 0) {
    echo $out;
}
else{
echo $product['available'];
}?></p>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default btn-main-sm" onclick="closemodal()">close</button>
                   <?php 
if ($product['available'] > 0) { ?>

                      <?php if (!isset($_SESSION['siuser'])) {
                 ?>
                
               <button class="btn btn-main-sm" data-toggle="modal" data-target="#log" onclick="closemodalsign()"><span class="glyphicon glyphicon-shopping-cart"></span> Sign in to buy !</button>
                    
                    <?php }
                else{
                    $_SESSION['p_id'] = $id;
                    ?>
               
                         <button class="btn btn-main-sm" type="submit" name="add_cart"><span class="glyphicon glyphicon-shopping-cart"></span> Add to cart</button>
                   
                    
                    <?php }
                    
                        ?>
                    
                    
                   
                     <?php   
}
?>
                    
                    
                    
                
                </div>
                     </form>
            </div>
            
        </div>

    </div>
  <script>
        function closemodal() {
            jQuery('#details-modal').modal('hide');
            setTimeout(function () {
                jQuery('#details-modal').remove();
                jQuery('.modal-backdrop').remove();
            }, 500);
        }
      function closemodalsign() {
            jQuery('#details-modal').modal('hide');
            setTimeout(function () {
                jQuery('#details-modal').remove();
               
            }, 500);
        }
    </script>
<?php echo ob_get_clean();?>