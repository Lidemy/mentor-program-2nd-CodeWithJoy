import { pbkdf2 } from "crypto";

//黑澀會美眉感情度
pa(['TACO hanon 0', 'peggy Penny 74', 'Debbie MeiMei -66']) 
//把數字找出來比較，最小的回傳前面的字串
function pa(arr){
    var newArr = [];
    for (let i = 0; i < arr.length; i++) {
        arr[i].split(' ');
        newArr.push(arr[i].split(' '));
    }

    // 抓出數字的字串
    var newMathArr = [];
    for (let j = 0; j < newArr.length; j++) {
        newMathArr.push(newArr[j][2]);  
    }

    //抓出數字並比大小
    var newMathArr2 = [];
    for (let k = 0; k < newMathArr.length; k++) {
        newMathArr2.push(parseInt(newMathArr[k]));
    }
    Array.prototype.min = function () {
        var min = this[0];
        this.forEach(function (ele, i, arr) {
            if (ele < min) {
                min = ele;
            }
        })
        return min;
    }
    var num = newMathArr2.min();
    if(num >= 0){
        return "Are you kidding me ?"
    }else{
        for (let i = 0; i < arr.length; i++) {
            if (arr[i].iOf(num) > -1) {
                var arr2 = arr[i].split(" ");
                return arr2[0] + " " + arr2[1];
            }
        }

    }
    

}

//三項商品優惠價
pa2('10 10 10');
pa2('10 10 20');
pa2('20 10 10'); 
pa2('10 30 20'); 

function pa2(str){
    var arr = str.split(" ");
    if (arr[0] !== arr[1] && arr[1] !== arr[2] && arr[0] !== arr[2]){
        return "YES";
    }else{
        return "NO";
    }
}

//白飯
function pd(arr){
    let sum = arr.reduce((previous, current) => current += previous);
    let avg = sum / arr.length;

    var newArr = [];
    for (let i = 0; i < arr.length; i++) {
        if(arr[i] < avg){
        newArr.push(arr[i]);
        }
    }
    return newArr.length;
}

//公平遊戲
//重點在於如果用eval, 因為是'Str1' <= 'Str2' ，所以會比較str首字符大小
function pb(M,N) {
    var m = parseInt(M);
    var n = parseInt(N);
    if((m<=n) === true ){
        return 'Fair';
    } else{
        return 'Unfair';
    }
}

//空氣人密碼
function pc(arr1,arr2) {
    const str = arr1.join("");
    var newStr = '';
    for (let i = 0; i < arr2.length; i++) {
        newStr += str[arr2[i]-1];   
    }
    return newStr;
}  

//完全數
function isComplete(n) {
    var arr = [];
    for (let i = 1; i < n; i++) {
        if(n%i === 0){
            arr.push(i)
        }
    }
    var sum = 0;
    for (let j = 0; j < arr.length; j++) {
        sum += arr[j];  
    }
    return ( sum == n? true:false);
}

//友好數
function pe(n) {
    //做一個fcn算出因數總和
    function factorSum(n){
        var arr = [];
        for (let i = 1; i < n; i++) {
            if (n % i === 0) {
                arr.push(i)
            }
        }
        var sum = 0;
        for (let j = 0; j < arr.length; j++) {
            sum += arr[j];
        }
        return sum;
    }
    var newNum =  factorSum(n);
    //return factorSum(newNum);
    if(factorSum(newNum) == n && newNum !== n){
        return newNum.toString();
    } else if (factorSum(newNum) == n && newNum == n){
        return '=' + newNum.toString();
    }else{
        return '0';
    }
}

// 找最小數
findSmallest([1, 2, 3, 4, 5])
findSmallest([5, 4, 3, 2, 1])
function findSmallest(arr) {
    let a = arr[0];
    for (let i = 0; i < arr.length; i++) {    
        if(a > arr[i]){
            a = arr[i]
        }
        
    }
    return a;
    
}

function swap(str) {
    var arr = str.split("");
    var newArr = [];
    for (let i = 0; i < arr.length; i++) {
        if(arr[i] !== arr[i].toUpperCase()){
           newArr += arr[i].toUpperCase()
        }else{
            newArr += arr[i].toLowerCase();
        }
    }
    return newArr;

    
}


//棒球
pf('1 3 2 6 3 9')
function pf(str) {
    
}