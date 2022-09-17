<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>WeeGo Delivery</title>
	<!-- bootstrap css -->
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
				</button>
			</div>
		</div>
	</nav>

	<div class="container-fluid">
		<div class="row">
			<!--Navigation Bar Menu-->
			<div id="navbar" class="col-sm-3 col-md-2 sidebar collapse">
				<ul class="nav nav-sidebar">
					<li class="activate"><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
					<?php
					if (isset($_SESSION["usertype"])) {
					?>
    					<li><a href="profile.php">Profile</a></li>
						<?php
    					if ($_SESSION["usertype"] == "Admin") {
    					?>
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
			
			<div class="bg-white">
				<div class="tabs home_title">
					<h1 class="page-header"><img src="pics/icon2.PNG" class="ImageCS Img-icon" alt="WeeGo Icon">WeeGo Delivery</h1>
				</div>
				
				<div class="tabs col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<div class="row">
						<h3>
							We Go, We Deliver!
						</h3>
						<p>
							This is a simple parcel tracking website implementing CRUD. 
							'Register Account', and 'Add Delivery' in 'Delivery List'(Admin privileges) for CREATE. 'Users' (admin-only access),  and 'Delivery List' for READ.<br>
							UPDATE functions are found in 'Profile', and 'Delivery List (edit/update)'. DELETE functions are found in 'Users' (admin-only access), and in 'Delivery List'.<br>
						</p>
					</div>
					</br>
				</div>
			</div>
				
				<div class="index-filler-parent col-md-10 col-md-offset-2">
					
					<div class="index-filler-child imageCS">
						<h2 >Lorem Ipsum</h2>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque <br>
							iaculis fermentum lorem sit amet iaculis. Vestibulum ultricies <br>
							ullamcorper lacus, eget molestie orci venenatis ac. Duis viverra nisl <br>
							eget libero placerat lobortis. Vivamus gravida sodales viverra. Sed <br>
							vestibulum a ligula et faucibus. Lorem ipsum dolor sit amet, consectetur <br>
							adipiscing elit. Pellentesque non libero varius, varius lorem <br>
							vel, pellentesque nibh.<br>
						</p>
					</div> 
					
					<div class="index-filler-child imageCS">
						<h2 >Lorem Ipsum</h2>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque <br>
							iaculis fermentum lorem sit amet iaculis. Vestibulum ultricies <br>
							ullamcorper lacus, eget molestie orci venenatis ac. Duis viverra nisl <br>
							eget libero placerat lobortis. Vivamus gravida sodales viverra. Sed <br>
							vestibulum a ligula et faucibus. Lorem ipsum dolor sit amet, consectetur <br>
							adipiscing elit. Pellentesque non libero varius, varius lorem <br>
							vel, pellentesque nibh.<br>
						</p>
					</div>
					
					<div class="index-filler-child imageCS col-md-offset-3">
						<h2 >Lorem Ipsum</h2>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque <br>
							iaculis fermentum lorem sit amet iaculis. Vestibulum ultricies <br>
							ullamcorper lacus, eget molestie orci venenatis ac. Duis viverra nisl <br>
							eget libero placerat lobortis. Vivamus gravida sodales viverra. Sed <br>
							vestibulum a ligula et faucibus. Lorem ipsum dolor sit amet, consectetur <br>
							adipiscing elit. Pellentesque non libero varius, varius lorem <br>
							vel, pellentesque nibh.<br>
						</p>
					</div> 
				</div>
			
		</div>
	</div>

	<!-- jquery plugin -->
	<script type="text/javascript" src="assests/jquery/jquery.min.js?v=<?php echo time(); ?>"></script>
	<!-- bootstrap js -->
	<script type="text/javascript" src="assests/bootstrap/js/bootstrap.min.js?v=<?php echo time(); ?>"></script>
	<!-- datatables js -->
	<script type="text/javascript" src="assests/datatables/datatables.min.js?v=<?php echo time(); ?>"></script>
    
	<script>
        $(document).ready(function(){
            $(".imageCS").mouseenter(function(){
				$(this).animate({
					height:"300px"
				});
            });
			$(".imageCS").mouseleave(function(){
                $(this).animate({
					height:"280px"
				});
            });
            
        });
    </script>
</div>
</body>

</html>