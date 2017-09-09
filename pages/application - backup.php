
<?php include('config/sub.header.php'); ?>		
<!-- Main -->
			
<section id="main" class="container">
    <div>
        <h4><a href='?page=dashboard'>Dashboard</a>&#32;>> Application</h4>
    </div>
                
    <header>
        <h2>Online application</h2>
        <p>Please take your time and ensure you fill everything correctly</p>    
    </header>
                
    <div class="row">
        <div class="12u">
            <hr/>
            <header>
                <h2>University Application Form</h2>
                <hr/>
            </header>
                       
        <!-- Section 1 Personal Information -->
        <section class="box">
        <h3>Section 1: Personal Details</h3>
        <hr />
        <form method="get" action="?page=application">
            <!--static application No. test -->
        <div class="row uniform 50%">
                                                      <div class="2u 12u(mobilep)">
                                                             <h4>Application No:</h4>
                                                      </div>
                                                <div class="6u 12u(mobilep)">
                                                    <input type="text" name="application_no" disabled='true' id="application_no" value="13432"  placeholder="Application NO" />
                                                </div>

                                               </div>
         <?PHP   
            $sql_query="SELECT * FROM input_details WHERE category_id=1";
            $result=mysqli_query($con,$sql_query);
            
            while($array= mysqli_fetch_assoc($result)){
                if($array['input_type']==="radio"){
                        echo"
                            <div class=\"row uniform 50%\">
                             <div class=\"{$array['label_class']}\">
                             <h4>{$array['input_label']}:</h4>
                            </div>";

                        $sub_sql_query="select options from app_options_list_table where option_id={$array['record_id']}";
                        $sub_result= mysqli_query($con, $sub_sql_query);
                    while($sub_array=mysqli_fetch_assoc($sub_result)){

                        echo"
                        <div class=\"4u 12u(narrower)\">
                        <input type=\"{$array['input_type']}\" id=\"{$array['input_id']}{$sub_array['options']}\" name=\"{$array['input_name']}\">
                        <label for=\"{$array['input_id']}{$sub_array['options']}\">{$sub_array['options']}</label>
                        </div>";
                    }
                    
                        echo"</div>";
                }

                else if($array['input_type']==="select"){
                    echo "
                        <div class=\"row uniform 50%\">
                        <div class=\"{$array['label_class']}\">
                        <h4>{$array['input_label']}:</h4>
                        </div>
                        
                        <div class=\"{$array['text_box_class']}\">
                        <div class=\"select-wrapper\">
                        <select name=\"{$array['input_name']}\" id=\"{$array['input_id']}\">
                        <option value=\"\">- Choose {$array['input_label']} -</option>";

                           //This is where I put the sub query stuff //This will absolute ly work with a
                     //nested if statement                                   
                    if($array['record_id']==='8' || $array['record_id']==='9' || $array['record_id']==='11' ||          $array['record_id']==='18'){
                                                    $sqlvar='8';
                    }

                    else
                       $sqlvar=$array['record_id'];

                      $sub_sql_query="select options from app_options_list_table where option_id={$sqlvar}";
                      $sub_result= mysqli_query($con, $sub_sql_query);
                                
                    while($sub_array=mysqli_fetch_assoc($sub_result)){
                            echo"<option value=\"{$sub_array['options']}\">{$sub_array['options']}</option>";
                    }
                            echo"</select>
                             </div>
                             </div>
                             </div>";
                }
                else{
                    echo" 
                        <div class=\"row uniform 50%\">
                            <div class=\"{$array['label_class']}\">
                            <h4>{$array['input_label']}:</h4>
                            </div>
                            
                            <div class=\"{$array['text_box_class']}\">
                            <input type=\"{$array['input_type']}\" name=\"{$array['input_name']}\" id=\"{$array['input_id']}\" value=\"\" onblur=\"assign()\" placeholder=\"{$array['input_placeholder']}\" />
                            </div>
                         </div>"; 
                    }
            }
            
            ?>  
            <div class="row uniform">
                <div class="12u">
                   <ul class="actions">
                        <li><input type="submit" value="Save section" /></li>
                    </ul>
                </div>
            </div>
        </form>
        </section>

         <!-- Section 2 School history-->
        <section class="box">
         <h3>Section 2: School History</h3>
         <hr />
         <form method="get" action="#">

        <?PHP   
          $sql_query="SELECT * FROM input_details WHERE category_id=2";
          $result=mysqli_query($con,$sql_query);
         
             while($array= mysqli_fetch_assoc($result)){
                if($array['input_type']==="radio"){
                   echo"
                        <div class=\"row uniform 50%\">
                        <div class=\"{$array['label_class']}\">
                        <h4>{$array['input_label']}:</h4>
                        </div>";

                  $sub_sql_query="select options from app_options_list_table where option_id={$array['record_id']}";
                  $sub_result= mysqli_query($con, $sub_sql_query);
                    while($sub_array=mysqli_fetch_assoc($sub_result)){
                        echo"<div class=\"4u 12u(narrower)\">
                        <input type=\"{$array['input_type']}\" id=\"{$array['input_id']}{$sub_array['options']}\" name=\"{$array['input_name']}\">
                        <label for=\"{$array['input_id']}{$sub_array['options']}\">{$sub_array['options']}</label>
                        </div>";
                    }
                    
                    
                    echo"</div>";
                }

              else if($array['input_type']==="select"){
                    echo "
                            <div class=\"row uniform 50%\">
                            <div class=\"{$array['label_class']}\">
                            <h4>{$array['input_label']}:</h4>
                            </div>
                            <div class=\"{$array['text_box_class']}\">
                            <div class=\"select-wrapper\">
                            <select name=\"{}\" id=\"{}\">
                            <option value=\"\">- Choose {$array['input_label']} -</option>";
                        //This is where I put the sub query stuff This will absolute ly work with a
                        if($array['record_id']==='8' || $array['record_id']==='9' || $array['record_id']==='11' || $array['record_id']==='18'){$sqlvar='8';}
                  
                        else $sqlvar=$array['record_id'];
                        $sub_sql_query="select options from app_options_list_table where option_id={$sqlvar}";
                        $sub_result= mysqli_query($con, $sub_sql_query);
                            while($sub_array=mysqli_fetch_assoc($sub_result)){
                               echo"<option value=\"{$sub_array['options']}\">{$sub_array['options']}</option>";
                            }
                               echo"
                                        </select>
                                        </div>
                                        </div>
                                        </div>";
              }
                 
            else{
                echo" 
                        <div class=\"row uniform 50%\">
                        <div class=\"{$array['label_class']}\">
                        <h4>{$array['input_label']}:</h4>
                        </div>
                        <div class=\"{$array['text_box_class']}\">
                        <input type=\"{$array['input_type']}\" name=\"{$array['input_name']}\" id=\"{$array['input_id']}\" value=\"\" placeholder=\"{$array['input_placeholder']}\" />
                        </div>

                </div>";
            }
             }

      ?>  




            <div class="row uniform">
                   <div class="12u">
                       <ul class="actions">
                           <li><input type="submit" value="Save section" /></li> 
                       </ul>
                   </div>
               </div>
            </form>




