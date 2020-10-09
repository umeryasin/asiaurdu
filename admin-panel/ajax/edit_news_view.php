<!DOCTYPE html>
<?php
include_once('../secure.php');
include_once('../../db/db_config.php');
$ob=new db_config();
$edit_id=$_POST['edit_id'];
?>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post" action="cont/change_edit_image.php" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-12">
				<?php
				$sql_im="SELECT * FROM `news_article` WHERE article_id=$edit_id";
				$result_im=mysqli_query($ob->config(),$sql_im);
				$row_im=mysqli_fetch_assoc($result_im);
				 echo '<img src="../upload/article/'.$row_im['article_image'].'" class="img-responsive" alt="No Image" style="width:100%;" >';
				?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<p>Change Image</p>
			</div>
			<div class="col-md-8">
				<input type="file" name="img_change" class="form-control" required="required">
			</div>
		</div>
		<div class="row">
			<input type="hidden" name="article_id" value="<?php echo $edit_id; ?>">
			<div class="col-md-12">
				<input type="submit" name="chnage_imgage" class="btn btn-primary" value="Change Image">
			</div>
		</div>
	</form>
</body>
</html>