// 練習四 判斷回文
function isPalindromes(s) {
  var newStr = '';
  for (var i = s.length-1; i >= 0; i--) {
  	newStr += s[i];
  }
  
  if (newStr === s){
    return true;
  }else{
    return false;
  }
}

module.exports = isPalindromes