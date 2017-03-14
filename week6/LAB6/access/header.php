<?php  

$logout = filter_input(INPUT_GET, 'logout');

if ( $logout == 1 ) {
   unset($_SESSION['userid']);   
   header('Location: ../users/login.php');  
}


if ( isset($_SESSION['userid']) &&
        $_SESSION['userid'] != 0 ) {
   echo '<a href="?logout=1">Logout</a>';   
}

?>
