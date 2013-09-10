
		<?php include 'info.php';  ?>

		<?php include 'Style/head.php'; ?>
	
		<?php include 'Style/header.php'; ?>

		<?php include 'Style/menu_client.php'; ?>

		<div id="gauche"></div>
		
		<div id="droite">

			<h2> Bienvenue <?php echo htmlentities(trim($_SESSION['login']));; ?>!</h2>
		</div>

		<?php include 'Style/footer.php'; ?>