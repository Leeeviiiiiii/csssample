<?php
	session_start();
	session_unset();
	session_destroy();
	echo "<script type='text/javascript'>alert('Logged out successfully!'); window.location.replace('http://localhost/testfolder/Vicente_EXAM_ITP11Final/ITP11Final'); </script>";
?>