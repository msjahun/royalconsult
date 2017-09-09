
<?php include('config/sub.header.php'); ?>		
<!-- Main -->
<?php 
if(isset($_POST['application_type'])){
    $_SESSION["sent"]="true";
}
 if(isset($_POST['name_attended'])){
    $_SESSION["section2"]="true";
    
}
if(isset($_POST['del_name_of_schools_attended'])){
    $_SESSION["section2del"]="true";
   // echo " code was here 1";
    
}

if(isset($_POST['del_file_name'])){
    $_SESSION["section4del"]="true";
   // echo " code was here 1";
    
}
if(isset($_POST['university'])){
    $_SESSION["section3"]="true";
   echo " code was here section3";
    
}
//echo"I want to set session key";
//if(isset($_POST['file_session'])){
   // $_SESSION["upload"]="true";
//   echo " code was here upload";
    
//}
//echo "if you see me before an important text, that means I have failed";
//if(($_SESSION["set"]=== "true") && (isset($_SESSION["upload"])) &&  (isset($_SESSION['application_no']))){
//echo" file was here";
/**
 * Created by PhpStorm.
 * User: Alyssa
 * Date: 1/16/2016
 * Time: 1:12 PM
 */
$max_size = 3000000000; //30KB
$location = 'images/uploads/'; //where the file is going
if (isset($_POST['submit'])) { //checking for anythiing will break the code
    $name = $_FILES['file']['name']; //file name
    $size = $_FILES['file']['size']; //file size
    $type = $_FILES['file']['type']; //file type
    $tmp_name = $_FILES['file']['tmp_name']; //temp location on server
    if(checkType($name, $type) && checkSize($size, $max_size)){
            if (isset($name)) {
                save_file($tmp_name, $name, $location); //call my function
            }
    }
    
    
    
    
//This is where I put everything in the database


if(($_SESSION["set"]=== "true")&& (isset($_SESSION['application_no']))){
    /*echo"this line has been triggered";*/
 $application_no= $_SESSION['application_no'];
$document_type=$_POST['document_type'];
$description_description=$_POST['description_description'];
$file=$name;

$sql_insert_data=" INSERT INTO app_supporting_documents(application_no, document_type, description, file_name, path_to_file) VALUES ({$application_no},\"{$document_type}\",\"{$description_description}\",\"{$file}\",\"images/uploads/{$file}\")  ";
    
  //echo $sql_insert_data;
include('config/setup.php'); 
    $result=mysqli_query($con,$sql_insert_data); 
}
//This is where the magic happens




} else {
    //echo 'Please select a file:';
}

function checkType($name, $type){
    //$extension = strtolower(substr($name, strpos($name, '.') + 1)); //get the extension
    $extension = pathinfo($name, PATHINFO_EXTENSION); //better way to get extension
    if (!empty($name)) {
        if (($extension == 'jpg' || $extension == 'png') && ($type == 'image/jpeg' || $type == 'image/png')) {
            return true;
        } else{
            echo 'That is not a jpg or png';
            return false;
        }
    }
}
function checkSize($size, $max_size){
    if($size <= $max_size){
        return true;
    } else{
        echo 'File is too large. Max size in 30KB.';
        return false;
    }
}
function fileExists($name){
    $filename = rand(1000,9999).md5($name).rand(1000, 9999);
    echo $filename;
    return false;
}
function save_file($tmp_name, $name, $location){
    $og_name = $name;
    //so long as the name is in existance - loop to check new name after it is generated
    while (file_exists('uploads/' . $name)) {
        echo 'File already exists. Generating name.<br/>';
        $rand = rand(10000, 99999);
        $name = $rand . '.' . pathinfo($name, PATHINFO_EXTENSION); //create new name
    }
    if (move_uploaded_file($tmp_name, $location . $name)) {
        echo 'Success! ' . $og_name . ' was uploaded';
        if(!($og_name==$name)){ //if original name != name
            echo ' and renamed to '.$name.'.<br/>';
        } else{
            echo '.';
        }
    } else {
        echo 'ERROR!';
    }
}
//$_SESSION["upload"]="false";}

