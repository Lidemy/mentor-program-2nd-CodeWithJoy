# 作業

## hw1：計算機

![](calculator.png)

可參考範例：[https://lidemy.github.io/mentor-program-kristxeng/homeworks/week4/hw1/](https://lidemy.github.io/mentor-program-kristxeng/homeworks/week4/hw1/)（第一期學生 Kris 的作品）

請用你在之前學會的網頁技術（HTML, CSS, JavaScript）打造出一個簡單的計算機，功能如下：

1. 要有 0 到 9
2. 要有加減乘除
3. 要能夠清空

計算機這一題其實要難可以到很難，這個作業的目的只是想讓你熟悉基本操作而已，所以你可以用以下的範例來測試，能夠通過就好：

### 測試1

1. 按下 123
2. 按下 +
2. 按下 456
3. 按下 =
4. 出現 579

### 測試2

1. 按下 20
2. 按下 -
2. 按下 25
3. 按下 =
4. 出現 -5

## hw2：仿 Google 表單

請實作出你們當初報名時所填寫的表單：https://docs.google.com/forms/d/e/1FAIpQLSeOTy7j1OjgI-q9xYaiGCJJn5w2TkpB1JNZZXXQwqCt3SsDsg/viewform

![](form.png)

可參考範例：[https://lidemy.github.io/mentor-program-pychiang/homeworks/week4/hw2/](https://lidemy.github.io/mentor-program-pychiang/homeworks/week4/hw2/)（第一期學生 pychiang 的作品）

背景隨便用一個顏色就好了，重點是實做出表單內容以及驗證。UI 可以不用完全一樣，只要功能有做出來就好，UI 只是讓你參考的。

功能如下：

1. 文字輸入框可以選擇必填或是非必填
2. 送出表單時，必填的地方如果空白，要能夠把背景變紅色並且提示使用者
3. 成功提交之後，把表單的資料輸出在 console，並且用`alert`跳出提示即可

## hw3：仿 Twitch 頻道頁面

請串接 [Twitch API v5](https://dev.twitch.tv/docs/v5/)，顯示出 League of Legends 目前正在直播的前 20 個實況。

![](twitch.png)

1. [Twitch API](https://dev.twitch.tv/docs/v5/)裡面有一個 API 是可以拿到現在正在直播的某個遊戲底下的資料，API 的描述是「Gets a list of live streams.」，看到這行就代表你找對 API 了。
2. API 要帶的參數有一個 `game` 的欄位，請帶`League%20of%20Legends`
3. 請顯示 20 個實況，不多不少，要剛好 20 個

（基本上這題就是直接照搬我之前在別的地方出過的[作業](https://github.com/aszx87410/frontend-intermediate-course/blob/master/homeworks/hw4.md)）

## hw4：化繁為簡

每次在操縱 DOM 物件時，都需要輸入`document.querySelector()`，重複幾次之後會覺得有點煩瑣，所以我們可以實作出一個簡單的 function 叫做`q`，可以快速的選取到你要的元素，接著利用選到之後的這個物件進行常見的操作（`hide`跟`show`）

可以參考以下範例，只要能夠按照以下範例運行即可：

``` js
var element = q('.title')
element.hide() // 隱藏
element.show() // 顯示 

```
## hw5：簡答題

1. 什麼是 DOM？
>全名是Document Object Model，文件物件模型。簡單來說，就是規範HTML,XML,SVG等document文件的規範設計模式。
#### 結構說明
其結構如同family tree，由一個一個節點(node)組成，內外包覆的節點間有父子關係，因此能顯示DOM間各元素的樹狀關係圖又稱為DOM Tree。子元素會繼承父元素特性。最頂端的祖節點(ancestor node)為document，往下延伸各種elements('h1','div','p'...)節點。節點下又可延伸出其他節點或是文字(text)。如果要利用CSS或JS調用DOM中的任意元素，就要按照節點順序一步一步往下抓取。eg. document.getElementByClassName('div').childElement -->抓到文件下第一個div元素的第一個子元素。

2. 什麼是 Ajax？
>全名是Asynchronous JavaScript and XML，非同步的JavaScript與XML技術。是一套技術的廣稱。簡單來說，就是讓網頁前端處理更多以前需要後端的事情，讓網頁不用刷新，跑得更快！

#### Ajax的功能
如表單簡單驗證、留言內容新增等等。利用Ajax，可以渲染、改寫一部分前端資料，而不用後端程式把頁面整個刷新，因此可以節省使用資源，提升網頁運作效率，也因為不會一直翻頁的特性，不會中斷使用者的操作，能讓user有更好的體驗(更好的UI/UX)。
#### Ajax的核心
起初，核心的部分是透過 XMLHttpRequest API(XHR)進行的實作， ，因為其可以透過url請求部分server資料，進而跟動頁面部分資訊。但由於XHR程式設計所做的功能都是跟server端拿資料，對於非文字的資料處理不易，function大小都用同樣的方法，也導致後續維護不易，因此有library很早就針對其問題解決(eg.jQuery)，另外，新推出的XHR Level2也嘗試解決問題，不過似乎只是舊版本的加強版，還是不符合現在的使用需求。
#### 實現Ajax的新技術-Fetch
現在，出現了Fetch！Fetch是號稱要取代XHR的新技術標準，首先由Mozilla與Google公司在2015年3月發佈Fetch實作消息。Fetch在瀏覽器的實作與XHR不同，裡面的功能內容與API也相差很多，它有很多設計是為了新式的HTML5相關應用所設計的。現在已經有許多大公司的網站開始大量的使用Fetch API來取代XHR的作法。

3. HTTP method 有哪幾個？有什麼不一樣？
>HTTP method/verb 是在發送HTTP request 時要選擇的操作，能得到資源，執行特定操作，要利用XMLHttpRequest.open("方法","url")打開，有分簡單請求/非簡單請求兩大類

#### 適用簡單請求的methods
一些請求不會觸發 CORS(cross-origin resource sharing, 跨來源資源共用) 預檢，可以視為簡單請求。包含GET, POST, HEAD。

###### GET
GET /index.html
從url中獲取所要的資料，response會包含status,header跟body。
請求展示指定資源。使用 GET 的請求只應用於取得資料。
###### HEAD
HEAD /index.html
請求response的header部分，以確認是否符合要GET的檔案內容需求，以免不小心GET到錯誤且佔據空間大的檔案。
###### POST
POST /index.html
推送body,內容給server，可進行寫入資料庫、驗證等行為，通常會改變伺服器的狀態或副作用（side effect）。


#### 適用預檢（preflighted）」請求的methods
>預檢請求讓瀏覽器自動先以 HTTP 的 OPTIONS 方法送出請求到另一個網域，確認後續實際請求是否可安全送出，由於跨站請求可能會攜帶使用者資料，所以要先進行預檢請求。

###### PUT
PUT /new.html HTTP/1.1 
可創建新資源或取代現有資源。
###### DELETE
DELETE /file.html HTTP/1.1 
刪除指定資源。
###### CONNECT
CONNECT www.example.com:443 HTTP/1.1
利用請求資源啟動一個雙向通訊。這通常可用於建立隧道。
###### OPTIONS
OPTIONS /index.html HTTP/1.1
OPTIONS * HTTP/1.1
描述指定資源的溝通方法（communication option），可指定url或用`*`與所有溝通。
###### TRACE
TRACE /index.html
與指定資源標明的伺服器之間，執行迴路返回測試（loop-back test），可做到路徑追蹤，
是一個好的debug機制。
###### PATCH
PATCH /file.txt HTTP/1.1 
補丁，可以「部分修改」指定資源的內容（而PUT方法則必須全部替換或修改）。

4. `GET` 跟 `POST` 有哪些區別，可以試著舉幾個例子嗎？
GET是單純從資源端取得資料，推送的body是null值。
- GET 請求可被緩存
- GET 請求保留在瀏覽器歷史記錄中
- GET 請求可被收藏為書籤
- GET 請求不應在處理敏感數據時使用 ->因為會被看光光
- GET 請求有長度限制
- GET 請求只應當用於取回數據

POST是推送內容/body給資源端做處理。
- POST 請求不會被緩存
- POST 請求不會保留在瀏覽器歷史記錄中
- POST 不能被收藏為書籤
- POST 請求對數據長度沒有要求
- POST 可把要傳送內容包裹在body裡，外界無法查看，因此可傳機密資訊，也較為安全

5. 什麼是 RESTful API？
>遵循REST風格設計的API，可稱之。
REST(Representational State Transfer)是一種網路架構風格，他並不是一種標準，只是大家用起來覺得很user friendly，所以採用度高，逐漸成為業界準則。 RESTful API 充分地使用了 HTTP protocol (GET/POST/PUT/DELETE)，達到:
- 直觀簡潔的資源 URI(Uniform Resource Identifier，
統一資源識別元。由prefix + API endpoint組成，管理名詞的設計。)
- 善用 HTTP Verb(上面寫到的GET,POST...)
- 達到對資源的操作
- 並使用 Web 所接受的資料類型: JSON, XML, YAML 等，最常見的是 JSON


6. JSON 是什麼？
>JavaScript Object Notation。簡單來說就是種檔案交換的格式

JSON 為純文字檔，相容性高，格式容易閱讀且易修改。最常用用在 Web 網頁程式從 Server 端傳送資料給 browser(eg.透過 AJAX 方式交換 JSON 資料)。

7. JSONP 是什麼？
JSON with Padding，是一種使用`<script>`元素作為Ajax transport的技巧，能解決跨網域取得資源碰到的同源政策(single-origin-policy)問題。用`<script>`的好處還在於它會自動解碼/執行由JSON格式撰寫的資料主體。

8. 要如何存取跨網域的 API？
面對問題是：同源政策。
- 舊方法--JSONP: 利用html中一些不限制來源的tag存取資料(`<script>,<img>,<iframe>`等)
- 比較好的新方法--CORS: 使用額外 HTTP 標頭(header)令目前瀏覽網站的使用者代理取得存取其他來源（網域）server特定資源權限的機制。當使用者代理請求一個不是目前文件來源的資源時(可能來自於不同網域（domain）/通訊協定（protocol）/通訊埠（port）)，會建立一個跨來源 HTTP 請求（cross-origin HTTP request）。當伺服器回傳適當標頭(eg. `Access-Control-Allow-Origin: *`)，就會有資料回傳。

