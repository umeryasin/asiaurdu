<?php
include_once('secure.php');
include_once('../db/db_config.php');
$ob=new db_config(); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Profile - AsiaUrdu</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'>
  	<!--     Fonts and icons     -->
  	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  	<!-- CSS Files -->
  	<link href="assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet">
  	<!-- Favicon-->
    <style type="text/css">
      .font-control{
        font-size: 30px;
      }
    </style>
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
              <h2>Admin Profile</h2>
            </div>
          </div>
          <?php
          $user_id=$_SESSION['userid'];
          $sql="SELECT * FROM `admin_login` WHERE admin_id=$user_id";
          $result=mysqli_query($ob->config(),$sql);
          $row=mysqli_fetch_assoc($result);
          ?>
          <form method="post" action="cont/action_update_profile.php" enctype="multipart/form-data">
            <input type="hidden" name="userid" value="<?php echo $user_id; ?>">
            <div class="row">
              <div class="col-md-2">
                <p class="font-control">Name</p>
              </div>
              <div class="col-md-8">
                <input type="text" name="admin_name" class="form-control" required="required" placeholder="Name" value="<?php echo $row['name']; ?>">
              </div>
            </div>
            <div class="row">
              <div class="col-md-2">
                <p class="font-control">Email</p>
              </div>
              <div class="col-md-8">
                <input type="email" name="admin_email" class="form-control" required="required" placeholder="Email" value="<?php echo $row['email']; ?>">
              </div>
            </div>
            <div class="row">
              <div class="col-md-2">
                <p class="font-control">Password</p>
              </div>
              <div class="col-md-8">
                <input type="password" name="admin_password" class="form-control" required="required" placeholder="Password" value="<?php echo $row['password'] ?>">
              </div>
            </div>
            <div class="row">
              <div class="col-md-2">
                <p class="font-control">Admin Profile Picture</p>
              </div>
              <div class="col-md-2">
                <?php
                  echo '<img src="data:image/jpeg;base64,'.base64_encode($row['admin_profile_pic'] ).'" class="img-responsive" alt="No Image" style="width:150px;" >';
                ?>
              </div>
              <div class="col-md-4">
                <input type="file" name="admin_pic" class="form-control" required="required">
              </div>
            </div>
            <div class="row">
              <div class="col-md-2">
                <p class="font-control">Admin Url</p>
              </div>
              <div class="col-md-8">
                <input type="text" name="admin_url" class="form-control" required="required" value="<?php echo $row['admin_url']; ?>">
              </div>
            </div>
            <div class="row">
              <div class="col-md-2">
                <p class="font-control">Admin Bio</p>
              </div>
              <div class="col-md-8">
                <textarea name="admin_bio" class="form-control" style="min-height: 100px;"><?php echo $row['admin_bio']; ?></textarea>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <input type="submit" name="update" value="Update">
              </div>
            </div>
          </form>
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

</body>
</html>

<!--Modal_Area-->
<!-- Edit Pkg Id -->
<div class="modal fade" id="add-plan">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add New Plan</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="modal-container">
          <form method="post" action="cont/action_add_plan.php">
            <div class="row">
              <div class="col-md-4">
                <p>Plan Name</p>
              </div>
              <div class="col-md-8">
                <input type="text" name="plan_name" class="form-control" required>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <p>Plan Price</p>
              </div>
              <div class="col-md-8">
                <input type="text" name="plan_price" class="form-control" required>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <p>Per Week Bonus</p>
              </div>
              <div class="col-md-8">
                <input type="text" name="per_week_bonus" class="form-control" required>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <p>Direct Bonus</p>
              </div>
              <div class="col-md-8">
                <input type="text" name="direct_bonus" class="form-control" required>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <p>Pair Bonus</p>
              </div>
              <div class="col-md-8">
                <input type="text" name="pair_bonus" class="form-control" required>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <p>In Direct Pair Bonus</p>
              </div>
              <div class="col-md-8">
                <input type="text" name="indirect_pair_bonus" class="form-control" required>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <p>Duration</p>
              </div>
              <div class="col-md-8">
                <input type="text" name="duration" class="form-control" required>
              </div>
            </div>
            <div class="row">
              <input type="submit" name="add_plan" class="btn">
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
<!-- Del Pkg Id -->
<div class="modal fade" id="edit-plan">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Plan</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div id="edit-section"></div>
        <div class="modal-container-del">
          <p>Are You Sure You Want to Delete This Plan ?</p>
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
<script type="text/javascript">
  $(".edit-plan").on("click",function(){
    var edit_id=$(this).val();
    $.ajax({
      url:'corejs/ajax/edit_plan.php',
      type:'POST',
      data:{
      edit_id:edit_id    
      },
      success: function(data)
      {
        $("#edit-section").html(data);
      }
    });
  });
</script>