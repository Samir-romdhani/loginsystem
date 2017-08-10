<?php
require_once('User/session.php') ;
require_once("User/user_id.php");
    if (isset($_GET['logout'])) {
       $_SESSION['user_session']=0 ;
    }
    //else
     // $session->redirect("http://localhost/labo-user_2/index91.php?ident={$_SESSION['user_session']}") ;
echo "<h2> vous etes deconnecté </h2>" ;
?>