## 請找出三個課程裡面沒提到的 HTML 標籤並一一說明作用。
* <audio src=""></audio> 
定義聲音檔案的標籤，可用src插入音源。為html5以後的功能，而且直接有簡易的播放功能!

* <video src=""></video>
定義影片檔案的標籤，可用src插入音源。為html5以後的功能，而且直接有簡易的播放功能！

* <canvas></canvas> 
(帆布)畫圖區域，讓你用JS在網站上畫畫。


## 請問什麼是盒模型（box model）
html裏面，每個標籤都可以視為一個「盒子」，佔有空間，而盒子包含幾個部分：coontent(內容);padding(內容向外的留白);border(邊界/邊框);margin(邊框外的空間)，可藉由調整各個項目的寬高，讓盒子以不同的大小角度疊在一起。
另外，如果要調整盒子大小為所設定的width，可設定box-sizing: border-box，讓content+padding+border = width。


## 請問 display: inline, block 跟 inline-block 的差別是什麼？
* inline: 行內元素，即元素會排在同一行（但如果寬度太寬還是會掉到下一行去），可調整寬度（類似押空白鍵的概念），不可調整高度。
* block:區塊元素，佔據一整個橫排，可調寬高。
* inline-block: 行內的區塊元素，具有inline的並排特性，且有block可調寬高的特性。

## 請問 position: static, relative, absolute 跟 fixed 的差別是什麼？
* static: position預設值，不特別定位，元素該在哪就在哪。
* relative: 相對位置，相對於原來該在哪的位置做偏移，有top, right, bottom, left等屬性
* absolute: 對父元素做同於relative的定位。
* fixted: 對視窗的左上角一點做定位，在滾動網頁時有固定效果。


