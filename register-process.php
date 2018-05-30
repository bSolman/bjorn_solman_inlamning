<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'dbConnect.php';

if(isset($_POST['userName'])){
    $email = mysqli_escape_string( connect(), testData($_POST['email']));
    $password = mysqli_escape_string( connect(), testData($_POST['password']));
    $userName = mysqli_escape_string( connect(), testData($_POST['userName']));
    if(selectFromWhere('email', 'users', 'email', $email) === "" || selectFromWhere('email', 'users', 'email', $email) === NULL){
        $salt = trim(createSalt());
        $saltyPass = trim(createSaltyPassword($salt, $password));
        $hashedPassw = trim(createSaltyPassword($salt, $password));
        insertUserData($userName, $email, $hashedPassw, $salt);
        echo 'Du är nu registrerad';
        header('Refresh: 3; URL=index.php');
    }
    else{
        echo 'Du är inte registrerad! Användarnamnet finns redan.';
        header('Refresh: 3; URL=index.php');
    }

}