if(($_SESSION["set"]=== "true") && (isset($_SESSION["sent"])) &&  (isset($_SESSION['application_no']))){
    //echo"this line has been triggered";
 $application_no= $_SESSION['application_no'];
 $application_type= $_POST['application_type'];
 $surname_name= $_POST['surname_name'];
 $first_s= $_POST['first_s'];
 $mothers_name= $_POST['mothers_name'];
 $gender_gender= $_POST['gender_gender'];
 $date_birth= $_POST['date_birth'];
 $country_birth= $_POST['country_birth'];
 $nationality_nationality= $_POST['nationality_nationality'];
 $postal_address= $_POST['postal_address'];
 $country_country= $_POST['country_country'];
 $e_mail= $_POST['e_mail'];
 $tel_no= $_POST['tel_no'];
 $mobile_no= $_POST['mobile_no'];
 $fax_no= $_POST['fax_no'];
 $passport_number= $_POST['passport_number'];
 $date_issue= $_POST['date_issue'];
 $country_issue= $_POST['country_issue'];
 $date_expiry= $_POST['date_expiry'];
 $additional_remarks= $_POST['additional_remarks'];

$sql_insert_data="UPDATE app_personal_details_table SET application_type=\"{$application_type}\",surname=\"{$surname_name}\",first_name=\"{$first_s}\",mothers_name=\"{$mothers_name}\",gender=\"{$gender_gender}\",date_of_birth=\"{$date_birth}\",country_of_birth=\"{$country_birth}\",nationality=\"{$nationality_nationality}\",postal_address=\"{$postal_address}\",country=\"{$country_country}\",email=\"{$e_mail}\",tel_no=\"{$tel_no}\",mobile_no=\"{$mobile_no}\",fax_no=\"{$fax_no}\",passport_number=\"{$passport_number}\",date_issue=\"{$date_issue}\",country_issue=\"{$country_issue}\",date_expiry=\"{$date_expiry}\",additional_remarks=\"{$additional_remarks}\" WHERE application_no={$_SESSION['application_no']}";
include('config/setup.php');
  //  $con = mysqli_connect("localhost", "root", "", "dbmain");
//echo $sql_insert_data;
    
    $result=mysqli_query($con,$sql_insert_data);
unset($_SESSION['sent']); 
}
   
if(($_SESSION["set"]=== "true") && (isset($_SESSION["section2"])) &&  (isset($_SESSION['application_no']))){
    //echo"this line has been triggered";
 $application_no= $_SESSION['application_no'];
 $name_attended=$_POST['name_attended'];
$diploma_type=$_POST['diploma_type'];
$diploma_date=$_POST['diploma_date'];


$sql_insert_data="INSERT INTO app_education_table(application_no, name_of_schools_attended, diploma_type, diploma_date) VALUES ({$_SESSION['application_no']},\"{$name_attended}\",\"{$diploma_type}\",\"{$diploma_date}\")";
    
   // echo $sql_insert_data;
include('config/setup.php');
   // $con = mysqli_connect("localhost", "root", "", "dbmain");
//echo $sql_insert_data;
    
    $result=mysqli_query($con,$sql_insert_data);
unset($_SESSION['section2']); 
}

if(($_SESSION["set"]=== "true") && (isset($_SESSION["section2del"])) &&  (isset($_SESSION['application_no']))){
    //echo"this line has been triggered";
 $application_no= $_SESSION['application_no'];
 $name_attended=$_POST['del_name_of_schools_attended'];
$diploma_type=$_POST['diploma_type'];
$diploma_date=$_POST['diploma_date'];


$sql_insert_data="delete from app_education_table where application_no = {$_SESSION['application_no']} and name_of_schools_attended = \"{$name_attended}\" and diploma_type=\"{$diploma_type}\" and diploma_date=\"{$diploma_date}\" ";
    
  //  echo $sql_insert_data;
include('config/setup.php');
   // $con = mysqli_connect("localhost", "root", "", "dbmain");
//echo $sql_insert_data;
    
    $result=mysqli_query($con,$sql_insert_data);
unset($_SESSION['section2del']); 
}

//deleting uploads
if(($_SESSION["set"]=== "true") && (isset($_SESSION["section4del"])) &&  (isset($_SESSION['application_no']))){
    //echo"this line has been triggered";
    $application_no= $_SESSION['application_no'];
    $file_name= $_POST['del_file_name'];
    $document_type= $_POST['document_type'];
    
$sql_insert_data="DELETE FROM app_supporting_documents WHERE file_name=\"{$file_name}\" AND document_type=\"{$document_type}\" AND application_no = {$_SESSION['application_no']}";
    
   
    
  //  echo $sql_insert_data;
include('config/setup.php');
   // $con = mysqli_connect("localhost", "root", "", "dbmain");
//echo $sql_insert_data;
    
    $result=mysqli_query($con,$sql_insert_data);
unset($_SESSION['section4del']); 
}


