<?php
//連接DB的程式
require_once('conn.php');
if($conn->connect_error){
  die("Connection failed:".$conn->connect_error); 
}


//抓取index.php文章id並顯示內容
@$id =  $_POST['article_id'];
//@$hash = $_POST['hash_id'];

$stmt = $conn->prepare("SELECT * FROM joy_board_content WHERE id = ? ");
$stmt->bind_param("s", $id);
$stmt-> execute();
$result = $stmt->get_result();
$row=$result->fetch_assoc(); //可用$row['db欄位名稱']抓取相關資料

//把留言更新
@$new_hashtags = htmlspecialchars($_POST['new_hashtags'], ENT_QUOTES, 'utf-8');
@$new_content = htmlspecialchars($_POST['new_content'], ENT_QUOTES, 'utf-8');

$stmt_edit = $conn->prepare("UPDATE `joy_board_content` SET `hashtags`=?,`content`=? WHERE id = '$id' ");
$stmt_edit->bind_param("ss", $new_hashtags, $new_content);

if(@$_POST['new_content'] !== NULL){ //!!![關鍵句] 偵測有新的內容！！！！ 不能用isset($new_content)，因為本來cookie就可能存有值
  $stmt_edit->execute();
  }

$conn->close();

$arr = array('result'=>'success', 'id'=>$_POST['article_id']);
echo json_encode($arr);

?>