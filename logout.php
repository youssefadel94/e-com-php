<?php
require_once('./core/db_connect.php');
 unset($_SESSION['siuser']);
 unset($_SESSION['user_name']);
 unset($_SESSION['success_flash']);
 unset($_SESSION['user_admin']);

 header('location: index.php');
            
?>