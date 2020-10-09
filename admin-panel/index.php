<?php 

include_once('secure.php');

include_once('../db/db_config.php');

$ob=new db_config();

?>

<!DOCTYPE html>

<html>

<head>

	<title>Dashboard - AsiaUrdu</title>

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'>

  	<!--     Fonts and icons     -->

  	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />

  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

  	<!-- CSS Files -->

  	<link href="assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet">

  	<!-- Favicon-->

</head>

<body>

	<div class="wrapper">

	<!--Side-Baar-wrapper--Start-->

    <?php include_once('nav/sidebar.php'); ?>

    <!--Side-Wrapper-End-->

    <div class="main-panel">

      <!-- Head-Navbar-Start-->

     <?php include_once('nav/headnav.php'); ?>

      <!-- Head-Navbar-End-->

      <div class="content">

        <div class="container-fluid">

          <div class="row">

            <div class="col-lg-3 col-md-6 col-sm-6">

              <div class="card card-stats">

                <div class="card-header card-header-success card-header-icon">

                  <div class="card-icon">

                    <i class="material-icons">category</i>

                  </div>

                  <p class="card-category">Total News Categories</p>

                  <h3 class="card-title">

                    <?php

                    $sql_total_cat="SELECT COUNT(*) AS cat FROM `news_categories`";

                    $result_total_cat=mysqli_query($ob->config(),$sql_total_cat);

                    $row_total_cat=mysqli_fetch_assoc($result_total_cat);

                    echo $row_total_cat['cat'];

                    ?>

                  </h3>

                </div>

              </div>

            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">

              <div class="card card-stats">

                <div class="card-header card-header-success card-header-icon">

                  <div class="card-icon">

                    <i class="material-icons">all_inbox</i>

                  </div>

                  <p class="card-category">Total News Articles</p>

                  <h3 class="card-title">

                    <?php

                    $sql_total_new="SELECT COUNT(*) AS art FROM `news_article`";

                    $result_total_new=mysqli_query($ob->config(),$sql_total_new);

                    $row_total_new=mysqli_fetch_assoc($result_total_new);

                    echo $row_total_new['art'];

                    ?>

                  </h3>

                </div>

              </div>

            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">

              <div class="card card-stats">

                <div class="card-header card-header-warning card-header-icon">

                  <div class="card-icon">

                    <i class="material-icons">autorenew</i>

                  </div>

                  <p class="card-category">Total News Ticker</p>

                  <h3 class="card-title">

                    <?php

                    $sql_ticker="SELECT COUNT(*) AS tk FROM `ticker`";

                    $result_ticker=mysqli_query($ob->config(),$sql_ticker);

                    $row_ticker=mysqli_fetch_assoc($result_ticker);

                    echo $row_ticker['tk'];

                    ?>

                  </h3>

                </div>

              </div>

            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">

              <div class="card card-stats">

                <div class="card-header card-header-info card-header-icon">

                  <div class="card-icon">

                    <i class="fa fa-tasks"></i>

                  </div>

                  <p class="card-category">Total Youtube Videos</p>

                  <h3 class="card-title">
                    <?php
                    $sql_yv="SELECT COUNT(*) AS total_yv FROM `youtube_videos`";
                    $result_yv=mysqli_query($ob->config(),$sql_yv);
                    $row_yv=mysqli_fetch_assoc($result_yv);
                    echo $row_yv['total_yv'];
                    ?>
                  </h3>

                </div>

              </div>

            </div>

          </div>



          

        </div>

      </div>

      <!--Footer-Start-->

      <?php include_once('nav/footer.php'); ?>

      <!--Footer-End-->

    </div>

    <!--   Core JS Files   -->

  <script src="assets/js/core/jquery.min.js"></script>

  <script src="assets/js/core/popper.min.js"></script>

  <script src="assets/js/core/bootstrap-material-design.min.js"></script>

  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>

  <!-- Plugin for the momentJs  -->

  <script src="assets/js/plugins/moment.min.js"></script>

  <!--  Plugin for Sweet Alert -->

  <script src="assets/js/plugins/sweetalert2.js"></script>

  <!-- Forms Validations Plugin -->

  <script src="assets/js/plugins/jquery.validate.min.js"></script>

  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->

  <script src="assets/js/plugins/jquery.bootstrap-wizard.js"></script>

  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->

  <script src="assets/js/plugins/bootstrap-selectpicker.js"></script>

  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->

  <script src="assets/js/plugins/bootstrap-datetimepicker.min.js"></script>

  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->

  <script src="assets/js/plugins/jquery.dataTables.min.js"></script>

  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->

  <script src="assets/js/plugins/bootstrap-tagsinput.js"></script>

  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->

  <script src="assets/js/plugins/jasny-bootstrap.min.js"></script>

  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->

  <script src="assets/js/plugins/fullcalendar.min.js"></script>

  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->

  <script src="assets/js/plugins/jquery-jvectormap.js"></script>

  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->

  <script src="assets/js/plugins/nouislider.min.js"></script>

  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

  <!-- Library for adding dinamically elements -->

  <script src="assets/js/plugins/arrive.min.js"></script>

  <!--  Google Maps Plugin    -->

  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

  <!-- Chartist JS -->

  <script src="assets/js/plugins/chartist.min.js"></script>

  <!--  Notifications Plugin    -->

  <script src="assets/js/plugins/bootstrap-notify.js"></script>

  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->

  <script src="assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>

  <script type="text/javascript">

    $(document).ready(function(){

      $("#dashboard").addClass("active");

    });

  </script>

</body>

</html>