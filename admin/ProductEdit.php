<?php
session_start();
if(isset($_SESSION["ad_session"]))
{

include("../conn.php");
if(isset($_REQUEST["pro_upd"]))
{
	if($_FILES["pro_img"]["name"]=="")
		$path=$_REQUEST["old_img"];
	else
	{
		$path="upload/".$_FILES["pro_img"]["name"];
		move_uploaded_file($_FILES["pro_img"]["tmp_name"],"../".$path);
		unlink("../".$_REQUEST["old_img"]);
	}
	mysqli_query($con,"update product set cat_id=".$_REQUEST["cat_id"].",pro_name='".$_REQUEST["pro_name"]."',pro_detail='".$_REQUEST["pro_detail"]."',pro_price=".$_REQUEST["pro_price"].",pro_image='".$path."' where pro_id=".$_REQUEST["proid"]);
	echo "<script>window.location='ProductView.php';</script>";
}
}	
	else
		echo "<script>window.location='Login.php';</script>";

?>