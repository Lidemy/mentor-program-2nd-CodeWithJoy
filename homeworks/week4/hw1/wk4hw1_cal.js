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
1.紀錄原showNum在某arr上， 2.清空show的內容  3.輸入新showNum 4.原showNum+ 新showNum
--*/

//數字原料
for (let i = 0; i < 10; i++) { //i的變數要用let設置，不能用var!!! 
	document.querySelector('.num'+i).addEventListener("click", ()=>{
		show.innerText += i
})
}

//備註： 雖可利用下式把按AC產生的0清掉，但如此每次重新按1都會清空count值，沒找到解法。
// document.querySelector('.one').addEventListener("click", ()=>{
// 	if (show.innerText ='0') {
// 		show.innerText ='';
// 		show.innerText +='1'
// 	}else{
// 		show.innerText +='1'
// 	}
// })




