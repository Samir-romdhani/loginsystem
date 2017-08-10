<?php
require_once("User/class.user.php");
    $user = new USER();
    $member = new member();

///////////////Requet Evenements ////////////////
$stmt3 = $user->runQuery("SELECT about, descriptions  FROM evenements ORDER BY id ASC");
$stmt3->execute();
$num3 = $stmt3->rowCount();
////////////////////////////////////////////////

/////////////////Requete Membres/////////////////
$stmt2 = $user->runQuery("SELECT user_id , user_name  FROM _Membres ORDER BY user_id DESC");
$stmt2->execute();
$num2 = $stmt2->rowCount();

/////////////////////////////////////////////////

/////////////////Requete Membres 2/////////////////
// $stmt4 = $user->runQuery("SELECT user_name , joining_date , user_email , Office FROM _Membres ORDER BY user_id ASC");
// $stmt4->execute();
// $num4 = $stmt4->rowCount();
////////////////////////////////////////////////?>