<?php
include_once('../secure.php');
include_once('../../db/db_config.php');
$ob=new db_config();
$edit_id=$_POST['edit_id'];
//
$sql="SELECT * FROM `youtube_videos` WHERE `yv_id`=$edit_id";
$result=mysqli_query($ob->config(),$sql);
$row=mysqli_fetch_assoc($result);
?>
<div class="row">
    <div class="col-md-4">
        <p>Youtube Video Title</p>
    </div>
	<div class="col-md-8">
		<input type="hidden" name="edit_id" id="edit_id" value="<?php echo $edit_id; ?>">
        <input type="text" name="youtube_video_title" id="youtube_video_title" class="form-control" placeholder="Video Title" value="<?php echo $row['yv_video_title']; ?>" required>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <p>Youtube Video Code</p>
    </div>
    <div class="col-md-8">
        <input type="text" name="youtube_video_code" id="youtube_video_code" class="form-control" placeholder="Video Code" value="<?php echo $row['yv_video_code']; ?>" required>
    </div>
</div>
<div class="row">
	<div class="col-md-12">
    	<img src="assets/img/sample-youtube.jpg" class="w-100">
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <input type="submit" name="update" value="Update Youtube Video" class="btn">
    </div>
</div>
