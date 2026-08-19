<?php 
session_start();
if(isset($_SESSION["ad_session"]))
{
include "header.php"; 
include("../conn.php");
$selcat=mysqli_query($con,"select * from category")
?>

<center>
		<form name="form1" method="post" enctype="multipart/form-data">
		<h1>Backery Data</h1>
		<table border="3">
	
			<tr>
				<td>cat_id</td>
				<td>
					<select name="cat_id">
					<?php
					while($cat=mysqli_fetch_array($selcat))
					{
						?>
							<option value="<?php echo $cat[0]; ?>"><?php echo $cat[1]; ?></option>
						<?php
					}
					?>
					</select>
				</td>
			</tr>

			<tr>
				<td>pro_name  </td>
				<td><input type="text" name="pro_name" /></td>
			</tr>
			
			<tr>
				<td>pro_detail</td>
				<td><input type="text" name="pro_detail" /></td>
			</tr>
			
			<tr>
				<td>pro_price</td>
				<td><input type="text" name="pro_price" /></td>
			</tr>

			<tr>
				<td>pro_image</td>
				<td><input type="file" name="pro_img" /></td>
			</tr>
			
			<tr align="center">
				<td colspan="2"> <input type="submit" name="sub" value="submit" /></td>
			</tr>
		</table>
		
		</form>
</center>
	</body>
</html>
<?php
	include "footer.php";
	
	
	if(isset($_POST["sub"]))
	{
		$cid=$_POST["cat_id"];
		$nm=$_POST["pro_name"];
		$dt=$_POST["pro_detail"];
		$pr=$_POST["pro_price"];
		$path="upload/".$_FILES["pro_img"]["name"];
		move_uploaded_file($_FILES["pro_img"]["tmp_name"],"../".$path);
		mysqli_query($con,"insert into product values(null,'$cid','$nm','$dt','$pr','$path')");
		
		echo "<script>window.location='ProductView.php';</script>";
	}
}	
	else
		echo "<script>window.location='Login.php';</script>";

?>