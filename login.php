<?php 
session_start();
$mysqli = new mysqli( 'localhost', 'root', '', 'test2');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>
	
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
<!--TODO: content, stylen-->
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Haushaltsrechner
                    </a>
                </li>             
                <li>
                    <a href="registrierung.php">Registrieren</a>
                </li>
                <li>
                    <a href="login.php">Anmelden</a>
                </li>
				<li>
                    <a href="calculation.php">Rechner</a>
                </li>					
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
						<?php 
							if(isset($_GET['login'])) {
								$email = $_POST['email'];
								$password = $_POST['passwort'];
								
                                 $query = "SELECT * FROM users WHERE email = '$email' ";
                                
								$result = mysqli_query($mysqli, $query);
                                
                                //var_dump($result);
                                
                                if ($result){
                                    $user_array = mysqli_fetch_row($result);
                                    $user_email = $user_array[1];
                                    $user_passwordhash = $user_array[2];
                                    $user_name = $user_array[3];
                                    $user_id = $user_array[0];
                                    
                                    var_dump($user_name);
                                    
                                    //Überprüfung des Passworts
                                    if ($result !== false && password_verify($password, $user_passwordhash)) {
                                    

                                        $_SESSION['userid'] = $user_id;
                                        die('Login erfolgreich. Weiter zu <a href="profile.php">internen Bereich</a>');
                                    } else {
                                        $errorMessage = "E-Mail oder Passwort war ungültig<br>";
                                    }
                                } else {
                                    $errorMessage = "Kein Ergebnis aus der Datenbankabfrage";
                                }
                                                     					
							}
							
							
							 
	
							if(isset($errorMessage)) {
								echo $errorMessage;
							}
							?>
							 
							<form action="?login=1" method="post">
							E-Mail:<br>
							<input type="email" size="40" maxlength="250" name="email"><br><br>
							
							 
							Dein Passwort:<br>
							<input type="password" size="40"  maxlength="250" name="passwort"><br>
							 
							<input type="submit" value="Abschicken">
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

