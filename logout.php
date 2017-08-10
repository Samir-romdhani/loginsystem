<?php

	require_once('user/class.user.php');

	$user_logout = new USER();
	 
	if($user_logout->is_loggedin()!="")
	{
		$user_logout->redirect('profil2.php');
	}
	if(isset($_GET['logout']) && $_GET['logout']=="true" )
	{
		$_SESSION['user_session']=0 ;
		$user_logout->doLogout();
		$user_logout->redirect('evenements.php?logout');
	}
