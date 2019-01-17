# 作業

## hw1：CSS 預處理器

自從學會 CSS 預處理器之後，寫 CSS 的複雜度一下子降低了很多，一方面是巢狀 CSS 可以很簡單的實作出來，另一方面是多了變數這個好用的東西。

現在請你把以前寫的 CSS 都用你自己挑的 CSS preprocessor（LESS, SASS, Stylus）來改寫，並且串上 PostCSS 讓它自動幫你加上 prefix。

## hw2：實作出 Stack 與 Queue

請你實作出`Stack`跟`Queue`兩個 Function，讓以下程式碼可以順利執行：
（禁止使用內建函式`push`與`pop`）

``` js
var stack = new Stack()
stack.push(10)
stack.push(5)
console.log(stack.pop()) // 5
console.log(stack.pop()) // 10

var queue = new Queue()
queue.push(1)
queue.push(2)
console.log(queue.pop()) // 1
console.log(queue.pop()) // 2
```
## hw3：Event Loop

在 JavaScript 裡面，一個很重要的概念就是 Event Loop，是 JavaScript 底層在執行程式碼時的運作方式。請你說明以下程式碼會輸出什麼，以及盡可能詳細的解釋原因。
``` js
console.log(1)
setTimeout(() => {
  console.log(2)
}, 0)
console.log(3)
setTimeout(() => {
  console.log(4)
}, 0)
console.log(5)
```
答案請見圖檔：[wk9]hw3-EventLopp運作方式
//在同個資料夾內


## hw4：HTTP Cache

請閱讀這篇文章：[循序漸進理解 HTTP Cache 機制](https://blog.techbridge.cc/2017/06/17/cache-introduction/)來理解 HTTP Cache 機制。

## hw5：簡答題

1. CSS 預處理器是什麼？我們可以不用它嗎？

是一個幫你 a.節省時間, b.用更符合程式語言邏輯有效撰寫CSS 的工具，可以設置變數，簡單建立巢狀的CSS內容等。當然可以不用它，不過會CSS寫得很痛苦。

2. 請舉出任何一個跟 HTTP Cache 有關的 Header 並說明其作用。
#### Http 1.0就有的header: 
- Expires: 直接看資料是否過期（以本機時間為主）

- Last-Modified(server傳回) & If-Modified-Since（client傳去問是否修改) 的配對Header（如果兩者時間資料沒對上就會更新）

#### Http 1.1新的功能header:
- Cache-control:
功能多多，可以寫:
    1. max-age = 5 //以秒計（費lol) -->表示過期時間（跟Expire差不多）
    2. no-cache --> 表示每次都要發request確認是否有新資料
    3. no-store -->表示不用問了，直接跟server要資料

- Etag & If-No-Match 的配對Header
   依檔案是否更動，決定要不要載入新資料。Server回傳檔案時會帶上Etag，並儲存在client端，下次當cache過期client拿著之前存的Etag去server端比對新的檔案，如果不同再回傳資料。

3. Stack 跟 Queue 的差別是什麼？

Stack & Queue是JS中暫放準備執行任務的兩個地方。而為什麼要暫存呢？因為JS是種「單執行緒」的語言，無法多工同時處理任務，因次得讓事件有個先來後到，而確認順序這件事由Event Loop負責。 EL會迴環往復地在Stack列隊 & Queue列隊中確認是否有任務要執行。

執行順序：Stack先於Queue，只有等Stack裡的東西都跑完了，才可以換成Queue內的東西執行。而Stack執行順序是先進後出（like搭車，你最先跑進車內，得最後下車，因為後來跑入的任務卡著你不能下車了！），Queue執行順序是先進先出（單純的排隊）。

4. 請去查詢資料並解釋 CSS Selector 的權重是如何計算的（不要複製貼上，請自己思考過一遍再自己寫出來，沒有很完整也行）

CSS權重
權重就是指 css 的優先權，例如:
	• 相同權重但是後寫的 css 可以覆蓋先寫的 css
	• 當兩個選擇器同時作用在一個元素，權重高的優先生效

基本權重大小：
>  !important> inline style > ID > class/ psudo-class/ attribute > element > *(全站預設值)

|寫法    |	HTML       |	CSS	| 權重 0000
-----    |------       |------|-----------
| ID	   | id = 'box'  |#box { }|	0100
| inline style | `<div style="color : red">` | 	|	1000
| Element	| div, p, ul, ol, li, em, header, footer, article....	| div{ 直接規定所有div的寫法}|	0001
| class	| class = 'box'|	.box{ }	|0010
| psudo-class|		|:nth-child() 、 :link 、 :hover 、 :focus 等 :only-of-type 、 :nth-of-type	| 0010
| attribute |		|[type:checkbox]、[attr]	|0010
| !important(根本大魔王)|	|.product{ width: 200px;!important }		|1-0000


其餘選擇器（可以一次選比較多），但權重為0000 （就只是讓你方便多選一點人而已）
名稱            | 	CSS |	意思 |
  ------        |------|-------
群組選擇器(E,F,G) |	div,p,li....| 就多選幾個元素給予同樣的style
通用兄弟選擇器(E~F)	| div ~ article|	CSS3新增加一種選擇器，eg. E~F 選擇E元素後面的所有兄弟F元素（E,F有同樣的父元素）
相鄰兄弟選擇器(E+F)	| div + p	| E緊鄰的F元素（E,F有同樣的父元素）
子元素選擇器(E>F)	| div > p	| E的子元素F們蒙召（一個參軍的概念）
後代選擇器(E F)*要記得空格喔	| div div	| E所有的後代都蒙召拉！（一個滅九族的概念＠＠）



資料：
https://ithelp.ithome.com.tw/articles/10196454 </br>
https://www.itread01.com/p/641109.html