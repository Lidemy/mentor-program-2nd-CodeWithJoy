## 資料庫欄位型態 VARCHAR 跟 TEXT 的差別是什麼
VARCHAR 會根據你輸入的字數儲存資訊長度，而TEXT則是預設好要存多少長度(2的16次方-)，不管最後實際輸入或長或短，都是一樣的資料儲存空間（意即TEXT不可以有默認值)。還有一種資料叫做CHAR，可以預設默認值，儲存長度也是固定，在你確定資料一定是固定長度時使用。

//參考網址：https://read01.com/OyxeGy.html


## Cookie 是什麼？在 HTTP 這一層要怎麼設定 Cookie，瀏覽器又會以什麼形式帶去 Server？
Cookie是一個儲存小文本資料的地方，並且由server發送至client端。
server端利用setcookie(餅乾的name//必填,餅乾的vale//必填,expire,path,domain,secure)發送一個cookie資料，client端可用`document.cookie()`讀取，或是用server端呼叫 `$HTTP_COOKIE_VARS["user"]` 或 `$_COOKIE["user"]`。


## 我們本週實作的會員系統，你能夠想到什麼潛在的問題嗎？
在上wk6課程前，只有想到在form 的 input中填寫程式碼的XSS問題，上完以後發現還有以下幾個需要被解決的問題（亦為上課筆記）：
常見四漏洞

| 漏洞        			        | 解法   		    | 		   |
| --------   			        | -----:   		    | :----: 	   |
| XSS(cross-site scripting)     | escape      		|  把單/雙引號逸脫   |
| SQL injection                 | prepare statement |   參考 https://www.w3schools.com/php/php_mysql_prepared_statements.asp    |
| cookie被偽造                   | 用session ID確認   |   server要儲存這個資訊，所以要多一欄session_id，可用uniqid() 這個function 產生   |
|密碼存名碼？                   	| 用hash	 function   |   把密碼透過雜湊fcn儲存為另一個字串(單向fcn)，再儲存在server裡   |


