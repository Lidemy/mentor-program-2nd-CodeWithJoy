//自己做join， 會接收兩個參數：一個陣列跟一個字串
function join(arr, concatStr) {
	var i = 0;
	var newArr = [];
	while(i < arr.length-1){
		newArr.push(arr[i]+concatStr);
		i++;
	};
	
	var j=0;
	var totalStr = "";
	while(j < newArr.length){
		totalStr += newArr[j].toString();
		j++ //(修改)之前忘記j++了！！！ 產生無窮迴圈！以後改用for寫起來比較不會忘
	}
	return totalStr+arr[arr.length-1];
}

//test case
join(["a", "b", "c"], "!") //正確回傳值：a!b!c
join(["a", 1, "b", 2, "c", 3], ',') //正確回傳值：a,1,b,2,c,3
join([1, 2, 3], ''); //正確回傳值：123


//自己做repeat 
function repeat(str, times) {
	var i = 0;
	var newArr = [];
	while(i<times){
		newArr.push(str);
		i++;
	}
	return newArr.join("");
}

console.log(repeat('yoyo', 2))
console.log(repeat('a', 5))
