<?php
//連接DB的程式
require_once('conn.php');
if($conn->connect_error){
  die("Connection failed:".$conn->connect_error);
}

//刪除留言
$id = $_POST['article_id'];
$minusOne = -1;

$stmt_edit = $conn->prepare("UPDATE `joy_board_content` SET `parent_id`=? WHERE `id` = ? ");
$stmt_edit->bind_param("ii", $minusOne, $id);
$stmt_edit->execute() ;
$conn->close();

$arr = array('result'=>'success');
echo json_encode($arr);

?>