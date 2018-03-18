<!-- Sidebar -->
<div id="sidebar-wrapper">
	<ul class="sidebar-nav">
		<li>
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
					
				<button type="submit" class="btn center-block btn-primary custom-btn center-horizontal" name="submit" value="submit">Submit</button>
			</form>
		</li>
		<li class="sidebar-brand">
			<a href="profile.php">
				Haushaltsrechner
			</a>
		</li>             
		<li>
			<a href="overview.php">Kontoübersicht</a>
		</li>
		<li>
			<a href="setting.php">Einstellungen</a>
		</li>
		<li>
			<a href="agreements.php">Verträge</a>
		</li>               
		<li>
			<a href="ausgaben.php">Ausgaben</a>
		</li>	
		<li>
			<a href="einnahmen.php">Einnahmen</a>
		</li>
		 <li>
			<a href="logout.php">Logout</a>
		</li>
	</ul>
</div>
<!-- /#sidebar-wrapper -->