if(($_SESSION["set"]=== "true") && (isset($_SESSION["section3"])) &&  (isset($_SESSION['application_no']))){
    //echo"this line has been triggered";
 $application_no= $_SESSION['application_no'];

$university=$_POST['university'];
$academic_semester=$_POST['academic_semester'];
$name_program=$_POST['name_program'];

$sql_get_uni_id="SELECT id  FROM university_table WHERE Name =\"{$university}\"";
$uni_id_get_result=mysqli_query($con, $sql_get_uni_id);
$university_result=(mysqli_fetch_assoc($uni_id_get_result));
    $university_id=$university_result['id'];
    
    
$sql_insert_data="UPDATE app_program_applied SET university_id={$university_id}, academic_year_semester=\"{$academic_semester}\",Name_of_program=\" {$name_program}\" where application_no = {$_SESSION['application_no']}";
    
    
  // echo $sql_insert_data;
include('config/setup.php');
   // $con = mysqli_connect("localhost", "root", "", "dbmain");
//echo $sql_insert_data;
    
    $result=mysqli_query($con,$sql_insert_data);
unset($_SESSION['section3']); 
}



?>
			
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
        <form method="post" action="#">
            <!--static application No. test >
        <div class="row uniform 50%">
             <div class="2u 12u(mobilep)">
                    <h4>Application No:</h4>
             </div>
            <div class="6u 12u(mobilep)">
                <input type="text" name="application_no" disabled='true' id="application_no" value="13432"  placeholder="Application NO" />
            </div>

      </div>
            <!-- static application test end -->
         <?PHP   
            $sql_query="SELECT * FROM input_details WHERE category_id=1";
            $result=mysqli_query($con,$sql_query);
            
            while($array= mysqli_fetch_assoc($result)){
               if($array['input_type']==="select"){
                    echo "
                        <div class=\"row uniform 50%\">
                        <div class=\"{$array['label_class']}\">
                        <h4>{$array['input_label']}:</h4>
                        </div>
                        
                        <div class=\"{$array['text_box_class']}\">
                        <div class=\"select-wrapper\">
                        <select name=\"{$array['input_name']}\" id=\"{$array['input_id']}\">";
                   
                   
                   
                   
                   
                   $sql_get_everyvalue="SELECT * FROM app_personal_details_table WHERE application_no ={$_SESSION['application_no']}";
                        $result_everyvalue=mysqli_query($con, $sql_get_everyvalue);
                        $everyvalue=mysqli_fetch_assoc($result_everyvalue);
                        
                        switch ($array['input_id']) {
                  
                            
                            case "application_type":echo"<option value=\"{$everyvalue['application_type']}\">{$everyvalue['application_type']}</option>"; break;
                            
                           
                            case "gender_gender":echo"<option value=\"{$everyvalue['gender']}\">{$everyvalue['gender']}</option>"; break;
                       
                           
                            case "country_birth":echo"<option value=\"{$everyvalue['country_of_birth']}\">{$everyvalue['country_of_birth']}</option>"; break;
                           
                          
                           case "country_country":echo"<option value=\"{$everyvalue['country']}\">{$everyvalue['country']}</option>"; break;
                            
                            
                            case "country_issue":echo"<option value=\"{$everyvalue['country_issue']}\">{$everyvalue['country_issue']}</option>"; break;
                            



                            default:
                           echo"<option value=\"\">- Choose {$array['input_label']} -</option>"; break;}
                   
                   
                   
                   
                        
                        
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
                            <input type=\"{$array['input_type']}\" name=\"{$array['input_name']}\" id=\"{$array['input_id']}\" ";
                            
                    if($array['input_name']==="application_no"){
                        $sql_get_application_no="select app_personal_details_table.application_no from user_account, app_personal_details_table where user_account.id =app_personal_details_table.user_account_id and user_account.email=\"{$_SESSION["email"]} \" ";
                        
                        $returned_result=mysqli_query($con,$sql_get_application_no);
                            while($application_no=mysqli_fetch_assoc($returned_result)){echo"value=\"{$application_no['application_no']}\" disabled='true'";
                    $_SESSION['application_no']=$application_no['application_no'];}}
                    else {
                        $sql_get_everyvalue="SELECT * FROM app_personal_details_table WHERE application_no ={$_SESSION['application_no']}";
                        $result_everyvalue=mysqli_query($con, $sql_get_everyvalue);
                        $everyvalue=mysqli_fetch_assoc($result_everyvalue);
                        
                        switch ($array['input_id']) {
                  
                            //case "application_type":echo"value=\"{$everyvalue['application_type']}\""; break;
                            case "surname_name":echo"value=\"{$everyvalue['surname']}\""; break;
                            case "first_s":echo"value=\"{$everyvalue['first_name']}\""; break;
                            case "mothers_name":echo"value=\"{$everyvalue['mothers_name']}\""; break;
                            //case "gender_gender":echo"value=\"{$everyvalue['gender_gender']}\""; break;
                            case "date_birth":echo"value=\"{$everyvalue['date_of_birth']}\""; break;
                            //case "country_birth":echo"value=\"{$everyvalue['country_birth']}\""; break;
                            case "nationality_nationality":echo"value=\"{$everyvalue['nationality']}\""; break;
                            case "postal_address":echo"value=\"{$everyvalue['postal_address']}\""; break;
                           // case "country_country":echo"value=\"{$everyvalue['country_country']}\""; break;
                            case "e_mail":echo"value=\"{$everyvalue['email']}\""; break;
                            case "tel_no":echo"value=\"{$everyvalue['tel_no']}\""; break;
                            case "mobile_no":echo"value=\"{$everyvalue['mobile_no']}\""; break;
                            case "fax_no":echo"value=\"{$everyvalue['fax_no']}\""; break;
                            case "passport_number":echo"value=\"{$everyvalue['passport_number']}\""; break;
                            case "date_issue":echo"value=\"{$everyvalue['date_issue']}\""; break;
                            //case "country_issue":echo"value=\"{$everyvalue['country_issue']}\""; break;
                            case "date_expiry":echo"value=\"{$everyvalue['date_expiry']}\""; break;
                            case "additional_remarks":echo"value=\"{$everyvalue['additional_remarks']}\""; break;




                            default:
                            echo"value=\"\" ";break;}
}
                        
                            
                           echo" onblur=\"assign()\" placeholder=\"{$array['input_placeholder']}\" />
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
         <form method="post" action="?page=application">

        <?PHP   
          $sql_query="SELECT * FROM input_details WHERE category_id=2";
          $result=mysqli_query($con,$sql_query);
         
             while($array= mysqli_fetch_assoc($result)){
               if($array['input_type']==="select"){
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
                           <li><input type="submit" value="Add" /></li> 
                       </ul>
                   </div>
               </div>
            </form>


<table id="feetu" class="table table-striped">
    <thead>
      <tr>
        <th>Name of School attended</th>
        <th>Diploma Type</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
      
          <?php
        
          $sql_select_relevent="SELECT DISTINCT name_of_schools_attended, diploma_type, diploma_date FROM app_education_table WHERE application_no={$_SESSION['application_no']}";
          
          include('config/setup.php');
         // $con = mysqli_connect("localhost", "root", "", "dbmain");

              $relevant_result=mysqli_query($con,$sql_select_relevent);
          while($result_array=mysqli_fetch_assoc($relevant_result)){
        echo"<tr><td>{$result_array['name_of_schools_attended']}</td>
        <td>{$result_array['diploma_type']}</td>
        <td>{$result_array['diploma_date']}</td>
          <td><form method=\"post\" action=\"\">
    <input type=\"hidden\" name=\"del_name_of_schools_attended\" value=\"{$result_array['name_of_schools_attended']}\" />
    <input type=\"hidden\" name=\"diploma_type\" value=\"{$result_array['diploma_type']}\" />
    <input type=\"hidden\" name=\"diploma_date\" value=\"{$result_array['diploma_date']}\" />
    <button type=\"submit\" class=\"button special small\">delete</button>
</form></td></tr>";}
            ?>
      
      
    </tbody>
  </table>

</section>

        <!-- section 3 Course and University choice-->
        <section class="box">
                                        <h3>Section 3:</h3>
                                            <hr />
                                        <form method="post" action="#">

                                          <?PHP   
                                            $sql_query="SELECT * FROM input_details WHERE category_id=3";
                                            $result=mysqli_query($con,$sql_query);
                                            while($array= mysqli_fetch_assoc($result)){
                                                if($array['input_type']==="select")
                                                    {

                                                        echo "<div class=\"row uniform 50%\">
                                                <div class=\"{$array['label_class']}\">
                                                    <h4>{$array['input_label']}:</h4>
                                                </div>
                                                <div class=\"{$array['text_box_class']}\">
                                                    <div class=\"select-wrapper\">
                                                        <select name=\"{$array['input_name']}\" id=\"{$array['input_id']}\">";
                                                    
                                                        //options value.
                                                        
                                               
                                                    $sql_get_everyvalue="SELECT university_table.Name,academic_year_semester,Name_of_program FROM university_table,app_program_applied WHERE university_table.id = app_program_applied.university_id And  application_no={$_SESSION['application_no']}";
                                                    
                                                    
                        $result_everyvalue=mysqli_query($con, $sql_get_everyvalue);
                        $everyvalue=mysqli_fetch_assoc($result_everyvalue);
                        
                        switch ($array['input_id']) {
                  
                           
                            case "university":  echo"<option value=\"{$everyvalue['Name']}\">{$everyvalue['Name']}</option>"; break;
                               
                          
                            case "academic_semester": echo"<option value=\"{$everyvalue['academic_year_semester']}\">{$everyvalue['academic_year_semester']}</option>"; break;
                                  
                          
                            
                            case "name_program": echo"<option value=\"{$everyvalue['Name_of_program']}\">{$everyvalue['Name_of_program']}</option>"; break;
                                
                            
                            default:
                            echo"value=\"\" ";break;}
                                                             
                                            echo"<option value=\"\">- Choose {$array['input_label']} -</option>";
                                                        
                                                        //options values done

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
                                                    <input type=\"{$array['input_type']}\" name=\"{$array['input_name']}\" id=\"{$array['input_id']}\" ";
                                                    
                                                    //this is where the values go
                                                    
                                                    $sql_get_everyvalue="SELECT university_table.Name,academic_year_semester,Name_of_program FROM university_table,app_program_applied WHERE university_table.id = app_program_applied.university_id And  application_no={$_SESSION['application_no']}";
                                                    
                                                    
                        $result_everyvalue=mysqli_query($con, $sql_get_everyvalue);
                        $everyvalue=mysqli_fetch_assoc($result_everyvalue);
                        
                        switch ($array['input_id']) {
                  
                           
                            case "university":echo"value=\"{$everyvalue['Name']}\""; break;
                          
                            case "academic_semester":echo"value=\"{$everyvalue['academic_year_semester']}\""; break;
                          
                            
                            case "name_program":echo"value=\"{$everyvalue['Name_of_program']}\""; break;
                            
                            default:
                            echo"value=\"\" ";break;}
                                                    
                                                    //values code is over
                                                    
                                                    echo"placeholder=\"{$array['input_placeholder']}\" />
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
                                        <form action="" method="POST" enctype="multipart/form-data">

                                          <?PHP   
                                            $sql_query="SELECT * FROM input_details WHERE category_id=7";
                                            $result=mysqli_query($con,$sql_query);
                                            while($array= mysqli_fetch_assoc($result)){
                                                 if($array['input_type']==="select")
                                                    { echo "<div class=\"row uniform 50%\">
                                                <div class=\"{$array['label_class']}\">
                                                    <h4>{$array['input_label']}:</h4>
                                                </div>
                                                <div class=\"{$array['text_box_class']}\">
                                                    <div class=\"select-wrapper\">
                                                        <select name=\"{$array['input_name']}\" id=\"{$array['input_id']}\">
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
                                                    <input type=\"{$array['input_type']}\" name=\"{$array['input_name']}\" id=\"{$array['input_id']}\" value=\"&#32;\" placeholder=\"{$array['input_placeholder']}\" />
                                                </div>

                                            </div>";

                                            }}

                                            ?>  



                                    

                                    <div class="row uniform">
                                                <div class="12u">
                                                    <ul class="actions">
                                                        <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
                                                        <input type="hidden" name=file_session value="true"/>
                                                        <li><input type="submit" value="Upload" name="submit"/></li>

                                                    </ul>
                                                </div>
                                            </div>


                                        </form>



<table id="feetu" class="table table-striped">
    <thead>
      <tr>
        <th>Name of Upload</th>
        <th>Description</th>
        <th>Document Type</th>
      </tr>
    </thead>
    <tbody>
      
          <?php
        
          $sql_select_relevent="SELECT distinct document_type, description, file_name FROM app_supporting_documents WHERE application_no={$_SESSION['application_no']}";
          
          include('config/setup.php');
         // $con = mysqli_connect("localhost", "root", "", "dbmain");

              $relevant_result=mysqli_query($con,$sql_select_relevent);
          while($result_array=mysqli_fetch_assoc($relevant_result)){
        echo"<tr><td>{$result_array['file_name']}</td>
        <td>{$result_array['description']}</td>
        <td>{$result_array['document_type']}</td>
        
          <td><form method=\"post\" action=\"\">
    <input type=\"hidden\" name=\"del_file_name\" value=\"{$result_array['file_name']}\" />
    <input type=\"hidden\" name=\"document_type\" value=\"{$result_array['document_type']}\" />
    <button type=\"submit\" class=\"button special small\">delete</button>
</form></td></tr>";}
            ?>
      
      
    </tbody>
  </table>
</section>

        </div>
    </div>
</section>

    
