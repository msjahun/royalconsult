 <?php include('config/sub.header.php'); ?>
<!-- Main -->
			<section id="main" class="container 75%">
				<header>
					<h2>Welcome Back</h2>
					<p>Sign in to your user account to complete your application or track your application progress. Be sure to always save your application before loging out</p>
				</header>
				<div class="box">
					<form method="post" action="?page=loglanding">
						<div class="row uniform 50%">
							<div class="2u 12u(mobilep)">
                                <h4>Email:</h4>
							</div>
							<div class="6u 12u(mobilep)">
								<input type="email" name="email" id="email" value="" placeholder="Email" required/>
							</div>
						</div>
						<div class="row uniform 50%">
							<div class="2u 12u(mobilep)">
                                <h4>Password:</h4>
							</div>
							<div class="6u 12u(mobilep)">
								<input type="password" name="password" id="password" value="" placeholder="Password" required/>
							</div>
						</div>
						
						<div class="row uniform">
							<div class="9u">
								<ul class="actions align-center">
									<li><input class="special small" type="submit" value="Sign in" /></li>
									<li><a href="?page=reset_password" class="button small">forgot Password</a></li>
								</ul>
							</div>
                            
						</div>
                        
                        <hr>
                        <div class="row uniform">
                        <h4> Or you sign up if you don't have an account <a href="?page=register" >Register</a> </h3>
                            
								

				
                        </div>
					</form>
				</div>
                <?php include('config/social.php'); ?>
			</section>