</section>

        <!-- section 3 Course and University choice-->
        <section class="box">
                                        <h3>Section 3:</h3>
                                            <hr />
                                        <form method="get" action="#">

                                          <?PHP   
                                            $sql_query="SELECT * FROM input_details WHERE category_id=3";
                                            $result=mysqli_query($con,$sql_query);
                                            while($array= mysqli_fetch_assoc($result)){
                                                if($array['input_type']==="radio"){
                                                     echo"<div class=\"row uniform 50%\">
                                                <div class=\"{$array['label_class']}\">
                                                    <h4>{$array['input_label']}:</h4>
                                                </div>";

                                                    $sub_sql_query="select options from app_options_list_table where option_id={$array['record_id']}";
                                                    $sub_result= mysqli_query($con, $sub_sql_query);
                                                    while($sub_array=mysqli_fetch_assoc($sub_result)){

                                                echo"<div class=\"4u 12u(narrower)\">
                                                    <input type=\"{$array['input_type']}\" id=\"{$array['input_id']}{$sub_array['options']}\" name=\"{$array['input_name']}\">
                                                    <label for=\"{$array['input_id']}{$sub_array['options']}\">{$sub_array['options']}</label>
                                                </div>";
                                                }
                                                echo"</div>";
                                                }
                                                else if($array['input_type']==="select")
                                                    {

                                                        echo "<div class=\"row uniform 50%\">
                                                <div class=\"{$array['label_class']}\">
                                                    <h4>{$array['input_label']}:</h4>
                                                </div>
                                                <div class=\"{$array['text_box_class']}\">
                                                    <div class=\"select-wrapper\">
                                                        <select name=\"{}\" id=\"{}\">
                                                            <option value=\"\">- Choose {$array['input_label']} -</option>";

                                                        //This is where I put the sub query stuff
                                                        //This will absolute ly work with a
                                                    if($array['record_id']==='29' ){
                                                        $sub_sql_query="SELECT program_name as options FROM course_table";
                                                            }

                                                        elseif($array['record_id']==='27' ){
                                                             $sub_sql_query="SELECT id, name as options FROM university_table";

                                                        }
                                                        else

                                                        $sub_sql_query="select options from app_options_list_table where option_id={$array['record_id']}";


                                                    $sub_result= mysqli_query($con, $sub_sql_query);
                                while($sub_array=mysqli_fetch_assoc($sub_result)){
                                        echo"<option value=\"{$sub_array['options']}\">{$sub_array['options']}</option>";
                                    }
                                    echo"</select>
                                    </div>
                            </div>
                                            </div>";

                                                }

                                                else{

                                              echo" <div class=\"row uniform 50%\">
                                                <div class=\"{$array['label_class']}\">
                                                    <h4>{$array['input_label']}:</h4>
                                                </div>
                                                <div class=\"{$array['text_box_class']}\">
                                                    <input type=\"{$array['input_type']}\" name=\"{$array['input_name']}\" id=\"{$array['input_id']}\" value=\"\" placeholder=\"{$array['input_placeholder']}\" />
                                                </div>

                                            </div>";

                                            }}

                                            ?>  




                                    <div class="row uniform">
                                                <div class="12u">
                                                    <ul class="actions">
                                                        <li><input type="submit" value="Save section" /></li>

                                                    </ul>
                                                </div>
                                            </div>


                                        </form>




