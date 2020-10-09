<?php
include('db/db_config.php');
$ob=new db_config();
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="ur"> <!--<![endif]-->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- SITE META -->
    <title>آپ کی رائے | AsiaUrdu</title>
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
                    <h2> آپ کی رائے
                    <small class="hidden-xs">
                        </small></h2>
                    <div class="bread">
                        <ol class="breadcrumb">
                            <li><a href="index.php">صفحۂ اول</a></li>
                            <li class="active">آپ کی رائے</li>
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
                            <form class="row" method="post" action="javascript:send_mail()" id="mail_info">
                                <div class="row">
                                     <div class="col-md-4 col-sm-12">
                                        <label>Name <span class="required">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Name" required="required">
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <label>Email <span class="required">*</span></label>
                                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" required="required">
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <label>Subject</label>
                                        <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject" required="required">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <label>Your Message <span class="required">*</span></label>
                                        <textarea rows="10" class="form-control" name="message" id="message" placeholder="Message" required="required"></textarea>
                                    </div>
                                    <br><br><br><br> <br><br><br><br> <br><br><br><br>
                                    <div class="col-md-12 col-sm-12">
                                        <input type="submit" name="send" value="Send Message" class="btn btn-primary" />
                                    </div>
                                </div>
                            </form>
                        </div><!-- end large-widget -->
                    </div><!-- end widget -->
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
                        $sql_latest_vid="SELECT * FROM `news_article` WHERE article_category_id=2 ORDER BY article_id DESC LIMIT 5";
                        $result_latest_vid=mysqli_query($ob->config(),$sql_latest_vid);
                        while($row_latest_vid=mysqli_fetch_assoc($result_latest_vid))
                        {
                        ?>
                            <div class="post-review">
                                <div class="post-media entry">
                                    <a href="article.php?newsid=<?php echo $row_latest_vid['article_id'].'&q='.$row_latest_vid['aricle_permalink']; ?>" title="<?php echo $row_latest_vid['article_title']; ?>">
                                       <?php
                                         echo '<img src="upload/article/'.$row_latest_vid['article_image'].'" class="img-responsive" alt="No Image" >';
                                        ?>
                                    </a>
                                </div><!-- end media -->
                                <div class="post-title text-right">
                                    <h3>
                                        <a href="article.php?newsid=<?php echo $row_latest_vid['article_id'].'&q='.$row_latest_vid['aricle_permalink']; ?>">
                                           <?php echo $row_latest_vid['article_title']; ?> 
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
      $("#your-opinion").addClass("active");
        });
    </script>
    <script type="text/javascript">
        function send_mail()
        {
            var datastring=$("#mail_info").serialize();
            $.ajax({
            type: "POST",
            url: "ajax/send_mail_c_ajax.php",
            data: datastring,
            success: function(data) {
                console.log(data);
              if(data==true)
              {
                location.reload();
                //window.location = 'add-representative_pic.php?pi=' + data;
              }
            }
             });
        }
    </script>
  
</body>
</html>