<?php
include_once('../secure.php');
include_once('../../db/db_config.php');
$ob=new db_config();
//
$hl_id=$_POST['edit_hl_id'];
$sql_hl="SELECT * FROM `headlines` WHERE `headline_id`=$hl_id";
$result_hl=mysqli_query($ob->config(),$sql_hl);
$row_hl=mysqli_fetch_assoc($result_hl);
?>
<div class="row">
    <div class="col-md-12">
    	<input type="hidden" name="edit_id" id="edit_id" value="<?php echo $hl_id; ?>">
        <h2 style="text-align: right;">ہیڈ لائن ٹائٹل</h2>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <input type="text" name="title" id="title" class="form-control" value="<?php echo $row_hl['headline_title']; ?>" required="required" style="text-align: right;">
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h2 style="text-align: right;">ہیڈ لائن ڈسکرپشن</h2>
    </div>
    <div class="col-md-12">
        <textarea class="form-control" id="description" name="description" style="text-align: right;"><?php echo $row_hl['headline_description']; ?></textarea>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h2 style="text-align: right;">اپ لوڈ امیج</h2>
        <p>Image Size: 900 x 300</p>
    </div>
    <div class="col-md-12">
        <input type="file" name="image" id="image" class="form-control" accept="image/*">
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h2 style="text-align: right;">ریفر نیوز آئی ڈی</h2>
        <p>Deault value is 0</p>
    </div>
    <div class="col-md-12">
        <input type="number" name="refer_id" id="refer_id" value="<?php echo $row_hl['headline_refer_news_id']; ?>" class="form-control" required>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h2 style="text-align: right;">ٹیکسٹ کلر</h2>
    </div>
    <div class="col-md-12">
        <input type="text" name="text_color" id="text_color" value="<?php echo $row_hl['headline_text_color']; ?>" class="form-control" required>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <input type="submit" name="update_headline" class="btn btn-primary" value="Update Headline">
    </div>
</div>