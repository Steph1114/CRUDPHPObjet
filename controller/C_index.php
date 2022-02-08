<?php 
    include ('model/connect.php'); //on inclut notre fichier de connection 

    $pdo = Database::getConnetion(); //on se connecte à la base 

    $sql = 'SELECT * FROM user ORDER BY id DESC'; //on formule notre requete 

    foreach ($pdo->query($sql) as $row) { //on cree les lignes du tableau avec chaque valeur retournée
        echo '<br /><tr>';
        echo'<td>' . $row['name'] . '</td><p>';
        echo'<td>' . $row['firstname'] . '</td><p>';
        echo'<td>' . $row['age'] . '</td><p>';
        echo'<td>' . $row['tel'] . '</td><p>';
        echo'<td>' . $row['country'] . '</td><p>';
        echo'<td>' . $row['email'] . '</td><p>';
        
        echo'<td>' . $row['comment'] . '</td><p>';
        echo'<td>' . $row['job'] . '</td><p>';
        echo'<td>' . $row['url'] . '</td><p>';
        echo '<td>';

        // attend un id en paramètre
        echo '<button class="btn-read"><a class="btn" href="view/V_read.php?id=' . $row['id'] . '">Read</a></button>';// un autre td pour le bouton d'edition (sous forme de lien)
        echo '</td><p>';
        echo '<td>';

        // attend un id en paramètre
        echo '<button class="btn-update"><a class="btn btn-success btn-update" href="view/V_update.php?id=' . $row['id'] . '">Update</a></button>';// un autre td pour le bouton d'update (sous forme de lien)
        echo '</td><p>';
        echo'<td>';

        // attend un id en paramètre
        echo '<button class="btn-delete"><a class="btn btn-danger btn-delete" href="view/V_delete.php?id=' . $row['id'] . ' ">Delete</a></button>';// un autre td pour le bouton de suppression (sous forme de lien)
        echo '</td><p>';
        echo '</tr><p>';
    }
    Database::disconnect(); //on se deconnecte de la base;
?>    