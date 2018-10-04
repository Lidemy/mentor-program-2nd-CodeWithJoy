var streams = ... // 我拿到的資料;
//-->寫成一個function
getStreamsFromAPI(err, function(){
	const xhr = new XMLHttpRequest();
	...
})  //作為一個cb funcitonn，()內要放韓式讓其回傳！

function getStreanmsFromAPI(cb){

}

for (var i = 0; i < streams.length; i++) {
	appendStream(streams[i])
}

appendStream(stream){
	document.querySelector.append
}


    <div class="container">
    		<!-- 一小格 -->
    	<div class="main">
			<div class="preview">
				<img src="${data.preview.medium}" 
				alt="" class="main">
			</div>
			<div class="info">
				<div class="info__playerPic">
					<img src="${data.channel.logo}" alt="" class="player__pic">
				</div>
				<div class="info__channel">
					<div class="channel__name"><img src="${data.channel.status}" alt="" class="channel"></div>
						
					<div class="player__name">
						<img src="${data.channel.display_name}" alt="" class="player">
					</div>		
				</div>
			</div>
		</div>
    </div>

   
//之前差一些成功的程式碼 -->後請norman lin 協助修訂
//步驟
// 1. 用API拿回資料
// 2. 新創建帶有資料的元素append在div.container 底下，有幾個就創建幾個
var container = document.querySelector('.container');

const cliendId = '36gk9bu9tadiz6ygu8kl7tarpl45bb';
var game = 'League%20of%20Legends';
var limit = 20;
var apiUrl = `https://api.twitch.tv/kraken/streams/?${cliendId}&game=${game}&limit=${limit}`;

//基本呼叫Ajax的方法
var xhr = new XMLHttpRequest;
xhr.open('GET', apiUrl);
xhr.setRequestHeader('client-id', cliendId);
xhr.send(); //GET請求永遠都不會有主體body，所以可傳send() || send(null)，而POST通常有主體



xhr.onreadystatechange = () =>{
	if (xhr.readyState === XMLHttpRequest.DONE){ //表示文件成功下載
		var data = JSON.parse(this.responseText);
		console.log(data);
	}else{
		alert('error')
	}
}



			
	//把設計好的div區塊，拿回資料的程式碼append上去
function appendBlocks(){
	for (var i = 0; i < 3; i++) {
		var container = document.querySelector('.container');
		


	}
		
}