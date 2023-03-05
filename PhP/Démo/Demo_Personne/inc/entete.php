<header>
    <h1>Vous êtes sur la page <?php echo $page; ?></h1>
    <?php 
        if (!empty($_SESSION)) {
            echo '<h3>Bonjour '.$_SESSION['user'].'</h3>';
        }
    ?>
</header>
