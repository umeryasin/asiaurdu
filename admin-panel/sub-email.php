<?php 
include_once('secure.php');
include_once('../db/db_config.php');
$ob=new db_config(); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Subscriptions Email - AsiaUrdu</title>
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
            <table class="table table-bordered table-hover text-center">
              <thead class="thead-dark">
                <tr>
                  <th>Email</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql_all_e="SELECT * FROM `sub_email` ORDER BY `sub_email` DESC";
                $result_all_e=mysqli_query($ob->config(),$sql_all_e);
                while($row_all_e=mysqli_fetch_assoc($result_all_e))
                {
                  ?>
                  <tr>
                    <td><?php echo $row_all_e['sub_email']; ?></td>
                    <td></td>
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
      $("#withdraw-requests").addClass("active");
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
      //Conform Order Start Code
      $(".edit-pkg").on("click",function(){
        js_pkg_id=$(this).val();
        $.ajax({
          url:'corejs/ajax/check_pkg_details.php',
          type:'POST',
          data:{js_pkg_id:js_pkg_id},
          success: function(data)
          {
            $(".modal-container").html(data);
          }
        });
  
      });
      //Conform Order End Code
      //Del Order Request Code Start
      $(".del-pkg").on("click",function(){
        js_pkg_del_id=$(this).val();

      });
      $(".con-del-pkg").on("click",function(){
        $.ajax({
          url:'corejs/ajax/del_pkg_details.php',
          type:'POST',
          data:{
            js_pkg_del_id:js_pkg_del_id
          },
          success: function(data){
            location.reload(true);
          }
        });
      });
      //Del Order Request Code End
    });
  </script>
</body>
</html>

<!--Modal_Area-->
<!-- Edit Pkg Id -->
<div class="modal fade" id="edit-pkg_modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Package Details</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="modal-container">
          
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
<!-- Del Pkg Id -->
<div class="modal fade" id="del-pkg_modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Delete Package Details</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="modal-container-del">
          <p>Are You Sure You Want to Delete This Order Request ?</p>
          <button class="btn btn-danger con-del-pkg">Yes</button>
          <button class="btn btn-info" data-dismiss="modal">No</button>  
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