<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'dbConnect.php';

if(isset($_POST['userName'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $userName =  $_POST['userName'];
    $salt = trim(createSalt());
    $saltyPass = trim(createSaltyPassword($salt, $password));
    $hashedPassw = trim(createSaltyPassword($salt, $password));
    insertUserData($userName, $email, $hashedPassw, $salt);
    echo 'Du är nu registrerad';
    header('Refresh: 3; URL=index.php');
}

