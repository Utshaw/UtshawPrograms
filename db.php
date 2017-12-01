<?php

$connect = mysqli_connect('localhost','root','','utshaw_programs');

if(!$connect){
    die("Error connecting to database " . mysqli_error($connect));
}

?>