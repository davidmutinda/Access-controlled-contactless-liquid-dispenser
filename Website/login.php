<?php
if(isset($_POST['login-submit'])){
	 require "dbh.php";
	 
	 $uid=$_POST['useruid'];
	 $password=$_POST['pwd'];
	 
	 if(empty($uid)||empty($password)){
		 header("Location: ../Website/index.php?error=emptyfields&uid=".$uid);
		 exit();
	 }
	 else{
		$sql="SELECT * FROM admin WHERE Username=?;";
		$stmt= mysqli_stmt_init($conn);
	    
		if(!mysqli_stmt_prepare($stmt,$sql)){
					header("Location: ../Website/index.php?error=sqlerror");
					exit();
				}
		else{
		 mysqli_stmt_bind_param($stmt,'s',$uid);
		 mysqli_stmt_execute($stmt);
		 $result=mysqli_stmt_get_result($stmt);
	     if ($row=mysqli_fetch_assoc($result)){
		
			  $pass=$row['Password'];
		      
	       if($pass==$password){
		      session_start();
		      $_SESSION['userId']=$row['Id'];
              //$_SESSION['userUid']=$row['Username'];		  
		      header("Location: ../Website/index.php?login=success");
		      exit();
		  
	  }
	  else{
		  header("Location: ../Website/index.php?error=wrongpassword");
		  exit();
	  }
		}
		else{
				header("Location: ../Website/index.php?error=nouser");
				exit();
			}
	 }
		}
  
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}
else{
	 header("Location: ../index.php");
	 exit();
}
			
			
			
	    