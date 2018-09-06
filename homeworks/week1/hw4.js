//印出因數
function printFactor(n) {
	for(var i = 1; i<n+1;i++){
		if(n%i === 0){
			console.log(i)
		};
	}
}
//test case
printFactor(10);
printFactor(7);


//解法，表示餘數% 為0，