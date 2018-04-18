<?php
	include('connect.php');
	include('sessions_user.php');
	$username = $_SESSION['username'];
   	$sqlq ="select voted from login where idnum=\"$username\"";
	$result=mysqli_query($conn,$sqlq) or die('Error executing query'.mysqli_error($conn));
	$row=mysqli_fetch_array($result);
	if($row['voted']==1)
	{
    		echo "Vote Casted. cannot vote again";

	}
	else
	{	
	$vname= $_GET['sel_candidate'];
	echo $vname."<br/>";
	$query="update vote set votec=votec+1 where vname=\"$vname\"";
	mysqli_query($conn,$query)or die("Error updating the vote");
	echo "Your vote is successful"."<br/>";
	$sqll="update login set voted=voted+1 where idnum=\"$username\"";
	mysqli_query($conn,$sqll)or die("Error updating the vote");
	$sqlm="update login set votedfor=\"$vname\" where idnum=\"$username\"";
	mysqli_query($conn,$sqlm)or die("Error updating the votedfor");
}
?>
