<?php
if(isset($_POST['newuser-submit'])){
	 require "dbh.php";
	 
	 $uniqueid=$_POST['rfid'];
	 $firstname=$_POST['fname'];
	 $lastname=$_POST['lname'];
     $tier=$_POST['tier'];
	 $quantity='';
	 $access='';
	 // $access=$_POST['accesstimes'];
	 
	
	 if(empty($firstname)){
		 header("Location: ../Website/registration.php?error=emptyfirst");
		 exit();
	 }
	  else if(empty($lastname)){
		 header("Location: ../Website/registration.php?error=emptylast");
		 exit();
	  }
	   else if(empty($uniqueid)){
		 header("Location: ../Website/registration.php?error=emptyuid");
		 exit();
	 }
	 else {
		 if ($_POST['tier']=='Premium'){
			 $quantity='200';
			 $access='5';
			 
		 }
		 else if ($_POST['tier']=='Regular'){
			 $quantity='100';
			 $access='3';	 
		 }
		 $sql="INSERT INTO rfidusers(Firstname,Lastname,Uid,Quantity,Accesstimes) VALUES ('$firstname','$lastname','$uniqueid','$quantity','$access');";
		 
		 $result=mysqli_query($conn,$sql);
	     
		 
		  if($result > 0){
			   header("Location: ../Website/registration.php?registration=success");
		       exit();
		  }
		  else{
			   header("Location: ../Website/registration.php?registration=failed");
		       exit();
			  
		  }
		
		 
	 }

	 
	 
	 }