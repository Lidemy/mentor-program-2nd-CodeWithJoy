function isPrime(n) {
	if(n ===1){
		return false;
	}else{
  		for (var i = 2; i < n; i++) {
   			 if(n % i === 0){
      			return false;   
    		}else{
     		 	return true;
    		}
  		}
  	} 
}
  
//test
isPrime(3);
isPrime(50);
isPrime(71);
isPrime(1000001); //超出範圍
isPrime(1000002); //超出範圍

module.exports = isPrime