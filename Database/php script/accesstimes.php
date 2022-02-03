<?php

  require "database.php";
  $access='';
  $access2='';
  
  
  if(isset($_POST['Resetaccess'])){
	  $sql1="SELECT * FROM rfidusers;";
	  $result=mysqli_query($conn,$sql1);
	  $resultcheck= mysqli_num_rows($result);
  
     if($resultcheck > 0){
			  $access='5';
	          $sql2 ="UPDATE rfidusers SET Accesstimes='$access' WHERE Quantity='300';";
	          mysqli_query($conn,$sql2);
			  
		  
		
			  $access2='3';
		      $sql3 ="UPDATE rfidusers SET Accesstimes='$access2' WHERE Quantity='200';";
	          mysqli_query($conn,$sql3);
		  
		  
		
	  }
	  
	  
	 }
	 
		 
		 
	 
	  
	  
	  
	  
	  
	  
  