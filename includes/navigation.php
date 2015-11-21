

<!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <!-- Top Menu Items -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">E-commerce</a>
            </div>
            <ul class="nav navbar-right top-nav" style="
    float: right;
    padding: 0;
">
               
             
                <?php if (!isset($_SESSION['siuser'])) {
                 ?>
                <li>
                        <a href="#" data-toggle="modal" data-target="#log"><i class="fa fa-user"></i> Sign-in/up</a>
                    </li>
                <?php }
                
                else{?>
                   <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-shopping-cart fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                         <?php 
  $user_id = $_SESSION['siuser'];
    $sql="SELECT * FROM `products` JOIN `cart` ON `cart`.`p_id` = `products`.`ID_Int` WHERE user_id = '$user_id' AND order_no = '0'"; 
    $query=mysql_query($sql); 
      $count3 = (int)3;
    while ($row=mysql_fetch_array($query)) { 
        if ($count3 == 0 ) {break;}
        $count3 = $count3-1;
          
?>
                        
                        <li>
                            <a href="#" data-toggle="modal" data-target="#cart">
                                <div>
                                <?php echo $row['Name']?>
                                   
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <?php }?>
                        <li>
                            <a class="text-center" href="#" data-toggle="modal" data-target="#cart">
                                <strong>View all items</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                
                
                <li class="dropdown">
                    <!--login-handle-->
                    
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-user"></i> <?php echo $_SESSION['user_name'];
                       ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#" data-toggle="modal" data-target="#profile"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <?php if ($_SESSION['user_admin']==1) {?>
                        <li>
                            <a href="admin"><i class="fa fa-fw fa-envelope"></i> Admin area</a>
                        </li>
                        
                       <?php }
                    
                        ?>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
                <?php }  ?>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="navbar-collapse navbar-ex1-collapse collapse" style="height: 1px;">
                <ul class="nav navbar-nav side-nav">

                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <span class="fa fa-search"></span>       
                                </button>
                            </span>
                        </div>
                        <!-- /input-group -->
                    </li>


                    <li class="active">
                        <a href="index.php"><i class="fa fa-fw fa-desktop"></i> Featured</a>
                    </li>
<?php if (isset($_SESSION['siuser'])) {
                 ?>
                     <li>
                        <a href="history.php"><i class="fa fa-fw fa-history"></i> History of purchases</a>
                    </li>
                    
                    <?php }?>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo" class="collapsed"><i class="fa fa-fw fa-arrows-v"></i> Catigories <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse" style="height: 0px;">
                            
<!--distinct catigories     video25 filter-->
                          <?php
                            $sql1="SELECT DISTINCT cat FROM products"; 
    $pquery=mysql_query($sql1); 
 while ($row=mysql_fetch_array($pquery)) { 
                            ?>  
                            <li>
                                <a href="#"><?php echo $row['cat'] ?></a>
                            </li>
                           
                            <?php 
          
    } 
  
?>
                            
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-file"></i> Blank Page</a>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>