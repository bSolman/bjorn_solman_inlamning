<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include 'dbConnect.php';

if(isset($_POST['password'])){
    $passw = $_POST['password'];
    $userName = $_POST['email'];
    $storedSaltyPass = trim(selectFromWhere('passw', 'users', 'email', $userName));
    $storedSalt = trim(selectFromWhere('salt', 'users', 'email', $userName));
    $inputSaltyPass = createSaltyPassword($storedSalt, $passw);
    if($inputSaltyPass === $storedSaltyPass){
       $_SESSION['loggedIn'] = TRUE;
       $_SESSION['UserName'] = selectFromWhere('userName', 'users', 'email', $userName);
       $_SESSION['email'] = $userName;
       echo 'Du loggas nu in';
       header('Refresh: 3; URL=posts.php');
    }
    else {
        echo 'Felaktig inloggning';
        header('Refresh: 3; URL=index.php');
    }
}
