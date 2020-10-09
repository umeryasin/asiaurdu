<?php
include('db/db_config.php');
$ob=new db_config();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- SITE META -->
    <title>AsiaUrdu | ایک نئی سوچ</title>
    <meta content="text/html; charset=utf-8" http-equiv=Content-Type>
    <meta name="description" content="AsiaUrdu the hub of news network of Nation, International, Sports, Fields, Health etc">
    <meta name="author" content="">
    <meta name="keywords" content="AsiaUrdu, News, Sports, International News, National News">
    <?php include('common_meta.php'); ?>

    <!-- FAVICONS -->
    <link rel="shortcut icon" href="images/favi.png" type="image/x-icon">

    <!-- TEMPLATE STYLES -->
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <link rel="stylesheet" type="text/css" href="css/breaking-news-ticker.css">
   
    <script src="fontawesome/js/all.js"></script>


</head>

<body dir="rtl">

    <div class="left-menu hidden-sm hidden-md hidden-xs">
        <ul class="dm-social">
            <li class="facebookbg"><a href="http://facebook.com/umeryasin.umer" class="fa fa-facebook" data-toggle="tooltip" data-placement="right" title="Facebook">Facebook</a></li>
            <li class="googlebg"><a href="#" class="fa fa-google-plus" data-toggle="tooltip" data-placement="right" title="Google+">Google+</a></li>
            <li class="twitterbg"><a href="#" class="fa fa-twitter" data-toggle="tooltip" data-placement="right" title="Twitter">Twitter</a></li>
            <li class="pinterestbg"><a href="#" class="fa fa-pinterest" data-toggle="tooltip" data-placement="right" title="Pinterest">Pinterest</a></li>
            <li class="linkedinbg"><a href="#" class="fa fa-linkedin" data-toggle="tooltip" data-placement="right" title="Linkedin">Linkedin</a></li>
            <li class="rssbg"><a href="#" class="fa fa-rss" data-toggle="tooltip" data-placement="right" title="RSS">RSS</a></li>
            <li class="share">
                <a href="#" class="fa fa-share-alt" data-toggle="tooltip" data-placement="right" title="91k Share"></a>
            </li>
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
        
        <div class="container sitecontainer bgw">
            <div class="row">
                <!--Here-->
                 <div class="col-md-12">
                    <!--ticker code--start-->
                    <div class="breaking-news-ticker" id="newsTicker2">
                    <div class="bn-label">تازہ ترین خبر</div>
                      <div class="bn-news">
                        <ul>
                            <?php
                            $sql_ticker="SELECT * FROM `ticker` ORDER BY ticker_id DESC LIMIT 20";
                            $result_ticker=mysqli_query($ob->config(),$sql_ticker);
                            while($row_ticker=mysqli_fetch_assoc($result_ticker))
                            {
                                ?>
                                <li>
                                    <?php
                                    $link="";
                                    $refer_id=$row_ticker['refer_news_id'];
                                    if($refer_id==0)
                                    {
                                        $link="#";
                                    }
                                    else
                                    {
                                        $sql_art_info="SELECT * FROM `news_article` WHERE article_id=$refer_id";
                                        $result_art_info=mysqli_query($ob->config(),$sql_art_info);
                                        $row_art_info=mysqli_fetch_assoc($result_art_info);
                                        $link="article.php?newsid=".$refer_id."&q=".$row_art_info['aricle_permalink'];
                                    }
                                    ?>
                                    <a href="<?php echo $link; ?>" title="<?php echo $row_ticker['ticker_title']; ?>" style="font-size: 20px;">
                                        <?php echo $row_ticker['ticker_title']; ?>
                                    </a>
                                </li>
                                <li>
                                    <i class="fas fa-circle-notch"></i>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="bn-controls">
                        <button><span class="bn-arrow bn-prev"></span></button>
                        <button><span class="bn-action"></span></button>
                        <button><span class="bn-arrow bn-next"></span></button>
                    </div>
                        <!--end--ticker--code-->
                    </div><!-- end news-ticker -->
                </div><!-- end col -->
                <!--End-->
            </div><!-- end row -->
 
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="widget-title">
                            <h4>ہیڈ لائنز</h4>
                            <hr>
                            </div>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <?php
    $sql_hl="SELECT * FROM `headlines` ORDER BY `headline_id` DESC LIMIT 5";
    $result_hl=mysqli_query($ob->config(),$sql_hl);
    $index=0;
    while($row_hl=mysqli_fetch_assoc($result_hl))
    {
        ?>
        <li data-target="#myCarousel" data-slide-to="<?php echo $index; ?>" class="<?php if($index==0) echo 'active'; ?>"></li>
        <?php
        $index++;
    }
    ?>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
     <?php
    $sql_hl="SELECT * FROM `headlines` ORDER BY `headline_id` DESC LIMIT 5";
    $result_hl=mysqli_query($ob->config(),$sql_hl);
    $index=0;
    while($row_hl=mysqli_fetch_assoc($result_hl))
    {
        ?>
        <div class="item <?php if($index==0) echo 'active'; ?>">
            <img src="upload/headline/<?php echo $row_hl['headline_image']; ?>" alt="Asiaurdu">
            <div class="carousel-caption">
                <a href="<?php
                if($row_hl['headline_refer_news_id']==0)
                {
                    echo '#';
                }
                else
                {
                    $sql_ar='SELECT * FROM `news_article` WHERE `article_id`='.$row_hl['headline_refer_news_id'];
                    $result_ar=mysqli_query($ob->config(),$sql_ar);
                    $row_ar=mysqli_fetch_assoc($result_ar);
                    echo 'article.php?newsid='.$row_ar['article_id'].'&q='.$row_ar['aricle_permalink'];
                }
                ?>">
                    <h3 style="color:<?php echo $row_hl['headline_text_color']; ?>;"><?php echo $row_hl['headline_title']; ?></h3>
                    <p style="color:<?php echo $row_hl['headline_text_color']; ?>;"><?php echo $row_hl['headline_description']; ?></p>
                </a>
            </div>
        </div>
        <?php
        $index++;
    }
    ?>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
                        </div>
                    </div>
                    <div class="row">
                        <!--start-->
                    <div class="col-md-8 col-sm-8 col-xs-12 m22">
                    <div class="widget">
                        <div class="large-widget m30">
                            <?php
                            $sql_b_news="SELECT * FROM `news_article` ORDER BY article_id DESC LIMIT 5";
                            $result_b_news=mysqli_query($ob->config(),$sql_b_news);
                            while($row_b_news=mysqli_fetch_assoc($result_b_news))
                            {
                            ?>
                            <div class="post clearfix">
                                <div class="post-media">
                                    <a href="article.php?newsid=<?php echo $row_b_news['article_id'].'&q='.$row_b_news['aricle_permalink']; ?>" title="<?php echo $row_b_news['article_title']; ?>">
                                        <?php
                                        echo '<img src="upload/article/'.$row_b_news['article_image'].'" class="img-responsive" >';
                                        ?>
                                    </a>
                                </div>
                                <div class="large-post-meta">
                                    <span><a href="#">
                                        <?php
                                        $cat_id=$row_b_news['article_category_id'];
                                                    $sql_get_cat_name="SELECT * FROM `news_categories` WHERE news_categories_id=$cat_id";
                                                    $result_get_cat_name=mysqli_query($ob->config(),$sql_get_cat_name);
                                                    $row_get_cat_name=mysqli_fetch_assoc($result_get_cat_name);
                                                    echo $row_get_cat_name['news_categories'];
                                        ?>
                                    </a></span>
                                </div><!-- end meta -->
                                <div class="large-widget-title text-right">
                                    <a href="article.php?newsid=<?php echo $row_b_news['article_id'].'&q='.$row_b_news['aricle_permalink']; ?>" title="<?php echo $row_b_news['article_title']; ?>"> 
                                    <?php
                                    echo $row_b_news['article_title'];
                                    ?>
                                    </a>
                                </div>
                                <div class="large-widget-title text-right">
                                    <a href="article.php?newsid=<?php echo $row_b_news['article_id'].'&q='.$row_b_news['aricle_permalink']; ?>" class="btn btn-primary">مزید پڑھیں</a>
                                </div>
                                <div class="post-share">
                                    <div class="customshare">
                                         <span class="list">
                                            <strong><i class="fa fa-share-alt"></i>
                                                <!--share-quantity--here like 92-->
                                            <a href="http://www.twitter.com/share?url=https://asiaurdu.com/article.php?newsid=<?php echo $row_b_news['article_id'].'&q='.$row_b_news['aricle_permalink']; ?>" target="_blank" class="tw"><i class="fab fa-twitter"></i></a>
                                            <a href="https://www.facebook.com/sharer/sharer.php?u=https://asiaurdu.com/article.php?newsid=<?php echo $row_b_news['article_id'].'&q='.$row_b_news['aricle_permalink']; ?>" class="fb" target="_blank"><i class="fab fa-facebook"></i></a>
                                             <a href="https://wa.me/?text=<?php echo $row_b_news['article_title']; ?> https://asiaurdu.com/article.php?newsid=<?php echo $row_b_news['article_id'].'&q='.$row_b_news['aricle_permalink']; ?>" target="_blank" style="background-color: green;"><i class="fab fa-whatsapp"></i></a>
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
                </div><!-- end col -->

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="widget">
                        <div class="widget-title">
                            <h4> 
                                <span style="float: right;">
                                مقامی/ریجنل 
                                </span> 
                            </h4>
                            <hr>
                        </div><!-- end widget-title -->
                        <div class="review-posts m30">
                        <?php
                        $sql_side_1="SELECT * FROM `news_article` WHERE `article_category_id`=9 ORDER BY `article_id` DESC LIMIT 3";
                        $result_side_1=mysqli_query($ob->config(),$sql_side_1);
                        while($row_side_1=mysqli_fetch_assoc($result_side_1))
                        {
                        ?>
                            <div class="post-review">
                                <div class="post-media entry">
                                    <a href="article.php?newsid=<?php echo $row_side_1['article_id'].'&q='.$row_side_1['aricle_permalink']; ?>" title="<?php echo $row_side_1['article_title']; ?>">
                                            <?php
                                            echo '<img src="upload/article/'.$row_side_1['article_image'].'" class="img-responsive" >';
                                            ?>
                                    </a>
                                </div><!-- end media -->
                                <div class="post-title text-right">
                                    <h3>
                                        <a href="article.php?newsid=<?php echo $row_side_1['article_id'].'&q='.$row_side_1['aricle_permalink']; ?>">
                                        <?php echo $row_side_1['article_title']; ?>
                                        </a>
                                    </h3>
                                </div><!-- end post-title -->
                            </div><!-- end post-review -->
                            <hr>
                        <?php
                        }   
                        ?>

                        </div><!-- end review-posts -->
                    </div><!-- end widget -->    
                    <div class="widget">
                        <div class="widget-title">
                            <h4> 
                                <span style="float: right;">
                                    صحت
                                </span> 
                            </h4>
                            <hr>
                        </div><!-- end widget-title -->
                        <div class="review-posts m30">
                        <?php
                        $sql_side_2="SELECT * FROM `news_article` WHERE `article_category_id`=6 ORDER BY `article_id` DESC LIMIT 3";
                        $result_side_2=mysqli_query($ob->config(),$sql_side_2);
                        while($row_side_2=mysqli_fetch_assoc($result_side_2))
                        {
                        ?>
                            <div class="post-review">
                                <div class="post-media entry">
                                    <a href="article.php?newsid=<?php echo $row_side_2['article_id'].'&q='.$row_side_2['aricle_permalink']; ?>" title="<?php echo $row_side_2['article_title']; ?>">
                                            <?php
                                            echo '<img src="upload/article/'.$row_side_2['article_image'].'" class="img-responsive" >';
                                            ?>
                                    </a>
                                </div><!-- end media -->
                                <div class="post-title text-right">
                                    <h3>
                                        <a href="article.php?newsid=<?php echo $row_side_2['article_id'].'&q='.$row_side_2['aricle_permalink']; ?>">
                                        <?php echo $row_side_2['article_title']; ?>
                                        </a>
                                    </h3>
                                </div><!-- end post-title -->
                            </div><!-- end post-review -->
                            <hr>
                        <?php
                        }   
                        ?>

                        </div><!-- end review-posts -->
                    </div><!-- end widget -->  
                    <div class="widget">
                        <div class="widget-title">
                            <h4> 
                                <span style="float: right;">
                                    انٹرنیشنل
                                </span> 
                            </h4>
                            <hr>
                        </div><!-- end widget-title -->
                        <div class="review-posts m30">
                        <?php
                        $sql_side_3="SELECT * FROM `news_article` WHERE `article_category_id`=7 ORDER BY `article_id` DESC LIMIT 3";
                        $result_side_3=mysqli_query($ob->config(),$sql_side_3);
                        while($row_side_3=mysqli_fetch_assoc($result_side_3))
                        {
                        ?>
                            <div class="post-review">
                                <div class="post-media entry">
                                    <a href="article.php?newsid=<?php echo $row_side_3['article_id'].'&q='.$row_side_3['aricle_permalink']; ?>" title="<?php echo $row_side_3['article_title']; ?>">
                                            <?php
                                            echo '<img src="upload/article/'.$row_side_3['article_image'].'" class="img-responsive" >';
                                            ?>
                                    </a>
                                </div><!-- end media -->
                                <div class="post-title text-right">
                                    <h3>
                                        <a href="article.php?newsid=<?php echo $row_side_3['article_id'].'&q='.$row_side_3['aricle_permalink']; ?>">
                                        <?php echo $row_side_3['article_title']; ?>
                                        </a>
                                    </h3>
                                </div><!-- end post-title -->
                            </div><!-- end post-review -->
                            <hr>
                        <?php
                        }   
                        ?>

                        </div><!-- end review-posts -->
                    </div><!-- end widget --> 
                </div><!-- end col -->
                        <!--end-->
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">

                    <div class="widget">
                        <div class="widget-title">
                            <h4 style="text-align: right;">سوشل میڈیا </h4>
                            <hr>
                        </div><!-- end widget-title -->
                        <!--social-media--start-->
                        <?php include('nav/social_media_side_bar.php'); ?>
                        <!--social-media--end-->
                    </div>

                    <div class="widget hidden-xs">
                        <div class="widget-title">
                            <h4 style="text-align: right;">اشتہار</h4>
                            <hr>
                        </div><!-- end widget-title -->

                        <!--ad-side-bar-1-start-->
                        <?php include('nav/side_bar_ad_1.php'); ?>
                        <!--ad-side-bar-1-end-->
                    </div><!-- end widget -->
                    <div class="widget hidden-xs">
                        <div class="widget-title">
                            <h4 style="text-align: right;">اشتہار</h4>
                            <hr>
                        </div><!-- end widget-title -->
                         <!--ad-side-bar-2-start-->
                         <?php include('nav/side_bar_ad_2.php'); ?>
                         <!--ad-side-bar-2-end-->
                    </div><!-- end widget -->
                </div><!-- end col -->
            </div><!-- end row -->

            <div class="row">
                <div class="col-md-12">
                    <div class="widget">
                        <!--ad-footer-start-->
                       <?php include('nav/footer_ad.php'); ?>
                       <!--ad-footer-end-->
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
    <script src="js/breaking-news-ticker.min.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function(){
            $('#newsTicker2').breakingNews({
                direction: 'rtl'
            });
        });
    </script>
   
    <script type="text/javascript">
        $(document).ready(function(){
      $("#Home").addClass("active");
        });
    </script>
  
</body>
</html>