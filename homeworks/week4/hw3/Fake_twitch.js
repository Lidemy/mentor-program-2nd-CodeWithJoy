//步驟
// 1. 用API拿回資料
// 2. 新創建帶有資料的元素append在div.container 底下，有幾個就創建幾個
var container = document.querySelector('.container');
getAPI();


function getAPI(){
  const cliendId = '36gk9bu9tadiz6ygu8kl7tarpl45bb';
  var game = 'League%20of%20Legends';
  var limit = 20;
  var apiUrl = `https://api.twitch.tv/kraken/streams/?${cliendId}&game=${game}&limit=${limit}`;

  //基本呼叫Ajax的方法
  var xhr = new XMLHttpRequest;
  xhr.open('GET', apiUrl);
  xhr.setRequestHeader('client-id', cliendId);
  xhr.send(); //GET請求永遠都不會有主體body，所以可傳send() || send(null)，而POST通常有主體

  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE){ //表示文件成功下載
      var data = JSON.parse(this.responseText);

      var users = data.streams;
      appendBlocks(users);
    }
  }  
	// }else{
		// alert('error')
	// }
}


	//把設計好的div區塊，拿回資料的程式碼append上去
function appendBlocks(users){
	for (let i = 0; i < users.length; i++) {
    console.log(users[i])
		document.querySelector('.container').innerHTML += `
		<div class="main">
	     	<div class="preview">
				<img src="${users[i].preview.large}" alt="" class="preview__pic preview1">
			</div>
			<div class="info">
				<div class="info__playerPic">
					<img src="${users[i].channel.logo}" alt="" class="player__pic player__pic1">
				</div>
				<div class="info__channel">
					<div class="channel__name">
						${users[i].channel.status}
					</div>
					<div class="player__name">
						${users[i].channel.display_name}
					</div>		
				</div>
			</div>
		</div>
    `;
  }
}