<?php 

include_once('secure.php');

include_once('../db/db_config.php');

$ob=new db_config(); 

?>

<!DOCTYPE html>

<html>

<head>

	<title>Headlines - AsiaUrdu</title>

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'>

  	<!--     Fonts and icons     -->

  	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />

  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

  	<!-- CSS Files -->

  	<link href="assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="assets/css/custom.css">

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
            <div class="col-md-12">
              <button class="btn btn-primary" data-toggle="modal" data-target="#add-headline"><i class="material-icons">add</i>Add New Headline</button>
            </div>
          </div>
          <div class="row">
            <dir class="col-md-12">
              <table class="table table-bordered table-hover text-center">
                <thead class="thead-dark">
                  <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Refer News ID</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql_hl="SELECT * FROM `headlines` ORDER BY headline_id DESC";
                  $result_hl=mysqli_query($ob->config(),$sql_hl);
                  while($row_hl=mysqli_fetch_assoc($result_hl))
                  {
                    ?>
                    <tr>
                      <td><?php echo $row_hl['headline_title']; ?></td>
                      <td><?php echo $row_hl['headline_description']; ?></td>
                      <td><?php echo $row_hl['headline_refer_news_id']; ?></td>
                      <td>
                        <button class="btn btn-info edit-btn" value="<?php echo $row_hl['headline_id']; ?>" data-toggle="modal" data-target="#edit-headline">Edit</button>

                        <button class="btn btn-info del-btn" value="<?php echo $row_hl['headline_id']; ?>">Delete</button>
                      </td>
                    </tr>
                    <?php

                  }

                  ?>

                </tbody>

              </table>

            </dir>

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
      $("#headlines").addClass("active");
    });
  </script>


</body>
</html>

<!--Modal_Area-->

<!-- Add Headline -->
<div class="modal fade" id="add-headline">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add New Headline</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <div class="modal-container">
          <form method="post" action="cont/add_headline.php" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-12">
                <h2 style="text-align: right;">ہیڈ لائن ٹائٹل</h2>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <input type="text" name="title" id="title" class="form-control" required="required">
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <h2 style="text-align: right;">ہیڈ لائن ڈسکرپشن</h2>
              </div>
              <div class="col-md-12">
                <textarea class="form-control" id="description" name="description"></textarea>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <h2 style="text-align: right;">اپ لوڈ امیج</h2>
                <p>Image Size: 900 x 300</p>
              </div>
              <div class="col-md-12">
                <input type="file" name="image" id="image" class="form-control" accept="image/*" required>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <h2 style="text-align: right;">ریفر نیوز آئی ڈی</h2>
                <p>Deault value is 0</p>
              </div>
              <div class="col-md-12">
                <input type="number" name="refer_id" id="refer_id" value="0" class="form-control" required>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <h2 style="text-align: right;">ٹیکسٹ کلر</h2>
              </div>
              <div class="col-md-12">
                <input type="text" name="text_color" id="text_color" value="white" class="form-control" required>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <input type="submit" name="add_headline" class="btn btn-primary" value="Add Headline">
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

<!-- Edit Pkg Id -->
<div class="modal fade" id="edit-headline">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Headline</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <div class="modal-container">
          <form method="post" action="cont/update_headline.php" enctype="multipart/form-data">
            <div class="headline-edit-embed"></div>
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

<script type="text/javascript">
  $(".edit-btn").on("click",function(){
    var edit_hl_id=$(this).val();
     $.ajax({
    url:'ajax/edit_headlines_data.php',
    type:'POST',
    data:{
      edit_hl_id:edit_hl_id
    },
    success: function(data)
    {
      console.log(data);
      $(".headline-edit-embed").html(data);
    }
  });
  });

</script>

<script type="text/javascript">
$(".del-btn").on("click",function(){
  if(confirm("Sure Want to Delete ?"))
  {
    //
    var del_id=$(this).val();
    $.ajax({
      url:'ajax/del_headline.php',
      type:'POST',
      data:{
        del_id:del_id
      },
      success: function(data)
      {
        //alert(data);
        if(data==true)
        {
           location.reload();
        }
      }
    });
    //
  }
}); 

</script>

