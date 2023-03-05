<?php
    session_start();
    session_destroy(); // ne vide pas le tableau $_SESSION

    
    header('Location: index.php');