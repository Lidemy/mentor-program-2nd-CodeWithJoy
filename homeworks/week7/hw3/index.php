<?php
//連接DB的程式
require_once('conn.php');
if($conn->connect_error){
  die("Connection failed:".$conn->connect_error);
}
require_once('bootstrap.php');
?>

<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>嘴魚的留言板</title>
  <link rel="stylesheet" href="msg_board_local.css" charset="utf-8">

  <script>
   //ajax request
      $(document).ready(function(){
        $("form[class=user__msg]").submit(function(e){
          console.log(e);
          e.preventDefault();           
          var username = $('.user__name').text(); // 抓名字
          var text = $("#userMsg").val();
          var hashtags = $(".user__hashtags").val();

          $.ajax({
            type: 'POST',
            url: "add_content.php",
            data: {
            'name': username,
            'hashtags': hashtags,
            'content': text
            },
            success: function(resp){
              //console.log(resp);
              var res = JSON.parse(resp);
              //console.log(res);
              var time = res.time.time.toString();
              if(res.result ==='success'){
                $("div.main").prepend(`
              <div class='wrap  space-between'>
                <div class='main__username'>${username} </div>
                <div class='main__time'> ${time} <br></div>
                </div>
                <div class='main__hashtags'> ${hashtags} <br></div>
                <div class='main__content' class="mainTEST"> 
                <div> ${text}

                    <!-- 可以編輯/刪除區塊 -->
                <div class="wrap" style = "display:flex">
                    <form action="edit.php" class="edit" method="POST">
                        <input  type="image" class="edit editImg" value='edit' src="/CodeWithJoy/editPic.png" > 		
                        <input type="hidden" name="article_id" value=${res.id} >
                        <input type="hidden" name="hash_id" value="1" ><!--  確認是來自主留言，可編輯hash -->
                    </form>
                    <form action="delete.php" method="POST">
                        <input type="image" class="delete deleteImg" value='edit' src="/CodeWithJoy/deletePic.png" onclick="deleteConfirm()"> 		
                        <input type="hidden" name="article_id" vvalue=${res.id} >
                    </form>
                    </div>
                <br></div>
                  <div class="child__form">
                <form class="child__form" action="add_content_child.php" method='post'>
                  <div>${username}</div>  
                  <textarea name='content' placeholder='回覆點什麼？' required></textarea> 
                  <input name = 'parent_id' type='hidden' value= ${res.id} >
                  <input class="child__submit" type='submit' value='留言'>
                </form>
              </div>
                `)
              }
          
            }
          });
        })        
        
        $(".editImg").click(function(e){
          e.preventDefault();
          var articleId = e.target.value; 
          var hashtags = e.target.parentNode.parentNode.parentNode.previousSibling.previousSibling;
          var hashtags_txt = hashtags.innerText;
          //console.log(hashtags_txt);
          var content = e.target.parentNode.parentNode.parentNode;     
          var content_txt = content.innerText;
          //console.log(content_txt);
          hashtags.outerHTML ="<input class='temp' value=' "+hashtags_txt +"'>"
          content.outerHTML = `<textarea class='temp'>`+content_txt+`</textarea><br><input type='button' class='newTxt' value='送出'><input type='button' class='goBack' value='返回'>`
          
          //var new_hashtags = e.target.parentNode.parentNode.parentNode.previousSibling.previousSibling;
          
          $(".newTxt").click(function(){
            e.preventDefault();
            var new_hashtags = $("input[class='temp']").val();
            //console.log(new_hashtags);
            var new_content = $("textarea[class='temp']").val();
            //console.log(new_content);
            $.ajax({
              type: 'POST',
              url: "edit.php",
              data: {
                'article_id': articleId,
                'new_hashtags': new_hashtags,
                'new_content':new_content,
              },          
              success: function(resp){
                  console.log(resp)
                  var res = JSON.parse(resp);
                  if(res.result ==='success' ){
                    $("input[class='temp']").replaceWith(`<div class='main__hashtags'>${new_hashtags}</div>`);
                    $("textarea[class='temp']").replaceWith(`
                    <div class='main__content'>${new_content}</div>
                        <!-- 可以編輯/刪除區塊 -->
                            <div class="wrap" style = "display:flex">
                                <form  class="edit" method="POST">
                                    <input  type="image" class="edit editImg" value='edit' src="/CodeWithJoy/editPic.png" > 		
                                    <input type="hidden" name="article_id" value=${res.id} >
                                    <input type="hidden" name="hash_id" value="1" ><!--  確認是來自主留言，可編輯hash -->
                                </form>
                                <form  method="POST">
                                    <input type="image" class="delete deleteImg" value='edit' onclick="deleteConfirm()" src="/CodeWithJoy/deletePic.png" > 		
                                    <input type="hidden" name="article_id" value=${res.id} >
                                </form>
                              <br>
                            </div>
                    `);
                    $("input[class='newTxt']").remove();
                    $("input[class='goBack']").remove();
                    }
                }
            })
          
          })
          
        })

            
        $(".deleteImg").click(function(e){
          e.preventDefault();
          var articleId = e.target.value;         
          $.ajax({
          type: 'POST',
          url: "delete.php",
          data: {'article_id': articleId},
          success: function(resp){
              var res = JSON.parse(resp);
              if(res.result ==='success' ){
                  e.target.parentNode.parentNode.parentNode.parentNode.style.display = 'none';  
                }
            }
          })
        })
      })
  </script>
