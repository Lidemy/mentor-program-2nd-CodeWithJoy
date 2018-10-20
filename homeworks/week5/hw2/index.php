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
  <title>嘴魚的留言板</title>
  <link rel="stylesheet" href="msg_board_local.css" charset="utf-8">
</head>

<body class="body">
<!-- 歡迎光臨的看版 -->

  <h1 class="h1"> Welcome to 嘴魚留言板!</h1>
  <?
//驗證是否有cookie，並添加登入or登出按鈕
if(!isset($_COOKIE["name"])) {
    echo "您還沒登入，只能回覆留言喔！";
    echo  '<div class="logoutBtn">
              <input type="button" name="logout" value="登入留言" class="logout" onclick="logout()" >
            </div>';
}else{
    echo  '<div class="logoutBtn">
            <input type="button" name="logout" value="按我登出" class="logout" onclick="logout()" >
          </div>';
}
?>

<!-- 我要留言區塊   -->
  <div class="msg">
    <div class="title">我要留言</div>
    <div class="user">
      <form  action="add_content.php" method="post" class="user__msg">
          <div class="user__name"><? echo $_COOKIE["name"]; ?></div>  <!-- //系統自己帶的名字 :) -->
          <input class="user__hashtag" type="text" name="hashtags" placeholder="給文章設標籤吧 ##">
          <br>
          <textarea class="userMsg" type="text" name="content" placeholder="說點什麼？"></textarea>
         <br>
         <input type="hidden" class="parent_id" name="parent_id" value= 0 >
         <input class="submit allBtn" type="submit" value="留言" /> 
      </form>
    </div>
  </div>


<!-- 留言主內容 -->
<div class="container">
  <div class="main">
    <?php
    $sql = "SELECT * FROM joy_board_content WHERE parent_id =0  ORDER BY time DESC LIMIT 10";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
    ?>
    <div class='wrap'>
      <div class='main__username'> <?echo $row['username'] ?> </div>
      <div class='main__time'> <?echo $row['time'] ?> <br></div>
   </div>
    <div class='main__hashtags'> <?echo $row['hashtags'] ?> <br></div>
    <div class='main__content'> <?echo $row['content'] ?> <br></div>
      <!-- 子留言 -->
          <div class='child'>
            <?
            $sql2 = "SELECT * FROM joy_board_content WHERE parent_id = '$row[id]'  ORDER BY time ASC";
            $result2 = $conn->query($sql2);
            if($result2->num_rows>0){
              while($row2=$result2->fetch_assoc()){
            ?>
            <div class='wrap'>
              <div class='child__username'><?echo $row2['username'] ?></div>
              <div class='child__time'><?echo $row2['time'] ?></div>
            </div>
            <div class='child__content'><?echo $row2['content'] ?></div>
          <?
            }
          };

          ?>
          </div>
      <div class="child__form">

        <form class="child__form" action="add_content_child.php" method='post'>
          <div><? echo $_COOKIE["name"]; ?></div>  <!-- //系統自己帶的名字 :) -->
          <textarea name='content' placeholder='回覆點什麼？'></textarea> 
          <input name = 'parent_id' type='hidden' value= <? echo $row['id'] ?> >
          <input class="child__submit" type='submit' value='留言'>
        </form>

      </div>
<?
  }
}
?>
  </div>
 </div>
<!-- 著作權處 -->
  <footer class="footer"></footer>
  <script>
  function logout(){
  document.cookie = "name=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
  window.location = 'login.php';
  }

if(document.cookie = ""){
  document.querySelector(".msg").style.display = "none"; //沒有登入的話，不顯示留言方塊
}else{
  
}
  </script>


</body>
</html>
