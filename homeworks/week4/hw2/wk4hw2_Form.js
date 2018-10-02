// document.querySelector('.warn').appendChild('p')
document.querySelector('.btn__submit').addEventListener('click', checkAnswer);
// 檢查表單問題填寫與否
function checkAnswer(){
	if(document.querySelector('.mustAns__radio1').checked === false && document.querySelector('.mustAns__radio2').checked === false){
			document.querySelector('.mustAns__radio1').parentNode.style.backgroundColor= '#FFEAED';
			document.querySelector('.mustAns_radio_p').style.visibility= 'visible';
		}
	for (var i = 1; i <= 4; i++) {
		if (document.querySelector('.mustAns'+i).value === ''){
			document.querySelector('.mustAns'+i).parentNode.style.backgroundColor= '#FFEAED';
			document.querySelector('.mustAns'+i).nextElementSibling.style.visibility= 'visible';
		//}else if(document.querySelector('.mustAns_radio').checked === false && document.querySelector('.mustAns_radio1').checked === false){  //注意要填false而非'false'
		}
	} 
	
}

// 把星號變色
for (let i = 0; i < 5; i++) {
	document.querySelectorAll('h3')[i].innerHTML = document.querySelectorAll('h3')[i].innerHTML.replace('*', '<span style="color: red;">*</span>');
}

//填了以後把顏色變回白色
for (var i = 0; i <6 ; i++) {
	document.querySelectorAll('input')[i].addEventListener('input', checkAnswer2);

function checkAnswer2(){
	for (var i = 1; i <5; i++) {
		if (document.querySelector('.mustAns'+i).value !== ''){
			document.querySelector('.mustAns'+i).parentNode.style.backgroundColor= 'white';
			document.querySelector('.mustAns'+i).nextElementSibling.style.visibility= 'hidden';
		}else if(document.querySelector('.mustAns__radio1').checked === true || document.querySelector('.mustAns__radio2').checked === true){  //注意要填false而非'false'
			document.querySelector('.mustAns__radio1').parentNode.style.backgroundColor= 'white';
			document.querySelector('.mustAns_radio_p').style.visibility= 'hidden';
		}
	} 
}
}
