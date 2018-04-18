<?php
include("connect.php");
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST")
 {

 $username = mysqli_real_escape_string($conn,$_POST['username']);
 $password = mysqli_real_escape_string($conn,$_POST['password']);
 $query_select="select * from login";
 $select_result= mysqli_query($conn,$query_select)
   or die ('error selecting');

 while ($row=mysqli_fetch_array($select_result))
 {
   if ($row['idnum']==$username)
   {
     if($row['password']==$password)
     {
     	if($row['type']==1)
     	{
       		$_SESSION["username"] = $row['idnum'];
       		$_SESSION['adminlogin'] = TRUE;
      		header("location: basic.php");
      	}
       if($row['type']==0)
       	{	$_SESSION["username"] = $row['idnum'];
       		$_SESSION['user_sess'] = TRUE;
      		header("location: main.php");
     	}
     }
     else
     {
       echo "<script type='text/javascript'>
       alert('Incorrect Password')</script>";
     }
   }
 }
 }

 echo "INVALID USERNAME/PASSWORD!!You are not a member yet. Please <a href='signup.html'>click here to sign up</a>";
 mysqli_close($db);
?>
