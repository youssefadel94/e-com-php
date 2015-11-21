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
    $sql = "DELETE FROM cart WHERE p_id = '$delete_id' AND user_id = '$u_ID' AND order_no = '0' ";
    $query=mysql_query($sql);
     header('location: index.php');
}



//edit profile

 if (isset($_POST['edit'])) {
      $user_id = $_SESSION['siuser'];
      $sql = "SELECT * FROM `users` WHERE ID_user = '$user_id'";
     $query=mysql_query($sql);
    $user = mysql_fetch_assoc($query);
     if(isset($_POST['Name']) && !empty($_POST['Name'])){
   $check = (int)1;
 $Name = mysql_real_escape_string($_POST['Name']);
     }else{
         $check = (int)0;
    $Name = $user['name']; }
     if(isset($_POST['pass']) && !empty($_POST['pass'])){
$pass = mysql_real_escape_string($_POST['pass']);
         $passr = mysql_real_escape_string($_POST['passr']);
     }else{
         $pass = $user['password'];
          $passr = $user['password'];
     }
      if(isset($_POST['email']) && !empty($_POST['email'])){
$email = mysql_real_escape_string($_POST['email']);
      }else{
          $email = $user['email'];
      }
     if(isset($_POST['pic']) && !empty($_POST['pic'])){
         $tmpname = $_FILES['pic']['tmp_name'];
         $fp = fopen($tmpname,'r');
         $content= fread($fp,filesize($tmpname));
         $content = addslashes($content);
         fclose($fp);
$pic = mysql_real_escape_string($_POST['pic']);
      }else{
          $pic = $user['pic'];
      }

      $tmpname = $_FILES['pic']['tmp_name'];
         $fp = fopen($tmpname,'r');
         $content= fread($fp,filesize($tmpname));
         $content = addslashes($content);
         fclose($fp);

      $sql = "SELECT * FROM `users` WHERE name = '$Name'";
     $query=mysql_query($sql);
    $user = mysql_fetch_assoc($query);
     
     if ($check == 1) {
     
$usercount = mysql_num_rows($query);}
     else{$usercount = 0 ;}
    if ($usercount>0) {
        echo "<script type='text/javascript'>alert('this username already exist !');</script>";

       
    }
    else{
        if ($pass==$passr) {  
        
        $sql = "UPDATE `e-commerce`.`users` SET `name` = '$Name', `email` = '$email', `password` = '$pass', `pic` = '$content' WHERE `users`.`ID_user` = '$user_id'";
             $query=mysql_query($sql);
            $_SESSION['user_name'] = $Name;
            echo "<script type='text/javascript'>alert('profile updated !');</script>";
            
        
        }
        else{
            echo "<script type='text/javascript'>alert('password doesnt match !');</script>";
           
        }
    }
     
     
     

                                }




?>

<div id="wrapper">
  
<?php

  include 'includes/navigation.php'; 

  include 'includes/featured.php';
 

?>
  
     </div>

<?php

 // include 'includes/detailsmodel.php';
  include 'includes/loginmodel.php';
if (isset($_SESSION['siuser'])) {
  include 'includes/cart.php';
  include 'includes/profile.php'; 
    include 'includes/editprofile.php'; 
}
  include 'includes/footer.php';
?>

        

    

  





