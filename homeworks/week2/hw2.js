//hw2：大小寫互換(done)
function alphaSwap(str) {
	var arr = str.split('');
	var newArr = [];
	for (var i=0; i<arr.length; i++){
		if (arr[i] !== arr[i].toUpperCase()) {
			newArr.push(arr[i].toUpperCase());
		}else{
			newArr.push(arr[i].toLowerCase());
		};
	}
	return newArr.join('');
}

module.exports = alphaSwap

//test case
alphaSwap("str")
alphaSwap("Hello")