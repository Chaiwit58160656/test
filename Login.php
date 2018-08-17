<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
	body {
		padding: 50px;
		background-color: rgba(0, 162, 158, .4);
	}
	#panel_01{
		background-color: rgb(0, 162, 158);
		
	}
	h1 {
		font-size: 90px;
		color: White;
		font-weight: bold;
	}
	h2 {
		font-size: 30px;
		color: White;
		line-height: 50%;
		font-weight: bold;
	}
	h3 {
		font-size: 40px;
	}
	#panel_body {
		float: left;
		width: 49.4%;
		padding: 30px;
		height: 550px;
		border-top-right-radius: 3px;
		border-top-left-radius: 3px;
	}
	.row:after {
		content: "";
		display: table;
		clear: both;
	}
	input[type=text], input[type=password] {
		width: 50%;
		padding: 12px 20px;
		margin: 8px 0;
		display: inline-block;
		border: 1px solid #ccc;
		box-sizing: border-box;
		
	}
	#form_center{
		text-align: center;
	}
	button {
		background-color: #4CAF50;
		color: white;
		padding: 14px 20px;
		margin: 8px 0;
		border: none;
		cursor: pointer;
		width: 70%;
	}
	.imgcontainer {
		text-align: center;
		margin: 24px 0 12px 0;
	}
</style>
<body>
    <div class="panel panel-primary" id="panel_01" >
        <div class="row">
			<div class="panel-body" id="panel_body">
				<br><br><br><br><br>
				<h1>LMS</h1>
				<h2>Library Management System</h2>
				<h2>ระบบจัดการห้องสมุด</h2>
			</div>
			<div class="panel-body" id="panel_body" style="background-color: White">
				<h3>Login</h3>
				<form id="form_center">
					<div class="imgcontainer">
						
						<img width="150" height="150" src="Image/img_login2.png">
					</div>
					<div>
						<label for="uname"><b>Username</b></label>
						<input type="text" placeholder="Enter Username" name="uname" required>
					</div>
					<div>
						<label for="psw"><b>Password</b></label>
						<input type="password" placeholder="Enter Password" name="psw" required>
					</div>
					<h6 >Change password</h6>
					<div>
						<button type="submit">Login</button>
					</div>
				</form>
			</div>
		</div>
	</div>



</body>
</html>