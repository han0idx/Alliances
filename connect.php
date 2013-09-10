		<?php
			session_start();
			if (isset($_POST['submit']))
			{
				if (isset($_POST['pseudo']) && isset($_POST['passe']) && !empty($_POST['pseudo']) && !empty($_POST['passe']))
				{
					include ('connection.php');

    				$connection = new createConnection(); //i created a new object

    				$connection->connectToDatabase(); // connected to the database

    				echo "<br />"; // putting a html break

    				$connection->selectDatabase();// closed connection
				
					$mysqli = new mysqli($connection->host, $connection->username, $connection->password,$connection->database);
            		if ($mysqli->connect_errno) {
                		echo "Echec lors de la connexion à MySQL : " . $mysqli->connect_error;
            		}
            		else 
            		{
            			$req=mysqli_query($mysqli, "Select count(id) AS id From homme WHERE login='".mysql_real_escape_string($_POST['pseudo'])."' AND pass='".mysql_real_escape_string($_POST['passe'])."'");
            			if (!$req) {
    						echo "Echec lors de l'exécution de la requête : (" . $mysqli->errno . ") " . $mysqli->error;
						}
            			else
            			{

            				$row = $req->fetch_assoc();
            	
            				$nb_id=$row['id'];
            				if ($nb_id==1)
            				{
            					$res = mysqli_query($mysqli, "Select id,login FROM Homme WHERE login='".mysql_real_escape_string($_POST['pseudo'])."' AND pass='".mysql_real_escape_string($_POST['passe'])."'");
            					if (!$res) {
                					echo "Echec lors de l'exécution de la requête : (" . $mysqli->errno . ") " . $mysqli->error;
            					}
            					else 
            					{
            						$row = $res->fetch_assoc();
            	
            						
            						$_SESSION['id'] = $row['id'];
            						$_SESSION['login'] = $_POST['pseudo']; 
         							
         							//$_SESSION['prenom'] = $data2[1] ;
         							//$_SESSION['poste']=$data2[2];
         							//$_SESSION['identifiant_disponibilite']=$data2[3];
			         
            						
         							header('Location: membre.php'); 
         							exit();
            					}
            					// si on ne trouve aucune réponse, le visiteur s'est trompé soit dans son login, soit dans son mot de passe
      							 
   							} 
   							elseif ($nb_id == 0) { 
         							echo 'Compte non reconnu.'; 
      						} 
      
      						else { 
         							echo 'Problème dans la base de données : plusieurs membres ont les mêmes identifiants de connexion.'; 
      						}

            			}
            			
            			$connection->closeConnection();
            		}
            	}
            	else { 
      					echo 'Au moins un des champs est vide.'; 
   				} 

            		
            
            	
            	

          		
			}




		?>

		<?php include 'Style/head.php'; ?>
	
		<?php include 'Style/header.php'; ?>

		<?php include 'Style/menu.php'; ?>
		
		<div id="gauche"></div>
		
		<div id="droite">
		<h1>Connectez vous !</h1>
		
				
		<form action="connect.php" method="post">
		<p>Pseudonyme&nbsp;&nbsp;&nbsp;<input type="text" name="pseudo" /></p>
		<p>Mot de passe&nbsp;&nbsp;&nbsp;<input type="password" name="passe" /></p>
		
		<br /><br />
		<br /><br />
		<br /><br />
		<br /><br />
		<div id="submit">
		<input type="submit" name="submit" value="Continuer" />
		</form>
		</div>
		</div>
		<?php include 'Style/footer.php'; ?>