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
$sql3 = "INSERT INTO joy_board_content (username, content, parent_id) VALUES ('路過打醬油 (未登入)','$content', '$id' )";

if(isset($_COOKIE['name'])){ //有登入有cookie
		$conn->query($sql2);//留言
		header('Location: index.php');
	}else if(!isset($_COOKIE['name'])){
		$conn->query($sql3);//留言
		header('Location: index.php');
	}else{  // 留言失敗
		header('Location: index.php');
		echo "留言失敗了~";
}
?>