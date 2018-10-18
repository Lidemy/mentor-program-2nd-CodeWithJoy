資料表名稱：board_content   //index.php 主頁面顯示留言用

| 欄位名稱 	| 欄位型態 | 說明 |
|----------|----------|------|
|  id  			| integer(10)   | 留言 id     |
| username   	| varchar(10)	| 使用者暱稱  |
| hashtags 		| varchar(10)	| 幫留言加上標籤 # |
| time 			| timestamp | 留言，更新時間 |
|content 		| text 		| 留言內容		|
|parent_id		| init		| 辨認是否為主/子留言的欄位： 如果為0為主留言，如果為id則為子留言			|

資料表名稱：border_register //register.php 註冊頁面儲存註冊資料用

| 欄位名稱 	| 欄位型態 | 說明 |
|----------|----------|------|
| account | varchar |  用戶帳號|
| password | varchar| 用戶密碼 |
| username | varchar| 用戶暱稱｜
