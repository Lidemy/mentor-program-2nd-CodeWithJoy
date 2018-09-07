//用replace，解法一
function capitalize(str) {
	var newStr = str.replace(str[0],str[0].toUpperCase());
return newStr;
}


//用splice()拼接，解法二
function capitalize(str) {
	var strSeperate = str.split("");
	//把第一個字切掉
	var strFirst = strSeperate.splice(0,1); //strFirst現在是個arr
	var strFirstCap = strFirst[0].toUpperCase();
	strSeperate.unshift(strFirstCap);
	return strSeperate.join(""); 
}

//test case
console.log(capitalize("world"))
console.log(capitalize('1jkle'))
console.log(capitalize('Nlse'))
console.log(capitalize(',jakle'))