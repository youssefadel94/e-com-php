   
        <div id="page-wrapper" style="min-height:400px;">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div id="page-wrapper" style="min-height: 322px;">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">History of orders</h1>
                        </div>
                    </div>
                    <div class="col-md-12" style="
    float: none;
    margin: auto;
">

                        <?php 
  
    $sql="SELECT DISTINCT order_no FROM `cart`"; 
    $query=mysql_query($sql); 
      
    while ($row=mysql_fetch_array($query)) { 
    
          
?> 

                        <div class="row">
                           <div class="col-md-8">
                               <h4>Order #</h4>
                               <p><?php echo $row['order_no'];?></p>
                               </div>
                            <div class="col-md-4">
                               <a href="invoice/index.php?view=<?php echo $row['order_no']?>" class="btn btn-main">View invoice</a>
                               </div>
                        </div>
                        
                        
                        <?php } ?>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