</head>

<body class="body">
<!-- 歡迎光臨的看版 -->

  <h1 class="h1"> Welcome to 嘴魚留言板!</h1>
<?
@$session_id = htmlspecialchars($_COOKIE['session_id'], ENT_QUOTES, 'utf-8');
@$name = @$_COOKIE['name'];

$stmt_sess = $conn->prepare("SELECT * from joy_users_certificate WHERE session_id = ?"); //client端有db端的session_id
$stmt_sess->bind_param("s", $session_id);
$stmt_sess->execute();
$result_sess = $stmt_sess->get_result();

//驗證是否有cookie，並添加登入or登出按鈕
if($result_sess->num_rows>0){
  echo  '<div class="logoutBtn">
            <input type="button" name="logout" value="按我登出" class="logout" onclick="logout()" >
          </div>';
  }else{
      echo "您還沒登入，只能回覆留言喔！";
      echo  '<div class="logoutBtn">
                <input type="button" name="logout" value="登入留言" class="logout" onclick="logout()" >
              </div>';
  }
?>
<!-- 我要留言區塊   -->
<? //留言板，登入才顯示
if($result_sess->num_rows <= 0){ //改用session_id驗證
  echo '<div class="msg" style = "display:none">';
}else{
  echo '<div class="msg" style = "display:block">';
}
?>

    <div class="title">我要留言</div>
    <div class="user">
      <form  method="POST" class="user__msg" action="add_content.php">
          <div class="user__name"><? echo $_COOKIE["name"]; ?></div>  <!-- //系統自己帶的名字 :) -->
          <input class="user__hashtags" type="text" name="hashtags" placeholder="給文章設標籤吧 ##">
          <br>
          <textarea id="userMsg" class="userMsg" type="text" name="content" placeholder="說點什麼？" required></textarea>
         <br>
         <input type="hidden" class="parent_id" name="parent_id" value= 0 >
         <input type="submit" class="submit allBtn" value="留言"/> 
      </form>
    </div>
</div>



