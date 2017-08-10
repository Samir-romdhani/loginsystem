<?php 
    require_once("session.php");
    require_once("class.user.php");
    //$session = new USER() ; 
    $user = new USER();
    $member = new member();
    $user_id = $_SESSION['user_session'];
    //echo "$user_id";

    if($_SESSION['user_session']!=0)
    {
    $stmt = $user->runQuery("SELECT * FROM _Membres WHERE user_id=:user_id");
    $stmt->execute(array(":user_id"=>$user_id));
    
    $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
    $administration=false ;
		if ($userRow['id_adm']) {
			$administration=true ;
		}
    }
    // if($_SESSION['user_session']==0)
    // {
    //    $user->redirect('http://localhost/labo-user_2/index.php') ;
    // }

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
////////////////////////////////////////////////
?>