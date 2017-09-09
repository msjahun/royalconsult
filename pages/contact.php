
		
 <?php include('config/sub.header.php'); ?>
<!-- Main -->
			<section id="main" class="container 75%">
				<header>
					<h2>Contact Us</h2>
					<p>Tell us what you think about our little operation.</p>
                    
				</header>
				<div class="box">
					<form method="post" action="#">
						<div class="row uniform 50%">
							<div class="6u 12u(mobilep)">
								<input type="text" name="name" id="name" value="" placeholder="Name" required/>
							</div>
							<div class="6u 12u(mobilep)">
								<input type="email" name="email" id="email" value="" placeholder="Email" required/>
							</div>
						</div>
						<div class="row uniform 50%">
							<div class="12u">
								<input type="text" name="subject" id="subject" value="" placeholder="Subject" required/>
							</div>
						</div>
						<div class="row uniform 50%">
							<div class="12u">
								<textarea name="message" id="message" placeholder="Enter your message" rows="6" required></textarea>
							</div>
						</div>
						<div class="row uniform">
							<div class="12u">
								<ul class="actions align-center">
									<li><input class="special" type="submit" value="Send Message" /></li>
								</ul>
							</div>
						</div>
					</form>
				</div>
                <?php include('config/social.php'); ?>

			</section>
