<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include 'include/wievs/_header.php';
echo $_SESSION['UserName'];
if($_SESSION['loggedIn'] === TRUE){
    echo 'logged in';
    loadPage();
}
else{
    header('Location: index.php');
}

function loadPage(){
    echo '<link href="assets/css/post.css" rel="stylesheet" type="text/css"/>
        <body background="assets/img/post-it.jpg"></body>';
}