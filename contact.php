<?php
include('db/db_config.php');
$ob=new db_config();
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- SITE META -->
    <title>Contact | AsiaUrdu</title>
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
        <!--<div id="map"></div>-->

        <div class="container sitecontainer bgw">
            <div class="row">
                <div class="col-md-12 m22 single-post">
                    <div class="widget">
                        <div class="large-widget m30">
                            <div class="post-desc">

                                <div class="row">
                                    <div class="col-md-7 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-12 col-xs-12">
                                                <div class="widget">
                                                    <div class="widget-title">
                                                        <h4>Contact Form</h4>
                                                        <hr>
                                                    </div>
                                                    <!-- end widget-title -->

                                                    <div class="commentform">
                                                        <form class="row" method="post" action="javascript:send_mail()" id="mail_info">
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
                                                            <div class="col-md-12 col-sm-12">
                                                                <label>Your Message <span class="required">*</span></label>
                                                                <textarea class="form-control" name="message" id="message" placeholder="Message" required="required"></textarea>
                                                            </div>
                                                            <div class="col-md-12 col-sm-12">
                                                                <input type="submit" name="send" value="Send Message" class="btn btn-primary" />
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- end newsletter -->
                                                </div>
                                                <!-- end form-container -->
                                            </div>
                                            <!-- end col -->
                                        </div>
                                        <!-- end row -->
                                    </div>
                                    <!-- end col -->

                                    <div class="col-md-3 col-sm-12">
                                        <div class="widget">
                                            <div class="widget-title">
                                                <h4>Contact Details</h4>
                                                <hr>
                                            </div>
                                            <!-- end widget-title -->

                                            <div class="links-widget m30">
                                                <p>AsiaUrdu a new approach in news cover every side. International, National, Sports, Heatlh, Entertainment etc.</p>
                                                <p>You could suggest us and share your costly opnion. Also contact us for advertisement</p>
                                                <p>Contact: 92-302-8652233
                                                <br>
                                                Email: asiaurdu1@gmail.com</p>
                                            </div>
                                            <!-- end links -->
                                        </div>
                                        <!-- end widget -->

                                    </div>

                                    <div class="col-md-2 col-sm-12">
                                        <div class="widget">
                                            <div class="widget-title">
                                                <h4>Social Profiles</h4>
                                                <hr>
                                            </div>
                                            <!-- end widget-title -->

                                            <div class="links-widget darkcolor m30">
                                                <ul class="sociallinks">
                                                    <li><a href="https://www.facebook.com/asiaurduofficial/" target="_blank"><i class="fab fa-facebook"></i> Facebook</a></li>
                                                    <li><a href="https://twitter.com/asiaurdu1" target="_blank"><i class="fab fa-twitter"></i> Twitter</a></li>
                                                    <li><a href="https://www.pinterest.com/asiaurdu1/" target="_blank"><i class="fab fa-pinterest"></i> Pinterest</a></li>
                                                    <li><a href="https://www.youtube.com/channel/UCNHmMb7qt6nEtNx0OEephQA" target="_blank"><i class="fab fa-youtube"></i> YouTube</a></li>
                                                </ul>
                                            </div>
                                            <!-- end links -->
                                        </div>
                                        <!-- end widget -->
                                    </div>

                                </div>
                                <!-- end row -->

                            </div>
                            <!-- end post-desc -->
                        </div>
                        <!-- end large-widget -->
                    </div>
                    <!-- end widget -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
        <!--footer--start-->
        <?php include_once('nav/footer.php'); ?>
        <!--foooter--end-->


    </div>
    <!-- end wrapper -->
    <!-- END SITE -->

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/plugins.js"></script>
    <!-- CUSTOM PLUGINS -->
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="js/map.js"></script>
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