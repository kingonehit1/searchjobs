<?php include 'inc/header.php'; ?>
<head>
	<link href="css/register.css" rel="stylesheet" type="text/css" media="all" />
</head>

<div class="main-w3layouts wrapper">
	<h1>Đăng kí tài khoản</h1>
	<div class="main-agileinfo">
		<div class="agileits-top">
			<form action="#" method="post">
				<input class="text" type="text" name="Username" placeholder="Username" required="">
				<input class="text email" type="email" name="email" placeholder="Email" required="">
				<input class="text" type="password" name="password" placeholder="Password" required="">
				<input class="text w3lpass" type="password" name="confirmpassword" placeholder="Confirm Password" required="">
				<input type="submit" NAME="submit" value="ĐĂNG KÍ">
<meta charset ="utf8">
<?php
	//connect database
	$kn = mysqli_connect("localhost","root","","a") or die("Không thể kết nối");
	mysqli_select_db($kn, "a");
	mysqli_query($kn,"SET NAMES 'utf8'");
	//post
	$username = @$_POST['Username'];
	$email = @$_POST['email'];
	$password = @$_POST['password'];
	$confirmoassword = @$_POST['confirmpassword'];
	//id
	$sql = "SELECT IDTK FROM taikhoan WHERE IDTK != 0";
	$old = mysqli_query($kn,$sql);
	$cou = mysqli_num_rows($old);
	$id = $cou + 1;
	//insert
	if(isset($_POST['submit']) && $password == $confirmoassword){
	//check email
		$cod = "SELECT * FROM taikhoan WHERE EMAIl = '$email'";
		$pro = mysqli_query($kn,$cod);
		$rows = mysqli_num_rows($pro);
		if($rows==0){
			$insert = "INSERT INTO taikhoan(IDTK,TAIKHOAN,EMAIL,MATKHAU) VALUES ('$id','$username','$email','$password')";
			mysqli_query($kn,$insert);
			echo"Đăng ký thành công!";
		}
		else{
			if(isset($_POST['submit']) && $rows !=0){
				echo"Email đã đăng ký";
			}
		}
	}
	else{
		if(isset($_POST['submit']) && $password != $confirmoassword)
			echo"Mật khẩu không khớp!";
	}
?>
			</form>
			<p>Bạn đã có tài khoản?<a href="login.php"> Đăng nhập</a></p>
		</div>
	</div>
</div>
<?php include 'inc/footer.php'; ?>
