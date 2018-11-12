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