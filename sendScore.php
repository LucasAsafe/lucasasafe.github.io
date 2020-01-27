<?php

$dbServername = "localhost";
$dbUsername= "root";
$dbPassword= "";
$dbName= "corujinhas_db";


try{
    $conn = new PDO('mysql:host=' .$dbServername. ';dbname=' .$dbName. ';charset=utf8', $dbUsername, $dbPassword);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}

catch (PDOException $er){
    echo 'Conn error' .$er->getMessage();
    header('Location: ../problemastecnicos.php?database=' . $er->getMessage());
}

$score = $_POST["scoreInfo"];

$scoreArr = explode (" ",$score);
$letra = $scoreArr[0];
$pontuacao = $scoreArr[1];
$insertData = "INSERT INTO dados(letra,pontuacao,dataadd) VALUES (?,?,CURRENT_TIMESTAMP)";
$setUserData = "INSERT INTO dados_user(id_user,id_data) VALUES (?,LAST_INSERT_ID())";
$statement = $conn->prepare($insertData);
$statement->execute(array($letra,$pontuacao));
$statement = null;
$statement = $conn->prepare($setUserData);
$statement-> execute(array('1'))

?>
