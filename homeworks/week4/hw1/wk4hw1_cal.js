var show = document.querySelector('#show');

//放準備運算的數列
var count = [];

//加減乘除等於
var plus = document.querySelector('.plus');
plus.addEventListener('click', ()=>{
	var showNum = parseInt(show.innerText);
	count.push(showNum);
	count.push('+');
	show.innerText = '';
	console.log(count);
})



var minus = document.querySelector('.minus')
minus.addEventListener('click', ()=>{
	var showNum = parseInt(show.innerText);
	count.push(showNum);
	count.push('-');
	show.innerText = '';
	console.log(count);
})


var time = document.querySelector('.time')
time.addEventListener('click', ()=>{
	var showNum = parseInt(show.innerText);
	count.push(showNum);
	count.push('*');
	show.innerText = '';
	console.log(count);
})

var devide = document.querySelector('.devide')
devide.addEventListener('click', ()=>{
	var showNum = parseInt(show.innerText);
	count.push(showNum);
	count.push('/');
	show.innerText = '';
	console.log(count);
})

var equal= document.querySelector('.equal')
equal.addEventListener('click', ()=>{
	var showNum = parseInt(show.innerText);
	count.push(showNum);
		show.innerText = eval(count.join(''));
})

var ac= document.querySelector('.ac')
ac.addEventListener('click', ()=>{
		show.innerText = ''; //直接清空不歸0了
		count = [];
})

/*--步驟
按plus:
1.紀錄原showNum在某arr上，
2.清空show的內容 //
3.輸入新showNum
4.原showNum+ 新showNum
--*/

//數字原料
document.querySelector('.zero').addEventListener("click", ()=>{
		show.innerText +='0'
})
document.querySelector('.one').addEventListener("click", ()=>{
		show.innerText +='1'
})

// 雖可利用下式把按AC產生的0清掉，但如此每次重新按1都會清空count值，沒找到解法。
// document.querySelector('.one').addEventListener("click", ()=>{
// 	if (show.innerText ='0') {
// 		show.innerText ='';
// 		show.innerText +='1'
// 	}else{
// 		show.innerText +='1'
// 	}
// })

document.querySelector('.two').addEventListener("click", ()=>{
		show.innerText += "2";

})
document.querySelector('.three').addEventListener("click", ()=>{
	show.innerText += "3"; 
})
document.querySelector('.four').addEventListener("click", ()=>{
	show.innerText += "4"; 
})
document.querySelector('.five').addEventListener("click", ()=>{
	show.innerText += "5"; 
})
document.querySelector('.six').addEventListener("click", ()=>{
	show.innerText += "6"; 
})
document.querySelector('.seven').addEventListener("click", ()=>{
	show.innerText += "7"; 
})
document.querySelector('.eight').addEventListener("click", ()=>{
	show.innerText += "8"; 
})
document.querySelector('.nine').addEventListener("click", ()=>{
	show.innerText += "9"; 
})


add = (a,b) => a+b;

