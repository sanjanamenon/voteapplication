<?php
	include('connect.php');
	$query="select * from vote";
	$result=mysqli_query($conn,$query) or die("Error querying the database");
	echo '<form id="myform">';
	while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		echo '<input type="radio" name="candidate" id="name1" value="'.$row['vname'].'">'.$row['vname'].'</input><br/>';
	}
	echo '</form>';
	
?>
