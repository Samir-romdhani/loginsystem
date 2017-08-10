<?php 
session_start();

//require_once('User/session.php');
require_once('User/class.user.php');
$user = new USER();
$session = new USER();

if($_SESSION['user_session']!="")
{
	$session->redirect('profil2.php');
}

if(isset($_POST['btn-signup']))
{
	$uname = strip_tags($_POST['txt_uname']);
	$umail = strip_tags($_POST['txt_umail']);
	$upass = strip_tags($_POST['txt_upass']);	
	
	if($uname=="")	{
		$error[] = "provide username !";	
	}
	else if($umail=="")	{
		$error[] = "provide email id !";	
	}
	else if(!filter_var($umail, FILTER_VALIDATE_EMAIL))	{
	    $error[] = 'Please enter a valid email address !';
	}
	else if($upass=="")	{
		$error[] = "provide password !";
	}
	else if(strlen($upass) < 6){
		$error[] = "Password must be atleast 6 characters";	
	}
	else
	{
		try
		{
			$stmt = $user->runQuery("SELECT user_name, user_email FROM _Membres WHERE user_name=:uname OR user_email=:umail");
			$stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
				
			if($row['user_name']==$uname) {
				$error[] = "sorry username already taken !";
			}
			else if($row['user_email']==$umail) {
				$error[] = "sorry email id already taken !";
			}
			else
			{
				if($user->register($uname,$umail,$upass)){	
					$user->redirect('sign-up.php?joined');
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}	
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Sign-up Page</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

</head>

  <body class="login-img3-body">

  <div class="container">
    <form class="login-form" method="post" id="sign-in-form">
      <div class="login-wrap">
            <h2 align="center" class="form-signin-heading">Inscrivez-vous</h2>
            <?php
			if(isset($error))
			{
			 	foreach($error as $error)
			 	{
					 ?>
                     <div class="alert alert-danger">
                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
                     </div>
                     <?php
				}
			}
			else if(isset($_GET['joined']))
			{
				 ?>
<!--                  <div class="alert alert-info">
                      <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered <a href='login.php'>login</a> here
                 </div>
 -->                 <div class="alert alert-info">
                      <i class="glyphicon glyphicon-log-in"></i> Enregistré avec succès <a href='login.php'> cliquer </a> ici
                 </div>
                 <?php
			}
			?>
            
            <div class="form-group">
            <input type="text" class="form-control" name="txt_uname" placeholder="Nom" value="<?php if(isset($error)){echo $uname;}?>" />
            </div>
            <div class="form-group">
            <input type="text" class="form-control" name="txt_umail" placeholder="E-Mail" value="<?php if(isset($error)){echo $umail;}?>" />
            </div>
            <div class="form-group">
            	<input type="password" class="form-control" name="txt_upass" placeholder="Mot de passe" />
            </div>
            <div class="form-group">
            	<button type="submit" class="btn btn-primary btn-lg btn-block" name="btn-signup">
                	<i class="glyphicon glyphicon-open-file"></i>&nbsp;Je m'inscris
                </button>
            </div>
            <br />
            <label>Vous êtes déjà inscrit ? <a href="login.php">Connectez-vous</a></label>
          </div>
      </form>

    </div>


  </body>
</html>
