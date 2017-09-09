
		<!-- Header -->
			<?php include('config/sub.header.php'); ?>
        			<section id="main" class="container">

        <header>      <?php 
    include('config/setup.php');
        $sqli="SELECT university_table.Name,short_info
FROM university_table 
WHERE university_table.id=".$_GET['id']." ";
        
        $resulttop=mysqli_query($con,$sqli);
            $arraytop=mysqli_fetch_assoc($resulttop);
				echo"	<h2>".$arraytop['Name']."</h2>";
				echo"	<p></p>";
			echo"	</header>
                        
                        <div row no-collapse 50% uniform> 
                        <span class=\"image fit\">
                        <div class=\"slideshow\">";
            $slide_show_query="SELECT id, university_id, image_path FROM uni_slideshow_table where university_id ={$_GET['id']}";
            $slide_result=mysqli_query($con, $slide_show_query);
            while($slide_array=mysqli_fetch_assoc($slide_result)){
                       echo" <img src=\"{$slide_array['image_path']}\" alt=\"\" />";
            }
                        echo"</div>
                        </span>
                            </div>
        <header>";
					
					echo"<p>".$arraytop['short_info']."</p>";
            
				echo"</header>
        <!--slideshow -->
  <section class=\"box special features\">
					<div class=\"features-row\">
						
						
							<span class=\"icon major fa-exchange accent3\"></span>
							<h3>Transfer Students</h3>
							<p>Royal consult ensures transfer students have a smooth and stress-free transfer from your old university to the new university. We ensure we give you the best recommendations on the services and opportunities that are present in our affiliate respected international educational institutions and programs.</p>
						
					</div>
				
				</section>

      
                        <!--slidshowends -->
        <section class=\"box\">
                        <div class=\"table-wrapper\">
    <table id=\"feetu\" class=\"alt\">
        <h4>Programs Information</h4>
    <thead>
      <tr>
        <th>Faculty</th>
        <th>Degree</th>
        <th>Tuition</th>
      </tr>
    </thead>
    <tbody>";
   $sql="SELECT university_table.Name,course_table.program_name, course_table.degree, university_table.logo_path,course_table.tuition_fees
FROM course_table, university_table 
WHERE course_table.university_id=university_table.id AND university_table.id=".$_GET['id']." ";
        
        $result=mysqli_query($con,$sql);
            
       
        while($array=mysqli_fetch_assoc($result)){
        echo  
     " <tr>\n
        <td>".$array['program_name']."</td>\n
        <td>".$array['degree']."</td>\n
        <td>".$array['tuition_fees']."</td>\n
      </tr> ";
      }
        ?>
    </tbody>
  </table>
    </div>
                        </section>
        
        
       
								<ul class="actions">
									<li><a href="?page=application" class="button special">Apply Now</a></li>
									
								</ul>
        </section>
        
       