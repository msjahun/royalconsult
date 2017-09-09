
		<!-- Header -->
			
            <?php include('config/main.header.php'); 
?>
		<!-- Banner -->
			<section id="banner">
				<h2>Royalty Educational Consultancy</h2>
				<p>Browse through the best universities in Cyprus,<br>enjoy university selection and the application process<br> like it was meant to be.</p>
				<ul class="actions">
					<li><a href="?page=register" class="button special">Sign Up</a></li>
					<li><a href="?page=services" class="button">Learn More</a></li>
				</ul>
                
                    
				
			</section>

		<!-- Main -->
			<section id="main" class="container">

				<section class="box special">
					<header class="major">
                        
                        <section class="actions">
					<form method="" action="#">
                        <div >
                            <input type="hidden" id="page" value="courses" name="page"/>
                        </div>
									<div class="actions row uniform 50%">
										<div class="6u 12u(mobilep)">
											<input type="text" name="course" id="course" value="" placeholder="Programs" class="special" />
										</div>
										<div class="2u 12u(mobilep)">
											<input type="submit" value="Search" class="special" />
										</div>
                                        <div class="4u">
											<div class="select-wrapper">
												<select name="category" id="category">
													<option value="">- Choose University-</option>
													<option value="1">Eastern Mediteranean University</option>
													<option value="2">Cyprus International University</option>
													<option value="3">Girne American University</option>
													<option value="4">Near East University</option>
													<option value="5">European University of lefke</option>
													<option value="6">Middle East Technical University</option>
                                                    
												</select>
											</div>
										</div>
									</div>
								</form></section>
					<section class="action">
                        <h2>Search Courses
						<br />
						</h2>
                            </section>
						
						<p>We have over 1,200 programs<br/>from our affiliate Universities from the undergraduate, Masters and Ph.D. Programs.</p>
					</header>
                    <div > 
					<span class="image featured">
                        <div class="slideshow" >
                            <?php
                            $home_slider_query="select id, university_id, image_path FROM uni_slideshow_table order by rand() limit 6";
                            $query_result=mysqli_query($con,$home_slider_query);
                            
                            while($slider_array=mysqli_fetch_assoc($query_result)){
                            
                       echo "<img src=\"{$slider_array['image_path']}\" alt=\"\" >";
                            }
                            
                        
                        ?>
                            </div>
                        </span>
                        </div>
				</section>

				<section class="box special features">
					<div class="features-row">
						<section>
							<span class="icon major fa-check-circle accent2"></span>
							<h3>Get Accepted</h3>
							<p>As choosing to study abroad is a very important and a life changing decision, and obtaining a degree from an international schools or universities will offer you excellent career opportunities and job prospects, therefore, we make sure we help you make the absolute best decision in choosing a university and making sure you get accepted.</p>
						</section>
						<section>
							<span class="icon major fa-exchange accent3"></span>
							<h3>Transfer Students</h3>
							<p>Royal consult ensures transfer students have a smooth and stress-free transfer from your old university to the new university. We ensure we give you the best recommendations on the services and opportunities that are present in our affiliate respected international educational institutions and programs.</p>
						</section>
					</div>
					<div class="features-row">
						<section>
							<span class="icon major fa-share-alt-square accent4"></span>
							<h3>Sharing is caring</h3>
							<p>Our Royal consult is our community educational hub, bringing hundreds of students every year to their dream universities, sharing unique experiences and much more.</p>
						</section>
						<section>
							<span class="icon major fa-globe accent5"></span>
							<h3>Study Internationally</h3>
							<p>Studying in Internationally is one of the best life experience one can wish for, you get to meet other international students from over 110 nationalities in our affiliate Universities. Share experiences, learn about the cultures of a diverse group of people, have fun and much more.</p>
						</section>
					</div>
				</section>

				<div class="row">
					<div class="6u 12u(narrower)">

						<section class="box special">
							<span class="image featured"><img src="images/diploma_homepage.png" alt="" /></span>
							<h3>Diploma</h3>
							<p>We have multiple technical Diplomas in our various affiliate universities. Get the program
                            you want and you'll help you apply</p>
							<ul class="actions">
								<li><a href="?page=services" class="button alt">Learn More</a></li>
							</ul>
						</section>

					</div>
					<div class="6u 12u(narrower)">

						<section class="box special">
							<span class="image featured"><img src="images/undergraduate_homepage.png" alt="" /></span>
							<h3>Degree/ Bachelors'</h3>
							<p>Choose your Degree program, choose the best university for your program, we’ll help you with the application and follow up. We’ll make sure you get accepted into your dream university.</p>
							<ul class="actions">
								<li><a href="?page=services" class="button alt">Learn More</a></li>
							</ul>
						</section>

					</div>
				</div>
                <div class="row">
					<div class="6u 12u(narrower)">

						<section class="box special">
							<span class="image featured"><img src="images/masters_homepage.png" alt="" /></span>
							<h3>Masters</h3>
							<p>We help to select the university that is the best in its field for your master’s studies, we look at things like faculty, accessibility to services, qualification of faculty members and Instructors etc. We make sure you submit the required documents so that you’ll get accepted into the university.</p>
							<ul class="actions">
								<li><a href="?page=services" class="button alt">Learn More</a></li>
							</ul>
						</section>

					</div>
					<div class="6u 12u(narrower)">

						<section class="box special">
							<span class="image featured"><img src="images/phd_homepage.png" alt="" /></span>
							<h3>Ph.d</h3>
							<p>Get ready to be called Dr. when you’re done with your Ph.D.  We help you select the university that is the best for Ph.D. in your applied field. We make sure you get the needed requirements to be accepted into the university you choose.</p>
							<ul class="actions">
								<li><a href="?page=services" class="button alt">Learn More</a></li>
							</ul>
						</section>

					</div>
				</div>

