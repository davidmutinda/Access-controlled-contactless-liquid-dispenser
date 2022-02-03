<?php
  
  require "header.php";
?>
<main>
<?php
	if (isset($_SESSION['userId'])){
		  echo ' <div>
		  <table class="center">
		  <thead><p>  </p>
		   </thead>
                    <tr bgcolor="#10a0c5" color="#FFFFFF">
                    <th class="login">User registration</th>
					</tr>
					<td>
		  '
		  ; 
		  	  if (isset($_GET['registration'])){
		 if($_GET['registration']=="success"){
			 echo '<p class="green">Registration successful!</P>
			 ';
		 }
		 else if($_GET['registration']=="failed"){
			 echo '<p class="red">Registration failed! UID is already registered</P>
			 ';
		 }
	  }
	   if (isset($_GET['error'])){
		   if ($_GET['error']=="emptyfirst"||"emptylast"||"emptyuid"){
			   echo '<p class="red">Fill in all the required fields!</P>
			   ';
		   }
	   }
		  
		  echo' <form action="newuser.php" method="post">
		  <p class="login"><input type="text" name="fname" placeholder="First name"></p>
		  <p class="login"><input type="text" name="lname" placeholder="Last name"></p>
		  <p class="login"><input type="text" name="rfid" placeholder="UID"></p>
		  <p class="login"><select name="tier">
          <option>Regular</option>
	      <option>Premium</option>
          </select></p>
		  <p class="login"><button type="submit" name="newuser-submit" value="submit">Register</button></p>
		  </form>
		  </td>'
		  ;
		  
	  
	 

	}
	
	  
	  
	  ?>
	   
		 
	  </main>