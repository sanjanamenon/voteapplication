<?php
session_start();
if(isset($_SESSION['user_sess'])!= TRUE)
{
  echo "<script type='text/javascript'>";
  echo "alert('Sorry! Cannot access this page');";
  echo "</script>";
  $URL="index.php";
  echo "<script> location.href='$URL'</script>";
}
?>
