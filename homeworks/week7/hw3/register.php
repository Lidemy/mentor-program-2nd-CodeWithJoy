<?
require_once('conn.php');
require_once('bootstrap.php');
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
	@$name = htmlspecialchars($_POST['username'], ENT_QUOTES, 'utf-8');
	@$acc = htmlspecialchars($_POST['account'], ENT_QUOTES, 'utf-8');
	@$pwd = password_hash($_POST['password'],PASSWORD_DEFAULT); //雜湊密碼
?>


<div class="registerBgi"><img src="http://plays01.com/wp-content/uploads/2017/07/%E8%97%8D%E9%AF%A8.jpg" alt="背景圖片">
</div> <!-- 背景圖片的尾標 -->
<header></header>
<div class="regisMain">
	<h1>註冊嘴魚留言板</h1>
	<h2>Sign Up for FishBoard</h2>
	<form action="register.php" method="post" class="regisForm"  onsubmit="return validate_form()">
		您的暱稱：<input type="text" name="username" class="regis regisName" required>
		<?
		//驗證暱稱重複
		$stmt_name = $conn->prepare("SELECT username FROM joy_board_register WHERE username= ? ");
		$stmt_name->bind_param("s", $name);
		$stmt_name->execute();
		$result_name = $stmt_name->get_result();
		$row_name = $result_name->fetch_assoc();

			if(isset($name)){ 
				if($result_name->num_rows>0 ){		
					echo "<span class='veri'>暱稱重複</span>";
				}else{
					echo "<span class='veri'>可使用此暱稱</span>";
				}
			}
			
		?>
		<br>

		註冊帳號：<input type="text" name="account" class="regis regisAcc" required>
		<?
		//驗證註冊重複

		$stmt_acc = $conn->prepare("SELECT account FROM joy_board_register WHERE account= ? ");
		$stmt_acc->bind_param("s", $acc);
		$stmt_acc->execute();
		$result_acc = $stmt_acc->get_result();
		$row_acc =$result_acc->fetch_assoc();

		if(isset($acc)){
			if($result_acc->num_rows>0 ){		
				echo "<span class='veri'>帳號重複</span>";
			}else{
				echo "<span class='veri'>可使用此帳號</span>";
			}
		}
		?>
		<br>
		註冊密碼：<input type="password" name="password" class="regis regisPwd" required><span> </span>
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

	$stmt = $conn->prepare("INSERT INTO `joy_board_register` (`account`, `password`, `username`) VALUES (?,?,?) ");
	$stmt->bind_param("sss", $acc, $pwd, $name);
	
	$stmt2 = $conn->prepare("INSERT INTO `joy_users_certificate` (`session_id`, `account`) VALUES (?,?)");
	$stmt2->bind_param("ss", $session_id, $acc);
	
	// $result2 = $stmt2->get_result();

	//先驗證是否有值，再跑$conn->query(),否則會一直跑出Notices
	if( $acc !== $row_acc['account'] && $name !== $row_name['username']){
		$stmt->execute();
		$stmt2->execute(); //修正：之前放在判斷式前面就就執行了
		setcookie('name', $name, time()+3600*24);
		setcookie("session_id", $session_id,time()+3600*24);
		header('Location: index.php');
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