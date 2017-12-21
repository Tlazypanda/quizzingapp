<?php

$db_host='localhost';
$db_name='quizzer';
$db_user='root';
$db_pass='secret';

$mysqli=new mysqli($db_host,$db_user,$db_pass,$db_name);

//test connection

if($mysqli->connect_error){
printf('Failed to connect',$mysqli->connect_error);
    exit();
}

?>