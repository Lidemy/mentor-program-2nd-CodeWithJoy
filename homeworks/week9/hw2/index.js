//用splice()直接對數組做修改，並回傳被切下的項目
//實作Stack，先進後出
function Stack() {
    var arr = [];
    this.push = function(obj){
        return arr.splice(arr.length, 0, obj)[0]; // *因為用splice方法，回傳的值變成newArr，是一個陣列，所以要取用其newArr[0]的值!
    }
    this.pop = function(){
        return arr.splice(arr.length-1, 1)[0];
    }
}

var stack = new Stack();

stack.push(10)
stack.push(5)
console.log(stack.pop()) // 5
console.log(stack.pop()) // 10

//實作Queue，先進先出
function Queue() {
    var arr = [];
    this.push = function (obj) {
        return arr.splice(arr.length, 0, obj)[0]; // *因為用splice方法，回傳的值變成newArr，是一個陣列，所以要取用其newArr[0]的值!
    }
    this.pop = function(){
        return arr.splice(0,1)[0];
    }
    
}


var queue = new Queue()
queue.push(1)
queue.push(2)
console.log(queue.pop()) // 1
console.log(queue.pop()) // 2


// 舊寫法
/*
function Stack(){
    const list = [];
    return {
        push: (n) => {
            const index = list.length || 0;
            list[index] = n;
        },
        pop: () => {
            const num = list[list.length-1];
            list.splice(list.length-1, 1);
            return num;
        }
    }
}
function Queue(){
    let list = [];
    return {
        push: (n) => {
            const index = list.length || 0;
            list[index] = n;
        },
        pop: () => {
            const [num, ...rest] = list;
            list = rest;
            return num;
        }
    }
}
*/
