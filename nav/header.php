<div id="google_translate_element"></div>

<script type="text/javascript">

function googleTranslateElementInit() {

  new google.translate.TranslateElement({pageLanguage: 'ur'}, 'google_translate_element');

}

</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

        <header class="header">

            <div class="container">

                <nav class="navbar navbar-default yamm">

                    <div class="container-full">

                        <div class="navbar-header">

                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">

                                <span class="sr-only">Toggle navigation</span>

                                <span class="icon-bar"></span>

                                <span class="icon-bar"></span>

                                <span class="icon-bar"></span>

                            </button>

                        </div>



                        <div id="navbar" class="navbar-collapse collapse">

                            <ul class="nav navbar-nav navbar-right ml-auto column-reverse">
                                <li class="" id="your-opinion">
                                    <a href="your-opinion.php">آپ کی رائے</a>
                                </li>
                                <?php

                                $sql_get_nav_item="SELECT * FROM `news_categories`";

                                $result_get_nav_item=mysqli_query($ob->config(),$sql_get_nav_item);

                                while($row_get_nav_item=mysqli_fetch_assoc($result_get_nav_item))

                                {

                                    ?>

                                    <li class="" id="<?php echo $row_get_nav_item['permalink']; ?>">

                                        <a href="category.php?i=<?php echo $row_get_nav_item['news_categories_id']; ?>&pg=<?php echo $row_get_nav_item['permalink']; ?>"><?php echo $row_get_nav_item['news_categories']; ?></a>

                                    </li>

                                    <?php

                                }

                                ?>

                                <li class="" id="Home"><a href="./"><i class="fa fa-home"></i> صفحۂ اول</a></li>

                            </ul>

                            <ul class="nav navbar-nav navbar-right searchandbag">

                                <li class="dropdown searchdropdown hasmenu">

                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-search"></i></a>

                                    <ul class="dropdown-menu show-right">

                                        <li>

                                            <div id="custom-search-input">

                                                <form method="get" action="search.php">

                                                <div class="input-group col-md-12">

                                                    <input type="search" name="q" class="form-control input-lg" placeholder="Search here..." >

                                                    <span class="input-group-btn">

                                                        <button type="submit" class="btn btn-primary btn-lg">

                                                            <i class="fa fa-search"></i>

                                                        </button>

                                                    </span>

                                                </div>

                                                </form>

                                            </div>

                                        </li>

                                    </ul>

                                </li>
                                <!-- calender search-->
                                <li class="dropdown searchdropdown hasmenu">

                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="far fa-calendar-check" style="font-size: 18px;"></i></a>

                                    <ul class="dropdown-menu show-right">

                                        <li>

                                            <div id="custom-search-input">

                                                <form method="get" action="search_by_date.php">

                                                <div class="input-group col-md-12">

                                                    <input type="date" name="cal" class="form-control input-lg">

                                                    <span class="input-group-btn">

                                                        <button class="btn btn-primary btn-lg" type="submit">

                                                             <i class="far fa-calendar-check" ></i>

                                                        </button>

                                                    </span>

                                                </div>

                                                </form>

                                            </div>

                                        </li>

                                    </ul>

                                </li>
                                <!-- calender search-->

                            </ul>

                        </div>

                        <!--/.nav-collapse -->

                    </div>

                    <!--/.container-fluid -->

                </nav>

            </div>

            <!-- end container -->

        </header>