<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
include 'dbConnect.php';
if($_SESSION['loggedIn']){
    $message = $_POST['comment'];
    echo $_SESSION['UserName'];
    $userID = selectFromWhere('ID', 'users', 'email', $_SESSION['email']);
    echo $userID;
    echo $message;
    addComment($message, $userID);
    //header('Location: posts.php');
    getComments();
}