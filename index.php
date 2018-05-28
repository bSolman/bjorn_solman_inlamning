<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php

session_start();

isLoggedIn();

function isLoggedIn(){
    if(isset($_SESSION['loggedIn'])){
        $homepage = file_get_contents('posts.php');
        echo $homepage;
    }
    else{
        $homepage = file_get_contents('startPagePost.html');
        echo $homepage;
    }
}


