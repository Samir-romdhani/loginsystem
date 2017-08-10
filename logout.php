<?php

	require_once('User/class.user.php');

	$user_logout = new USER();
	 
	if($user_logout->is_loggedin()!="")
	{
		$user_logout->redirect('read.php');
	}
	if(isset($_GET['logout']) && $_GET['logout']=="true" )
	{
		$_SESSION['user_session']=0 ;
		$user_logout->doLogout();
		//$user_logout->redirect('evenements.php?logout');
		$user_logout->redirect('Untitled.php?logout');
		
	}
