<?php

$_SERVER = "localhost";
$userName ="root";
$passwprd = '';
$dbname = 'azad';

$conn = new mysqli($_SERVER , $userName , $passwprd , $dbname);

if($conn->connect_errno>0){
        echo 'somthing want wrong,connection failed';
    }else{
        echo 'connection successfull';
    }
// echo "<pre>";
// print_r($conn->connect_errno);
// echo "</pre>"
// if($conn->connect_errno>0){
//     echo 'somthing want wrong,connection failed';
// }else{
//     echo 'connection successfull';
// }