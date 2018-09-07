//給定一個字串，請「印出」反轉之後的樣子（不能使用內建的 reverse 函式）
function reverse(str) {
	str.split(); //成為array，有元素位置
	var arrPosition = str.length-1; 
	var newStr = [];
	for(var i=0; i<str.length; i++){
	newStr[i] = str[arrPosition-i]}
	return newStr.join("");
}

console.log(reverse('hello'));

//解法1.可剪下最後一個，插回第一個 -> 中間點怎麼抓？ 
//2.讓元素位置變換 -->用字元長度去判斷位置！！ 我寫對了哈哈哈哈