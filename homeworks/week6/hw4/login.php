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
</head>


<body class="loginBody">
<header></header>
<div class="loginBgi"><img src="http://www.abc.net.au/news/image/8709852-3x2-940x627.jpg" alt="登入背景圖片"></div>
<div class="loginMain">
	<h1>登入嘴魚留言板</h1>
	<h2>Log In to FishBoard</h2>
	<form action="login.php" method="post" class="login loginForm" name="loginForm">
		帳號：<input type="text" name="account" class="login"><br>
		密碼：<input type="password" name="password" class="login"><br>
		<input type="submit" value="提交" class="allBtn">
		<input type="button" id="test" value='清空重填' onclick="formReset()" class="allBtn">
	</form>
	
	<?
//上面這行抓db裡面的username
@$acc = htmlspecialchars($_POST['account'], ENT_QUOTES, 'utf-8');
@$pwd  = htmlspecialchars($_POST['password'], ENT_QUOTES, 'utf-8');

		$stmt = $conn->prepare("SELECT * FROM joy_board_register WHERE account = ? ");
		$stmt->bind_param("s", $acc);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();

@$name = $row['username'];
@$hash = $row['password'];

/* 把session_id 存入db */
$session_id = uniqid(); //創造session_id
		$stmt2 = $conn->prepare("INSERT INTO `joy_users_certificate` (`session_id`, `account`) VALUES (?,?)");
		$stmt2->bind_param("ss", $session_id, $acc);
		$result2 = $stmt2->get_result();

//Q: 先驗證是否有值，再跑$conn->query(),否則會一直跑出Notices --> 後來還是失敗，暫時用php的@忽略問題解決
if(isset($acc)){
	if(password_verify($pwd, $hash)){    //驗證密碼
		$stmt2->execute();
		setcookie("name", $name , time()+3600*24); //設置cookie
		setcookie("session_id", $session_id,time()+3600*24);
		header('Location: index.php');
    }else{
		echo "<h4>登入失敗，帳號或密碼錯誤</h4>"; 
    }
}

	?>
	<br>
	<div class="regisXXX">
		<span class="regisBtn">還木有帳號？</span> 
		<input type="button" onclick="goToRegis()" value="點我註冊" class="regisBtn"/> 
	</div>
	<div class="forget" style="margin-top:30px"> <a href="">Forgot password?</a></div>
</div>
<footer></footer>
<script type="text/javascript">

function formReset()  //用於btn"清除重填""
  {  document.querySelector(".login").reset()  }
function goToRegis()//跳轉register.php
   {	window.location = 'register.php'; }
</script>
</body>
</html>