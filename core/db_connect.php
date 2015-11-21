  <?php 
  
    $server="localhost"; 
    $user="admin"; 
    $pass="admin"; 
    $db="e-commerce"; 
      
    // connect to mysql 
      
    mysql_connect($server, $user, $pass) or die("Sorry, can't connect to the mysql."); 
      
    // select the db 
      
    mysql_select_db($db) or die("Sorry, can't select the database."); 
  
define('BASEURL', '/e-com/');
   session_start(); 
//if (isset()) {}
?>