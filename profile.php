<?php
session_start();
//echo $_SESSION["user_ID"];
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
	<div class="bg-img">
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
							<li class="activate"><a href="profile.php">Profile</a></li>
						<?php
							if ($_SESSION["usertype"] == "Admin") { ?>
								<li><a href="user.php">Users</a></li>
							<?php } ?>
								<li><a href="delivery.php">Delivery List</a></li>
								<li><a href="about.php">About Developer</a></li>
								<li><a href="logout.php">Log Out</a></li>
						<?php } else { ?>
							<li><a href="login.php">Login or Register</a></li>
						<?php } ?>
					</ul>
				</div>
				<div class="bg-white-2">
					<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
						<h1 class="header-text page-header"><b>Edit User Profile</b></h1>
					</div>
				</div>

				<div class="container-fluid col-md-offset-2">
					<div class="row">
						<div class="login-form">
							<script>
								function check_pass() {
									if (document.getElementById('password').value == document.getElementById('confirm_password').value) {
										document.getElementById('submit').disabled = false;
										document.getElementById('message').style.color = 'green';
										document.getElementById('message').innerHTML = "Passsword matched";
									} else {
										document.getElementById('submit').disabled = true;
										document.getElementById('message').style.color = 'red';
										document.getElementById('message').innerHTML = "Passsword does not match";
									}
								}
							</script>
							<form action="profilechange.php" method="POST">
								<input type="hidden" name="usrid" value="<?php echo $_SESSION["user_ID"] ?>" />
								<div class="form-group">
									First Name: <input type="text" class="form-control" name="f_name" placeholder="First Name" value="<?php echo $_SESSION["f_name"] ?>" required onkeyup='check_pass();' />
								</div>
								<div class="form-group">
									Last Name: <input type="text" class="form-control" name="l_name" placeholder="Last Name" value="<?php echo $_SESSION["l_name"] ?>" required onkeyup='check_pass();' />
								</div>
								<div class="form-group">
									Age: <input type="number" class="form-control" name="age" placeholder="Age" value="<?php echo $_SESSION["age"] ?>" required onkeyup='check_pass();' />
								</div>
								<div class="form-group">
									Gender: <select class="form-control" name="gender" placeholder="Gender" value="<?php echo $_SESSION["gender"] ?>" required onkeyup='check_pass();' />
										<option value="Male">Male</option>
										<option value="Female">Female</option>
									</select>
								</div>
								<div class="form-group">
									Username: <input type="text" class="form-control" name="usr" placeholder="Username" value="<?php echo $_SESSION["username"] ?>" required onkeyup='check_pass();' />
								</div>
								<div class="form-group">
									Password:&nbsp; <input id="password" class="form-control" type="password" name="pwd" placeholder="Password" value="<?php echo $_SESSION["password"] ?>" required onkeyup='check_pass();' />
								</div>
								<div class="form-group">
									Confirm Password: <input id="confirm_password" class="form-control" type="password" name="pwd2" placeholder="Confirm Password" value="<?php echo $_SESSION["password"] ?>" required onkeyup='check_pass();' />
								</div>
								<div class="form-group">
									<center><span id='message' ></span><br /></center>
									<input id="submit" type="submit" class="btn btn-primary btn-block" value="Change" disabled />
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- jquery plugin -->
		<script type="text/javascript" src="assests/jquery/jquery.min.js"></script>
		<!-- bootstrap js -->
		<script type="text/javascript" src="assests/bootstrap/js/bootstrap.min.js"></script>
	</div>
</body>

</html>