<!DOCTYPE html>
<html>
	<head>
		<title><h3>Login Form</h3></title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<h3>Login Form</h3>
					<form action="validation.php" method="post" accept-charset="utf-8">
						<div class="form-group">
							<label>User Name:</label><br>
							<input type="text" name="user" class="form-control">
						</div>
						<div class="form-group">
							<label>Password:</label><br>
							<input type="password" name="pass" class="form-control">
						</div>
						<div>
							<button type="submit" class="btn btn-success btn-lg">Login</button>
						</div>
					</form>
				</div>
				<div class="col-lg-6">
					<h3>Signin Form</h3>
					<form action="registration.php" method="post" accept-charset="utf-8">
						<div class="form-group">
							<label>User Name:</label><br>
							<input type="text" name="user" class="form-control">
						</div>
						<div class="form-group">
							<label>Password:</label><br>
							<input type="password" name="pass" class="form-control">
						</div>
						<div>
							<button type="submit" class="btn btn-success btn-lg">SignIn</button>
						</div>
					</form>
				</div>
			</div>
			
		</div>
		
		
	</body>
</html>