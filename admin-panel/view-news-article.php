<?php 
include_once('secure.php');
include_once('../db/db_config.php');
$ob=new db_config(); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>View News Articles - AsiaUrdu</title>
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
          <form>
            <div class="row">

              <div class="col-md-2">

                <p>Select News Category</p>

              </div>

              <div class="col-md-3">

                <select name="cat" class="form-control">

                  <?php

                  $sql_search="SELECT * FROM `news_categories`";

                  $result_search=mysqli_query($ob->config(),$sql_search);

                  while($row_search=mysqli_fetch_assoc($result_search))

                  {

                    ?>

                    <option value="<?php echo $row_search['news_categories_id']; ?>"><?php echo $row_search['news_categories']; ?></option>

                    <?php

                  }

                  ?>

                </select>

              </div>

              <div class="col-md-2">

                <button class="btn btn-primary"><i class="material-icons">search</i></button>

              </div>

            </div>

          </form>

          <div class="row">

            <table class="table table-bordered table-hover text-center">

              <thead class="thead-dark">

                <tr>

                  <th>News Id</th>

                  <th>News Title</th>

                  <th>Permalink</th>

                  <th>Image</th>

                  <th>Action</th>

                </tr>

              </thead>

              <tbody>
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
                $total_pages_sql = "SELECT COUNT(*) FROM news_article";
                $result = mysqli_query($ob->config(),$total_pages_sql);
                $total_rows = mysqli_fetch_array($result)[0];
                $total_pages = ceil($total_rows / $no_of_records_per_page);
                //
                if(isset($_GET['cat']))
                {

                  $cat=$_GET['cat'];

                  $sql_get_im_data="SELECT * FROM `news_article` WHERE article_category_id=$cat ORDER BY article_id DESC LIMIT $offset, $no_of_records_per_page";

                }
                else{
                  $sql_get_im_data="SELECT * FROM `news_article` ORDER BY article_id DESC LIMIT $offset, $no_of_records_per_page";
                }
                //echo $sql_get_im_data;
                $result_get_im_data=mysqli_query($ob->config(),$sql_get_im_data);

                while($row_get_im_data=mysqli_fetch_assoc($result_get_im_data))

                {

                  ?>

                  <tr>

                    <td><?php echo $row_get_im_data['article_id']; ?></td>

                    <td><?php echo $row_get_im_data['article_title']; ?></td>

                    <td><?php echo $row_get_im_data['aricle_permalink'] ?></td>

                    <td>

                      <?php echo '<img src="../upload/article/'.$row_get_im_data['article_image'].'" class="img-responsive" alt="No Image" style="max-width:250px;" >'; ?>

                      <button class="btn btn-success edit-img" value="<?php echo $row_get_im_data['article_id']; ?>" data-toggle="modal" data-target="#edit-img-modal">Change</button>    

                    </td>

                    <td>

                      <button class="btn btn-info view-article" value="<?php echo $row_get_im_data['article_id']; ?>">View</button>

                      <button class="btn btn-info edit-news-article" value="<?php echo $row_get_im_data['article_id']; ?>" data-toggle="modal" data-target="#edit-news-content">Edit</button>

                      <button class="btn btn-info del-news-content" value="<?php echo $row_get_im_data['article_id']; ?>">Delete</button>

                    </td>

                  </tr>

                  <?php

                }

                ?>

              </tbody>

            </table>
          <nav aria-label="Page navigation example">
            <ul class="pagination">
              <li class="page-item">
                <a class="page-link" href="?pageno=1">First</a>
              </li>
              <li class="page-item <?php if($pageno <= 1){ echo 'disabled'; } ?>">
                <a class="page-link" href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
              </li>
              <li class="page-item <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                <a class="page-link" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="?pageno=<?php echo $total_pages; ?>">Last</a>
              </li>
            </ul>
          </nav>
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

      $("#active-orders").addClass("active");

    });

  </script>



  <script type="text/javascript">

    $(".edit-img").on("click",function(){

      var edit_id=$(this).val();

      $.ajax({

        url:'ajax/edit_news_view.php',

        type:'POST',

        data:{

          edit_id:edit_id

        },

        success: function(data){

          $(".edit-modal-container").html(data);

        }

      });

    });

  </script>

  <script type="text/javascript">

    $(".view-article").on("click",function(){

      var view_id=$(this).val();

      window.open('../article.php?newsid='+view_id, '_blank');

    });

  </script>

  <!--edit-news-article-->

  <script type="text/javascript">

    $(".edit-news-article").on("click",function(){

      var content_id=$(this).val();

        $.ajax({

        url:'ajax/edit_news_article.php',

        type:'POST',

        data:{

          content_id:content_id

        },

        success: function(data){

          $(".edit-content-modal-container").html(data);

        }

      });



    });

  </script>

  <script type="text/javascript">

    $(".del-news-content").on("click",function(){

      var del_id=$(this).val();

      $.ajax({

        url:'ajax/del_news_article.php',

        type:'POST',

        data:{

          del_id:del_id

        },

        success: function(data){

          alert(data);

          location.reload();

        }

      });



    });

  </script>

</body>

</html>



<!--Modal_Area-->

<!-- Edit Pkg Id -->

<div class="modal fade" id="edit-img-modal">

  <div class="modal-dialog">

    <div class="modal-content">



      <!-- Modal Header -->

      <div class="modal-header">

        <h4 class="modal-title">Edit Image</h4>

        <button type="button" class="close" data-dismiss="modal">&times;</button>

      </div>



      <!-- Modal body -->

      <div class="modal-body">

        <div class="edit-modal-container">

          

        </div>

      </div>



      <!-- Modal footer -->

      <div class="modal-footer">

        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

      </div>



    </div>

  </div>

</div>

<!--End Modal-->

<!-- Edit Pkg Id -->

<div class="modal fade" id="edit-news-content">

  <div class="modal-dialog">

    <div class="modal-content">



      <!-- Modal Header -->

      <div class="modal-header">

        <h4 class="modal-title">Edit News Article</h4>

        <button type="button" class="close" data-dismiss="modal">&times;</button>

      </div>



      <!-- Modal body -->

      <div class="modal-body">

        <div class="edit-content-modal-container">

          

        </div>

      </div>



      <!-- Modal footer -->

      <div class="modal-footer">

        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

      </div>



    </div>

  </div>

</div>

<!--End Modal-->