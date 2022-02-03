<?php
  
  require "header.php";
?>

<main>
<?php
if (isset($_SESSION['userId'])){
		 require "dbh.php";
				  $sql = "SELECT * FROM rfidusers;";
				  $result=mysqli_query($conn,$sql);
		  echo '<meta http-equiv="refresh" content="10">';  
		  echo '<div>
		  
		   <table class="center"><thead><p>  </p>
		   </thead>
                    <tr bgcolor="#10a0c5" color="#FFFFFF">
                      <th class="login">First name</th>
					  <th class="login">Last name</th>
                      <th class="login">Uid</th>
					  <th class="login">Quantity</th>
					  <th class="login">Access times</th>
                    </tr>
                  </thead>';
				  
				 echo'<tbody>';
				 while($row = mysqli_fetch_array($result)){
                    echo "<tr >";
                    echo "<td class='login'>" . $row['Firstname'] . "</td>";
					echo "<td class='login'>" . $row['Lastname'] . "</td>";
                    echo "<td class='login'>" . $row['Uid'] . "</td>";
					echo "<td class='login'>" . $row['Quantity'] . "</td>";
				    echo "<td class='login'>" . $row['Accesstimes'] . "</td>";
                    echo "</tr>";
					echo "</tbody>";
					 }
                    echo "</table>
					</div>";

                      mysqli_close($conn);
                 
                  
              
		  
	  }
	  else{
		  echo '<h4 class="title"><p class="login">ACCESS CONTROLLED LIQUID DISPENSER</p></h4>
		  <table class="center">
		  <thead><p>  </p>
		   </thead>
                    <tr bgcolor="#10a0c5" color="#FFFFFF">
                    <th class="login">Admin login</th>
					</tr>
					<td>';
			
			if (isset($_GET['error'])){
		   if ($_GET['error']=="emptyfields"){
			   echo '<p class="red">Fill in all the fields!</P>';
		   }
		   else if ($_GET['error']=="nouser"){
			   echo '<p class="red">Invalid username!</P>';
		   
		   }
	   else if ($_GET['error']=="wrongpassword"){
			   echo '<p class="red">Wrong password!</P>';}
		}
		
			echo '
		  <form action="login.php" method="post">
		  <p class="login"><input type="text" name="useruid" placeholder="Username"></p>
		  <p class="login"><input type="password" name="pwd" placeholder="Password"></p>
		  <p class="login"><button type="submit" name="login-submit">Log in</button></p>
		       </form>
			   </td>
			   </table>
		  ';
		
	
	 
	  }
	  
	  
	  ?>
	   
		 
	  </main>
	 