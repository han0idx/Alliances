<?php include 'info.php'; ?>

<?php include 'Style/head.php'; ?>

<?php include 'Style/header.php'; ?>

<?php include 'Style/menu_client.php'; ?>



<div id="centre">


    <h2> Bienvenue <?php echo htmlentities(trim($_SESSION['login']));
; ?>!</h2>
    <?php
    echo "<table class='tableFilles'>";
    $dal = new DAL();
    $results = $dal->get_all_russians_girls();
    foreach ($results as $result){
        echo "<tr>
            <td class='photo'><img src='$result->photo'/></div>
            <td>
            <div>Nom : </div><span class='nom'>$result->nom</span></br>
            <div>Preom : </div><span class='prenom'>$result->prenom</span></br>
            <div>Ville : </div><span class='ville'>$result->ville</span></br>
            </td>
            <td>$result->description</td>
            </tr>";
    }
    echo "</table>"
    ?>

</div>

<?php include 'Style/footer.php'; ?>