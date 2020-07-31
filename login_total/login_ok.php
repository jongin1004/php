<meta charset="utf-8" />
<?php
	include "../data/db.php";
	include "../data/password.php";

	//POST로 받아온 아이다와 비밀번호가 비었다면 알림창을 띄우고 전 페이지로 돌아갑니다.
	if($_POST["id"] == null || $_POST["password"] == null){
		echo '<script> alert("아이디나 패스워드 입력하세요"); history.back(); </script>';
	}else{

	//password변수에 POST로 받아온 값을 저장하고 sql문으로 POST로 받아온 아이디값을 찾습니다.
	$password = $_POST['password'];
	$sql = mq("select * from login_data2 where id='".$_POST['id']."'");
	$member = $sql->fetch_array();
	$hash_pw = $member['password']; //$hash_pw에 POSt로 받아온 아이디열의 비밀번호를 저장합니다.
	$sql2 = mq("select * from login_data2 where id='".$_POST['id']."'");
	$rank = $sql2->fetch_array();
	if(password_verify($password, $hash_pw)) //만약 password변수와 hash_pw변수가 같다면 세션값을 저장하고 알림창을 띄운후 main.php파일로 넘어갑니다.
	{
		$_SESSION['id'] = $member["id"];
		$_SESSION['password'] = $member["password"];
		if($rank["rank"] == manager){
		echo "<script>alert('로그인되었습니다.'); location.href='./manager_home.html';</script>";
	} else {
		echo "<script>alert('로그인되었습니다.'); location.href='./home.html';</script>";
	}
	}else{ // 비밀번호가 같지 않다면 알림창을 띄우고 전 페이지로 돌아갑니다
		echo "<script>alert('아이디 혹은 비밀번호를 확인하세요.'); history.back();</script>";
	}
}
?>
