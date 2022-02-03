<?php
  
  require "header.php";
?>
<main>
<?php

    if (isset($_SESSION['userId'])){
		
		  echo '
		  
		  <table class="center">
		  <thead><p>  </p>
		   </thead>
                    <tr bgcolor="#10a0c5" color="#FFFFFF">
                    <th class="login">Delete user</th>
					</tr>
					<td>
		  <form action="deleteuser.php" method="post">
		  ';
		    if (isset($_GET['error'])){
		   if ($_GET['error']=="emptyfield"){
			   echo '<p class="red">Fill in the UID field!</P>';
		   }
		  }
		   if (isset($_GET['delete'])){
			    if ($_GET['delete']=="success"){
			   echo '<p class="green">User successfully deleted!</P>';
		   }
		   else if ($_GET['delete']=="failed"){
			   echo "<p class='red'>User doesn't exist!</P>";
		   }
			   
			   
		   
	  }
		  
		  echo '
		  <p class="login"><input type="text" name="rfid" placeholder="UID"></p>
		  <p class="login"><button type="submit" name="deleteuser-submit" value="submit">Delete</button></P>
		  </form>
		  </td>
		  </table>
		  </div>
		  ';
		  
		
	  }
	  ?>
</main>