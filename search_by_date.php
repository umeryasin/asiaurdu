<?php
include('db/db_config.php');
$ob=new db_config();
$q=$_GET['cal'];
$sql_q="SELECT * FROM `news_article` WHERE `aricle_date`='$q' ORDER BY article_id DESC";
$result_q=mysqli_query($ob->config(),$sql_q);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- SITE META -->
    <title><?php echo $q; ?> | AssiaUrdu</title>
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
                    <h2>
                        <?php 
                        echo $q;
                        ?>
                    </h2>
                    <div class="bread">
                        <ol class="breadcrumb">
                            <li><a href="./">
                                 صفحۂ اول
                            </a></li>
                            <li class="active"><?php echo $q; ?></li>
                        </ol>
                    </div><!-- end bread -->
                </div><!-- /.pull-right -->
            </div><!-- end container -->
        </section>

        <div class="container sitecontainer single-wrapper bgw">
            <div class="row">
                <div class="col-md-9 col-sm-12 col-xs-12 m22">

                    <div class="widget searchwidget">
                        <?php
                        while($row_q=mysqli_fetch_assoc($result_q))
                        {
                        ?>
                        <div class="large-widget m30">
                            <div class="post row clearfix">
                                <div class="col-md-5">
                                    <div class="post-media">
                                        <a href="article.php?newsid=<?php echo $row_q['article_id'].'&q='.$row_q['aricle_permalink']; ?>">
                                            <?php
                                        echo '<img src="upload/article/'.$row_q['article_image'].'" class="img-responsive" />';
                                            ?>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-md-7">
                                    <div class="title-area">
                                        <div class="colorfulcats">
                                            <a href="#"><span class="label label-primary">
                                                <?php
                                                    $cat_id=$row_q['article_category_id'];
                                                    $sql_get_cat_name="SELECT * FROM `news_categories` WHERE news_categories_id=$cat_id";
                                                    $result_get_cat_name=mysqli_query($ob->config(),$sql_get_cat_name);
                                                    $row_get_cat_name=mysqli_fetch_assoc($result_get_cat_name);
                                                    echo $row_get_cat_name['news_categories'];
                                                    ?>
                                            </span></a>
                                        </div>
                                        <a href="article.php?newsid=<?php echo $row_q['article_id'].'&q='.$row_q['aricle_permalink']; ?>">
                                            <h3>
                                            <?php
                                            echo $row_q['article_title'];
                                            ?>
                                            </h3>
                                        </a>

                                        <div class="large-post-meta">
                                            <span><a href="#"><i class="fas fa-clock"></i>
                                                <?php
                                        $article_date=$row_q['aricle_date'];
                                        $old_date = date($article_date);             
                                        $old_date_timestamp = strtotime($old_date);
                                        $new_date = date('Y M d', $old_date_timestamp);
                                        echo $new_date; 
                                        ?>
                                            </a></span>
                                            <small class="hidden-xs">&#124;</small>
                                            <span class="hidden-xs"><a href="#"><i class="fa fa-eye"></i>
                                                <?php
                                            echo $row_q['article_views'];
                                            ?>
                                            </a></span>
                                        </div><!-- end meta -->
                                    </div><!-- /.pull-right -->
                                </div>
                            </div><!-- end post -->
                        </div><!-- end large-widget -->
                        <?php
                        }
                        ?>

                       
                    </div><!-- end widget -->

                </div><!-- end col -->

                <div class="col-md-3 col-sm-12 col-xs-12">
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
                            <h4>اشتیار</h4>
                            <hr>
                        </div><!-- end widget-title -->
                        <!--ad-side-bar-1-start-->
                        <?php include('nav/side_bar_ad_1.php'); ?>
                        <!--ad-side-bar-1-end-->
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
  
</body>
</html>