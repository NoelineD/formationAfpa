<?php
   include 'vars.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, td, th{
            border:1px solid greenyellow;
    
        }

        td{
            margin:10px;
        }
    </style>
</head>
<body>
    <h2>Liste des personnes</h2>
    <table>
        <thead>
            <tr><th>Nom</th></tr>
        </thead>
        <tbody>
        </tbody>
        <?php
        foreach($noms as $nom)
        echo '<tr><td>'.$nom.'</td></tr>';
        ?>
    </table>

<?php 
if ($test == 10){
?>
    <br><h2>ok test vaut 10</h2>
<?php
}
?>
</body>
</html>