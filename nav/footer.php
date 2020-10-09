 <footer class="footer">

            <div class="container">

                <div class="row">

                    <div class="col-md-3 col-sm-12 col-xs-12">

                        <div class="widget">

                            <div class="widget-title">

                                <h4>Site Links</h4>

                                <hr>

                            </div><!-- end widget-title -->



                            <div class="links-widget m30">

                                <ul class="check">

                                    <li><a href="index.php">Homepage</a></li>

                                    <li><a href="about-asiaurdu.php">About us</a></li>

                                    <li><a href="advertising.php">Advertising</a></li>

                                </ul>

                            </div><!-- end links -->

                        </div><!-- end widget -->  

                    </div><!-- end col -->



                    <div class="col-md-3 col-sm-12 col-xs-12">

                        <div class="widget">

                            <div class="widget-title">
                                <h4>Community</h4>
                                <hr>
                            </div><!-- end widget-title -->
                            <div class="links-widget m30">
                                <ul class="check">
                                    <li>
                                        <a href="#">Report site issue</a>
                                    </li>
                                    <li>
                                        <a href="contact.php">Contact Us</a>
                                    </li>
                                </ul>
                                <a href="//www.dmca.com/Protection/Status.aspx?ID=8180f564-3002-43d0-ae65-5d188bc5573a" title="DMCA.com Protection Status" class="dmca-badge"> <img src ="https://images.dmca.com/Badges/dmca-badge-w200-5x1-09.png?ID=8180f564-3002-43d0-ae65-5d188bc5573a"  alt="DMCA.com Protection Status" /></a>  <script src="https://images.dmca.com/Badges/DMCABadgeHelper.min.js"> </script>

                            </div><!-- end links -->

                        </div><!-- end widget -->  

                    </div><!-- end col -->



                    <div class="col-md-3 col-sm-12 col-xs-12">

                        <div class="widget">

                            <div class="widget-title">

                                <h4>Social Profiles</h4>

                                <hr>

                            </div><!-- end widget-title -->



                            <div class="links-widget m30">

                                <ul class="sociallinks">

                                    <li><a href="https://www.facebook.com/asiaurduofficial/" target="_blank"><i class="fab fa-facebook"></i> Facebook</a></li>

                                    <li><a href="https://twitter.com/asiaurdu1" target="_blank"><i class="fab fa-twitter"></i> Twitter</a></li>

                                    <li><a href="https://www.pinterest.com/asiaurdu1/" target="_blank"><i class="fab fa-pinterest"></i> Pinterest</a></li>

                                    <li><a href="#"><i class="fab fa-linkedin-in"></i> Linkedin</a></li>

                                    <li><a href="https://www.youtube.com/channel/UCNHmMb7qt6nEtNx0OEephQA" target="_blank"><i class="fab fa-youtube"></i> YouTube</a></li>

                                    <li><a href="https://www.instagram.com/asia.urdu/" target="_blank"><i class="fab fa-instagram"></i> Instagram</a></li>

                                </ul>

                            </div><!-- end links -->

                        </div><!-- end widget -->  

                    </div><!-- end col -->



                    <div class="col-md-3 col-sm-12 col-xs-12">

                        <div class="widget">

                            <div class="widget-title">

                                <h4>Subscribe & Newsletter</h4>

                                <hr>

                            </div><!-- end widget-title -->



                            <div class="newsletter-widget m30">

                                <p>Subscribe to our weekly Newsletter and receive updates via email.</p>

                                <form class="form-inline" method="post" role="form" action="javascript:sub_email()" id="sub_email_id">

                                    <div class="input-group form-group">

                                        <input type="text" name="email" id="email" placeholder="Add your email here.." required class="form-control" />

                                    </div>

                                    <input type="submit" value="Subscribe" class="btn btn-primary" />

                                </form>

                                <script type="text/javascript">

                                    function sub_email()

                                    {

                                        var datastring=$("#sub_email_id").serialize();

                                        $.ajax({

                                        type: "POST",

                                        url: "ajax/conform_sub_email.php",

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



                                <hr> 

                                <h3>

                                    <span>

                                         <?php

                    $sql_total_new="SELECT COUNT(*) AS art FROM `news_article`";

                    $result_total_new=mysqli_query($ob->config(),$sql_total_new);

                    $row_total_new=mysqli_fetch_assoc($result_total_new);

                    echo $row_total_new['art'];

                    ?>

                                     Articles

                                    </span>

                                </h3>



                            </div><!-- end mini-widget -->

                        </div><!-- end widget -->  

                    </div><!-- end col -->

                </div><!-- end row -->

            </div><!-- end container -->

        </footer><!-- end footer -->

        <div id="sitefooter-wrap">
            <div id="sitefooter" class="container">
                <div id="copyright" class="row">
                    <div class="col-md-6 col-sm-12 text-left">
                    <p class="copyright-notice">
                        <span class="fa fa-copyright"></span> <?php echo date('Y'); ?> AsiaUrdu. All Rights Reserved. Designed And Developed by <a href="http://muyofficial.blogspot.com" title="MUY" target="_blank">MUY</a>.
                    </p>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <ul class="list-inline text-right">
                            <li><a href="./">Home</a></li>
                            <li><a href="contact.php">Contact</a></li>
                            <li><a class="topbutton" href="#">Back to top <i class="fa fa-angle-up"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>