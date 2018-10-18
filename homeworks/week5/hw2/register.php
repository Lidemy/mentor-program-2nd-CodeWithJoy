<?
require_once('conn.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="msg_board_local.css">
	<title>register</title>

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
	if(validate_required(username,"忘記填暱稱囉！")==false){
		username.focus();return false}
	else if (validate_required(account,"忘記填帳號囉！")==false){
		account.focus();return false}
	else if(validate_required(password,"忘記填密碼囉！")==false){
		password.focus();return false}
	
	}
}
</script>
</head>
<body class="regisBody">
<div class="registerBgi"><img src="http://plays01.com/wp-content/uploads/2017/07/%E8%97%8D%E9%AF%A8.jpg" alt="背景圖片">
</div> <!-- 背景圖片的尾標 -->
<header></header>
<div class="regisMain">
	<h1>註冊嘴魚留言板</h1>
	<h2>Sign Up for FishBoard</h2>
	<form action="register.php" method="post" class="regisForm" onsubmit="return validate_form(this)">
		您的暱稱：<input type="text" name="username" class="login"><br>
		註冊帳號：<input type="text" name="account" class="login"><br>
		註冊密碼：<input type="password" name="password" class="login"><br>
		<input type="submit" value="提交" class="allBtn">
		<br>
	</form>

	<?
	//把資料寫入DB msg_board_register 
	@$name = $_POST['username'];
	@$acc =$_POST['account'];
	@$pwd = $_POST['password'];

	$sql = "INSERT INTO joy_board_register VALUES ('$acc', '$pwd', '$name')";
	//先驗證是否有值，再跑$conn->query(),否則會一直跑出Notices
	if(isset($acc) && isset($pwd) && isset($name)){
		if($conn->query($sql)=== true ){
			echo  "註冊成功";
			header('Location: login.php');
			}else{
			?><h4><?echo "註冊失敗！此帳號重複註冊或包含非法字元"?></h4>
			<?
			}
	}
	?>
	<br>
	<br>
	<div class="forget"> <a href="">Forgot password?</a></div>
</div>

<footer></footer>
<script>
window.onload=function() {
  document.forms[0].reset();
}
</script>
</body>
</html>