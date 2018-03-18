<?php
session_start();
$mysqli = new mysqli( 'localhost', 'root', '', 'test2');

if(!isset($_SESSION['userid'])) {
	die('Bitte zuerst <a href="login.php">einloggen</a>');
}

var_dump($_SESSION['userid']);

 ?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Profile</title>
	
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

        <?php include ("sidebar.php"); ?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div clavss="row">
					<div class="col-md-12">
					<a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
						<h1>pfandflaschen rechner</h1>
					</div>
                    <div class="col-md-12 pfandbox">
					
					<?php
						$showFormular = true; //Variable ob das Registrierungsformular anezeigt werden soll
						 
						if(isset($_GET['send'])) {
							$error = false;
						
							//Keine Fehler, wir können den Nutzer registrieren
							//Check database connection
							if( $mysqli -> connect_error){
								return false;
							} else{
								if( $stmt = $mysqli->prepare("INSERT INTO ausgaben (date, object, price, store ) VALUE (?, ?, ?, ?)")){
									$stmt->bind_param('ssds', $date, $object, $price, $store);
												
									$date = $_POST['date'];
									$object = $_POST['object'];
									$price = $_POST['price'];
									$store = $_POST['store'];
												
									if( !$stmt->execute()){
										return false;
									}
								} else {
									// for debugging purposes use: v
									var_dump($mysqli->error); exit;
									return false;
								}
							}							
						}
						 
						if($showFormular) {
					?>
					 
					<form action="?send=1" method="post">
						Preis:<br>
						<input type="text" size="40" maxlength="250" name="price"><br><br>
						
						Objekt:<br>
						<input type="text" size="40" maxlength="250" name="object"><br><br>
						
						Datum:<br>
						<input type="text" size="40"  maxlength="250" name="date" id="datepicker"><br>
						
						Laden:<br>
						<input type="text" size="40"  maxlength="250" name="store"><br>
						
						<input type="submit" value="Abschicken">
					</form>
						 
						<?php
						} //Ende von if($showFormular)
						?>
							
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
	<script src="jquery-ui-1.12.0.custom/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="jquery-ui-1.12.0.custom/jquery-ui.min.css">
	
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
		$("#menu-toggle").click(function(e) {
			e.preventDefault();
			$("#wrapper").toggleClass("toggled");
		});
		$(document).ready(function(){
			$("#datepicker").datepicker({
				dateFormat: "yy.mm.dd"
			});
			
		});
	</script>
</body>
</html>