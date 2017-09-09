<?php include('config/setup.php'); ?>
				<h1><a href="../">Royalty Educa</a>tional Consultancy</h1>
				<nav id="nav">
					<ul>
						<li><a href="../">Home</a></li>
                        <li><a href="?page=services">Our Services</a></li>
								<li><a href="?page=contact">Contact Us</a></li>
								
						<li>
							<a href="" class="icon fa-angle-down">Universities</a>
							<ul>
								<?php 
                                $sql="SELECT id, name FROM university_table";
                                $result=mysqli_query($con,$sql);
                                while($array= mysqli_fetch_assoc($result)){
                                        echo"<li><a href=\"?page=university&id={$array['id']}\">{$array['name']}</a></li>";
                                }
                                            ?>
                                <!--
										<li><a href="?page=university&id=1">Eastern Mediteranean University</a></li>
										<li><a href="?page=university&id=2">Cyprus International University</a></li>
										<li><a href="?page=university&id=3">Girne American University</a></li>
										<li><a href="?page=university&id=4">Near East University</a></li>
									<li><a href="?page=university&id=5">European University of lefke</a></li>
									<li><a href="?page=university&id=6">Middle East Technical University</a></li>
								-->
							</ul>
						</li>
                        <?php
                       
                        if(isset($_SESSION['set'])){
                            $page_name=""; 
                            $label_name="Account";
                            $class_name="icon fa-angle-down";}
                        else{
                            $page_name="?page=signin"; $label_name="Sign In";
                        $class_name="button";}
						
                         echo"<li><a href=\"{$page_name}\" class=\"{$class_name}\">{$label_name}</a>";
                          
                           
                        ?>
                        <?php
                       
                        if(isset($_SESSION['set'])){
                            echo"
                            <ul>
                            
                            
				            <li><a href=\"?page=dashboard\">Dashboard</a></li>
				            <li><a href=\"?page=application\">Online application</a></li>
				            <li><a href=\"#\">settings</a></li>
				            <li><a href=\"?page=logout\">Logout</a></li>
                            </ul> ";
                        
                        }
                       
						echo"</li>";
                         
                          
                           
                        ?>
					</ul>
				</nav>
			