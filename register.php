<!DOCTYPE html>
<html>
<head>	
	<title>Đăng ký</title>
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}	
		.container{
			height: 100vh;
			display: flex;
			align-items: center;
			justify-content: center;
			
		}
		.form{
			width: 350px;
			/*height: 450px;*/
			padding: 20px 15px;
			box-shadow: 0 0 10px 5px grey;
		}
		input{
			display: block;
			width: 100%;
			padding: 7px 5px;
			margin-top: 5px;
			margin-bottom: 15px;
			border-radius: 3px;
			border: 1px solid grey;
		}
		input[type="submit"]{
			background: #07A99F;
			color: white;
			border-radius: 5px;
			padding: 9px 5px;
			cursor: pointer;
			transition: 0.5s;
			margin-top: 25px;
			margin-bottom: 0;
		}
		input[type="submit"]:hover{
			opacity: 0.7;
		}
		input::placeholder{
			font-size: 12px;
		}
	</style>		
</head>
<body>
		
	<div class="container">
		<div class="form">
			<div class="title" style="text-align: center; margin-bottom: 25px;">
				<h2 style="margin-bottom: 12px;">THÀNH VIÊN ĐĂNG KÝ</h2>
				<p>Cùng nhau học lập trình miễn phí <i class='bx bxs-heart' style="color: red;"></i></p>
			</div>
			<form method="Post" action="pushRegister.php">
				<input type="text" id="txtName" name="txtName" placeholder="Vd: Thanh Sơn" autocomplete="off">

				<label for="txtEmail">Email</label>
				<input type="email" id="txtEmail" name="txtEmail" placeholder="vd: abc@gmail.com">

				<label for="txtPass">Mật khẩu</label>
				<input type="password" id="txtPass" name="txtPass" placeholder="Nhập mật khẩu">

				<label for="txtRePass">Nhập lại mật khẩu</label>
				<input type="password" id="txtRePass" name="txtRePass" placeholder="Nhập lại mật khẩu">

				<input type="submit" name="btnRegister" value="Đăng ký">
			</form>
		</div>
	</div>
</body>
</html>