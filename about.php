<?php
session_start();
//echo $_SESSION["usertype"];
if (!isset($_SESSION["user_ID"]) || !isset($_SESSION["usertype"])) {
	echo "<script type='text/javascript'>window.location.replace('login.php');</script>";
	exit();
}
?>
<!DOCTYPE html>
<html>
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
		
			<div class="container-fluid ">
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
									<li><a href="delivery.php">Delivery List</a></li>
									<li class="activate"><a href="about.php">About Developer</a></li>
									<li><a href="logout.php">Log Out</a></li>
							<?php } else { ?>
								<li><a href="login.php">Login or Register</a></li>
							<?php } ?>
						</ul>
					</div>
						
						<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-0 main">
							
							<!-- About Me -->
							<div class="col-md-12 abt_content" >
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="form-horizontal">	
											<div class="modal-header">
												<h3 class="modal-title"><img src="pics/icon2.PNG" class="about_img" alt="WeeGo Icon"><b> About Me</b></h3>
											</div>

											<div class="modal-body">
												<div class="form-group">
													<label class="col-sm-2 control-label"> Name: </label>
													<div class="col-sm-10">
														<h4><b>Joshua J. Vicente</b></h4>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2 control-label"> Age: </label>
													<div class="col-sm-10">
														<h4><b>21</b></h4>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2 control-label"> Sex: </label>
													<div class="col-sm-10">
														<h4><b>Male</b></h4>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2 control-label"> Birthdate: </label>
													<div class="col-sm-10">
														<h4><b>June 30, 2000</b></h4>
													</div>
												</div>
												<div class="form-group">
													<label  class="col-sm-2 control-label"> Birthplace: </label>
													<div class="col-sm-10">
														<h4><b>San Pedro, Laguna</b></h4>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2 control-label"> Address: </label>
													<div class="col-sm-10">
														<h4><b>Isidro D. Tan, Tangub City</b></h4>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2 control-label"> Mother's Name: </label>
													<div class="col-sm-10">
														<h4><b>Imelda J. Vicente</b></h4>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2 control-label"> Father's Name: </label>
													<div class="col-sm-10">
														<h4><b>Leopoldo S. Vicente</b></h4>
													</div>
												</div>
											</div>
											
											<div class="modal-footer">
												<button data-toggle="modal" class="btn btn-primary" data-target="#educationmodal" id="education">Education</button>
												<button data-toggle="modal" class="btn btn-primary" data-target="#takenmodal" id="sub_taken">Subjects Taken</button>
												<button data-toggle="modal" class="btn btn-primary" data-target="#enrolledmodal" id="sub_enroll">Current Subjects</button>
												<button data-toggle="modal" class="btn btn-primary" data-target="#contactmodal" id="contactme">Contact Me</button>
												<button data-toggle="modal" class="btn btn-primary" data-target="#favemodal" id="favorites">Favorites</button>
											</div>
											
											
										</div>	
									</div>
								</div>
								
								<!-- Education modal -->
								<div class="modal" role="document" id="educationmodal">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
										
											<div class="form-horizontal">	
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h3 class="modal-title"><img src="pics/icon2.PNG" class="about_img" alt="WeeGo Icon"><b> Educational Background</b></h3>
												</div>
												
												<div class="modal-body">	
													<div class="form-group">
														<label class="col-sm-2 control-label"> Educational Level: </label>
														<div class="col-sm-10">
															<h4><b>Undergraduate</b></h4>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label"> Course: </label>
														<div class="col-sm-10">
															<h4><b>BSIT</b></h4>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label"> Year: </label>
														<div class="col-sm-10">
															<h4><b>3</b></h4>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label"> Institute: </label>
														<div class="col-sm-10">
															<h4><b>Misamis University, Ozamiz City</b></h4>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label"> Previous Schools: </label>
														<div class="col-sm-10">
															<h4><b>Tangub City National High School (G12)</b></h4>
															<h4><b>Lycee - La Salle University (G11)</b></h4>
															<h4><b>Tangub City National High School (G7-10)</b></h4>
															<h4><b>Tangub City Central School (K1 - G6) </b></h4>
															<h4><b> </b></h4>
														</div>
													</div>
												</div>
											</div>
											
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
								</div><!-- /.modal -->
								
								<!-- Subjects Taken modal -->
								<div class="modal" role="document" id="takenmodal">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
										
											<div class="form-horizontal">	
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h3 class="modal-title"><img src="pics/icon2.PNG" class="about_img" alt="WeeGo Icon"><b> Subjects Taken</b></h3>
												</div>
												
												<div class="modal-body">	
													<div class="form-group">
														<label class="col-sm-2 control-label"> BSIT - 1: </label>
														<div class="col-sm-10">
															<h6>OC 1 - ORIENTATION COURSE 1</h6>
															<h6>CSIT 1 - ORIENTATION COURSE 1 </h6>
															<h6>CSIT 2 - FUNDAMENTALS OF PROGRAMMING/COMPUTER PROGRAMMING 1  </h6>
															<h6>SOC SC - UNDERSTANDING THE SELF / PAG-UNAWA SA SARILI </h6>
															<h6>ENGL A - GRAMMAR AND SPEECH ENHANCEMENT </h6>
															<h6>PE 1 - GRAMMAR AND SPEECH ENHANCEMENT </h6>
															<h6>NSTP 11L - NSTP 1-LITERACY TRAINING SERVICE (LTS) </h6>
															<h6>PE 2 - PATH FIT 2: FITNESS TRAINING </h6>
															<h6>NSTP 12L - NSTP 2-LITERACY TRAINING SERVICE II</h6>
															<h6>MATH 1 - NSTP 2-LITERACY TRAINING SERVICE II </h6>
															<h6>CSIT 3 - NSTP 2-LITERACY TRAINING SERVICE II </h6>
															<h6>ITP 1 - IT FUNDAMENTALS </h6>
															<h6>ITP 2 - DISCRETE MATHEMATICS </h6>
															<h6>EP 1S - ENGLISH PROFICIENCY - START I  </h6>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label"> BSIT - 2: </label>
														<div class="col-sm-10">
															<h6>CSIT 4 - DATA STRUCTURES AND ALGORITHMS</h6>
															<h6>HIST 1 - READINGS IN PHILIPPINE HISTORY /MGA BABASAHIN HINGGIL SA KASAYSAYAN NG PILIPINAS </h6>
															<h6>ITEL 1A - IT ELECTIVE 1: PLATFORM TECHNOLOGIES </h6>
															<h6>ITEL 2A - IT ELECTIVE 2: OBJECT-ORIENTED PROGRAMMING </h6>
															<h6>ITP 3 - NETWORKING 1 (CISCO 1: NETWORKING BASICS)  </h6>
															<h6>PE 3 - PATH FIT 3: SPORTS (INDIVIDUAL/DUAL) </h6>
															<h6>SOC ECON 1 - THE CONTEMPORARY WORLD / ANG KASULUKUYAN DAIGDIG </h6>
															<h6>CSIT 5 - INFORMATION MANAGEMENT </h6>
															<h6>ITP 4 - INTEGRATIVE PROGRAMMING and TECHNOLOGIES 1  </h6>
															<h6>ITP 6 - INTRODUCTION TO HUMAN COMPUTER INTERACTION </h6>
															<h6>ITP 5 - NETWORKING 2 (CISCO 2: ROUTING PROTOCOLS and CONCEPTS)</h6>
															<h6>COM 1 - PURPOSIVE COMMUNICATION / MALAYUNING KOMUNIKASYON </h6>
															<h6>PE 4 - PATH FIT 4: SPORTS (TEAM) </h6>
															<h6>PHILO 1 - ETHICS / ETIKA </h6>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label"> BSIT - 3: </label>
														<div class="col-sm-10">
															<h6>RIZAL CRS - ETHICS / ETIKA</h6>
															<h6>GE EL 1 - ENVIRONMENTAL SCIENCE (M.S.T. ELECTIVE) </h6>
															<h6>GE EL 2 - SOCIAL SCIENCES & PHILOSOPHY ELECTIVE </h6>
															<h6>CSC 3 - CISCO 3: LAN SWITCHING AND WIRELESS </h6>
															<h6>ITP 7 - ADVANCED DATABASE SYSTEMS </h6>
															<h6>ITP 9 - SOCIAL AND PROFESSIONAL ISSUES </h6>
															<h6>ITP 8 - SYSTEMS INTEGRATION AND ARCHITECTURE 1</h6>
														</div>
													</div>
												</div>
											</div>
											
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
								</div><!-- /.modal -->
								
								<!-- Curently Enrolled modal -->
								<div class="modal" role="document" id="enrolledmodal">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
										
											<div class="form-horizontal">	
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h3 class="modal-title"><img src="pics/icon2.PNG" class="about_img" alt="WeeGo Icon"><b> Subjects Currently Enrolled </b></h3>
												</div>
												
												<div class="form-group">
														<label class="col-sm-2 control-label"> BSIT - 1: </label>
														<div class="col-sm-10">
															<h6>HUM 1 - ARTS APPRECIATION</h6>
															<h6>GE EL 3 - INDIGENOUS CREATIVE WORKS </h6>
															<h6>CSIT 6 - APPLICATIONS DEVELOPMENT AND EMERGING TECHNOLOGIES </h6>
															<h6>ITP 10 - INFORMATION ASSURANCE AND SECURITY 1 </h6>
															<h6>ITP 11 - EVENT-DRIVEN PROGRAMMING </h6>
															<h6>ITEL 3A - IT ELECTIVE 3: INTEGRATIVE PROGRAMMING AND TECHNOLOGIES 2 </h6>
															<h6>CSC 4 - CISCO 4: WAN SOLUTIONS </h6>
														</div>
													</div>
											</div>
											
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
								</div><!-- /.modal -->
								
								<!-- Contact modal -->
								<div class="modal" role="document" id="contactmodal">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
										
											<div class="form-horizontal">	
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h3 class="modal-title"><img src="pics/icon2.PNG" class="about_img" alt="WeeGo Icon"><b> Contact Me </b></h3>
												</div>
												
												<div class="modal-body">	
													<div class="form-group">
														<label class="col-sm-2 control-label"> Name: </label>
														<div class="col-sm-10">
															<h4><b>Joshua J. Vicente</b></h4>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label"> Address: </label>
														<div class="col-sm-10">
															<h4><b>Isidro D. Tan, Tangub City - Misamis Occidental</b></h4>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label"> Phone Number: </label>
														<div class="col-sm-10">
															<h4><b>0951 654 5327</b></h4>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label"> Email Addresses: </label>
														<div class="col-sm-10">
															<h4><b>gamerotaku80085@yahoo.com</b></h4>
															<h4><b>gamerotaku80085@gmail.com</b></h4>
															<h4><b>zho.hie0630@gmail.com</b></h4>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label"> Facebook: </label>
														<div class="col-sm-10">
															<h4><b>fb.com/frostbyte.0630</b></h4>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label"> Instagram: </label>
														<div class="col-sm-10">
															<h4><b>@_jshii.pruwit</b></h4>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label"> TikTok: </label>
														<div class="col-sm-10">
															<h4><b>@frostbyte0630</b></h4>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label"> Discord: </label>
														<div class="col-sm-10">
															<h4><b>恵 | STELLARIS | 慧#9509</b></h4>
														</div>
													</div>
												</div>
											</div>
											
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
								</div><!-- /.modal -->
								
								<!-- Favorites modal -->
								<div class="modal" role="document" id="favemodal">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
										
											<div class="form-horizontal">	
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h3 class="modal-title"><img src="pics/icon2.PNG" class="about_img" alt="WeeGo Icon"><b> Education</b></h3>
												</div>
												
												<div class="modal-body">	
													<div class="form-group">
														<label class="col-sm-2 control-label"> Color: </label>
														<div class="col-sm-10">
															<h4><b>Black</b></h4>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label"> Song: </label>
														<div class="col-sm-10">
															<h4><b>Down with the sickness - Disturbed</b></h4>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label"> Artist: </label>
														<div class="col-sm-10">
															<h4><b>Eminem </b></h4>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label"> Game: </label>
														<div class="col-sm-10">
															<h4><b>Valorant, Clash of Clans, Clash Royale </b></h4>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label"> Art Style: </label>
														<div class="col-sm-10">
															<h4><b>Ink Art, Tattoo </b></h4>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label"> Dessert: </label>
														<div class="col-sm-10">
															<h4><b>Spaghetti, Salad, Tapioca, Maja, Carbonara, Lasagna </b></h4>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label"> Dish: </label>
														<div class="col-sm-10">
															<h4><b>Sinigang(Pork), Liempo </b></h4>
														</div>
													</div>
												</div>
											</div>
											
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
								</div><!-- /.modal -->
							
							</div>
							<div class="abt_pic">
									<img class="self_photo" src="pics/self_img.JPG" id="self_img" alt="Joshua Vicente">
							</div>
						</div>
				</div>
			
		</div>
		
		<!-- jquery plugin -->
			<script type="text/javascript" src="assests/jquery/jquery.min.js"></script>
			<!-- bootstrap js -->
			<script type="text/javascript" src="assests/bootstrap/js/bootstrap.min.js"></script>
			<!-- datatables js -->
			<script type="text/javascript" src="assests/datatables/datatables.min.js"></script>
			<!-- custom js -->
			<script type="text/javascript" src="custom/js/about.js"></script>
		
	</body>
	
</html>