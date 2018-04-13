 <!-- Sidebar -->
<div class="row">
	<div id="sidebar-wrapper">
		<ul class="sidebar-nav">
			<div class="col-md-12">
				<li>
					<?php
						if(isset($_SESSION['uid'])) {
							
						}
					?>
					
					<form class="" id="sidebar-form" action="includes/login.inc.php" method="post">
						<div class="form-group custom-form-group">
							<div>
								<h3 class="header-middle">Welcome back</h3>
							</div>
							<input name="uid" type="text" class="form-control custom-form" id="" aria-describedby="emailHelp" placeholder="Username/e-mail">
						</div>

						<div class="form-group custom-form-group">
							<input name="pwd" type="password" class="form-control custom-form" id="" aria-describedby="emailHelp" placeholder="Password">
						</div>
													
						<button type="submit" class="btn btn-primary custom-btn go-right" name="login" value="submit">Login</button>
					</form>
				</li>
				
				<li class="sidebar-brand"><a href="#">Haushaltsrechner</a></li> 
				
				<li><a href="signup.php">Registrieren</a></li>
				
				<li><a href="information.php">Information</a></li>
			</div>				
		</ul>
	</div>
</div>
