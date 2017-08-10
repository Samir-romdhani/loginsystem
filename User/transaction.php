<?php

  Class DB
  {

			private $link;

			public function __construct(){
			$this->link = mysqli_connect("localhost", "root", "", "laboriadi");
			if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
			}
			else { echo "Connect";}
			}


			public function dbProcess()
			{
				mysqli_autocommit($this->link,FALSE);

				// $user_name="SAM";
		  //       $user_email="samir@hotmail.fr";
		  //       $Office="Tunisia-Kairouan";
		  //       $Position="";
    //             $joining_date=date('Y-m-d H:i:s');

				$user_name=htmlspecialchars(strip_tags($_POST['n']));
		        $user_email=htmlspecialchars(strip_tags($_POST['e']));
		        $Office=htmlspecialchars(strip_tags($_POST['o']));
		        $Position=htmlspecialchars(strip_tags($_POST['p']));
                $joining_date=date('Y-m-d H:i:s');
	
				mysqli_query($this->link,"INSERT INTO _Membres(
												user_id,
												user_name,
							        	        user_email,
							        	        Office,
							        	        Position,
							        	        joining_date
							        	        )
										   VALUES('NULL',
										   	      '$user_name',
										   	       '$user_email',
										   	       '$Office',
										   	       '$Position',
										   	       '$joining_date')");
				if(mysqli_errno($this->link)){
				printf("transaction aborted:1");
				mysqli_rollback($this->link);
				return -1;
				}
				else{
					  $query = mysqli_query($this->link, "SELECT user_id FROM _Membres WHERE joining_date='$joining_date'") or die(mysqli_error($this->link));
					  $rep = mysqli_fetch_assoc($query);
					  $id=$rep['user_id'];
				mysqli_query($this->link,"INSERT INTO _blog(
					                           Publications,
		         							   Projets,
		         							   Enseignements,
		         							   Recherche,
		         							   Encadrements,
		         							   Contact,
		         							   date_creation,
		         							   id_inscrit
		         							   )
					                      VALUES(' ',
					                      	     ' ',
					                      	     ' ',
					                      	     ' ',
					                      	     ' ',
					                      	     ' ',
					                      	     '$joining_date',
					                      	     '$id')");
				if(mysqli_errno($this->link)){
				printf("transaction aborted:2");
				mysqli_rollback($this->link);
				return -1;
				}
				else{
				printf("transaction succeeded\n");
				mysqli_commit($this->link);
				return 1;
				}
				}
			}

  };
  $db = new DB() ; echo "<br/>";
  $db->dbProcess();
?>