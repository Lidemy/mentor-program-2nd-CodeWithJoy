<?php
require_once('conn.php');

$name = $_POST['username'];
$hashtags = $_POST['hashtags'];
$content = $_POST['content'];

// 插入主留言
$sql = "INSERT INTO msg_board_content (username, hashtags, content, parent_id) VALUES ('$name','$hashtags','$content','0')";
if($conn->query($sql) === true){
	echo '留言成功';
	header('Location: index.php');
}else{
	echo '留言失敗';
	header('Location: index.php');
}


?>