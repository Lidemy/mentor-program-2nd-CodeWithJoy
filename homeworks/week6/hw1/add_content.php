<?php
require_once('conn.php');

$name = $_COOKIE["name"];
$hashtags = $_POST['hashtags'];
$content = $_POST['content'];

// 插入主留言
$sql = "INSERT INTO joy_board_content (username, hashtags, content, parent_id) VALUES ('$name','$hashtags','$content','0')";

if ($_COOKIE["name"]==NULL or $_POST['content']==NULL){
	header('Location: index.php');
} else{
	$conn->query($sql);
	header('Location: index.php');
}


?>