<?php
include('db/db_config.php');
$ob=new db_config();
$article_id=$_GET['newsid'];
$sql_all="SELECT * FROM `news_article` WHERE article_id=$article_id";
$result_all=mysqli_query($ob->config(),$sql_all);
$row_all=mysqli_fetch_assoc($result_all);
//update_views
$views=$row_all['article_views'];
$views=$views+1;
$sql_views="UPDATE `news_article` SET `article_views`=$views WHERE article_id=$article_id";
$result_views=mysqli_query($ob->config(),$sql_views);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- SITE META -->
    <title><?php echo $row_all['article_title']; ?> | AsiaUrdu</title>
    <meta name="description" content="<?php echo $row_all['article_content']; ?>">
    <meta name="author" content="AsiaUrdu">
    <meta name="keywords" content="AsiaUrdu">
    <?php include('common_meta.php'); ?>
    <!--
    <meta property="og:image" content="https://asiaurdu.com/upload/article/<?php echo $row_all['article_image']; ?>?t=12345?" />-->

        <!-- Twitter -->
    <meta name="twitter:site" content="@asiaurdu1">
    <meta name="twitter:creator" content="@asiaurdu1">
    <meta name="twitter:card" content="https://asiaurdu.com/upload/article/<?php echo $row_all['article_image']; ?>?t=12345?">
    <meta name="twitter:title" content="<?php echo $row_all['article_title']; ?>">
    <meta name="twitter:description" content="<?php echo substr($row_all['article_content'], 0, 100); ?>">
    <meta name="twitter:image" content="https://asiaurdu.com/upload/article/<?php echo $row_all['article_image']; ?>?t=12345?">

    <!-- Facebook -->
    <meta property="og:url" content="https://asiaurdu.com/article.php?newsid=<?php echo $article_id; ?>&q=<?php echo $row_all['aricle_permalink']; ?>">
    <meta property="og:title" content="<?php echo $row_all['article_title']; ?>">
    <meta property="og:description" content="<?php echo substr($row_all['article_content'], 0, 100); ?>">

    <meta property="og:image" content="https://asiaurdu.com/upload/article/<?php echo $row_all['article_image']; ?>?t=12345?">
    <meta property="og:image:secure_url" content="https://asiaurdu.com/upload/article/<?php echo $row_all['article_image']; ?>?t=12345?">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">

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

        <div class="container sitecontainer single-wrapper bgw">
            <div class="row">
                <div class="col-md-9 col-sm-9 col-xs-12 m22 single-post">
                    <div class="widget">
                        <div class="large-widget m30">
                            <div class="post clearfix">

                                <div class="title-area">
                                    <div class="bread">
                                        <ol class="breadcrumb">
                                            <li><a href="index.php">صفحۂ اول</a></li>
                                            <li class="">
                                                <a href="#">
                                                    <?php
                                                    $cat_id=$row_all['article_category_id'];
                                                    $sql_get_cat_name="SELECT * FROM `news_categories` WHERE news_categories_id=$cat_id";
                                                    $result_get_cat_name=mysqli_query($ob->config(),$sql_get_cat_name);
                                                    $row_get_cat_name=mysqli_fetch_assoc($result_get_cat_name);
                                                    echo $row_get_cat_name['news_categories'];
                                                    ?>
                                                </a>
                                            </li>
                                            <li class="active">
                                                <?php
                                                echo $row_all['article_title'];
                                                ?>
                                            </li>
                                        </ol>
                                    </div><!-- end bread -->
                                    <div class="colorfulcats">
                                        <a href="#"><span class="label label-primary">
                                            <?php
                                            echo $row_get_cat_name['news_categories'];
                                            ?>
                                        </span></a>
                                    </div>
                                    <h3 class="text-right">
                                    <?php
                                    echo $row_all['article_title'];
                                    ?>
                                    </h3>
                                    <div class="large-post-meta text-right">
                                        <span><a href="#"><i class="fas fa-calendar"></i>
                                        <?php
                                        $article_date=$row_all['aricle_date'];
                                        $old_date = date($article_date);             
                                        $old_date_timestamp = strtotime($old_date);
                                        $new_date = date('Y M d', $old_date_timestamp);
                                        echo $new_date; 
                                        ?>
                                        </a></span>
                                        <small class="hidden-xs">&#124;</small>
                                        <span><a href="#"><i class="fas fa-clock"></i>
                                            <?php
                                            echo $row_all['article_time'];
                                            ?>
                                        </a></span>
                                        <small class="hidden-xs">&#124;</small>
                                        <span><a href="#"><i class="fa fa-eye"></i>
                                            <?php
                                            echo $row_all['article_views'];
                                            ?>
                                        </a></span>
                                    </div><!-- end meta -->
                                </div><!-- /.pull-right -->

                                <div class="post-media">
                                    <a href="article.php?newsid=<?php echo $row_all['article_id'].'&q='.$row_all['aricle_permalink']; ?>">
                                        <!--<img alt="" src="upload/single.jpg" class="img-responsive">-->
                                        <?php
                                        echo '<img src="upload/article/'.$row_all['article_image'].'" class="img-responsive" />';
                                        ?>
                                    </a>
                                </div>

                            </div><!-- end post -->

                            <div class="post-desc text-right">
                                <?php echo $row_all['article_content']; ?>
                                <div class="post-sharing">
                                    <ul class="list-inline">
                                        <li><a href="https://www.facebook.com/sharer/sharer.php?u=http://asiaurdu.com/article.php?newsid=<?php echo $row_all['article_id'].'&q='.$row_all['aricle_permalink']; ?>" target="_blank" class="fb-button btn btn-primary"><i class="fab fa-facebook"></i> <span class="hidden-xs">Share on Facebook</span></a></li>
                                        <li><a href="http://www.twitter.com/share?url=http://asiaurdu.com/article.php?newsid=<?php echo $row_all['article_id'].'&q='.$row_all['aricle_permalink']; ?>" target="_blank" class="tw-button btn btn-primary"><i class="fab fa-twitter"></i> <span class="hidden-xs">Tweet on Twitter</span></a></li>
                                        <li><a href="https://wa.me/?text=<?php echo $row_all['article_title']; ?> https://asiaurdu.com/article.php?newsid=<?php echo $row_all['article_id'].'&q='.$row_all['aricle_permalink']; ?>" target="_blank" class="tw-button btn btn-primary"><i class="fab fa-whatsapp"></i> <span class="hidden-xs">Share on WhatsApp</span></a></li>
                                    </ul>
                                </div><!-- end post-sharing -->
                            </div><!-- end post-desc -->

                            <div class="post-bottom">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="tags">
                                            <h4>Tags</h4>
                                            <a href="#">
                                            <?php
                                            echo $row_get_cat_name['news_categories'];
                                            ?> 
                                            </a>
                                        </div><!-- end tags -->
                                    </div><!-- end col -->

                                    <div class="col-md-4 hidden-xs">
                                        <div class="post-share">
                                            <div class="customshare">
                                                 <span class="list">
                                                    <strong><i class="fa fa-share-alt"></i>
                                                    <a href="http://www.twitter.com/share?url=http://asiaurdu.com/article.php?newsid=<?php echo $row_all['article_id'].'&q='.$row_all['aricle_permalink']; ?>" target="_blank" class="tw"><i class="fab fa-twitter"></i></a>
                                                    <a href="https://www.facebook.com/sharer/sharer.php?u=http://asiaurdu.com/article.php?newsid=<?php echo $row_all['article_id'].'&q='.$row_all['aricle_permalink']; ?>" target="_blank" class="fb"><i class="fab fa-facebook"></i></a>
                                                    <a href="https://wa.me/?text=<?php echo $row_all['article_title']; ?> https://asiaurdu.com/article.php?newsid=<?php echo $row_all['article_id'].'&q='.$row_all['aricle_permalink']; ?>" target="_blank" class="fb"><i class="fab fa-whatsapp"></i></a>
                                                    </strong>
                                                </span>
                                            </div>
                                        </div><!-- end share -->
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end bottom -->

                            <div class="row m22 related-posts">
                                <div class="col-md-12">
                                    <div class="widget">
                                        <div class="widget-title">
                                            <h4>مزید پڑھیے  <span><a href="index.php">سب دیکھیں</a></span></h4>
                                            <hr>
                                        </div><!-- end widget-title -->

                                        <div class="review-posts row m30">
                                            <?php
                                            $sql_latest_post="SELECT * FROM `news_article` WHERE article_category_id=$cat_id ORDER BY article_id DESC LIMIT 3";
                                            $result_latest_post=mysqli_query($ob->config(),$sql_latest_post);
                                            while($row_latest_post=mysqli_fetch_assoc($result_latest_post))
                                            {
                                            ?>
                                            <div class="post-review col-md-4 col-sm-12 col-xs-12">
                                                <div class="post-media entry">
                                                    <?php
                                                    echo '<img src="upload/article/'.$row_latest_post['article_image'].'" class="img-responsive" alt="No Image" >';
                                                    ?>
                                                </div><!-- end media -->
                                                <div class="post-title">
                                                    <h3>
                                                        <a href="article.php?newsid=<?php echo $row_latest_post['article_id'].'&q='.$row_latest_post['aricle_permalink']; ?>">
                                                            <?php echo $row_latest_post['article_title']; ?>
                                                        </a>
                                                    </h3>
                                                </div><!-- end post-title -->
                                            </div><!-- end post-review -->
                                            <?php
                                            }
                                            ?>

                                        </div><!-- end review-post -->
                                    </div><!-- end widget -->   
                                </div><!-- end col -->
                            </div><!-- end row -->

                            <div id="comments" class="row">
                                <div class="col-md-12">
                                    <div class="widget">
                                        <div class="widget-title text-right">
                                            <h4>کمنٹس  : <?php echo $row_all['article_title']; ?></h4>
                                            <hr>
                                        </div><!-- end widget-title -->

                                        <div class="comments">
                                           <!--Code--here-->
                                           <script>
                                            var art_id="<?php echo $article_id; ?>";
                                              var VUUKLE_CONFIG = {
                                                apiKey: 'f9c2b873-cb2a-433d-bafd-1790c9390b2c',
                                                articleId: art_id,
                                              };
                                              //DON'T EDIT BELOW THIS LINE
                                              (function() {
                                                var d = document,
                                                  s = d.createElement('script');
                                                s.src = 'https://cdn.vuukle.com/platform.js';
                                                (d.head || d.body).appendChild(s);
                                              })();
                                            </script>
                                            <div id='vuukle-comments'></div>

                                           <!--code--end-->
                                        </div><!-- end collapse -->

                                    </div><!-- end widget -->   
                                </div><!-- end col -->
                            </div><!-- end row -->

                          

                        </div><!-- end large-widget -->
                    </div><!-- end widget -->
                </div><!-- end col -->

                <div class="col-md-3 col-sm-3 col-xs-12">
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
  
</body>
</html>