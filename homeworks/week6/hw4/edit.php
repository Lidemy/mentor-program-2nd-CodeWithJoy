
<?php
//連接DB的程式
require_once('conn.php');
if($conn->connect_error){
  die("Connection failed:".$conn->connect_error);
}
?>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>編輯留言</title>
<link rel="stylesheet" href="msg_board_local.css" charset="utf-8">
</head>

<body class="body">
<?
//抓取index.php文章id並顯示內容
@$id =  $_POST['article_id'];
@$hash = $_POST['hash_id'];

$stmt = $conn->prepare("SELECT * FROM joy_board_content WHERE id = ? ");
$stmt->bind_param("s", $id);
$stmt-> execute();
$result = $stmt->get_result();
$row=$result->fetch_assoc(); //可用$row['db欄位名稱']抓取相關資料

?>
<!-- 編輯方塊 -->
<div class="container_edit">
  <h2 class=title_edit>編輯留言</h2>
  <form action="edit.php" method="POST">
    <!--   下方程式碼有加上if判斷，如果是子留言則不顯示hash框部分！ -->
    <input class="hash_edit" type="text" name="new_hashtags" placeholder="#標籤" <? if (!isset($hash)){echo 'style="display: none"';}?> value= <? echo htmlspecialchars($row['hashtags'], ENT_QUOTES, 'utf-8') ?> >
    <br>
    <textarea class="text_edit" name="new_content" id="" cols="580" rows="200" placeholder="內文～"><?echo htmlspecialchars($row['content'], ENT_QUOTES, 'utf-8') ?></textarea>
    <input type="hidden" name="article_id" value=<? echo $row['id'] ?> >
    <input type="hidden" name="submit" value="a">
    <br>
    <input type="submit" value="送出" class="submit_edit allBtn_edit" onclick="goToIndex()">  
    <input type="button" value="返回" onclick="goBack()" class="allBtn_edit">  
<!-- Q: 不知為何不能用onclick="window.location = 'index.php'" 跳轉？ -->
  </form>
</div>
<? 
//把留言更新
@$new_hashtags = htmlspecialchars($_POST['new_hashtags'], ENT_QUOTES, 'utf-8');
@$new_content = htmlspecialchars($_POST['new_content'], ENT_QUOTES, 'utf-8');

$stmt_edit = $conn->prepare("UPDATE `joy_board_content` SET `hashtags`=?,`content`=? WHERE id = '$id' ");
$stmt_edit->bind_param("ss", $new_hashtags, $new_content);
/* 下面這兩段是多餘的code，不用抓取結果，只要直接用判斷式執行 $stmt_edit->execute(); 即可
$result_edit = $stmt_edit->get_result();
$row_edit=$result_edit->fetch_assoc(); */
if(@$_POST['new_content'] !== NULL){ //!!![關鍵句] 偵測有新的內容！！！！ 不能用isset($new_content)，因為本來cookie就可能存有值
  $stmt_edit->execute();   
  header('Location: index.php');
  }

?>
<script>
/*無效？WHY?
 function goToIndex(){
  window.location = 'index.php';
} */

function goBack(){
  window.location= 'index.php';
  }
</script>
</body>
</html>