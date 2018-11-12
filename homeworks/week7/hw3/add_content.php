<?php
require_once('conn.php');

$name = $_COOKIE["name"];
$hashtags = $_POST['hashtags'];
$content = $_POST['content'];
$parent_id = '0';

// 插入主留言
$stmt = $conn->prepare("INSERT INTO joy_board_content (username, hashtags, content, parent_id) VALUES (?,?,?,? ) ");
$stmt->bind_param("sssi", $name, $hashtags, $content, $parent_id);
$result = $stmt->get_result();

if (isset($_POST["content"]) && $_POST["content"]!==NULL){ 
	$stmt-> execute();
} 

$last_id = $conn->insert_id; //賦予主留言文章id用！ 要記得放在$conn->close();之前
$stmt_time = $conn->prepare("SELECT `time` From joy_board_content where id = ? ");
$stmt_time->bind_param('i', $last_id);
$stmt_time-> execute();
$result_time = $stmt_time->get_result();
$row_time['time']=$result_time->fetch_assoc(); //會抓出一個array!!! key=>value

$conn->close();


$arr = array('result'=>'success','id'=>$last_id, 'time'=>$row_time['time']);
echo json_encode($arr);
?>