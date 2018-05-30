<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
include 'dbConnect.php';
if($_SESSION['loggedIn']){
    $message = mysqli_escape_string(connect(), testData($_POST['comment']));
    if($message === "" || $message === NULL){
        header('Location: posts.php');
    }
    else {
        $userID = selectFromWhere('ID', 'users', 'email', $_SESSION['email']);
        addComment($message, $userID);
        header('Location: posts.php');
    }
}