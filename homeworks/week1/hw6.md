# homework 6 

## 請解釋後端與前端的差異。
>前端看得見，後端看不見！
總的來說，所有能在瀏覽器上顯示的內容，都屬於前端的範疇，而後端主要是處理server儲存或是從外界得到的資料。

## 假設我今天去 Google 首頁搜尋框打上：JavaScri[t 並且按下 Enter，請說出從這一刻開始到我看到搜尋結果為止發生在背後的事情。
>流程：client端 --> request --> server端 --> response --> client 端
當按下enter，等於對server發出了request，請求回傳資料，而server在搜尋到要提供的資訊後，會給予response，再把資料丟回前台，完成資訊交換的過程。

## 請列舉出 5 個 command line 指令並且說明功用
* ls: list 列出所在資料夾(稱為directory)內的檔案列表
* cd + fileName : change directory 跳到其他資料夾位置
* mkdir + fileName: make directory 創建新的資料夾，與之相反的功能是rmdir
* pwd: print working directory 看看自己位置在哪 (working也可以記成where啦～)
* touch: 碰一下，可以改變檔案時間 or 開啟新檔案（等於賦予新時間）
