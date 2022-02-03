<?php
session_start();

?>
<html>
<head>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="js/bootstrap.min.js"></script>
  <style>
		html {
			font-family: Arial;
			display: inline-block;
			margin: 0px auto;
			text-align: center;
		}

		ul.topnav {
			list-style-type: none;
			margin: auto;
			padding: 0;
			overflow: hidden;
			background-color: #4CAF50;
			width: 70%;
		}

		ul.topnav li {float: left;}

		ul.topnav li a {
			display: block;
			color: white;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
		}

		ul.topnav li a:hover:not(.active) {background-color: #3e8e41;}

		ul.topnav li a.active {background-color: #333;}

		ul.topnav li.right {float: right;}

		@media screen and (max-width: 600px) {
			ul.topnav li.right, 
			ul.topnav li {float: none;}
		}
		
		.table {
			margin: auto;
			width: 90%; 
		}
		
		thead {
			color: #FFFFFF;
		}
		</style>
  <title>Liquid dispenser</title>
  
</head>
<body>
<h2>ACCESS CONTROLLED LIQUID DISPENSER</h2>

  <header>
  
    <nav>
	
	  <div>
	    <?php
		
	   $uniqueid=$_POST['rfid'];
	  if(isset($_POST['askdelete-submit'])){
		   require "dbh.php";
	 
	       // $uniqueid=$_POST['rfid'];
	 
	 if(empty($uniqueid)){
		 header("Location: ../Website/delete.php?error=emptyfield");
		 exit();
	 }
	 else{
		 $sql= "SELECT * FROM rfidusers WHERE Uid='$uniqueid'";
	     $result=mysqli_query($conn,$sql);
	     $resultcheck= mysqli_num_rows($result);
		 if ($resultcheck>0){
	  
	  if (isset($_SESSION['userId'])){
		   echo '
		  <p><a href="index.php">Home</a></p>    
		  <p><a href="registration.php">Register user</a></p>     
		  <p><a href="delete.php">Delete user</a></p>
		
		  ';
		  echo '<form action="logout.php" method="post">
		  <button type="submit" name="logout-submit">Log out</button>
		</form>';
		
		  echo '<p>Proceed with deleting user?</p>
		  <form action="deleteuser.php" method="post">
		  <button type="submit" name="deleteuser-submit" value="submit">Confirm</button>
		  </form>
		  ';
		  }
	  }
	   else{
			 header("Location: ../Website/delete.php?delete=failed");
		     exit();
		 }
	  }
	  }