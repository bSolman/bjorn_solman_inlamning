<?php
    session_start();
    unset($_SESSION['loggedIn']);
    unset($_SESSION['UserName']);
    unset($_SESSION['email']);
    session_destroy();
    header('Location: index.php');

