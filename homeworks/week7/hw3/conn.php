<?php
//本機db
/* $servername = "localhost";  
$username = "root";
$password = ""; 
$dbname = "mentor_program_db"; */

//胡立db
$servername = "166.62.28.131"; 
$username = "student2nd";
$password = "mentorstudent123";
$dbname = "mentor_program_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);
$conn->query("SET NAMES 'UTF8'"); //中文編碼
$conn->query("SET time_zone = '+08:00'"); //確認時區
// Check connection
?>