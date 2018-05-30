<?php 
function connect(){
$servername = "localhost";
$username = "root";
$password = "";
$myDB = "postit";
$connection = new mysqli($servername, $username, $password, $myDB);
    
    if ($connection->connect_error){
           return die("Connection failed: ".$connection.connect_error);
    } 
  
    return $connection;
}
                
function createSalt(){
    $randomSalt = "";
    $saltArray = array('a','b','c','d','e','f','g','h','i','j','k','l',
                        'm','n','o','p','r','s','t','u','v','w','x','y','z',
                        '0','1','2','3','4','5','6','7','8','9');
    
    for($i = 0; $i < 4; $i++){
        $randomSaltPos = random_int(0, sizeof($saltArray));
        $randomSalt .= $saltArray[$randomSaltPos];
    }
    return $randomSalt;
}

function createSaltyPassword($salt, $passw){
    $salt_passw = sha1(testData($passw).testData($salt));
    return $salt_passw;
}
                
//lägger till användare i databasen
function insertUserData($name, $email, $pword, $salt){
    $query =  "INSERT INTO users (userName, email, passw, salt) VALUES ('". testData($name) ." ', '". testData($email) ." ','". testData($pword) ." ', '". testData($salt) ." ')";
    connect() -> query ($query);
}

function addComment($message, $userID){
    $query =  "INSERT INTO posts (message, userID) VALUES ('". testData($message) ." ', '". testData($userID)."')";
    connect() -> query ($query);
}

function selectFromWhere($select, $from, $where, $data){
    $query = "SELECT ".testData($select)." FROM ".testData($from)." WHERE ".testData($where)." = ('".testData($data)."')";
    $result = connect()->query($query);
    $row = $result->fetch_assoc();
    return $row[$select];
}
    
function getComments(){
    $query = "SELECT userName, message from posts
              JOIN users ON posts.userID = users.ID";
    
    $result = connect()->query($query);
    while ($row = $result->fetch_assoc()){
        echo '<tr>';
            echo '<td>'.'<h3>'.$row["userName"].'</h3>'.'</td>';
            echo '<td>'.'<h3>'.$row["message"].'</h3><td>';
        echo '</tr>';
    }
}

function testData($inputData){
    $inputData = trim($inputData);
    $inputData = stripcslashes($inputData);
    $inputData = htmlspecialchars($inputData);
    return $inputData;
}
