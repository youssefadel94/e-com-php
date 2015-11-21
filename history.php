<?php 




    require("core/db_connect.php"); 
    

  include 'includes/head.php';

      //sign-in
                                if (isset($_POST['sign_in'])) {
    
 $Name = mysql_real_escape_string($_POST['Name']);
$pass = mysql_real_escape_string($_POST['pass']);
    //Fix image and category
    $sql = "SELECT * FROM `users` WHERE (name = '$Name' OR email = '$Name') AND password = '$pass'";
     $query=mysql_query($sql);
    $user = mysql_fetch_assoc($query);
$usercount = mysql_num_rows($query);
    if ($usercount>0) {

        $user_id = $user['ID_user'];
       // login($user_id);
        $_SESSION['siuser'] = $user_id;
         $_SESSION['user_name'] = $Name;
        $_SESSION['success_flash'] = 'welcome back, '.$Name.' !';
        
        //check if admin
        if ($user['admin']==1) {
             $_SESSION['user_admin'] = 1;
        }
        else{
            $_SESSION['user_admin'] = 0;
        }
        
        // header('location: index.php');
         echo "<script type='text/javascript'>alert('welcome back');</script>";
    }
    else{
         echo "<script type='text/javascript'>alert('this user doesnt exist !');</script>";
        
    }
 
                                }

                                     //sign-up
                                     
                                          if (isset($_POST['sign_up'])) {
    
 $Name = mysql_real_escape_string($_POST['Name']);
$pass = mysql_real_escape_string($_POST['pass']);
$email = mysql_real_escape_string($_POST['email']);
$passr = mysql_real_escape_string($_POST['passr']);
    //Fix image and category
   
    $sql = "SELECT * FROM `users` WHERE password = '$pass' AND name = '$Name'";
     $query=mysql_query($sql);
    $user = mysql_fetch_assoc($query);
$usercount = mysql_num_rows($query);
    if ($usercount>0) {
        echo "<script type='text/javascript'>alert('this user already exist !');</script>";

       
    }
    else{
        if ($pass==$passr) {
        $sql = "INSERT INTO users (`name`,`email`,`password`) VALUES ('$Name', '$email', '$pass')";
             $query=mysql_query($sql);
            
             $sql = "SELECT * FROM `users` WHERE password = '$pass' AND name = '$Name'";
     $query=mysql_query($sql);
    $user = mysql_fetch_assoc($query);
             $user_id = $user['ID_user'];
       // login($user_id);
        $_SESSION['siuser'] = $user_id;
         $_SESSION['user_name'] = $Name;
        $_SESSION['success_flash'] = 'welcome , '.$Name.' !';
            echo "<script type='text/javascript'>alert('welcome , '.$Name.' !');</script>";
            
             $_SESSION['user_admin'] = 0;
            
        }
        else{
            echo "<script type='text/javascript'>alert('password doesnt match !');</script>";
           
        }
    }
 
}
                                    
                                    
                                    
//cart
if (isset($_POST['add_cart'])) {
  
    $u_ID = $_SESSION['siuser'];
    $id = $_SESSION['p_id'];
    $q = mysql_real_escape_string($_POST['quantity']);
   $sql = "SELECT * FROM `cart` WHERE `cart`.`p_id`='$id'";
     $query=mysql_query($sql);
  
    $in_cart = mysql_num_rows($query);
    if ($in_cart>0){
         $sql = "UPDATE `e-commerce`.`cart` SET `quantity` = '$q' WHERE `cart`.`user_id` = '$u_ID' AND `cart`.`p_id` = '$id'";
     $query=mysql_query($sql);
    
    }
    else{
    //Fix image and category
    $sql = "INSERT INTO `cart` (`user_id`, `p_id`, `quantity`) VALUES ('$u_ID', '$id', '$q')";
     $query=mysql_query($sql);
    header('location: index.php');
    }
}

//delete
if (isset($_GET['delete'])&& !empty($_GET['delete'])) {
    $u_ID = $_SESSION['siuser'];
   $delete_id = (int)$_GET['delete'] ;
    $delete_id = mysql_real_escape_string($delete_id);
    $sql = "DELETE FROM cart WHERE p_id = '$delete_id' AND user_id = '$u_ID' ";
    $query=mysql_query($sql);
     header('location: index.php');
}
?>

<div id="wrapper">
  
<?php

  include 'includes/navigation.php'; 

  include 'includes/history.php';
 

?>
  
     </div>

<?php

 // include 'includes/detailsmodel.php';
  include 'includes/loginmodel.php';
  include 'includes/cart.php';
  include 'includes/footer.php';
?>

        

    

  





