<?php

session_start();
$page = 'panier';

$panier = $_SESSION['panier'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
        include 'inc/entete.php';
    ?>
    <section>
        <h3>Contenu du panier</h3>
        <br>
        <table>
            <tr><th>code article</th><th>Libellé</th><th></th></tr>

            <?php
                foreach($panier as $article){
                    echo '<tr><td>'.$article['codeArt'].'</td><td> </td><td>'.$article['quantite'].'</td></tr>';
                }
            ?>
        </table>
    </section>
</body>

</html>