<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titre ?></title>

</head>

<body>
    <header>
        <h1>Vous êtes sur la page <?php echo $page; ?></h1>
        <?php
        if (isset($_SESSION['user'])) {
            echo '<h3>Bonjour ' . $_SESSION['user'] . '</h3>';
        }
        ?>
    </header>