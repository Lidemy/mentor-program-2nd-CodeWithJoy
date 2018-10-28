<?
require_once('conn.php');
if($conn->connect_error){
  die("Connection failed:".$conn->connect_error);
}
// 插入子留言
$name = $_COOKIE['name'];
$content = $_POST['content'];
$id = $_POST['parent_id'];
/* 原來會被SQL injection手法攻擊的寫法
$sql2 = "INSERT INTO joy_board_content (username, content, parent_id) VALUES ('$name','$content', '$id' )";
$sql3 = "INSERT INTO joy_board_content (username, content, parent_id) VALUES ('路過打醬油 (未登入)','$content', '$id' )";
 */
$stmt2 = $conn->prepare("INSERT INTO joy_board_content (username, content, parent_id) VALUES (?,?,? ) ");
$stmt2->bind_param("sss", $name, $content, $id);
$result2 = $stmt2->get_result();

$stmt3 = $conn->prepare("INSERT INTO joy_board_content (username, content, parent_id) VALUES (?,?,? ) ");
$text = '路過打醬油 (未登入)';
$stmt3->bind_param("sss", $text, $content, $id);
$result3 = $stmt3->get_result();


if(isset($_COOKIE['name'])){ //有登入有cookie
		$stmt2-> execute();//執行留言
		header('Location: index.php');
	}else if(!isset($_COOKIE['name'])){
		$stmt3-> execute();//沒登入的留言
		header('Location: index.php');
	}else{  // 留言失敗
		header('Location: index.php');
}
?>