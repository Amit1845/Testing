<?php 
session_start();
if(isset($_SESSION["ad_session"]))
{
		include("head_inc.php");
		include("../db.php");
		mysqli_query($con,"delete from feedback where fb_id=".$_REQUEST["id"]);
	
		echo "<script>window.location='FeedBackView.php';</script>";
}
	else	 

	echo "<script>window.location='Login.php';</script>";
?>	

<?php

		include("footer_inc.php");
		
?>



