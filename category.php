<?php
include('db/db_config.php');
$ob=new db_config();
$id=$_GET['i'];
$sql_all="SELECT * FROM `news_categories` WHERE news_categories_id=$id";
$result_all=mysqli_query($ob->config(),$sql_all);
$row_all=mysqli_fetch_assoc($result_all);
$pg=$_GET['pg'];
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- SITE META -->
    <title><?php echo $row_all['news_categories']; ?> | AsiaUrdu</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <?php include('common_meta.php'); ?>

    <!-- FAVICONS -->
    <link rel="shortcut icon" href="images/favi.png" type="image/x-icon">
    
    <!-- TEMPLATE STYLES -->
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <script src="fontawesome/js/all.js"></script>

    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>
<body>

      <div class="left-menu hidden-sm hidden-md hidden-xs">
        <ul class="dm-social">
            <li class="facebookbg"><a href="#" class="fa fa-facebook" data-toggle="tooltip" data-placement="right" title="Facebook">Facebook</a></li>
            <li class="googlebg"><a href="#" class="fa fa-google-plus" data-toggle="tooltip" data-placement="right" title="Google+">Google+</a></li>
            <li class="twitterbg"><a href="#" class="fa fa-twitter" data-toggle="tooltip" data-placement="right" title="Twitter">Twitter</a></li>
            <li class="pinterestbg"><a href="#" class="fa fa-pinterest" data-toggle="tooltip" data-placement="right" title="Pinterest">Pinterest</a></li>
            <li class="linkedinbg"><a href="#" class="fa fa-linkedin" data-toggle="tooltip" data-placement="right" title="Linkedin">Linkedin</a></li>
            <li class="rssbg"><a href="#" class="fa fa-rss" data-toggle="tooltip" data-placement="right" title="RSS">RSS</a></li>
            <li class="share"><a href="#" class="fa fa-share-alt" data-toggle="tooltip" data-placement="right" title="91k Share"></a></li>
        </ul>
      </div>

    <!-- START SITE -->

    <div id="wrapper">
        <!-- start logo-wrapper -->
        <?php include_once('nav/logo-wrapper.php'); ?>
        <!-- end logo-wrapper -->

        <!-- start header-->
        <?php include_once('nav/header.php'); ?>        
        <!-- end header -->

        <section class="section bgg">
            <div class="container">    
                <div class="title-area">
                    <h2><?php echo $row_all['news_categories']; ?>
                    <small class="hidden-xs">
                        </small></h2>
                    <div class="bread">
                        <ol class="breadcrumb">
                            <li><a href="index.php">صفحۂ اول</a></li>
                            <li class="active"><?php echo $row_all['news_categories']; ?></li>
                        </ol>
                    </div><!-- end bread -->
                </div><!-- /.pull-right -->
            </div><!-- end container -->
        </section>

        <div class="container sitecontainer single-wrapper bgw">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 m22">
                    <div class="widget">
                        <div class="large-widget m30">
                        	<?php
                	if (isset($_GET['pageno']))
                		{
				            $pageno = $_GET['pageno'];
				        } 
				        else 
				        {
				            $pageno = 1;
				        }
				        $no_of_records_per_page = 10;
				        $offset = ($pageno-1) * $no_of_records_per_page;

				       
				        $total_pages_sql = "SELECT COUNT(*) FROM news_article WHERE article_category_id=$id";
				        $result = mysqli_query($ob->config(),$total_pages_sql);
				        $total_rows = mysqli_fetch_array($result)[0];
				        $total_pages = ceil($total_rows / $no_of_records_per_page);

				        $sql = "SELECT * FROM news_article WHERE article_category_id=$id ORDER BY article_id DESC LIMIT $offset, $no_of_records_per_page";
				        $res_data = mysqli_query($ob->config(),$sql);
				        while($row = mysqli_fetch_array($res_data))
				        {
				            //here goes the data
				        ?>

                            <div class="post clearfix">
                                <div class="post-media">
                                    <a href="article.php?newsid=<?php echo $row['article_id'].'&q='.$row['aricle_permalink']; ?>">
                                        <?php
                                        echo '<img src="upload/article/'.$row['article_image'].'" class="img-responsive" alt="No Image" >';
                                        ?>
                                    </a>
                                </div>
                                <div class="large-post-meta">
                                    <!--Name-->
                                </div><!-- end meta -->
                                <div class="large-widget-title text-right">
                                    <a href="article.php?newsid=<?php echo $row['article_id'].'&q='.$row['aricle_permalink']; ?>">
                                    <?php echo $row['article_title']; ?>
                                	</a>
                                </div>
                                <div class="large-widget-title text-right">
                                    <a href="article.php?newsid=<?php echo $row['article_id'].'&q='.$row['aricle_permalink']; ?>" class="btn btn-primary">مزید پڑھیں</a>
                                </div>
                                <div class="post-share">
                                    <div class="customshare">
                                         <span class="list">
                                            <strong><i class="fa fa-share-alt"></i>
                                            <a href="#" class="tw"><i class="fab fa-twitter"></i></a>
                                            <a href="#" class="fb"><i class="fab fa-facebook"></i></a>
                                            </strong>
                                        </span>
                                    </div>
                                </div><!-- end share -->
                            </div><!-- end post -->
                            <hr>
                        <?php
                    	}
                        ?>

                        </div><!-- end large-widget -->
                    </div><!-- end widget -->

                    <div class="pagination-wrapper">
                        <nav>
                          <ul class="pagination">
                            <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                            	<a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?i=$id&pg=$pg&pageno=".($pageno - 1); } ?>">Prev</a>
                            </li>
                            <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                            	<a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?i=$id&pg=$pg&pageno=".($pageno + 1); } ?>">Next</a>
                            </li>
                          </ul>
                        </nav>
                    </div>
                </div><!-- end col -->



                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="widget">
                        <div class="widget-title">
                            <h4>Latest Videos
                                <span style="float: right;">
                                لیٹیسٹ ویڈیوز   
                                </span> 
                            </h4>
                            <hr>
                        </div><!-- end widget-title -->

                        <div class="review-posts m30">
                            <?php
                        $sql_latest_vid="SELECT * FROM `youtube_videos` ORDER BY yv_id DESC LIMIT 7";
                        $result_latest_vid=mysqli_query($ob->config(),$sql_latest_vid);
                        while($row_latest_vid=mysqli_fetch_assoc($result_latest_vid))
                        {
                        ?>
                            <div class="post-review">
                                <div class="post-media entry">
                                    <iframe width="100%" height="100%" src="https://www.youtube.com/embed/<?php echo $row_latest_vid['yv_video_code']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div><!-- end media -->
                                <div class="post-title text-right">
                                    <h3>
                                        <a href="">
                                           <?php echo $row_latest_vid['yv_video_title']; ?> 
                                        </a>
                                    </h3>
                                </div><!-- end post-title -->
                            </div><!-- end post-review -->
                             <?php
                            }   
                            ?>
                            <hr>
                        </div><!-- end review-posts -->
                    </div><!-- end widget -->   
                </div><!-- end col -->

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="widget">
                        <div class="widget-title text-right">
                            <h4>سوشل میڈیا</h4>
                            <hr>
                        </div><!-- end widget-title -->
                         <!--social-media--start-->
                        <?php include('nav/social_media_side_bar.php'); ?>
                        <!--social-media--end-->
                    </div>

                    <div class="widget hidden-xs">
                        <div class="widget-title text-right">
                            <h4>اشتہار</h4>
                            <hr>
                        </div><!-- end widget-title -->
                         <!--ad-side-bar-1-start-->
                        <?php include('nav/side_bar_ad_1.php'); ?>
                        <!--ad-side-bar-1-end-->
                    </div><!-- end widget -->
                    <div class="widget hidden-xs">
                        <div class="widget-title text-right">
                            <h4>اشتہار</h4>
                            <hr>
                        </div><!-- end widget-title -->
                         <!--ad-side-bar-2-start-->
                         <?php include('nav/side_bar_ad_2.php'); ?>
                         <!--ad-side-bar-2-end-->
                    </div><!-- end widget -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
        <!--footer--start-->
        <?php include_once('nav/footer.php'); ?>
        <!--foooter--end-->
    </div><!-- end wrapper -->
    <!-- END SITE -->

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/plugins.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
      $("#<?php echo $pg; ?>").addClass("active");
        });
    </script>
  
</body>
</html>