		<?php
			if (isset($_POST['submit']))
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

            	$max=mysqli_query($mysqli, "Select max(id) AS id From homme");
            	if (!$max) {
    				echo "Echec lors de l'exécution de la requête : (" . $mysqli->errno . ") " . $mysqli->error;
				}
            	if ($row = $max->fetch_assoc()) {
    				echo $row['id'];
				}
            	
            	$max_id=$row['id']+1;
            	
            	$res = mysqli_query($mysqli, "Insert Into homme (id,login,pass,mail) Values(".$max_id.",'test','test','test')");
            	if (!$res) {
                	echo "Echec lors de l'exécution de la requête : (" . $mysqli->errno . ") " . $mysqli->error;
            	}

            	

          		$connection->closeConnection();
			}




		?>

		<?php include 'Style/head.php'; ?>
	
		<?php include 'Style/header.php'; ?>

		<?php include 'Style/menu.php'; ?>
		
		<div id="gauche"></div>
		
		<div id="droite">
		<h1>Inscription gratuite !</h1>
		<p>Je suis&nbsp;&nbsp;&nbsp;
		<select name="je_suis">
			<option value="Homme">Un Homme</option>
			<option value="Femme">Une Femme</option>
		</select>
		</p>
				
		<form action="inscript.php" method="post">
		<p>Pseudonyme&nbsp;&nbsp;&nbsp;<input type="text" name="pseudo" /></p>
		<p>Mot de passe&nbsp;&nbsp;&nbsp;<input type="password" name="passe" /></p>
		<p>Adresse email&nbsp;&nbsp;&nbsp;<input type="text" name="email" /></p>
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