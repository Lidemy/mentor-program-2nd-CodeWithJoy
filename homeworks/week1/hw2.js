//用replace
function capitalize(str) {
	var newStr = str.replace(str[0],str[0].toUpperCase());
return newStr;
}
console.log(capitalize("hello"))

//test case
console.log(capitalize("world"))
console.log(capitalize('1jkle'))
console.log(capitalize('Nlse'))
console.log(capitalize(',jakle'))



//用
/*-	function 
	if(strFirst != strFirst.toUpperCase()){
		strFirst.toUpperCase();
	}else{
		strFirst;
	};

	return strSeperate.join("");

}
-*/
//步驟 1.拆開字串到[]; 2.檢視首字，並把她變大寫; 3.回傳new[]; 4.用join把字串串回
/*-
function capitalize(str) {
	var strSeperate = str.split("");
	var strFirst = strSeperate[0];

	if (strFisrt >= 'a' && strFisrt <= 'z'){
		strFisrt.toUpperCase();
	}
	var newArr = ....
} 
-*/


//用splice()拼接，解題(還沒寫完)
/*-function capitalize(str) {
	var strSeperate = str.split("");
	//把第一個字切掉
	var strFirst = strSeperate.splice(0,1);
	console.log(strSeperate);
	if(strFirst != strFirst.toUpperCase()){
		strFirst.toUpperCase();
	}else{
		strFirst;
	};
	} 
-*/
