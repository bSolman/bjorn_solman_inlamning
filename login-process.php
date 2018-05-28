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
    echo strlen($storedSalt);
    //echo strlen($inputSaltyPass).' '.strlen($storedSaltyPass); 
    if($inputSaltyPass === $storedSaltyPass){
       $_SESSION['loggedIn'] = TRUE;
       $_SESSION['UserName'] = selectFromWhere('userName', 'users', 'email', $userName);
       $_SESSION['email'] = $userName;
       header('Location: posts.php');
    }
    else {
       header('Location: index.php');
    }
   //echo $storedSalt.' '.$storedSaltyPass;
   //$loginSuccess = login($passw, $userName);
   
   if($loginSuccess){
      // $my_var = file_get_contents('posts.php');
      // echo $my_var;
   }
   else{
       //$my_var = file_get_contents('login.html');
       echo $my_var;
   }
}
