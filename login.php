<!DOCTYPE html>
<html class="body-bg" lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>WeeGo Delivery</title>
	<!-- bootstrap css -->
	<link rel="stylesheet" type="text/css" href="assests/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assests/bootstrap/css/bootstrap.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" type="text/css" href="assests/bootstrap/css/dashboard.css?v=<?php echo time(); ?>">
	<!-- datatables css -->
	<link rel="stylesheet" type="text/css" href="assests/datatables/datatables.min.css">
	<link rel="stylesheet" type="text/css" href="custom/css/style.css">
    <link rel="icon" href="pics/icon.png">
</head>


<body class="body-bg">
<div class="bg-img">
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.php">WeeGo Delivery</a>
		</div>
	</nav>

	<div class="container-fluid">
		<div class="row">
			<div class="login-form">
				<form action="php_action/checkuser.php" method="post">
					<h2 class="text-center">Log in</h2>
					<div class="form-group">
						<input type="text" class="form-control" name="usr" placeholder="Username" required="required">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="pwd" placeholder="Password" required="required">
					</div>
					<div class="form-group">
					    <button type="submit" class="btn btn-primary btn-block">Log in</button>
					    <center><p>or</p></center>
					    <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#addUserModal" id="addUserModalBtn">Sign Up</button>
					</div>
				</form>
			</div>
			
			
			
			<!-- add modal -->
			<div class="modal fade" tabindex="-1" role="dialog" id="addUserModal">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><span class="glyphicon glyphicon-plus-sign"></span> Create New Account</h4>
						</div>
                            
						<form action="php_action/reg_user.php" class="form-horizontal" method="POST" id="createUserForm">

							<div class="modal-body">
								<div class="addMessages"></div>
								<div class="form-group">
									<label for="f_name" class="col-sm-2 control-label">First Name</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="f_name" name="f_name" placeholder="Enter First Name" required >
									</div>
								</div>
								<div class="form-group">
									<label for="l_name" class="col-sm-2 control-label">Last Name</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="l_name" name="l_name" placeholder="Enter Last Name" required >
									</div>
								</div>
								<div class="form-group">
									<label for="age" class="col-sm-2 control-label">Age</label>
									<div class="col-sm-10">
										<input type="number" class="form-control" id="age" name="age" placeholder="Enter Age" required >
									</div>
								</div>
								<div class="form-group">
									<label for="gender" class="col-sm-2 control-label">Gender</label>
									<div class="col-sm-10">
										<select class="form-control" id="gender" name="gender" placeholder="Select Orientation" required>
											<option value="Male">Male</option>
											<option value="Female">Female</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="username" class="col-sm-2 control-label">Username</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required >
									</div>
								</div>
								<div class="form-group">
									<label for="reg_password" class="col-sm-2 control-label">Password</label>
									<div class="col-sm-10">
										<input type="password" class="form-control" id="reg_password" name="reg_password" placeholder="Enter password" required >
									</div>
								</div>
								<div class="form-group">
									<label for="conf_password" class="col-sm-2 control-label">Confirm Password</label>
									<div class="col-sm-10">
										<input type="password" class="form-control" id="conf_password" name="conf_password" placeholder="Confirm password" required>
									</div>
									<br /><br />
									<center><span><br /><p id="message"></p></span></center>
								</div>
								
								
							</div>
							<div class="modal-footer">
								<button type="submit" id="reg_submit" class="btn btn-primary">Submit</button>
							</div>
						</form>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			<!-- /add modal -->
			
			
			
		</div>
	</div>

	<!-- jquery plugin -->
	<script type="text/javascript" src="assests/jquery/jquery.min.js"></script>
	<!-- bootstrap js -->
	<script type="text/javascript" src="assests/bootstrap/js/bootstrap.min.js"></script>
	<!-- datatables js -->
	<script type="text/javascript" src="assests/datatables/datatables.min.js"></script>
    <script type="text/javascript" src="custom/js/register.js"></script>
</div>
</body>

</html>