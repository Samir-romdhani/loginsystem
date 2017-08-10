<!DOCTYPE html>
<html lang="en">
<head> 
        <title>Connection_base</title>
        <meta charset="utf-8">
</head>
<body>
<?php

include"config/database.php";

class USER
{	

	private $conn;
	
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }
	
	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}
	public function select($sql)
	{
			$requete = $this->conn->prepare($sql);
			$requete->execute();
			$resultat = $requete->fetchall();
			return $resultat ;
			/*echo "<pre>";
			print_r($resultat);
			echo "</pre>";*/	}
	
	public function register($uname,$umail,$upass)
	{
		try
		{
			$new_password = password_hash($upass, PASSWORD_DEFAULT);
			$d=date('Y-m-d H:i:s');
			$stmt = $this->conn->prepare("INSERT INTO _Membres(user_name,user_email,user_pass,joining_date,Position,Office,id_adm) 
		                                               VALUES(:uname, :umail, :upass,:d,' ',' ','0')");
												  
			$stmt->bindparam(":uname", $uname);
			$stmt->bindparam(":umail", $umail);
			$stmt->bindparam(":upass", $new_password);
			$stmt->bindparam(":d", $d);										  
				
			$stmt->execute();	
			
			return $stmt;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}				
	}
	
	
	public function doLogin($uname,$umail,$upass)
	{
		try
		{
			$stmt = $this->conn->prepare("SELECT user_id, user_name, user_email, user_pass FROM _Membres WHERE user_name=:uname OR user_email=:umail ");
			$stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() == 1)
			{
				if(password_verify($upass, $userRow['user_pass']))
				{
					$_SESSION['user_session'] = $userRow['user_id'];
					return true;
				}
				else
				{
					$_SESSION['user_session'] = 0 ;
					return false;
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

			// public function create()
			// {
			// $this->link = mysqli_connect("localhost", "root", "", "laboriadi");
			// 	mysqli_autocommit($this->link,FALSE);
			// 	$user_name=htmlspecialchars(strip_tags($_POST['n']));
		 //        $user_email=htmlspecialchars(strip_tags($_POST['e']));
		 //        $Office=htmlspecialchars(strip_tags($_POST['o']));
		 //        $Position=htmlspecialchars(strip_tags($_POST['p']));
   //              $joining_date=date('Y-m-d H:i:s');
	
			// 	mysqli_query($this->link,"INSERT INTO _Membres(
			// 									user_id,
			// 									user_name,
			// 				        	        user_email,
			// 				        	        Office,
			// 				        	        Position,
			// 				        	        joining_date
			// 				        	        )
			// 							   VALUES('NULL',
			// 							   	      '$user_name',
			// 							   	       '$user_email',
			// 							   	       '$Office',
			// 							   	       '$Position',
			// 							   	       '$joining_date')");
			// 	if(mysqli_errno($this->link)){
			// 	printf("transaction aborted:1");
			// 	mysqli_rollback($this->link);
			// 	return -1;
			// 	}
			// 	else{
			// 		  $query = mysqli_query($this->link, "SELECT user_id FROM _Membres WHERE joining_date='$joining_date'") or die(mysqli_error($this->link));
			// 		  $rep = mysqli_fetch_assoc($query);
			// 		  $id=$rep['user_id'];
			// 	mysqli_query($this->link,"INSERT INTO _blog(
			// 		                           Publications,
		 //         							   Projets,
		 //         							   Enseignements,
		 //         							   Recherche,
		 //         							   Encadrements,
		 //         							   Contact,
		 //         							   date_creation,
		 //         							   id_inscrit
		 //         							   )
			// 		                      VALUES(' ',
			// 		                      	     ' ',
			// 		                      	     ' ',
			// 		                      	     ' ',
			// 		                      	     ' ',
			// 		                      	     ' ',
			// 		                      	     '$joining_date',
			// 		                      	     '$id')");
			// 	if(mysqli_errno($this->link)){
			// 	printf("transaction aborted:2");
			// 	mysqli_rollback($this->link);
			// 	return -1;
			// 	}
			// 	else{
			// 	printf("transaction succeeded\n");
			// 	mysqli_commit($this->link);
			// 	return 1;
			// 	}
			// 	}
			// }

	public function is_loggedin()
	{
		if(isset($_SESSION['user_session']))
		{
			return true;
		}
		else 
			return false ;
	}
	
	public function redirect($url)
	{
		header("Location: $url");
	}
	
	public function doLogout()
	{
		session_destroy();
		unset($_SESSION['user_session']);
		return true;
	}
}

////////////////Class Membre //////////////////////////

      class Member
 {	

	private $conn;
	
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }
	
	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}
	public function select($sql)
	{
			$requete = $this->conn->prepare($sql);
			$requete->execute();
			$resultat = $requete->fetchall();
			return $resultat ;
			/*echo "<pre>";
			print_r($resultat);
			echo "</pre>";*/	}

	public function update($user_id)
	{
		    try{ 

		        $stmt = $this->conn->prepare("UPDATE _Membres
		                      SET user_name=:user_name, user_email=:user_email, Office=:Office, Position=:Position, id_adm=:id_adm
		                      WHERE user_id = :user_id");
		       //$stmt2 = $this->conn->prepare("UPDATE _Membres SET id_adm=:id_adm WHERE user_id = :user_id");
		 
		        $user_name=htmlspecialchars(strip_tags($_POST['n']));
		        $user_email=htmlspecialchars(strip_tags($_POST['e']));
		        //$joining_date=htmlspecialchars(strip_tags($_POST['d']));
		        $Office=htmlspecialchars(strip_tags($_POST['o']));
		        $Position=htmlspecialchars(strip_tags($_POST['p']));

		        $choix = strip_tags($_POST['sample-radio']);
		 
		        $stmt->bindParam(':user_name', $user_name);
		        $stmt->bindParam(':user_email', $user_email);
		        //$stmt->bindParam(':joining_date', $joining_date);
		        $stmt->bindParam(':Office', $Office);
		        $stmt->bindParam(':Position', $Position);
		        $stmt->bindParam(':id_adm', $choix);
		        $stmt->bindParam(':user_id', $user_id);

		/*  if($choix==1)
		   {
           $stmt2 = $this->conn->prepare("UPDATE _Membres SET id_adm='1' WHERE user_id = :user_id");
           $stmt2->execute();
           } 
          else
           {
           $stmt2 = $this->conn->prepare("UPDATE _Membres SET id_adm='0' WHERE user_id = :user_id");
           $stmt2->execute();
           } */


               


			        if($stmt->execute()){
			            echo "<div class='alert alert-success'>updated.</div>";;
			        }else{
			            echo "<div class='alert alert-danger'>Unable to update. Please try again.</div>";
			        }
		    }
		    catch(PDOException $exception){
		        die('ERROR: ' . $exception->getMessage());
		    }
      }
	public function update2($id)
	{
		    try{ 

		        $stmt = $this->conn->prepare("UPDATE _blog
		                      SET Contenu=:Contenu,titre=:titre, date_modification=:date_modification
		                      WHERE id = :id");
		 
		        $Contenu=htmlspecialchars(strip_tags($_POST['Contenu']));
		        $titre=htmlspecialchars(strip_tags($_POST['titre']));
                $date_modification=date('Y-m-d H:i:s');

		        $stmt->bindParam(':Contenu', $Contenu);
		        $stmt->bindParam(':titre', $titre);
		        $stmt->bindParam(':date_modification', $date_modification);
		        $stmt->bindParam(':id', $id);

			        if($stmt->execute()){
			            //echo "<div class='alert alert-success'>updated.</div>";
			        }else{
			            //echo "<div class='alert alert-danger'>Unable to update. Please try again.</div>";
			        }
		    }
		    catch(PDOException $exception){
		        die('ERROR: ' . $exception->getMessage());
		    }
      }
        public function getInfo($user_id)
        {
				try 
				{
		           $stmt=$this->conn->prepare("SELECT user_id, user_name, joining_date, user_email , Office , Position , id_adm FROM _Membres WHERE user_id = ? LIMIT 0,1");
				     
				    $stmt->bindParam(1, $user_id);
				     
				    $stmt->execute();
				     
				    $row = $stmt->fetch(PDO::FETCH_ASSOC);
				     
				     $user_name = $row['user_name'];
				     $joining_date = $row['joining_date'];
				     $user_email = $row['user_email'];
				     $Office = $row['Office'];
				     $Position = $row['Position'];
				     $id_adm = $row['id_adm'];
				     return(array('user_name'=>$user_name,
				     	'joining_date' => $joining_date ,
				     	'user_email'=>$user_email ,
				     	'Office'=>$Office,
				     	'Position'=>$Position,
				     	'id_adm'=>$id_adm
				     	));
				}
				 
				catch(PDOException $exception){
				    die('ERROR:' . $exception->getMessage());
				}
		}

	public function getInfo2($id)
	{
				try 
				{
		           $stmt=$this->conn->prepare("SELECT Type, Contenu FROM _blog WHERE id_inscrit = '$id'ORDER BY id DESC");
				     
				    $stmt->bindParam(1, $id_inscrit);
				     
				    $stmt->execute();
				     $row = $stmt->fetch(PDO::FETCH_ASSOC);
				     $Publications= $row['Publications'];
				     return(array('Publications' => $Publications)) ;
				}
				 
				catch(PDOException $exception){
				    die('ERROR:' . $exception->getMessage());
				}
	}

        public function create2($ide,$ch)
	        {
	        
			    //$this->link = mysqli_connect("localhost", "root", "", "laboriadi");
				//mysqli_autocommit($this->link,FALSE);
				//$Publications=htmlspecialchars(strip_tags($_POST['title']." ".$_POST['content']));
				/*$ch1="";$ch2="";$ch3="";$ch4="";$ch5="";$ch6="";
				if($ch=="Publications"){$ch1=$ch ;}
				else if ($ch=="Projets") {$ch2=$ch ;}
				else if ($ch=="Enseignements") {$ch3=$ch ;}
				else if ($ch=="Recherche") {$ch4=$ch ;}
				else if ($ch=="Encadrements") {$ch5=$ch ;}
				else {$ch6=$ch ;} 
				$ch0=$ch ;   */
				$titre=htmlspecialchars(strip_tags($_POST['titre']));
				$Contenu=htmlspecialchars(strip_tags($_POST['Contenu']));
				$d=date('Y-m-d H:i:s');
				$d1=date('Y-m-d H:i:s');
		     try {
				if ($ch!=" "&&$ch!=""&&$Contenu!=" "&&$Contenu!="") {
				        //$query="INSERT INTO _blog(id,id_inscrit,$ch0,titre,date_creation)
				         //                  VALUES('NULL',:id_inscrit,:chaine2,:chaine1,:d)";
				        $query="INSERT INTO _blog(id_inscrit,Type,Contenu,titre,date_creation,date_modification)
				                           VALUES(:id_inscrit,:Type,:Contenu,:titre,:d,:d1)";
						$stmt=$this->conn->prepare($query);

						$stmt->bindparam(":id_inscrit", $ide);
						$stmt->bindparam(":Contenu", $Contenu);
						$stmt->bindparam(":titre", $titre);
						$stmt->bindparam(":d", $d);
						$stmt->bindparam(":d1", $d1);
						$stmt->bindparam(":Type", $ch);

                if ($stmt->execute())
                {
                return true ;
                //echo "$ch0 ajouté";
                }
                else return false ;
                  //echo "Erreur..";
              }
            }
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}

        }

    // public function search($ch)
    // {
				// try 
				// {
		  //          $stmt=$this->conn->prepare("SELECT * FROM _Membres WHERE user_name = '$ch'");
				     
				//     $stmt->bindParam(1, $user_name);
				     
				//     $stmt->execute();
				//     $res = $stmt->fetchall() ;
				//     return $res ;

				    
				// }
				 
				// catch(PDOException $exception){
				//     die('ERROR:' . $exception->getMessage());
				// }
    // }

function nbre_jour($day ,$month, $year){
    $y = date('Y') ;
    $m = date('m');
    $d = date('d');
    $t = date('t',$m) ;
      if($month<$m||$month==$m&&$day<=$d)
        {
        $annee=$y-$year ;
        }
        else
        {
            $annee = 0 ;
        }

        $periode=$annee ;

        if($month<=$m)
        {
            if($month<$m)
            {
                
                if($day<$d)
                {
                    $periode=$periode."-".($m-$month)."-" ;
                    $periode=$periode.($d-$day) ;
                }
                else
                {
                    $periode=$periode."-".($m-$month-1)."-" ;
                    $periode=$periode.($t-$day+$d) ; 
                } 
            }
            else 
            {
                if($day<$d)
                {
                    $periode=$periode."-0-".($d-$day) ;
                }
                else $periode=$periode."-0-".($day-$d) ;
            }
        }
        else
        {
                if($day<$d)
                {
                    $periode=$periode."-".(11-$month+$m)."-" ;
                    $periode=$periode.($d-$day) ;
                }
                else
                {
                    $periode=$periode."-".(11-$month+$m)."-" ;
                    $periode=$periode.($t-$day+$d) ; 
                } 

        }
    return($periode);
}
	public function redirect($url)
	{
		header("Location: $url");
	}
	
	public function doLogout()
	{
		session_destroy();
		unset($_SESSION['user_session']);
		return true;
	}
}
//$a = new USER();
//$requete=$a->register("samir11","romdhanisamir11@gmail.com","111111");
//$requete1=$a->dologin("siiiii","romdhanisamir11@gmail.com","111111");
//echo "<pre>";
//if($requete1){ echo "OK";} else { echo "Not OK";}
//echo "</pre><br/>";
//$a = new USER();
// $fctsql="CREATE TABLE IF NOT EXISTS `_Membres` (
//   `user_id` int(11) NOT NULL AUTO_INCREMENT,
//   `user_name` varchar(15) NOT NULL,
//   `user_email` varchar(40) NOT NULL,
//   `user_pass` varchar(255) NOT NULL,
//   `joining_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
//   PRIMARY KEY (`user_id`)
// ) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;" ;
//$res=$a->runQuery($fctsql) ;
//$res->execute();
//$requete=$a->register("samir","romdhanisamir94@gmail.com","21846516");
/*$fctsql2="SELECT about, descriptions  FROM evenements ORDER BY id DESC" ;
$res=$a->select($fctsql2);
echo "<pre>";
print_r($res);
echo "</pre><br/>";*/

// $m = new Member() ;
// $tab = $m->getInfo(2);
// echo "<pre>";
// print_r($tab);
// echo "</pre><br/>";
// echo "$tab[user_name]";



// $fctsql2="CREATE TABLE IF NOT EXISTS `_blog` (
//   `id` int(11) NOT NULL AUTO_INCREMENT,
//   `id_inscrit` int(11) NOT NULL,
//   `Publications` varchar(255) NOT NULL,
//   `Projets` varchar(255) NOT NULL,
//   `Enseignements` varchar(255) NOT NULL,
//   `Recherche` varchar(255) NOT NULL,
//   `Encadrements` varchar(255) NOT NULL,
//   `Contact` varchar(255) NOT NULL,
//   `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
//   PRIMARY KEY (`id`)
// ) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;" ;
// $res=$a->runQuery($fctsql2) ;
// if($res->execute()) { echo "_blog ajouté"; }


?>
</body>
</html>