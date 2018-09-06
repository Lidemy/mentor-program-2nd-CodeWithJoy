//自己做join， 會接收兩個參數：一個陣列跟一個字串，題目預設(str, con~)應該是錯的
//join最後結果是字串！！
function join(arr, concatStr) {
	var i = 0;
	var newArr = [];
	while(i < arr.length-1){
		newArr.push(arr[i]+concatStr);
		i++;
	};
	//到這一步就已經得到 newArr = [a!,b!]  
	//最後一個因為不需要分隔符號，另外放上去就可
	//要完成的任務： newArr[0]+newArr[1]+...+newArr[newArr.length-1]+arr[arr.length-1]
	var j=0;
	var totalStr = "";
	while(j < newArr.length){
		totalStr += newArr[j].toString();
	}
	return totalStr;
}

//test case
join(["a", "b", "c"], "!") //正確回傳值：a!b!c
join(["a", 1, "b", 2, "c", 3], ',') //正確回傳值：a,1,b,2,c,3
join([1, 2, 3], ''); //正確回傳值：123


//自己做repeat 
/*-done

function repeat(str, times) {
	var i = 0;
	var newArr = [];
	while(i<times){
		newArr.push(str);
		i++;
	}
	return newArr.join("");  //不知道這邊用join算不算偷吃步lol
}

console.log(repeat('yoyo', 2))
console.log(repeat('a', 5))
-*/
