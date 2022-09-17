<?php 

require_once 'db_connect.php';

//if form is submitted
if($_POST) {
	
	$f_name = $_POST['f_name'];
	$l_name = $_POST['l_name'];
	$age = $_POST['age'];
	$gender = $_POST['gender'];
	$username = $_POST['username'];
	$password = $_POST['reg_password'];
    
    $sql1 = "SELECT * FROM users WHERE u_name='$username'";
	$query1 = $connect->query($sql1);
	
	if ($query1->num_rows > 0) {
    	// output data of each row
    	if ($row = $query1->fetch_assoc()) {
    		echo "<script type='text/javascript'>alert('Username already exists!'); window.location.replace('http://localhost/testfolder/Vicente_EXAM_ITP11Final/ITP11Final/login.php'); </script>";
    	}
    } else {
        $sql = "INSERT INTO users (u_name, password, f_name, l_name, age, gender, usertype) VALUES ('$username', '$password', '$f_name', '$l_name', '$age', '$gender', 'User')";
	    $query = $connect->query($sql);
	    if ($query == true){
    	    echo "<script type='text/javascript'>alert('You have successfully registered'); window.location.replace('http://localhost/testfolder/Vicente_EXAM_ITP11Final/ITP11Final/login.php'); </script>";
    	
        }
        
    }
	// close the database connection
	$connect->close();


}