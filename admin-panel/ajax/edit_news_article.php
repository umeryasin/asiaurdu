<?php
include_once('../secure.php');
include_once('../../db/db_config.php');
$ob=new db_config();
$content_id=$_POST['content_id'];
$sql_get_d="SELECT * FROM `news_article` WHERE article_id=$content_id";
$result_get_d=mysqli_query($ob->config(),$sql_get_d);
$row_get_d=mysqli_fetch_assoc($result_get_d);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post" action="cont/update_article_content.php">
		<input type="hidden" name="article_iid" value="<?php echo $row_get_d['article_id']; ?>">
		<div class="row">
			<div class="col-md-12">
				<p>آرٹیکل کا ٹائٹل</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<input type="text" name="article_title" class="form-control" required="required" placeholder="Title Here" value="<?php echo $row_get_d['article_title']; ?>">
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<p>Article Permalink (In English)</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<input type="text" name="article_permalink" class="form-control" required="required" value="<?php echo $row_get_d['aricle_permalink']; ?>">
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<p>آرٹیکل کی کیٹگری</p>
			</div>	
		</div>
		<div class="row">
			<div class="col-md-12">
				<select name="article_category" class="form-control" required="required">
					<?php
					$cat_id=$row_get_d['article_category_id'];
					$sql_cat="SELECT * FROM `news_categories` WHERE news_categories_id=$cat_id";
					$result_cat=mysqli_query($ob->config(),$sql_cat);
					$row_cat=mysqli_fetch_assoc($result_cat);
					echo "<option value='".$row_cat["news_categories_id"]."'>".$row_cat["news_categories"]."</option>"
					?>
					<?php
					$sql_all_cat="SELECT * FROM `news_categories` WHERE news_categories_id!=$cat_id";
					$result_all_cat=mysqli_query($ob->config(),$sql_all_cat);
					while($row_all_cat=mysqli_fetch_assoc($result_all_cat))
					{
						?>
						<option value="<?php echo $row_all_cat['news_categories_id']; ?>"><?php echo $row_all_cat['news_categories']; ?></option>
						<?php
					}
					?>			
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<p>آرٹیکل کونٹینٹ</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<textarea class="form-control" style="min-height: 400px;" name="article_content" required="required"><?php echo $row_get_d['article_content']; ?></textarea>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<input type="submit" name="update" value="Update" class="btn btn-primary">
			</div>
		</div>
	</form>
</body>
</html>