<?php 

include_once('secure.php');

include_once('../db/db_config.php');

$ob=new db_config(); 

?>

<!DOCTYPE html>

<html>

<head>

	<title>News Categories - AsiaNews</title>

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'>

  	<!--     Fonts and icons     -->

  	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />

  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

  	<!-- CSS Files -->

  	<link href="assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet">

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

        		<div class="col-md-12">

        			<p>

        				<button class="btn btn-primary" data-toggle="modal" data-target="#add-category">

        					<i class="material-icons">add</i>

        				Add New Category</button>

        			</p>

        		</div>

        	</div>

          <div class="row">

            <table class="table table-bordered table-hover text-right" id="myTable">

              <thead class="thead-dark">

                <tr>

                  <th>News Category</th>

                  <th>Permalink</th>

                  <th>Action</th>

                </tr>

              </thead>

              <tbody>

              <?php

              $sql_all="SELECT * FROM `news_categories`";

              $result_all=mysqli_query($ob->config(),$sql_all);

              while($row_all=mysqli_fetch_assoc($result_all))

              {

              	?>

                <tr>

              	<td><?php echo $row_all['news_categories']; ?></td>

                <td><?php echo $row_all['permalink']; ?></td>

              	<td>
              		<button class="btn btn-info edit-btn" data-toggle="modal" data-target="#edit_cate_modal" value="<?php echo $row_all['news_categories_id']; ?>">
                    <i class="material-icons">edit</i>
                  </button>
              		<button class="btn btn-info del-btn" value="<?php echo $row_all['news_categories_id']; ?>">
                    <i class="material-icons">delete</i>  
                  </button>
              	</td>

                </tr>

              	<?php

              }

              ?>

              </tbody>

            </table>

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
      $("#all_users").addClass("active");
    });
  </script>

  <script type="text/javascript">
    var pkg=new Array();
    $(".edit-btn").on("click",function(){
      var edit_id=$(this).val();
      //alert(edit_id);
      $.ajax({
        type:'POST',
        url:'ajax/get_edit_data.php',
        data:{
          edit_id:edit_id
        },
        success: function(data)
        {
          pkg=data.split(",");
          console.log(edit_id);
          //
          $("#cat_edit_id").val(edit_id);
          $("#cate_name_edit").val(pkg[0]);
          $("#permalink_edit").val(pkg[1]);
        }
      })
    });
  </script>

</body>

</html>

<!--Modal_Area-->

<!--Add Category-->
<div class="modal fade" id="add-category">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add News Category</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <div class="modal-container">
          <form method="post" action="cont/action_add_news_category.php">
            <div class="row">
              <div class="col-md-4">
                <p>Category</p>
              </div>
              <div class="col-md-8">
                <input type="text" name="cate_name" class="form-control" required="required">
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <p>Permalink in English</p>
              </div>
              <div class="col-md-8">
                <input type="text" name="permalink" class="form-control" required="required">
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 d-flex justify-content-between">
                <input type="submit" name="save" value="Save" class="btn btn-success">
              </div>
            </div>
          </form>
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
<!--Add Category-->
<div class="modal fade" id="edit_cate_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit News Category</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <div class="modal-container">
          <form method="post" action="cont/save_edit_cat_data.php">
            <div class="row">
              <div class="col-md-4">
                <p>Category</p>
                <input type="hidden" name="cat_edit_id" id="cat_edit_id">
              </div>
              <div class="col-md-8">
                <input type="text" name="cate_name_edit" id="cate_name_edit" class="form-control" required="required">
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <p>Permalink in English</p>
              </div>
              <div class="col-md-8">
                <input type="text" name="permalink_edit" id="permalink_edit" class="form-control" required="required">
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 d-flex justify-content-between">
                <input type="submit" name="save" value="Save" class="btn btn-success">
              </div>
            </div>
          </form>
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