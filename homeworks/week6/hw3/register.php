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
</head>

<body class="regisBody">
<?
	//把資料寫入DB msg_board_register 
	@$name = $_POST['username'];
	@$acc =$_POST['account'];
	@$pwd = password_hash($_POST['password'],PASSWORD_DEFAULT); //雜湊密碼
?>


<div class="registerBgi"><img src="http://plays01.com/wp-content/uploads/2017/07/%E8%97%8D%E9%AF%A8.jpg" alt="背景圖片">
</div> <!-- 背景圖片的尾標 -->
<header></header>
<div class="regisMain">
	<h1>註冊嘴魚留言板</h1>
	<h2>Sign Up for FishBoard</h2>
	<form action="register.php" method="post" class="regisForm"  onsubmit="return validate_form()">
		您的暱稱：<input type="text" name="username" class="regis regisName">
		<?
		//驗證暱稱重複
			$sqlName = "SELECT username FROM joy_board_register WHERE username= '$name' ";
			$resultName = $conn->query($sqlName);	
			$dbName = $resultName->fetch_assoc();
			if(isset($name)){ 
				if($resultName->num_rows>0 ){		
					echo "<span class='veri'>暱稱重複</span>";
				}else{
					echo "<span class='veri'>可使用此暱稱</span>";
				}
			}
			
		?>
		<br>

		註冊帳號：<input type="text" name="account" class="regis regisAcc">
		<?
		//驗證註冊重複
		$sqlAcc = "SELECT account FROM joy_board_register WHERE account= '$acc' ";
		$resultAcc = $conn->query($sqlAcc);
		if(isset($acc)){
			if($resultAcc->num_rows>0 ){		
				echo "<span class='veri'>帳號重複</span>";
			}else{
				echo "<span class='veri'>可使用此帳號</span>";
			}
		}
		?>
		<br>
		註冊密碼：<input type="password" name="password" class="regis regisPwd"><span> </span>
		<br>
		<input type="submit" value="提交" class="allBtn">
		<input type="button" value="清空重填" class="allBtn formReset" onclick="formReset()">
		<br>
		<br>
	<div class="regisXXX">
		<span class="regisBtn">已經有帳號了？</span> 
		<input type="button" onclick="goToLogin()" value="點我登入" class="regisBtn"/> 
	</div>
	</form>

	<?
	$session_id = uniqid();
	$sql2 = "INSERT INTO `joy_users_certificate` (`session_id`, `account`) VALUES ('$session_id', '$acc')";
	$result2 = $conn->query($sql2);

	$sql = "INSERT INTO joy_board_register VALUES ('$acc', '$pwd', '$name')";
	//先驗證是否有值，再跑$conn->query(),否則會一直跑出Notices
	if(isset($acc) && isset($pwd) && isset($name)){
		if($conn->query($sql)=== true ){
			setcookie('name', $name, time()+3600*24);
			setcookie("session_id", $session_id,time()+3600*24);
			header('Location: index.php');
			}
	}
	?>
	<br>
	<br>
	<div class="forget"> <a href="">Forgot password?</a></div>
</div>

<footer></footer>
<script>
function formReset()  //用於btn"清除重填""
  {
  document.querySelector(".regisForm").reset()
  }

function goToLogin(){
	window.location = 'login.php';
}

window.onload=function() {
  document.forms[0].reset();
}
</script>
</body>
</html>