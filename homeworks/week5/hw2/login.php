<?
require_once('conn.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="msg_board_local.css?">
	<title>login</title>

<script type="text/javascript">
//驗證表單是否為空值
function validate_required(field,alerttxt)
{
with (field)
  {
  if (value==null||value=="")
    {alert(alerttxt);return false}
  else {return true}
  }
}

function validate_form(thisform){
	with (thisform){
	if (validate_required(account,"忘記填帳號囉！")==false){
		account.focus();return false}
	else if(validate_required(password,"忘記填密碼囉！")==false){
		password.focus();return false}
	}
}
</script>
</head>


<body class="loginBody">
<header></header>
<div class="loginBgi"><img src="http://www.abc.net.au/news/image/8709852-3x2-940x627.jpg" alt="登入背景圖片"></div>
<div class="loginMain">
	<h1>登入嘴魚留言板</h1>
	<h2>Log In to FishBoard</h2>
	<form action="login.php" onsubmit="return validate_form(this)" method="post" class="login loginForm" name="loginForm">
		帳號：<input type="text" name="account" class="login "><br>
		密碼：<input type="password" name="password" class="login"><br>
		<input type="submit" value="提交" class="allBtn">
		<input type="button" id="test" value='清空重填' onclick="formReset()" class="allBtn">
	</form>
	<?
//驗證是否在資料庫裡面

//上面這行抓db裡面的username
@$acc =$_POST['account']; 
@$pwd = $_POST['password'];
@$name = $conn->query("SELECT username FROM joy_board_register WHERE account = '$acc' && password = '$pwd' ")->fetch_assoc()['username'];
$sql = "SELECT * FROM joy_board_register WHERE account = '$acc' && password = '$pwd' ";
echo $name;
//Q: 先驗證是否有值，再跑$conn->query(),否則會一直跑出Notices --> 後來還是失敗，暫時用php的@忽略問題解決
if(isset($acc)){
    if($conn->query($sql)->num_rows > 0){    //表示有資料符合
		setcookie("name", $name , time()+3600*24); //設置cookie
		//setcookie("name", '$conn->query("SELECT username FROM joy_board_register WHERE account = "$acc" && password = "$pwd" ")->fetch_assoc()['username']',time()+3600*24)
		header('Location: index.php');
    }else{
		echo "<h4>登入失敗，帳號或密碼錯誤</h4>"; 
    }
}
	?>
	<br>
	<div class="forget"> <a href="">Forgot password?</a></div>
</div>

<footer></footer>
<script>
// Q: 要怎麽樣在重新載入頁面時把form清空？ 不然會一直出現'已提交表單的狀態'

function formReset()  //用於btn"清除重填""
  {
  document.querySelector(".login").reset()
  }
</script>
</body>
</html>