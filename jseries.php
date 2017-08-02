
<?php

$serverName="localhost";
$username="mufasa";
$password="dennis";
$dbName="j_max";

$connection=mysqli_connect($serverName,$username,$password,$dbName);

	if ($connection) {
		echo "Connection Successfull";
	}else{
		echo "Failed to connect";
	}

	if (isset($_POST['search'])) {
	
	$searchq=$_POST['search'];
	$searchq=preg_replace("#[^0-9a-z]#i","",$searchq);

	$query="SELECT * FROM series WHERE title LIKE '%$searchq%'";

	$result=mysqli_query($connection,$query) or die("Couldnt connect");

	$count=mysqli_num_rows($result);

	if ($count==0) {
		$output='There was no series with that title.';
	}else {
		while ($row=mysqli_fetch_array($result)) {
			$series=$row['title'];
			$output=$series ;
			
		}
	}
	}?>

<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
</head>
<body>
<form action="jseries.php" method="post">
	<input type="text" name="search" placeholder="Enter Series title"/>
	<input type="submit" value=">>"/>
	</form>

	<?php
	print($output);
	
	?>
</body>
</html>