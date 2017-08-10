<?php
    require_once("User/user_id.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Labo Riadi</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
     <!-- Tab -->
    <link rel="stylesheet" href="css/css2/demo.css" />
    <link rel="stylesheet" href="css/css2/tabs.css" />
    <link rel="stylesheet" href="css/css2/tabstyles.css" />
    <script type='text/javascript'>
    function delete_user( id ){
         
        var answer = confirm('vous êtes sûr?');
        if (answer){
            // if user clicked ok, 
            // pass the id to delete.php and execute the delete query
            window.location = 'delete_blog.php?id=' + id;
        } 
    }
    </script>
     <!-- Tab end  -->     
     <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
  </head>
  <body>
<?php 
$action = isset($_GET['action']) ? $_GET['action'] : "";
 
// if it was redirected from delete.php
if($action=='deleted'){
    echo "<div class='alert alert-success'>Publucation was deleted.</div>";
} ?>  <!-- container section start -->
  <section id="container" class="">
      <!--header start-->
      
      <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>

            <!--logo start-->
            <a href="evenements.php" class="logo">Laboratoire <span class="lite">Riadi</span></a>
            <!--logo end-->

            <div class="nav search-row" id="top_menu">
                <!--  search form start -->
                <ul class="nav top-menu">                    
                    <li>
                        <form method="GET" action="recherche.php" class="navbar-form">
                            <input class="form-control" name="search" placeholder="Search" type="text">
                        </form>
                    </li>                    
                </ul>
                <!--  search form end -->                
            </div>

            <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="img/admin.jpg">
                            </span>
                            <span class="username"><?php print($userRow['user_name']);  ?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="profil2.php"><i class="icon_profile"></i> Mon Profil</a>
                            </li>
                            <li>
                                <a href="#"><i class="icon_mail_alt"></i> Mes Messages</a>
                            </li>
                            <li>
                                <a href="#"><i class="icon_chat_alt"></i> Contact</a>
                            </li>
                            <li>
                                <a href="logout.php?logout=true"><i class="icon_key_alt"></i> Deconnecter</a>
                            </li>
                            <li>
                                <a href="#"><i class=""></i> Documentation</a>
                            </li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
      </header>      
      <!--header end-->

      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu"> 

                  <li>
                  <?php echo "<a class='' href='acceuil.php?ident={$userRow['user_id']}'>";  ?>
                  <i class="icon_house_alt"></i>
                  <span>Acceuil</span>
                  </a>
                  </li>

                  <li>
                  <a class="" href="projets.php">
                  <i class="icon_building"></i>
                  <span>Projets</span>
                  </a>
                  </li>

                  <li>
                  <a class="" href="evenements.php">
                  <i class="icon_calendar"></i>
                  <span>Evénements</span>
                  </a>
                  </li>            
                  
                  <li>                    
                      <a class="" href="membres.php">
                          <i class="icon_group"></i>
                          <span>Membres</span>
                      </a>
                    </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class=" icon_menu-square_alt2"></i>
                          <span>Présentation</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="a_propos_de_riadi.php">A Propos de Riadi</a></li>                          
                          <li><a class="" href="historique.php">Historique</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_search_alt"></i>
                          <span>Recherche</span>
                          <span class="menu-arrow arrow_carrot-right"></span>s
                      </a>
                     <ul class="sub">
                          <li><a class="" href="axes_de_recherche.php">Axes de Recherche</a></li>
                          <li><a class="" href="productions_scientifiques.php"><h5>Productions Scientifiques</h5></a></li>
                      </ul>
                  </li>
                  <li>                    
                      <a class="" href="cooperations_et_partenariats.php">
                          <i class="icon_piechart"></i>
                          <span>Coopérations et</span>
                          <span> Partenariats</span>
                      </a>
                  </li>
                   <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_globe-2"></i>
                          <span>Conférences</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                        <ul class="sub">                          
                            <li><a class="" href="http://www.core.edu.au">CORE/ERA</a></li>
                                 </ul>
                          </li>
                  </li>     

<!--                   <li>
                      <a class="" href="projets.php">
                          <i class="icon_building"></i>
                          <span>Projets</span>
                      </a>
                  </li>
 -->                  
<!--                   <li class="sub-menu ">
                      <a href="javascript:;" class="">
                          <i class="icon_documents_alt"></i>
                          <span>Pages</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">                          
                          <li><a class="" href="profil.php">Profil</a></li>
                          <li><a class="" href="login.php"><span>Login Page</span></a></li>
                      </ul>
                  </li>
 -->                  <li class="sub-menu ">
                      <a href="javascript:;" class="">
                          <i class="icon_link"></i>
                          <span>Liens</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">                          
                          <li><a class="" href="http://www.ensi.rnu.tn">Ensi</a></li>
                          <li><a class="" href="http://www.uma.rnu.tn/"><span>Université</span></a></li>
                       </ul>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
        <div class="row">

        <?php 
        $ident=isset($_GET['ident']) ? $_GET['ident'] : die('ERROR: Record ID not found.');
        $T = $member->getInfo($ident);
        $ok = false ;
        if ($user_id!=$ident) {
          $userRow['user_name'] = $T['user_name'] ;
          $user_id = $ident ;
          $ok = true  ;
        }
        ?>        
        <div class="col-lg-12">
            <div class="profile-widget">
                <!-- <div class="info-box" style="background: url('img/img2/1.jpg') center;"> -->
                  <!-- <div class="follow-ava"> -->
                    <!-- <img class="img-circle" src="img/adminp.jpg" alt="User Avatar"> -->
                  <!-- </div> -->
                  <h3 class="pull-left" style="color:black"><?php print($userRow['user_name']);?></h3>
                      <!-- <h6 class="">Software Engineer</h6> -->
                </div>
              </div>
        </div>
        <?php if($ok==true){}
        else
          {echo "<a data-original-title='Ajouter' data-content='' data-placement='top' data-trigger='hover' class='btn btn-info popovers' class='btn btn-primary' href='modifier.php?type=choisir'><i class='icon_pencil'></i></a>";}?>
        <section>
          <div class="row">
           <div class="col-lg-12">
                <div class="tabs tabs-style-line">
                  <nav>
                    <ul>
                      <li><a href="#section-line-1"><span>Publications</span></a></li>
                      <li><a href="#section-line-2"><span>Projets</span></a></li>
                      <li><a href="#section-line-3"><span>Enseignements</span></a></li>
                      <li><a href="#section-line-4"><span>Recherche d'intérêts</span></a></li>
                      <li><a href="#section-line-5"><span>Encadrements</span></a></li>
                      <li><a href="#section-line-6"><span>Contact</span></a></li>
                    </ul>
                  </nav>
      <?php    $ident=isset($_GET['ident']) ? $_GET['ident'] : die('ERROR: Record ID not found.');
              $stmt=$member->runQuery("SELECT id , Type , Contenu , Titre , date_creation FROM _blog WHERE id_inscrit = '$user_id'  ORDER BY date_creation DESC");
              $pub=$member->runQuery("SELECT id , Type , Contenu , Titre , date_creation FROM _blog WHERE id_inscrit = '$user_id' AND Type='Publications'ORDER BY date_creation DESC");
              $proj=$member->runQuery("SELECT id , Type , Contenu , Titre , date_creation FROM _blog WHERE id_inscrit = '$user_id' AND Type='Projets' ORDER BY date_creation DESC");
              $ens=$member->runQuery("SELECT id , Type , Contenu , Titre , date_creation FROM _blog WHERE id_inscrit = '$user_id' AND Type='Enseignements'ORDER BY date_creation DESC");
              $rech=$member->runQuery("SELECT id , Type , Contenu , Titre , date_creation FROM _blog WHERE id_inscrit = '$user_id' AND Type='Recherche' ORDER BY date_creation DESC");
              $enc=$member->runQuery("SELECT id , Type , Contenu , Titre , date_creation FROM _blog WHERE id_inscrit = '$user_id' AND Type='Encadrements' ORDER BY date_creation DESC");
              $cont=$member->runQuery("SELECT id , Type , Contenu , Titre , date_creation FROM _blog WHERE id_inscrit = '$user_id' AND Type='Contact' ORDER BY date_creation DESC");
            //$stmt->bindParam(1, $id_inscrit);
            $pub->execute();
            $proj->execute();
            $ens->execute();
            $rech->execute();
            $enc->execute();
            $cont->execute();
            $stmt->execute();
            $num1 = $pub->rowCount();
            $num2 = $proj->rowCount();
            $num3 = $ens->rowCount();
            $num4 = $rech->rowCount();
            $num5 = $enc->rowCount();
            $num6 = $cont->rowCount();
            $num = $stmt->rowCount();
      ?>
                  <div class="content-wrap">

                    <section id="section-line-1">
                          <div class="panel-body">
                              <div class="tab-content">
                                  <div id="recent-activity" class="tab-pane active">
                                      <div class="profile-activity"> 

        <?php
            if($num1>0){
              while ($row = $pub->fetch(PDO::FETCH_ASSOC)) {
                extract($row) ;
                                    if($Type=="Publications"&&$Contenu!="")
                                      { echo "<div class='col-lg-10' >";
                                        echo "<div class='act-time'>";                                        
                                        echo "<div class='activity-body act-in'>";      
                                        echo "<span class='arrow'></span>";          
                                        echo "<div class='text'>";          
                                        echo "<h3 class='attribution'><a href='#'>";print($userRow['user_name']);
                                             $pieces = explode(" ", $date_creation);
                                             $pieces1 = explode("-", $pieces[0]);
                                             $pieces2 = explode(":", $pieces[1]);
                                             echo"</a>".$pieces1[2]."-".$pieces1[1]." ".$pieces2[0].":".$pieces2[1]."</h3>";
                                          //echo"</a>  {$date_creation}</h3>";              
                                         echo "<h3 style='color : #1BC0C6'>{$Titre}</h3>";
                                         echo "<h4 style='color : #222223'>{$Contenu}</h4>";
                                        // echo "<textarea class='form-control' name='Publication'>" ; echo htmlspecialchars($Publications, ENT_QUOTES);  echo"</textarea>";
                                        echo "</div>";          
                                        echo "</div>";      
                                        echo "</div>";
                                        echo "</div>";
                                        echo "<div class='col-lg-2'>";
                                        if($ok==true)
                                        {
                                        }
                                        else {
                                        echo "<a data-original-title='Modifier' data-content='' data-placement='left' data-trigger='hover' class='btn btn-success popovers' class='btn btn-success' href='update2.php?id={$id}&index=acceuil'><i class='icon_pencil-edit'></i></a>";
                                        echo "<a data-original-title='Supprimer' data-content='' data-placement='bottom' data-trigger='hover' class='btn btn-danger popovers' class='btn btn-danger' href='#' onclick='delete_user({$id});' ><i class='icon_minus_alt'></i></a>";
                                        }
                                        /*if($administration&&$ok){
                                        echo "<a data-original-title='Supprimer' data-content='' data-placement='bottom' data-trigger='hover' class='btn btn-danger popovers' class='btn btn-danger' href='#' onclick='delete_user({$id});' ><i class='icon_close_alt2'></i></a>";
                                        }*/
                                        echo "</div>";
                                      }

                                    }
            }

      ?>

                                      </div>
                                  </div>
                              </div>
                          </div>
                    </section>

                    <section id="section-line-2">
        <?php
            if($num2>0){
              while ($row = $proj->fetch(PDO::FETCH_ASSOC)) {
                extract($row) ;
                                    if($Type=="Projets"&&$Contenu!="")
                                      { echo "<div class='col-lg-10' >";
                                        echo "<div class='act-time'>";                                        
                                        echo "<div class='activity-body act-in'>";      
                                        echo "<span class='arrow'></span>";          
                                        echo "<div class='text'>";          
                                        echo "<h3 class='attribution'><a href='#'>";print($userRow['user_name']);
                                             $pieces = explode(" ", $date_creation);
                                             $pieces1 = explode("-", $pieces[0]);
                                             $pieces2 = explode(":", $pieces[1]);
                                             echo"</a>".$pieces1[2]."-".$pieces1[1]." ".$pieces2[0].":".$pieces2[1]."</h3>";
                                          //echo"</a>  {$date_creation}</h3>";              
                                         echo "<h3 style='color : #1BC0C6'>{$Titre}</h3>";
                                         echo "<h4 style='color : #222223'>{$Contenu}</h4>";
                                        // echo "<textarea class='form-control' name='Publication'>" ; echo htmlspecialchars($Publications, ENT_QUOTES);  echo"</textarea>";
                                        echo "</div>";          
                                        echo "</div>";      
                                        echo "</div>";
                                        echo "</div>";
                                        echo "<div class='col-lg-2'>";
                                        if($ok==true)
                                        {
                                        }
                                        else {
                                        echo "<a data-original-title='Modifier' data-content='' data-placement='left' data-trigger='hover' class='btn btn-success popovers' class='btn btn-success' href='update2.php?id={$id}&index=acceuil'><i class='icon_pencil-edit'></i></a>";
                                        echo "<a data-original-title='Supprimer' data-content='' data-placement='bottom' data-trigger='hover' class='btn btn-danger popovers' class='btn btn-danger' href='#' onclick='delete_user({$id});' ><i class='icon_minus_alt'></i></a>";
                                        }
                                        /*if($administration&&$ok){
                                        echo "<a data-original-title='Supprimer' data-content='' data-placement='bottom' data-trigger='hover' class='btn btn-danger popovers' class='btn btn-danger' href='#' onclick='delete_user({$id});' ><i class='icon_close_alt2'></i></a>";
                                        }*/
                                        echo "</div>";
                                      }
                                    }
            }
      ?>                              
                  
                    </section>

                    <section id="section-line-3">
        <?php
            if($num3>0){
              while ($row = $ens->fetch(PDO::FETCH_ASSOC)) {
                extract($row) ;
                                    if($Type=="Enseignements"&&$Contenu!="")
                                      { echo "<div class='col-lg-10' >";
                                        echo "<div class='act-time'>";                                        
                                        echo "<div class='activity-body act-in'>";      
                                        echo "<span class='arrow'></span>";          
                                        echo "<div class='text'>";          
                                        echo "<h3 class='attribution'><a href='#'>";print($userRow['user_name']);
                                             $pieces = explode(" ", $date_creation);
                                             $pieces1 = explode("-", $pieces[0]);
                                             $pieces2 = explode(":", $pieces[1]);
                                             echo"</a>".$pieces1[2]."-".$pieces1[1]." ".$pieces2[0].":".$pieces2[1]."</h3>";
                                          //echo"</a>  {$date_creation}</h3>";              
                                         echo "<h3 style='color : #1BC0C6'>{$Titre}</h3>";
                                         echo "<h4 style='color : #222223'>{$Contenu}</h4>";
                                        // echo "<textarea class='form-control' name='Publication'>" ; echo htmlspecialchars($Publications, ENT_QUOTES);  echo"</textarea>";
                                        echo "</div>";          
                                        echo "</div>";      
                                        echo "</div>";
                                        echo "</div>";
                                        echo "<div class='col-lg-2'>";
                                        if($ok==true)
                                        {
                                        }
                                        else {
                                        echo "<a data-original-title='Modifier' data-content='' data-placement='left' data-trigger='hover' class='btn btn-success popovers' class='btn btn-success' href='update2.php?id={$id}&index=acceuil'><i class='icon_pencil-edit'></i></a>";
                                        echo "<a data-original-title='Supprimer' data-content='' data-placement='bottom' data-trigger='hover' class='btn btn-danger popovers' class='btn btn-danger' href='#' onclick='delete_user({$id});' ><i class='icon_minus_alt'></i></a>";
                                        }
                                        /*if($administration&&$ok){
                                        echo "<a data-original-title='Supprimer' data-content='' data-placement='bottom' data-trigger='hover' class='btn btn-danger popovers' class='btn btn-danger' href='#' onclick='delete_user({$id});' ><i class='icon_close_alt2'></i></a>";
                                        }*/
                                        echo "</div>";
                                      }

                                    }
            }
//echo "<br/><br/><p><a data-original-title='Ajouter' data-content='Enseignements' data-placement='top' data-trigger='hover' class='btn btn-info btn-lg btn-success popovers' class='btn btn-primary' href='http://localhost/labo-user_2/index92.php?type=Enseignements'><i class='icon_pencil'></i></a></p>";


      ?>                              
                    </section>

                    <section id="section-line-4">
        <?php
            if($num4>0){
              while ($row = $rech->fetch(PDO::FETCH_ASSOC)) {
                extract($row) ;
                                    if($Type=="Recherche"&&$Contenu!="")
                                      { echo "<div class='col-lg-10' >";
                                        echo "<div class='act-time'>";                                        
                                        echo "<div class='activity-body act-in'>";      
                                        echo "<span class='arrow'></span>";          
                                        echo "<div class='text'>";          
                                        echo "<h3 class='attribution'><a href='#'>";print($userRow['user_name']);
                                             $pieces = explode(" ", $date_creation);
                                             $pieces1 = explode("-", $pieces[0]);
                                             $pieces2 = explode(":", $pieces[1]);
                                             echo"</a>".$pieces1[2]."-".$pieces1[1]." ".$pieces2[0].":".$pieces2[1]."</h3>";
                                          //echo"</a>  {$date_creation}</h3>";              
                                         echo "<h3 style='color : #1BC0C6'>{$Titre}</h3>";
                                         echo "<h4 style='color : #222223'>{$Contenu}</h4>";
                                        // echo "<textarea class='form-control' name='Publication'>" ; echo htmlspecialchars($Publications, ENT_QUOTES);  echo"</textarea>";
                                        echo "</div>";          
                                        echo "</div>";      
                                        echo "</div>";
                                        echo "</div>";
                                        echo "<div class='col-lg-2'>";
                                        if($ok==true)
                                        {
                                        }
                                        else {
                                        echo "<a data-original-title='Modifier' data-content='' data-placement='left' data-trigger='hover' class='btn btn-success popovers' class='btn btn-success' href='update2.php?id={$id}&index=acceuil'><i class='icon_pencil-edit'></i></a>";
                                        echo "<a data-original-title='Supprimer' data-content='' data-placement='bottom' data-trigger='hover' class='btn btn-danger popovers' class='btn btn-danger' href='#' onclick='delete_user({$id});' ><i class='icon_minus_alt'></i></a>";
                                        }
                                        /*if($administration&&$ok){
                                        echo "<a data-original-title='Supprimer' data-content='' data-placement='bottom' data-trigger='hover' class='btn btn-danger popovers' class='btn btn-danger' href='#' onclick='delete_user({$id});' ><i class='icon_close_alt2'></i></a>";
                                        }*/
                                        echo "</div>";
                                      }
                                    }
            }
      ?>                              
                    </section>

                    <section id="section-line-5">
        <?php
            if($num5>0){
              while ($row = $enc->fetch(PDO::FETCH_ASSOC)) {
                extract($row) ;
                                    if($Type=="Encadrements"&&$Contenu!="")
                                      { echo "<div class='col-lg-10' >";
                                        echo "<div class='act-time'>";                                        
                                        echo "<div class='activity-body act-in'>";      
                                        echo "<span class='arrow'></span>";          
                                        echo "<div class='text'>";          
                                        echo "<h3 class='attribution'><a href='#'>";print($userRow['user_name']);
                                             $pieces = explode(" ", $date_creation);
                                             $pieces1 = explode("-", $pieces[0]);
                                             $pieces2 = explode(":", $pieces[1]);
                                             echo"</a>".$pieces1[2]."-".$pieces1[1]." ".$pieces2[0].":".$pieces2[1]."</h3>";
                                          //echo"</a>  {$date_creation}</h3>";              
                                         echo "<h3 style='color : #1BC0C6'>{$Titre}</h3>";
                                         echo "<h4 style='color : #222223'>{$Contenu}</h4>";
                                        // echo "<textarea class='form-control' name='Publication'>" ; echo htmlspecialchars($Publications, ENT_QUOTES);  echo"</textarea>";
                                        echo "</div>";          
                                        echo "</div>";      
                                        echo "</div>";
                                        echo "</div>";
                                        echo "<div class='col-lg-2'>";
                                        if($ok==true)
                                        {
                                        }
                                        else {
                                        echo "<a data-original-title='Modifier' data-content='' data-placement='left' data-trigger='hover' class='btn btn-success popovers' class='btn btn-success' href='update2.php?id={$id}&index=acceuil'><i class='icon_pencil-edit'></i></a>";
                                        echo "<a data-original-title='Supprimer' data-content='' data-placement='bottom' data-trigger='hover' class='btn btn-danger popovers' class='btn btn-danger' href='#' onclick='delete_user({$id});' ><i class='icon_minus_alt'></i></a>";
                                        }
                                        /*if($administration&&$ok){
                                        echo "<a data-original-title='Supprimer' data-content='' data-placement='bottom' data-trigger='hover' class='btn btn-danger popovers' class='btn btn-danger' href='#' onclick='delete_user({$id});' ><i class='icon_close_alt2'></i></a>";
                                        }*/
                                        echo "</div>";
                                      }
                                    }
            }
      ?>                              
                      </section>

                    <section id="section-line-6">
        <?php
            if($num6>0){
              while ($row = $cont->fetch(PDO::FETCH_ASSOC)) {
                extract($row) ;
                                    if($Type=="Contact"&&$Contenu!="")
                                      { echo "<div class='col-lg-10' >";
                                        echo "<div class='act-time'>";                                        
                                        echo "<div class='activity-body act-in'>";      
                                        echo "<span class='arrow'></span>";          
                                        echo "<div class='text'>";          
                                        echo "<h3 class='attribution'><a href='#'>";print($userRow['user_name']);
                                             $pieces = explode(" ", $date_creation);
                                             $pieces1 = explode("-", $pieces[0]);
                                             $pieces2 = explode(":", $pieces[1]);
                                             echo"</a>".$pieces1[2]."-".$pieces1[1]." ".$pieces2[0].":".$pieces2[1]."</h3>";
                                          //echo"</a>  {$date_creation}</h3>";              
                                         echo "<h3 style='color : #1BC0C6'>{$Titre}</h3>";
                                         echo "<h4 style='color : #222223'>{$Contenu}</h4>";
                                        // echo "<textarea class='form-control' name='Publication'>" ; echo htmlspecialchars($Publications, ENT_QUOTES);  echo"</textarea>";
                                        echo "</div>";          
                                        echo "</div>";      
                                        echo "</div>";
                                        echo "</div>";
                                        echo "<div class='col-lg-2'>";
                                        if($ok==true)
                                        {
                                        }
                                        else {
                                        echo "<a data-original-title='Modifier' data-content='' data-placement='left' data-trigger='hover' class='btn btn-success popovers' class='btn btn-success' href='update2.php?id={$id}&index=acceuil'><i class='icon_pencil-edit'></i></a>";
                                        echo "<a data-original-title='Supprimer' data-content='' data-placement='bottom' data-trigger='hover' class='btn btn-danger popovers' class='btn btn-danger' href='#' onclick='delete_user({$id});' ><i class='icon_minus_alt'></i></a>";
                                        }
                                        /*if($administration&&$ok){
                                        echo "<a data-original-title='Supprimer' data-content='' data-placement='bottom' data-trigger='hover' class='btn btn-danger popovers' class='btn btn-danger' href='#' onclick='delete_user({$id});' ><i class='icon_close_alt2'></i></a>";
                                        }*/
                                        echo "</div>";
                                      }
                                    }
            }
      ?>                              
                    </section>
                  </div><!-- /content -->
            </div>
           </div>
        </div>
        </section>
      </section>
    </section>
      <!--main content end-->
  </section>
  <!-- container section end -->
    <!-- javascripts -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script><!--custome script for all page-->
   <script src="js/scripts.js"></script>
   <!-- Tab  -->
    <script src="js/cbpFWTabs.js"></script>
    <script>
      (function() {

        [].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
          new CBPFWTabs( el );
        });

      })();
    </script>
   <!-- Tab End  -->


 </body>
</html>