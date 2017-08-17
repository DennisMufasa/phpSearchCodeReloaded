<?php

$serverName="localhost";
$username="root";
$password="";
$dbName="j_max";

$connection=mysqli_connect($serverName,$username,$password,$dbName);

	if ($connection) {
		echo "Connection Successfull";
	}else{
		echo "Failed to connect";
	}

	if (isset($_POST['search'])) {
	
	$searchq=$_POST['search'];



	$query="SELECT title FROM movies WHERE title LIKE '$searchq'";

	$result=mysqli_query($connection,$query) or die("Couldnt connect");

	$count=mysqli_num_rows($result);

	if ($count==0) {
		$output='Not Available';
		echo "$output";
	}else {
		while ($row=mysqli_fetch_array($result)) {
			$movie=$row['title'];
			$output=$movie ;
			echo "$output found" ;
			
		}
	}
	}?>


