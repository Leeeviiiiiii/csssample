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
							<li ><a href="user.php">Users</a></li>
						<?php } ?>
							<li class="activate"><a href="delivery.php">Delivery List</a></li>
							<li><a href="about.php">About Developer</a></li>
							<li><a href="logout.php">Log Out</a></li>
					<?php } else { ?>
					    <li><a href="login.php">Login or Register</a></li>
					<?php } ?>
				</ul>
			</div>
		
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
				<h1 class="page-header">Manage Deliveries</h1>
				<div class="row">
					<div class="col-md-12">
						<?php
						if ($_SESSION["usertype"] == "Admin") {
						?>

							<div class="removeMessages"></div>

							<button class="btn btn-success pull pull-right" data-toggle="modal" data-target="#addItem" id="addItemModalBtn">
								<span class="glyphicon glyphicon-plus-sign"></span>  Add Delivery
							</button>

							<br /> <br /> <br />

							<table class="table" id="manageItemTable">
								<thead>
									<tr>
										<th>Tracking ID</th>
										<th>Item</th>
										<th>Amount</th>
										<th>Sender</th>
										<th>Sender Address</th>
										<th>Receiver</th>
										<th>Receiver Address</th>
										<th>Payment Method</th>
										<th>Status</th>
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
			<div class="modal fade" tabindex="-1" role="dialog" id="addItem">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><span class="glyphicon glyphicon-plus-sign"></span> Add Item</h4>
						</div>

						<form class="form-horizontal" action="php_action/additem.php" method="POST" id="createItemForm">

							<div class="modal-body">
								<div class="messages"></div>
								<div class="form-group">
									<label for="f_name" class="col-sm-2 control-label">Sender Name</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="sname" name="sname" placeholder="Enter Sender Name" required >
									</div>
								</div>
								<div class="form-group">
									<label for="f_name" class="col-sm-2 control-label">Sender Address</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="saddress" name="saddress" placeholder="Enter Sender Address" required >
									</div>
								</div>
								<div class="form-group">
									<label for="l_name" class="col-sm-2 control-label">Receiver Name</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="rname" name="rname" placeholder="Enter Receiver Name" required >
									</div>
								</div>
								<div class="form-group">
									<label for="l_name" class="col-sm-2 control-label">Receiver Address</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="raddress" name="raddress" placeholder="Enter Receiver Address" required >
									</div>
								</div>
								<div class="form-group">
									<label for="l_name" class="col-sm-2 control-label">Item Name</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="item" name="item" placeholder="Enter Item Name" required >
									</div>
								</div>
								<div class="form-group">
									<label for="age" class="col-sm-2 control-label">Amount</label>
									<div class="col-sm-10">
										<input type="number" class="form-control" id="amount" name="amount" placeholder="Enter Amount" required >
									</div>
								</div>
								<div class="form-group">
									<label for="payment" class="col-sm-2 control-label">Payment Method</label>
									<div class="col-sm-10">
										<select class="form-control" id="payment" name="payment" placeholder="Select Payment Method" required>
											<option value="Cash On Delivery">Cash On Delivery</option>
											<option value="Credit/Debit">Credit/Debit Card</option>
											<option value="PayMaya">PayMala</option>
											<option value="GCash">Gcash</option>
											<option value="PayPal">PayPal</option>
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
			<div class="modal fade" tabindex="-1" role="dialog" id="removeItemModal">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><span class="glyphicon glyphicon-trash"></span> Remove Item</h4>
						</div>
						<div class="modal-body">
							<p>Do you really want to remove this item?</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" id="removeBtn">Confirm</button>
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			<!-- /remove modal -->

			<!-- edit modal -->
			<div class="modal fade" tabindex="-1" role="dialog" id="editItemModal">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><span class="glyphicon glyphicon-edit"></span> Edit Item</h4>
						</div>
					<div class="modal-body">
						<form class="form-horizontal" action="php_action/updateitem.php" method="POST" id="updateItemForm">
								<div class="edit-messages"></div>
								
								<div class="form-group">
									<label for="edititem" class="col-sm-2 control-label">Item Name</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="edititem" name="edititem" placeholder="Item Name">
									</div>
								</div>
								<div class="form-group">
									<label for="editamount" class="col-sm-2 control-label">Amount</label>
									<div class="col-sm-10">
										<input type="number" class="form-control" id="editamount" name="editamount" placeholder="Item Amount">
									</div>
								</div>
								<div class="form-group">
									<label for="editsname" class="col-sm-2 control-label">Sender</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="editsname" name="editsname" placeholder="Sender Name">
									</div>
								</div>
								<div class="form-group">
									<label for="editsaddress" class="col-sm-2 control-label">Sender Address</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="editsaddress" name="editsaddress" placeholder="Sender Address">
									</div>
								</div>
								<div class="form-group">
									<label for="editrname" class="col-sm-2 control-label">Receiver</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="editrname" name="editrname" placeholder="Receiver Name">
									</div>
								</div>
								<div class="form-group">
									<label for="editraddress" class="col-sm-2 control-label">Receiver Address</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="editraddress" name="editraddress" placeholder="Receiver Address">
									</div>
								</div>
								<div class="form-group">
									<label for="editpayment" class="col-sm-2 control-label">Payment Method</label>
									<div class="col-sm-10">
										<Select type="text" class="form-control" id="editpayment" name="editpayment">
											<option value="Cash On Delivery">Cash On Delivery</option>
											<option value="Credit/Debit">Credit/Debit Card</option>
											<option value="PayMaya">PayMala</option>
											<option value="GCash">Gcash</option>
											<option value="PayPal">PayPal</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="editstatus" class="col-sm-2 control-label">Status</label>
									<div class="col-sm-4">
										<select class="form-control" name="editstatus" id="editstatus">
											<option value="Preparing for Delivery">Preparing for Delivery</option>
											<option value="On Route">On Route</option>
											<option value="Delivered">Delivered</option>
										</select>
									</div>
								</div>
								<div class="modal-footer editItemModal">
									<button type="submit" class="btn btn-primary">Save changes</button>
								</div>
						</form>
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->
			</div><!-- /edit modal -->
		</div>
	</div>
			<!-- jquery plugin -->
			<script type="text/javascript" src="assests/jquery/jquery.min.js"></script>
			<!-- bootstrap js -->
			<script type="text/javascript" src="assests/bootstrap/js/bootstrap.min.js"></script>
			<!-- datatables js -->
			<script type="text/javascript" src="assests/datatables/datatables.min.js"></script>
			<!-- custom js -->
			<script type="text/javascript" src="custom/js/item.js"></script>

</body>

</html>