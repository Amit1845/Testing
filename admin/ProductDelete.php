<?php 
session_start();
if(isset($_SESSION["ad_session"]))
{

include("header.php");
		include("../conn.php");
$delsel=mysqli_query($con,"select pro_image from product where pro_id=".$_REQUEST["id"]);
if($r=mysqli_fetch_row($delsel))
{
	unlink("../".$r[0]);
	mysqli_query($con,("delete from product where pro_id=".$_REQUEST['id']));
}

echo "<script>window.location='ProductView.php';</script>";
include("footer.php"); 
}	
	else
		echo "<script>window.location='Login.php';</script>";

?>