<section class="box special features"> 
        <h3>Our affiliate universities are the best in the country</h3>
										<ul class="icons">
											<li class="4u" ><a href="?page=university&id=1" ><span href="?page=university&id=1" class="icon major"><img src="images/unilogos/emu-dau-logo.png" style="width:100%" alt="" />
                                                <a href="?page=university&id=1"><h1>Eastern Mediteranean University</h1>
                                                <p>Famagusta <br>Phone:+90 392 630 11 11</p></a></span>
							</li>
                                            
													<li class="4u"><a href="?page=university&id=3" ><span class="icon major"><img src="images/unilogos/girne.png" style="width:100%" alt="" /><a href="?page=university&id=3"><h4>Girne American University</h4><p>Üniversite Yolu Sk, Karaman <br>Phone:+90 392 650 20 00</p></a></span>
							</li>
                                                        <li class="4u"><a href="?page=university&id=6" ><span class="icon major"><img src="images/unilogos/metu_new.png" style="width:100%" alt="" /><a href="?page=university&id=6"><h4>Middle East Technical University</h4><p>Üniversiteler Mahallesi, Eskişehir Yolu No:1, 06800 Çankaya/Ankara, Turkey <br>Phone:+90 312 210 20 00</p></a></span>
                                                            </li>
													<li class="4u"><a href="?page=university&id=4" ><span class="icon major"><img src="images/unilogos/neareast.png" style="width:100%" alt="" /><a href="?page=university&id=4"><h4>Near East University</h4><p>Address: Yakın Doğu Blv, Lefkoşa <br>Phone: +90 392 223 64 64</p></a></span>
							</li>
                                                        		<li class="4u"><a href="?page=university&id=2" ><span class="icon major"><img src="images/unilogos/ciuuio.png" style="width:100%" alt="" /><a href="?page=university&id=2"><h4>Cyprus International University</h4><p>Address: Haspolat <br>Phone: +90 392 671 11 11</p></a></span>
							</li>
                                            <li class="4u"><a href="?page=university&id=5" ><span class="icon major"><img src="images/unilogos/eul.jpg" style="width:100%" alt="" /><a href="?page=university&id=5"><h4>European University of Lefke</h4><p>Karavostasi <br>Phone: +90 392 660 20 00</p></a></span>
							</li>
    		
										</ul>
    </section>
        
               

		