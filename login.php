<?php
session_start();
$_SESSION['user_session']=0 ;
require_once("User/class.user.php");
$login = new USER(); 

if(isset($_POST['btn-login']))
{
    $uname = strip_tags($_POST['identifiant']);
    $umail = strip_tags($_POST['identifiant']);
    $upass = strip_tags($_POST['txt_password']);
        
    if($login->doLogin($uname,$umail,$upass))
    {
        //$login->redirect("http://localhost/labo-user_2/index91.php?ident={$_SESSION['user_session']}");
        //$login->redirect("evenements.php");
        $user_id=$_SESSION['user_session'];
        $login->redirect("acceuil.php?ident={$user_id}");
    }
    else
    {
        $error = "Wrong Details !";
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

    <title>Login Page</title>

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
    <form class="login-form" method="post" id="login-form">
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>
    <div id="error">
        <?php
            if(isset($error))
            {
                ?>
                <div class="alert alert-danger">
                   <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                </div>
                <?php
            }
        ?>
    </div>


            <div class="form-group">
              <input type="text" class="form-control" name="identifiant" placeholder="email ou identifiant" autofocus>
              <span id="check-e"></span>
              <!--<input type="text" class="form-control" name="txt_uname_email" placeholder="email ou identifiant" required />-->
            </div>
            
            <div class="form-group">
                <input type="password" class="form-control" name="txt_password"  placeholder="Mot de passe">
                <!--<input type="password" class="form-control" name="txt_password" placeholder="Mot de passe" />-->
            </div>
        
            <label class="checkbox">
                <input type="checkbox" value="remember-me"> Se souvenir de moi
                <span class="pull-right"> <a href="#"> Mot de passe oublié ?</a></span>
            </label>
            <div class="form-group">
            <button type="submit" name="btn-login" class="btn btn-primary btn-lg btn-block" >Connection</button>
            <!--<button type="submit" name="btn-login" class="btn btn-primary btn-lg btn-block">&nbsp; Connection
            </button>-->

            <button class="btn btn-info btn-lg btn-block" type="submit">S'inscrire</button>
            <label>Vous n'êtes pas inscrit ? <a href="sign-up.php"> Inscrivez-vous</a></label>
            </div>
        </div>
      </form>

    </div>


  </body>
</html>
