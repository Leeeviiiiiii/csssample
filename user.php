<?php
session_start();
//echo $_SESSION["usertype"];
if (!isset($_SESSION["user_ID"]) || !isset($_SESSION["usertype"])) {
	echo "<script type='text/javascript'>window.location.replace('login.php');</script>";
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>WeeGo Delivery</title>
	<!-- bootstrap css -->
	<link rel="stylesheet" type="text/css" href="assests/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assests/bootstrap/css/bootstrap.min.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" type="text/css" href="assests/bootstrap/css/dashboard.css?v=<?php echo time(); ?>">
	<!-- datatables css -->
	<link rel="stylesheet" type="text/css" href="assests/datatables/datatables.min.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" type="text/css" href="custom/css/style.css?v=<?php echo time(); ?>">
    <link rel="icon" href="pics/icon.png">
</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
		</div>
	</nav>

	<div class="container-fluid">
		<div class="row">
			<!--Navigation Bar Menu-->
			<div id="navbar" class="col-sm-3 col-md-2 sidebar collapse">
				<ul class="nav nav-sidebar">
					<li><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
					<?php
					if (isset($_SESSION["usertype"])) { ?>
    					<li><a href="profile.php">Profile</a></li>
					<?php
						if ($_SESSION["usertype"] == "Admin") { ?>
							<li class="activate"><a href="user.php">Users</a></li>
						<?php } ?>
							<li><a href="delivery.php">Delivery List</a></li>
							<li><a href="about.php">About Developer</a></li>
							<li><a href="logout.php">Log Out</a></li>
					<?php } else { ?>
					    <li><a href="login.php">Login or Register</a></li>
					<?php } ?>
				</ul>
			</div>
			
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
				<h1 class="page-header">Manage Users</h1>
				<div class="row">
					<div class="col-md-12">
						<?php
						if ($_SESSION["usertype"] == "Admin") {
						?>

							<div class="removeMessages"></div>

							<button class="btn btn-success pull pull-right" data-toggle="modal" data-target="#addUser" id="addUserModalBtn">
								<span class="glyphicon glyphicon-plus-sign"></span>  Create Account
							</button>

							<br /> <br /> <br />

							<table class="table" id="manageUserTable">
								<thead>
									<tr>
										<th>User ID</th>
										<th>Username</th>
										<th>First Name</th>
										<th>Last Name</th>
										<th>Age</th>
										<th>Gender</th>
										<th>Type</th>
										<th>Option</th>
									</tr>
								</thead>
							</table>
						<?php
						} else {
						?>
							<h1>Request Denied</h1>
						<?php
						}
						?>
					</div>
				</div>
			</div>

			<!-- add modal -->
			<div class="modal fade" tabindex="-1" role="dialog" id="addUser">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><span class="glyphicon glyphicon-plus-sign"></span> Add Account</h4>
						</div>

						<form class="form-horizontal" action="php_action/createuser.php" method="POST" id="createUserForm">

							<div class="modal-body">
								<div class="messages"></div>
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
										<input type="text" class="form-control" id="username" name="username" placeholder="Username">
									</div>
								</div>
								<div class="form-group">
									<label for="password" class="col-sm-2 control-label">Password</label>
									<div class="col-sm-10">
										<input type="password" class="form-control" id="password" name="password" placeholder="Password">
									</div>
								</div>
								<div class="form-group">
									<label for="usertype" class="col-sm-2 control-label">User Type</label>
									<div class="col-sm-4">
										<select class="form-control" name="usertype" id="usertype">
											<option value="Admin">Administrator</option>
											<option value="User">User</option>
										</select>
									</div>
								</div>

							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-primary">Add</button>
							</div>
						</form>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			<!-- /add modal -->

			<!-- remove modal -->
			<div class="modal fade" tabindex="-1" role="dialog" id="removeUserModal">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><span class="glyphicon glyphicon-trash"></span> Remove User</h4>
						</div>
						<div class="modal-body">
							<p>Do you really want to remove this user?</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" id="removeBtn">Confirm</button>
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			<!-- /remove modal -->

			<!-- edit modal -->
			<div class="modal fade" tabindex="-1" role="dialog" id="editUserModal">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><span class="glyphicon glyphicon-edit"></span> Edit User</h4>
						</div>

						<form class="form-horizontal" action="php_action/updateuser.php" method="POST" id="updateUserForm">

							<div class="modal-body">

								<div class="edit-messages"></div>

								<div class="form-group">
									<label for="editf_name" class="col-sm-2 control-label">First Name</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="editf_name" name="editf_name" placeholder="First Name">
									</div>
								</div>
								<div class="form-group">
									<label for="editl_name" class="col-sm-2 control-label">Last Name</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="editl_name" name="editl_name" placeholder="Last Name">
									</div>
								</div>
								<div class="form-group">
									<label for="editage" class="col-sm-2 control-label">Age</label>
									<div class="col-sm-10">
										<input type="number" class="form-control" id="editage" name="editage" placeholder="Age">
									</div>
								</div>
								<div class="form-group">
									<label for="editgender" class="col-sm-2 control-label">Gender</label>
									<div class="col-sm-10">
										<Select type="text" class="form-control" id="editgender" name="editgender" placeholder="Gender">
											<option value="Male">Male</option>
											<option value="Female">Female</option>
										</select>
									</div>
								</div>
								
								<div class="form-group">
									<label for="editUsername" class="col-sm-2 control-label">Username</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="editUsername" name="editUsername" placeholder="Username" readonly>
									</div>
								</div>
								<div class="form-group">
									<label for="editPassword" class="col-sm-2 control-label">Password</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="editPassword" name="editPassword">
									</div>
								</div>

								<div class="form-group">
									<label for="editUsertype" class="col-sm-2 control-label">Type</label>
									<div class="col-sm-4">
										<select class="form-control" name="editUsertype" id="editUsertype">
											<option value="Admin">Admin</option>
											<option value="User">User</option>
										</select>
									</div>
								</div>
								<div class="modal-footer editUserModal">
									<button type="submit" class="btn btn-primary">Save changes</button>
								</div>
						</form>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			<!-- /edit modal -->

			<!-- jquery plugin -->
			<script type="text/javascript" src="assests/jquery/jquery.min.js"></script>
			<!-- bootstrap js -->
			<script type="text/javascript" src="assests/bootstrap/js/bootstrap.min.js"></script>
			<!-- datatables js -->
			<script type="text/javascript" src="assests/datatables/datatables.min.js"></script>
			<!-- custom js -->
			<script type="text/javascript" src="custom/js/user.js"></script>

</body>

</html>