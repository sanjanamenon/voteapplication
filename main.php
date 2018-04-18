<?php
	include('sessions_user.php');
	include ("connect.php");
	$msg = "";
?>
<html>
	<head>
		<title>PU Elections</title>
		<style>
			body {
				background-image:url("2.jpeg");
   				text-align: center;
     			}
			.displaybox {
   				margin: auto;
   				width: 150px;
   				background-color: #FaFaFa;
   				border: 2px solid #000000;
   				padding: 10px;
   				font: 1.5em normal verdana, helvetica, arial, sans-serif;
            		}
			h1 {
				color: white;
			}
			h2 {
				color: white;
			}
			.new-btn { 
				border:none;
				border-radius: 8px;	
				display:inline-block;
				padding:8px 16px;
				text-decoration:none;
				color:black;
				background-color:#ccc;
				text-align:center;
				cursor:pointer;
				position:absolute;
				right:5;
				top:5;	
			}
		</style>

		<script type="text/javascript">
			var ajaxRequest=new XMLHttpRequest();
			function getcandidatelist()  
			{
   				if (!ajaxRequest)  {
         				document.getElementById("showcandidate").innerHTML = "Request error!ajax object could not be created";
         				return;      
				} 
   				ajaxRequest.onreadystatechange = ajaxResponse;
   				ajaxRequest.open("GET","voting.php");
   				ajaxRequest.send();
			}
			function ajaxResponse()  
			{
 				if (ajaxRequest.readyState != 4)  
    				{  return;  }
 				else {
   					if (ajaxRequest.status == 200)
        				{
                 				document.getElementById("showcandidate").innerHTML =
                               			ajaxRequest.responseText; }
   					else {
     					alert("Request failed: " + ajaxRequest.statusText);
        				}
   				}
			}
			function verification()
			{	
				var voted_for=document.getElementById("myform").elements['candidate'].value;
				document.getElementById("showcandidate1").innerHTML=voted_for;
				
				ajaxRequest.open("GET","result.php?sel_candidate="+voted_for);
   				ajaxRequest.send();
				
			}
			var count = 0;
			function changeColor()
			{
				count++;
				var col="grey";
				if(count%2==0)
					col="yellow";
				else
					col="blue";
				document.getElementById('showcandidate').style.backgroundColor=col;
			}
		</script>
	</head>
	<body>
		<h1>PU Elections - Welcome <?php echo $_SESSION["username"];?></h1><a href="logout.php" class="new-btn">Logout</a>

		<h2>List of contenders for the Elections of the year 2017-2018</h2>

		<form method="post" action="voting.php">
   	   		<input type="button" value="Get contender list" onclick="getcandidatelist();"/>
			<input type="button" value="Change color"  onclick="changeColor()"/>
		</form>		

		<div id="showcandidate" class="displaybox">
		</div>
		<br>
		<input type="submit" value="Submit" name="Submit" onclick="verification();"/>
		<br>
		<br>
		<div id="showcandidate1" class="displaybox"></div>
		
	</body>
</html>
