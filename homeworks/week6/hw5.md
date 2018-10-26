## 請說明 SQL Injection 的攻擊原理以及防範方法
client端插入可以影響database的指令，讓可以運作的指令儲存在db中以攻擊。例：如果你直接把client接到的input 密碼存入db，而沒有先驗證過，有可能收到 'or 1=1 --' 的指令，讓用戶直接登入系統。

解法：用prepare statement 先準備好sql的指令，再另外帶入client端參數。

## 請說明 XSS 的攻擊原理以及防範方法
XSS: cross-site scripting 跨站(JS)腳本攻擊。簡單來說就是藉由可以由client輸入處直接插入任何你想要跑的html or JS程式碼 eg.`<script>你想要做的壞事</script>`，然後網站input後可能會儲存在資料庫內，你成功在每一次刷新網頁時載入想運行的程式碼。

解法：利用escape跳脫把<, /, ,...等等可能組成程式碼的字符跳脫成「奇怪的符號」，這樣惡意程式碼就失去功效了。//但奇怪符號還是可以在網頁上以原樣顯示(不過我作業好像跳脫到一些`<script>`走樣了...)。

## 請說明 CSRF 的攻擊原理以及防範方法
CSRF/XSRF: Cross Site Request Forgery 跨站請求偽造，也可以叫做 one-click attack 或者 session riding。通常就是hacker騙你點擊link(或發郵件,甚至財產操作如轉帳和購買商品，所以來源不明的東西真的不能亂點亂開！)盜用你的cookie/session，接下來就可以拿你被認證過的身份亂來。被存取的網站會認為是真正的用戶操作而執行。所以如果web中用戶身分驗證太簡單，東西太容易被猜到、修改，就容易被攻擊。

"跟XSS相比，XSS 利用的是用戶對指定網站的信任，CSRF 利用的是網站對用戶網頁瀏覽器的信任。"-wikipedia 


## 請舉出三種不同的雜湊函數/雜湊演算法
Hash functions:
1. SHA-256(Secure Hash Algorithm)：
為SHA-2旗下六個不同的演算法標準的一個。輸出長度256bit。SHA家族的演算法，由美國國家安全局（NSA）所設計，並由美國國家標準與技術研究院（NIST）發布，是美國的政府標準。其他家族成員還有SHA-1(已被GOOGLE和合作夥伴CWI在2017年攻破)、SHA-3...等。

2. MD5(Message-Digest Algorithm)：
一種被廣泛使用的密碼雜湊函式，輸入不定長度資訊，輸出固定長度128-bits hash value的演算法。1996年後被證實存在弱點，可以被加以破解，對於需要高度安全性的資料，專家一般建議改用其他演算法。2004年，證實無法防止碰撞（collision），因此不適用於安全性認證（如SSL公開金鑰認證或是數位簽章等）。
3. bcrypt：
根據Blowfish加密演算法所設計的密碼雜湊函式，實作中bcrypt會加鹽（salting）以防禦彩虹表(rainbow table)攻擊，同時bcrypt還是適應性函式，它可以藉由增加疊代之次數來抵禦電腦透過暴力法破解。


## 請去查什麼是 Session，以及 Session 跟 Cookie 的差別
session，是一種驗證客戶端到底是誰在使用的方法，在你輸入驗證你是誰的資料成功後，發給你一張通行證。通常的操作是產生一組對應id存在瀏覽器的cookie中，cookie發請求來就可以對應到這張session通行證。由於 HTTP 協定是無狀態（Stateless）的（比HTTPS來得不安全呀！），所以 session 提供一種儲存用戶資料的方法。

Cookie：瀏覽器幫你暫時儲存資料的手段。
特性為 1.Domain specific，且可 2.設生命週期。Cookie 在向該 domain 的 server 發送請求時，也會被一併帶進去該請求中（所以cookie內容太多傳輸變慢，
有時候cookie存的資料怪怪也會讓網頁掛掉）。而因為是 client 端的資訊，是可以被竄改的。
Cookie 的規範中定義了：伺服器端從 request 中接受到 cookie 的訊息，在產生 response 的時候，也會一起回覆給用戶端。這個行為也告訴我們：在伺服器這邊也可以設定 cookie。
src:
https://blog.hellojcc.tw/2016/01/12/introduce-session-and-cookie/


## `include`、`require`、`include_once`、`require_once` 的差別
1. `include`: 功能跟require一樣，只不過通常使用在程式中的流程敘述中，例如if…else…、while、for等，適合引入動態的程式碼。 
include在執行時，如果include進來的檔案發生錯誤的話，會顯示警告，不會立刻停止。

2. `require`: 載入程式時，會先讀取require引入的檔案，使其變成程式的一部分。所以通常放在文件開頭，適合引入靜態內容。
require 執行時會顯示錯誤，立刻終止程式，不再往下。include可以用在迴圈；require不行。

3. `require_once`和`include_once`
   使用方法跟上述一樣，差別在於在引入檔案前，會先檢查檔案是否已經在其他地方被引入過了（因為可能引入不只一份檔案，但每份檔案可能又有重疊的部分），因此若該份文件有被引入過，就不會再重複。




