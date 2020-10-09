<?php
include_once('../secure.php');
include_once('../../db/db_config.php');
$ob=new db_config();
$edit_ticker_id=$_POST['edit_ticker_id'];
$sql="SELECT * FROM `ticker` WHERE ticker_id=$edit_ticker_id";
$result=mysqli_query($ob->config(),$sql);
$row=mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="post" action="cont/action_edit_ticker.php">
            <div class="row">
              <div class="col-md-12">
                <h2>ٹکر ٹائٹل</h2>
              </div>
            </div>
            <div class="row">
            	<input type="hidden" name="ticker_id" value="<?php echo $edit_ticker_id; ?>">
              <div class="col-md-12">
                <input type="text" name="ticker_title" class="form-control" required="required" value="<?php echo $row['ticker_title'] ?>">
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <p>ریفر نیوز آئی ڈی</p>
              </div>
              <div class="col-md-8">
                <input type="text" name="news_id" class="form-control" required="required" value="<?php echo $row['refer_news_id'] ?>">
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <input type="submit" name="update_ticker" class="btn btn-primary" value="Update News Ticker">
              </div>
            </div>
          </form>
</body>
</html>