<!-- 留言主內容 -->
<div class="container">
  <div class="main">
    <?php
  //確認留言筆數
  $stmt_page = $conn->prepare("SELECT COUNT(parent_id) FROM `joy_board_content` where parent_id = 0 ");
  $stmt_page->execute();
  $result_page = $stmt_page->get_result();
  $ans = $result_page->fetch_row(); //抓取總留言數量的資料
  
  //分成所要的頁數
  $page = ceil($ans[0]/10); //#ans[0]就是總留言數量

  if(!isset($_GET['page'])){
      $page_get = 0;
  }else{
      $page_get = ($_GET['page']-1)*10;
  }
  //特定頁面印出所需$_GET['page'];
  $stmt = $conn->prepare("SELECT * FROM joy_board_content WHERE parent_id = 0 && parent_id != -1  ORDER BY time DESC LIMIT $page_get, 10");
  $stmt->execute();
  $result = $stmt->get_result();

  //下方載入主要留言內容
  if($result->num_rows>0){
      while($row = $result->fetch_assoc()){
  ?>
  
  <div class='main__content' class="mainTEST"> 
        <div class="main__content__wrap">
            <div class='wrap  space-between'>
              <div class='main__username'> <?echo htmlspecialchars($row['username'], ENT_QUOTES, 'utf-8'); ?> </div>
              <div class='main__time'> <?echo $row['time'] ?> <br></div>
            </div>
            <div class='main__hashtags'> <?echo htmlspecialchars($row['hashtags'], ENT_QUOTES, 'utf-8') ?> <br></div>
            <div> <?echo htmlspecialchars($row['content'], ENT_QUOTES, 'utf-8') ?>
            
                  <!-- 可以編輯/刪除區塊 -->
              <? //該留言的主人才顯示該區塊
                if($name !== $row['username'] ){
                  echo '<div class="wrap" style = "display:none">';       
                }else{
                  echo '<div class="wrap" style = "display:flex">';
                }
              ?>
                  <form class="editForm" action="edit.php" class="edit" method="POST">
                    <input class="edit editImg" type="image"  value=<? echo htmlspecialchars($row['id'], ENT_QUOTES, 'utf-8'); ?>  src="/CodeWithJoy/editPic.png" > 		
                    <input class="artile__id__hidden" type="hidden" name="article_id" value=<? echo htmlspecialchars($row['id'], ENT_QUOTES, 'utf-8'); ?> >
                    <input type="hidden" name="hash_id" value="1" ><!--  確認是來自主留言，可編輯hash -->
                  </form>
                  <form  class="deleteForm"  method="POST">
                    <input type="image" class="delete deleteImg" value=<? echo htmlspecialchars($row['id'], ENT_QUOTES, 'utf-8'); ?> src="/CodeWithJoy/deletePic.png" > 		
                    <input class="artile__id__hidden2" type="hidden" name="article_id" value=<? echo htmlspecialchars($row['id'], ENT_QUOTES, 'utf-8'); ?> >
                  </form>
                </div>
              <br>
            </div>
            <!-- 子留言 -->
                <div class='child'>
                  <?
                  $row_id = $row['id'];
                  $stmt2 = $conn->prepare("SELECT * FROM joy_board_content WHERE parent_id = ? && parent_id != -1   ORDER BY time ASC");
                  $stmt2->bind_param("s",$row_id);
                  $stmt2->execute();
                  $result2 = $stmt2->get_result();
                  /* $row2 = $result2->fetch_assoc()   (註一)這行不可以先定義好！*/

                  if($result2->num_rows>0){
                    while($row2 = $result2->fetch_assoc()){  //（接註一）不可以在上面先定義好$row，不然應該就被鎖死在單一行的資料內!!!
                  ?>
                    <? //該留言的主人讓該區塊顏色變黃
                    if($row['username'] === $row2['username'] ){
                      echo '<div class="child_post_self">';       
                    }else{
                      echo '<div class="child_post">';
                    }
                  ?>
                      <div class='wrap  space-between'>
                        <div class='child__username'><? echo htmlspecialchars($row2['username'], ENT_QUOTES, 'utf-8'); ?></div>
                        <div class='child__time'><?echo $row2['time'] ?></div>
                      </div> 
                      <div class='child__content'><?echo htmlspecialchars($row2['content'], ENT_QUOTES, 'utf-8'); ?></div>

                  <!-- 可以編輯/刪除區塊 有一支筆跟一個垃圾桶-->
                  <? //該留言的主人才顯示該區塊
                  if($name !== $row2['username'] ){
                    echo '<div class="wrap" style = "display:none">';       
                  }else{
                    echo '<div class="wrap" style = "display:flex">';
                  }
                ?>
                  <div class="wrap"> 
                    <form action="edit.php" class="edit" method="POST">
                    <input  type="image" class="edit editImg" value='edit' src="/CodeWithJoy/editPic.png" > 		
                      <input type="hidden" name="article_id" value=<? echo htmlspecialchars($row2['id'], ENT_QUOTES, 'utf-8'); ?> >
                    </form>
                    <form action="delete.php" method="POST">
                      <input type="image" class="delete deleteImg" onclick="deleteConfirm()" src="/CodeWithJoy/deletePic.png">
                      <input type="hidden" name="article_id" value=<? echo htmlspecialchars($row2['id'], ENT_QUOTES, 'utf-8'); ?> >
                    </form>
                </div>
              </div>
            <br></div>
                <?
                  }
                };
                ?>
                </div>
            <div class="child__form">
              <form class="child__form" action="add_content_child.php" method='post'>
                <div><? 
                if(isset($_COOKIE["name"])){
                  echo $_COOKIE["name"];
                }else{
                  echo '路過打醬油 (未登入)';
                }
                ?></div>  <!-- //系統自己帶的名字 :) -->
                <textarea name='content' placeholder='回覆點什麼？' required></textarea> 
                <input name = 'parent_id' type='hidden' value= <? echo htmlspecialchars($row['id'], ENT_QUOTES, 'utf-8'); ?> >
                <input class="child__submit" type='submit' value='留言'>
              </form>
            </div>
    </div> <!-- main__content__wrap結尾 -->
<?
  }
}
  
?>

  </div>
  <div class="page">
    <div class="pageTitle" >Page</div>
      <?
    for ($i=1; $i <= $page ; $i++) { 
      echo '
      <form action="index.php" method="GET" >
      <input type="hidden" value='.$i.' >
      <input type="button" value='.$i.' onclick="goTo('.$i.')" class="pageBtn")>
      </>
      ';
    }
      //當點選到所要的頁數，會跳轉並載入資料

      ?>

  </div>
 </div>
<!-- 著作權處 -->

  <footer class="footer">footer</footer>

  <script>
  function logout(){
  document.cookie = "name=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
  document.cookie = "session_id=; expires=Thu, 01 Jan 1970 00:00:00 UTC"; //session_id也清掉
  window.location = 'login.php';
  }

  function deleteConfirm(){    
    if(confirm("確定要刪除留言？")===true){
         continue;//huli說event.returnValue做法不可行，改成直接用confirm視窗即可
    }else{
      alert('哎呀！刪除失敗')
    }
  }
  function goTo(num){
    window.location = 'index.php?page='+ num ;
    //當然也可以用<a>，但我覺得btn比較Q ==>  echo'<a type="button" href="index.php?page='.$i.'">'.$i.'<a>;

  }

  </script>
</body>
</html>