</section>

        <!-- section 4 uploaded documents -->
        <section class="box">
                                        <h3>Section 4:</h3>
                                            <hr />
                                        <form method="get" action="#">

                                          <?PHP   
                                            $sql_query="SELECT * FROM input_details WHERE category_id=7";
                                            $result=mysqli_query($con,$sql_query);
                                            while($array= mysqli_fetch_assoc($result)){
                                                if($array['input_type']==="radio"){
                                                     echo"<div class=\"row uniform 50%\">
                                                <div class=\"{$array['label_class']}\">
                                                    <h4>{$array['input_label']}:</h4>
                                                </div>";

                                                    $sub_sql_query="select options from app_options_list_table where option_id={$array['record_id']}";
                                                    $sub_result= mysqli_query($con, $sub_sql_query);
                                                    while($sub_array=mysqli_fetch_assoc($sub_result)){

                                                echo"<div class=\"4u 12u(narrower)\">
                                                    <input type=\"{$array['input_type']}\" id=\"{$array['input_id']}{$sub_array['options']}\" name=\"{$array['input_name']}\">
                                                    <label for=\"{$array['input_id']}{$sub_array['options']}\">{$sub_array['options']}</label>
                                                </div>";
                                                }
                                                echo"</div>";
                                                }

                                                else if($array['input_type']==="select")
                                                    {

                                                        echo "<div class=\"row uniform 50%\">
                                                <div class=\"{$array['label_class']}\">
                                                    <h4>{$array['input_label']}:</h4>
                                                </div>
                                                <div class=\"{$array['text_box_class']}\">
                                                    <div class=\"select-wrapper\">
                                                        <select name=\"{}\" id=\"{}\">
                                                            <option value=\"\">- Choose {$array['input_label']} -</option>";

                                                        //This is where I put the sub query stuff
                                                        //This will absolute ly work with a
                if($array['record_id']==='8' || $array['record_id']==='9' || $array['record_id']==='11' || $array['record_id']==='18'){
                                                        $sqlvar='8';}

                                                        else
                                                            $sqlvar=$array['record_id'];

                                                        $sub_sql_query="select options from app_options_list_table where option_id={$sqlvar}";


                                                    $sub_result= mysqli_query($con, $sub_sql_query);
                                while($sub_array=mysqli_fetch_assoc($sub_result)){
                                        echo"<option value=\"{$sub_array['options']}\">{$sub_array['options']}</option>";
                                    }
                                    echo"</select>
                                    </div>
                            </div>
                                            </div>";

                                                }
                                                else{

                                              echo" <div class=\"row uniform 50%\">
                                                <div class=\"{$array['label_class']}\">
                                                    <h4>{$array['input_label']}:</h4>
                                                </div>
                                                <div class=\"{$array['text_box_class']}\">
                                                    <input type=\"{$array['input_type']}\" name=\"{$array['input_name']}\" id=\"{$array['input_id']}\" value=\"\" placeholder=\"{$array['input_placeholder']}\" />
                                                </div>

                                            </div>";

                                            }}

                                            ?>  




                                    <div class="row uniform">
                                                <div class="12u">
                                                    <ul class="actions">
                                                        <li><input type="submit" value="Save section" /></li>

                                                    </ul>
                                                </div>
                                            </div>


                                        </form>




</section>

        </div>
    </div>
</section>

                          
<script>

function assign() {

    document.getElementById("first_s").value= <?php echo "{$_SESSION["name"]}";?>

                          
</script>
