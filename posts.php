<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
echo $_SESSION['UserName'];
if($_SESSION['loggedIn'] === TRUE){
    loadPage();
}
else{
    header('Location: index.php');
}

function loadPage(){
    echo '<    <head>
        <title>Post-It</title>
        <meta charset="UTF-8">
        <link href="assets/css/post.css" rel="stylesheet" type="text/css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body background="assets/img/post-it.jpg">
        <header>
            <h2 id="name">Post-It</h2>
            <h2><a href="logout-process.php">Logga ut</a></h2>
        </header>
        <div id="postArea">
            <form id="messageBox" name="messageBox" action="posts-create.php" method="post">
            </form>
            <textarea name="comment" form="messageBox"></textarea>
            <input type="submit" form="messageBox" value="Skicka"/>
        </div>
    </body>';
}