<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
echo $_SESSION['UserName'];
if($_SESSION['loggedIn'] === TRUE){
    echo 'logged in';
    loadPage();
}
else{
    header('Location: index.php');
}

function loadPage(){
    echo '
        <link href="assets/css/post.css" rel="stylesheet" type="text/css"/>
        <body>
        <div id="mainDiv">
            <header>
                <h1 id="logo">Post-it</h1>
                <h1 id="text">Your page</h1>
                <a href="#"><h1>Logga ut</h1></a>
            </header>
                <div id="mainDiv">
                    <div id="textDiv">
                        <h3>RunEvents</h3>
                        <form id="sendMessage" name="sendMessage" method="post" action="posts-create.php">
                        </form>
                        <textarea rows="4" cols="50" name="comment" id="comment" form="sendMessage">
                        Enter text here...</textarea>
                        <input type="submit" form="sendMessage" value="Skicka">
                    </div>
                    <div id="thePosts">
                        
                    </div>
                </div>
            </div>
        </body>';
}