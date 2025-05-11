
<!DOCTYPE html>
<html>
<head>	
	<title>Đăng ký</title>
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
			padding: 20px;
			box-shadow: 0 0 10px 5px grey;
		}
		input{
			display: block;
			width: 100%;
			padding: 10px 5px;
			margin-top: 7px;
			margin-bottom: 20px;
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
				<h2 style="margin-bottom: 12px;">THÀNH VIÊN ĐĂNG NHẬP</h2>
				<p>Cùng nhau học lập trình miễn phí <i class='bx bxs-heart' style="color: red;"></i></p>
			</div>
			<form method="post" action="pushlogin.php">
				<label for="txtName">Tên đăng nhập</label>
				<input type="text" id="txtName" name="txtName" autocomplete="off">				

				<label for="txtPass">Mật khẩu</label>
				<input type="password" id="txtPass" name="txtPass" placeholder="Nhập mật khẩu">			

				<input type="submit" name="btnLogin" value="Đăng nhập">
			</form>
		</div>
	</div>
</body>
</html>