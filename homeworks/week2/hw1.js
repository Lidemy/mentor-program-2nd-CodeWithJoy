function stars(n) {
	var arr =[];
	for (var i = 1; i <= n; i++) {
		arr.push("*".repeat(i)) //複習repeat用法： str.repeat(重複次數)
	};
	return arr;
}

stars(6);

module.exports = stars;