 <div class="row">

                        <!--    <div class="col-sm-4 col-lg-4 col-md-4">
                                <div class="thumbnail">
                                    <img src="http://placehold.it/320x150" alt="">
                                    <div class="caption">
                                        <h4 class="pull-right">$24.99</h4>
                                        <h4>
                                            <a href="#">First Product</a>
                                        </h4>
                                        <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                   <button type="button" class="btn btn-main" data-toggle="modal" data-target="#details-1">Details</button>
                                </div>
                            </div> -->
      <?php 
  
    $sql="SELECT * FROM products ORDER BY name ASC"; 
    $query=mysql_query($sql); 
      
    while ($row=mysql_fetch_array($query)) { 
          
?> 
     <div class="col-sm-4 col-lg-4 col-md-4">
                                <div class="thumbnail">
                                    <img class="img-thumbnail" src="<?php echo $row['image'] ?>" style="
    height: 150px;
" alt="">
                                    <div class="caption">
                                        <h4 class="pull-right">$<?php echo $row['price'] ?></h4>
                                        <h4>
                                            <a href="#"><?php echo $row['Name'] ?></a>
                                        </h4>
                                        <p><?php echo $row['description'] ?></p>
                                    </div>
                                   <button type="button" class="btn btn-main" onclick="detailsmodal(<?php echo $row['ID_Int'] ?>)">Details</button>
                                  
                                </div>
                            </div>
     
    <!-- <a href="index.php?page=products&action=add&id=<?php echo $row['id_product'] ?>">Add to cart</a>
-->
<?php 
          
    } 
  
?>

                        </div>