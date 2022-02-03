<?php

  require "database.php";
  
  if(isset($_POST['UIDresult'])){
	 
	  $uid=$_POST['UIDresult'];
  
     $sql= "SELECT * FROM rfidusers WHERE Uid='$uid'";
	 $result=mysqli_query($conn,$sql);
	 $resultcheck= mysqli_num_rows($result);
  
  if($resultcheck > 0){
	  while($row=mysqli_fetch_assoc($result)){
		  $accesstimes = $row['Accesstimes'];
		  $quantity=$row['Quantity'];
		  $firstname=$row['Firstname'];
	  }
	  if($accesstimes>0){
		
		 
		 $accesstimes--;
		 
		  echo $accesstimes;
		 
		 $sql2="UPDATE rfidusers SET Accesstimes=$accesstimes WHERE Uid='$uid'";
		 mysqli_query($conn,$sql2);

		 
		 
	 }
	 else{
		 echo "exceeded";
  }
   $file=fopen("quantity.txt","w");
   fwrite($file,$quantity);
   fclose($file);
   
   $filename=fopen("firstname.txt","w");
   fwrite($filename,$firstname);
   fclose($filename);
  }
	 else{
		 echo "invalid";
	 }
  }