<!DOCTYPE html>
<html>
<head>
	<title>Login - AsiaUrdu</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'>
  	<!--     Fonts and icons     -->
  	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  	<!-- CSS Files -->
  	<link href="assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet">
  	<!-- Favicon-->
    <!--Custom-CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/custom.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<p class="login-title-text mt-lg-5">AsiaUrdu Login</p>
			</div>
		</div>
		<form method="post" action="javascript:login()" id="login_form">
			<div class="row">
				<div class="col-md-2 offset-3 text-center">
					<span class="login-email-title">Email</span>
				</div>
				<div class="col-md-3">
					<input type="email" name="email" class="form-control log-box" required="required">
				</div>
			</div>
			<div class="row">
				<div class="col-md-2 offset-3 text-center">
					<span class="login-email-title">Password</span>
				</div>
				<div class="col-md-3">
					<input type="password" name="password" class="form-control log-box" required="required">
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">
					<input type="submit" name="login" value="SignIn" class="btn btn-info">
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<p class="text-center error-message" style="color: red;font-size: 20px; display: none;">Login Error</p>
				</div>
			</div>
		</form>
	</div>
</body>
</html>
<script src="assets/js/core/jquery.min.js"></script>
<script type="text/javascript">
	function login()
	{
		 var datastring = $("#login_form").serialize();
        $.ajax({
            type: "POST",
            url: "ajax/login_conform_ajax.php",
            data: datastring,
            success: function(data) {
                 if(data=='logedin')
                 {
                 	window.location='index.php';
                 }
                 else
                 {
                 	$(".error-message").show();
                 	$(".log-box").val('');
                 }
            }
        });
	}
</script>