<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registrierung</title>
	
	<!-- Style CSS -->
	 <link href="style.css" rel="stylesheet">
	
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

    <div id="wrapper">

        <?php include('sidebar_default.php');?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
						
						<form class="center-block" id="register-form" action="includes/signup.inc.php" method="post">
							
							<h3 class="header-middle text-center">Hey man, wassup?</h3>
							<h2 class="header-big text-center">Sign up</h2>
							
							<div class="form-group custom-form-group">
								<input name="first" type="text" class="form-control custom-form" id="" aria-describedby="emailHelp" placeholder="Firstname">
							</div>
							<div class="form-group custom-form-group">
								<input name="email" type="email" class="form-control custom-form" id="" aria-describedby="emailHelp" placeholder="Email">
							</div>
							<div class="form-group custom-form-group">
								<input name="username" type="text" class="form-control custom-form" id="" aria-describedby="emailHelp" placeholder="Username">
							</div>
							<div class="form-group custom-form-group">
								<input name="pwd" type="password" class="form-control custom-form" id="" aria-describedby="emailHelp" placeholder="Password">
							</div>
							<div class="form-group custom-form-group">
								<input name="pwd_check" type="password" class="form-control custom-form" id="" placeholder="Repeat Password">
								<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
							</div>
								
							<button type="submit" class="btn center-block btn-primary custom-btn center-horizontal" name="signup" value="submit">Submit</button>
						</form>
						
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>

 
