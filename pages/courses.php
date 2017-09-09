
		<!-- Header -->
			
            <?php include('config/main.header.php'); ?>
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
                    </section>
                   <section class="action">
                        <h2> Search Results
						</h2>
                       <p>If you cannot see the university you are looking for please send us an email</p>
                            </section>
                    
                    <?php 
                
                //".$_GET['category']."=university_table.id 
                              include('config/setup.php');
                $university_ide=$_GET['category'];
                if($university_ide>=1 && $university_ide<=6){
                   // echo "<p> True $university_ide </p>";
                    $university_id="course_table.university_id=$university_ide";
                    //echo "<p>$university_id</p>";
                }
                else{
                    
                    $university_id="course_table.university_id>=1 AND course_table.university_id<=6";
                    //echo "<p> $university_id </p>";
                }
                            //  $con = mysqli_connect("localhost", "root", "", "dbmain");
                 if(isset($_GET['course']) && $_GET['course']=="")
                   $sql="SELECT university_table.Name, course_table.program_name, course_table.degree, university_table.logo_path FROM course_table, university_table WHERE course_table.university_id=university_table.id AND course_table.program_name like \"xxxxxxxxxxxx\"  ";
                            else if(isset($_GET['course'])){
                                 $sql="SELECT university_table.id,university_table.Name, course_table.program_name, course_table.degree, university_table.logo_path FROM course_table, university_table WHERE course_table.university_id=university_table.id AND course_table.program_name like \"%".$_GET['course']."%\" AND $university_id";
                            
                           // echo"<p> $sql </p>";
                            }
                
               
                else
                     $sql="SELECT university_table.Name, course_table.program_name, course_table.degree, university_table.logo_path FROM course_table, university_table WHERE course_table.university_id=university_table.id AND course_table.program_name like \"xxxxxxxxxxxx\"  ";
                
                                $result= mysqli_query($con,$sql);
                
                                $num_of_row= mysqli_num_rows($result);
                                    if($num_of_row==0){
                                        echo"<p>No results found</p>";
                                        
                                    }
                
                else{
                    echo"<p>".$num_of_row." results found</p>";
                              while ($array=mysqli_fetch_assoc($result)){

                     echo" <section class=\"box align-left\">\n";
                       echo"     <div class=\"row\">\n";
                         echo"       <div class=\"5u\">\n";
                         echo"   <ul class=\"icons\">\n";
						 echo" <li ><a href=\"#\" ><img src=\"".$array['logo_path']."\" style=\"width:100%\" alt=\"\" />\n";
							 echo" </li>\n";
                           echo"     </ul>\n";
                         echo"   </div>\n";
                              
            




                    echo "<div class=\"7u\">\n";
					echo "<h3><a href=\"?page=university&id=".$array['id']."\">".$array['Name']."</a></h3>\n";
					
                        
				  echo" <p >Eastern Mediteranean University is one of North Cyprus leading universities with an international reputation for academic excellence and innovation</p>\n";            
				   
					echo"<div >\n";
						echo "<strong>Relevant Course(s):</strong>\n";
						echo "<ul>\n";
                         echo "   <li>".$array['program_name']."<div>\n";
                            echo "    <span>".$array['degree']."</span>\n";
                            
                          echo "      </div>\n";
                         echo "   </li>\n";
                      echo "  </ul>\n";
					echo "</div>	\n";
                     echo "   <ul class=\"icons\">\n";
                              
										echo "	<li><a href=\"#\" class=\"icon fa-twitter\"><span class=\"label\">Twitter</span></a></li>\n";
                              
											echo "<li><a href=\"#\" class=\"icon fa-facebook\"><span class=\"label\">Facebook</span></a></li>\n";
                              
										echo "	<li><a href=\"#\" class=\"icon fa-instagram\"><span class=\"label\">Instagram</span></a></li>\n";
                              
                            echo "     </ul>\n";
		 echo" <ul class=\"actions\">
									<li><a href=\"#\" class=\"button \">Apply Now</a></li>
									
								</ul>";
                                                
		echo "	</div>\n";
                          
                      echo "    </div>\n";
                  echo "      </section>\n";
               }}
				?>

				
		