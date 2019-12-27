//hw5：大數加法（用直式）
//解法：1.先讓每個元素自己相加(考慮a和b 長度是否相等，短的arr中補零); 2.如果相加超過10，前一位的元素加一; 3.直到沒有元素超過10; 4.用join把大家合起來
//不知道可不可以用位元移動>>, <<寫？

function add(a, b) {
  var aArr = a.toString().split(''); 
  var bArr = b.toString().split('');
  var length = Math.abs(aArr.length-bArr.length) //[卡關點]length要另外儲存 不然長度在for中會變化！！！
  //補0的程式
  if( aArr.length > bArr.length) {
  	for (var i = 0; i < length; i++) {
  		bArr.unshift(0);
  	}
  }else{
  	for (var i = 0; i < length; i++) {
  		aArr.unshift('0');
    }
  }
  	//讓aArr & bArr '數字'相加，並跑出相加結果cArr（裡面為數字 ）
  var cArr = [];
  for (var i = 0; i < aArr.length; i++) {
  		cArr.push(parseInt(aArr[i])+parseInt(bArr[i]))
  };
  //這邊cArr已經列出想要的arr了， eg. [1,3,5,10,4]
  var dArr =[];
  for (var i = cArr.length-1; i >= 0; i--) {
  	if(cArr[i]<10){
  		dArr += cArr[i];
  	}else {
  		dArr += cArr[i]-10
  		cArr[i-1] = cArr[i-1]+1 //[關鍵句！]直接讓新的值取代原來位置的舊的值即可
      if(i === 0){
        dArr +=1; //注意最前面最前面要進一位！
      }
  	}
  }
  
  return dArr.split("").reverse().join("") 

}

add(9999, 1)

module.exports = add;