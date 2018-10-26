<?php
//連接DB的程式
require_once('conn.php');
if($conn->connect_error){
  die("Connection failed:".$conn->connect_error);
}


//刪除留言
$id =  $_POST['article_id'];
$sql_edit = "UPDATE `joy_board_content` SET `parent_id`= -1 WHERE `id` = '$id' ";
$result_edit = $conn->query($sql_edit);

if($result_edit === true){ 
  header('Location: index.php');
}

?>