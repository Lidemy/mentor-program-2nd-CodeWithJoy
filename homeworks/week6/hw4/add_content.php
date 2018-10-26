<?php
require_once('conn.php');

$name = $_COOKIE["name"];
$hashtags = $_POST['hashtags'];
$content = $_POST['content'];
$parent_id = 0;

// 插入主留言
$stmt = $conn->prepare("INSERT INTO joy_board_content (username, hashtags, content, parent_id) VALUES (?,?,?,? ) ");
$stmt->bind_param("sssi", $name, $hashtags, $content, $parent_id);
$result = $stmt->get_result();

if ($_COOKIE["name"]==NULL or $_POST['content']==NULL){
	header('Location: index.php');
} else{
	$stmt-> execute();
	header('Location: index.php');
}
?>