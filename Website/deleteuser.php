<?php
if(isset($_POST['deleteuser-submit'])){
	 require "dbh.php";
	 $uniqueid=$_POST['rfid'];
	 
	 
	if(empty($uniqueid)){
		 header("Location: ../Website/delete.php?error=emptyfield");
		 exit();
	 }
	 else{
		 $sql= "SELECT * FROM rfidusers WHERE Uid='$uniqueid'";
	     $result=mysqli_query($conn,$sql);
	     $resultcheck= mysqli_num_rows($result);
		 
		 if ($resultcheck>0){
             $sql2="DELETE FROM rfidusers WHERE Uid='$uniqueid';";
             mysqli_query($conn,$sql2);
	         header("Location: ../Website/delete.php?delete=success");
	         exit();
		 }
		  else{
			 header("Location: ../Website/delete.php?delete=failed");
		     exit();
		 }
		 

	 }
}