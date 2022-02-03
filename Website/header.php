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
  body {
            background-image: url("img/ACCESS-CONTROL-SLIDER_2.jpg");
         }
		.font {
			font-family: "Times New Roman", Times, serif;
			font-size: 17px;
		}

li {
  float: left;
}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}




li a {
  display: block;
  color: white;
  text-align: center;
  padding: 10px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: red;
  color: white;
}


.active {
  color: white;
  background-color: red;
}

		
table {
  border-collapse: collapse;
  width: 100%;
}
table.center {
  margin-left: auto; 
  margin-right: auto;
 

}

th, td {
	
  
  text-align: left;
  padding: 8px;
}


th {
  background-color: ##0000CD;
  color: white;
}
td{
	 background-color: ;
  color: white;
}
.content {
  background-color:  ;
  padding: 50px;
  margin: 0;
 
}
.title{
  background-color: #333  ;
  text-align: center;
  color: white;
  padding: 10px;
  margin: 0;
}
.login{
	text-align: center;
	padding: 10px;
	font-size: 20px;
}
.home{
	color: #666;
}
.red{
	text-align: center;
	color: red;
}
.green{
	text-align: center;
	color: #90ee90;
}
li {
  border-right: 1px solid #bbb;
}

li:last-child {
  border-right: none;
  
		</style>
  <title>Liquid dispenser</title>
  
  
</head>

<body class="font">
  <header>
  
    <nav>
	  <div>
	  <?php
	  if (isset($_SESSION['userId'])){
		  
		echo  '<div class="home">
		 <ul>
		  <li><a href="index.php">Home</a></li>     
		  <li><a href="registration.php">Register user</a></li>     
		  <li><a href="delete.php">Delete user</a></li>
          <li style="float:right"><a class="active" href="logout.php">Log out</a></li>
		  </ul>
		  
		  </div>';
	  }
		  
		  ?>
	 
	  </div>
	  </nav>
	  </header>