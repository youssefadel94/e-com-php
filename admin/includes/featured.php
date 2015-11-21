<?php
$errors = array();
// errors handeling in video 9 

//edit video 10 TODO
if (isset($_GET['edit'])&& !empty($_GET['edit'])) {
   $edit_id = (int)$_GET['edit'] ;
    $edit_id = mysql_real_escape_string($edit_id);
    $sql = "select * FROM products WHERE ID_Int = '$edit_id'";
    $query=mysql_query($sql);
    $editp=mysql_fetch_assoc($query);
     header('location: index.php');
}


//delete
if (isset($_GET['delete'])&& !empty($_GET['delete'])) {
   $delete_id = (int)$_GET['delete'] ;
    $delete_id = mysql_real_escape_string($delete_id);
    $sql = "DELETE FROM products WHERE ID_Int = '$delete_id'";
    $query=mysql_query($sql);
     header('location: index.php');
}

//submit add an add category && cehcking if exist && featured

//archived products video 20

if (isset($_POST['add_submit'])) {
    /*
    $Name = mysql_real_escape_string($_POST['Name']);
    $price = mysql_real_escape_string($_POST['price']);
    $des = mysql_real_escape_string($_POST['des']);
    $stock = mysql_real_escape_string($_POST['stock']);
    //add image and category
    $sql = "INSERT INTO products (Name,price,description,available) 
    VALUES ('$Name','$price','$des','$stock')";
     $query=mysql_query($sql);*/
    header('location: index.php');
}
?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div id="page-wrapper" style="min-height: 400px;">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Products</h1>
                            
                        </div>
                        
                    </div>
                  
                    <div class="row">
                        
                        <div class="col-md-12 " >


    <div class="caption">
        <div class="col-md-2">
            <p>  Name</p>
        </div>
        <div class="col-md-1">
            <p> Price</p>
        </div>
        <div class="col-md-6">
            <p>Description</p>
        </div>
        <div class="col-md-1">
            <p> In stock</p>
        </div>
        <div class="col-md-1">
            <p>Catigory</p>
        </div>

        <div class="col-md-1">
            <p>Edit|delete   </p>
        </div>

    </div>
                       
                            
                        </div>
                    </div>
                    <hr/>
                   
                
                     <?php 
  
    $sql="SELECT * FROM products ORDER BY name ASC"; 
    $query=mysql_query($sql); 
      
    while ($row=mysql_fetch_array($query)) { 
          
?> 
                    <div class="row" >
                        
      
                        <div class="col-md-12 " style="
    min-height: 35px;
">
                         
                        
                            <div class="caption">
                        <div class="col-md-2">
                            <p>  <?php echo $row['Name'] ?></p>
                        </div>
                         <div class="col-md-1">
                             <p> $ <?php echo $row['price'] ?></p>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo $row['description'] ?></p>
                        </div>
                        <div class="col-md-1">
                           <p> <?php echo $row['available'] ?></p>
                        </div> 
                         <div class="col-md-1"><p><?php echo $row['cat'] ?></p></div>
                            
                        <div class="col-md-1">
                            <a href="index.php?edit=<?php echo $row['ID_Int']?>" class="btn btn-xs btn-main-sm"><span class="glyphicon glyphicon-pencil"></span></a>
                            <a href="index.php?delete=<?php echo $row['ID_Int']?>" class="btn btn-xs btn-main-sm"><span class="glyphicon glyphicon-remove-sign"></span></a>
                        </div>
                       
                            </div>
                          </div> 
                 
                        </div>
<br/>
<hr/>
                        <?php 
          
    } 
  
?>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
