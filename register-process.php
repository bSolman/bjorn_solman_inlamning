<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'dbConnect.php';

if(isset($_POST['userName'])){
    $email = testData($_POST['email']);
    $password = testData($_POST['password']);
    $userName = testData($_POST['userName']);
    if(doesUserExist($email, checkEmail($email)) === TRUE){
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

function doesUserExist($email, $existingEmail){
    $isEqual = FALSE;
    if($email === $existingEmail){
        $isEqual = TRUE;
    }
    else{
        $isEqual = FALSE;
    }
    return $isEqual;
}

