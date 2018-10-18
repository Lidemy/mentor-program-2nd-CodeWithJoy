<?
require_once('conn.php');
if($conn->connect_error){
  die("Connection failed:".$conn->connect_error);
}
// 插入子留言
$name = $_COOKIE['name'];
$content = $_POST['content'];
$id = $_POST['parent_id'];

$sql2 = "INSERT INTO joy_board_content (username, content, parent_id) VALUES ('$name','$content', '$id' )";
if($conn->query($sql2) === true){ //留言成功
	header('Location: index.php');
}else{  // 留言失敗
	header('Location: index.php');
}

?>