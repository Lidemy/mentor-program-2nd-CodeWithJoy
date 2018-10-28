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
$sql= "SELECT * FROM joy_board_content WHERE id = '$id' ";
$result = $conn->query($sql);
$row=$result->fetch_assoc(); //可用$row['db欄位名稱']抓取相關資料

?>
<!-- 編輯方塊 -->
<div class="container_edit">
  <h2 class=title_edit>編輯留言</h2>
  <form action="edit.php" method="POST">
    <!--   下方程式碼有加上if判斷，如果是子留言則不顯示hash框部分！ -->
    <input class="hash_edit" type="text" name="new_hashtags" placeholder="#標籤" <? if (!isset($hash)){echo 'style="display: none"';}?> value= <? echo $row['hashtags'] ?> >
    <br>
    <textarea class="text_edit" name="new_content" id="" cols="580" rows="200" placeholder="內文～"><?echo $row['content'] ?></textarea>
    <input type="hidden" name="article_id" value=<? echo $row['id'] ?> >
    <br>
    <input type="submit" value="送出" class="submit_edit allBtn_edit">  
    <input type="button" value="返回" onclick="goBack()" class="allBtn_edit">  
<!-- Q: 不知為何不能用onclick="window.location = 'index.php'" 跳轉？ -->
  </form>
</div>
<? 
//把留言更新
@$new_hashtags = $_POST['new_hashtags'];
@$new_content = $_POST['new_content'];
$sql_edit = "UPDATE `joy_board_content` SET `hashtags`='$new_hashtags', `content`='$new_content' WHERE `id` = '$id' ";
$result_edit = $conn->query($sql_edit);

if(isset($new_content)){
  $result_edit;
  header('Location: index.php');
}

?>
<script>
function goBack(){
  window.history.back();
  }
</script>
</body>
</html>