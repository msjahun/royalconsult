 <?php include('config/sub.header.php'); ?>
<?php include('config/setup.php');?>
<!-- Main -->
<!-- this is the page, where we'll set the cookies or go the back to the previous page if password is not the same -->
			<section id="main" class="container 75%">
				<header>
					<h2><i id="spin" class="fa fa-circle-o-notch fa-1x" style="-webkit-animation: fa-spin 2s infinite linear;
  animation: fa-spin 2s infinite linear;"></i>Redirecting...</h2>
					<p><a href='?page=application'>click here </a>to manually go to your application page, if you're not automatically redirected to the application page</p>
				</header>
				<?php
               $name=$_POST['name'];
               $surname=$_POST['surname'];
               $email=$_POST['email'];
               $password=$_POST['password'];
                   $sql_check_if_email_exist="select email from user_account where email='{$email}'";
                $email_returned_result =mysqli_query($con, $sql_check_if_email_exist);
                $num_of_rows=mysqli_num_rows($email_returned_result);
                echo"<p>The number of rows is {$num_of_rows}</p>";
                 
                if($num_of_rows>0){
                    echo"<p>This email has already been registered, please register with another email</p>";
                    header ("refresh:5; url=?page=register");}
               
                else{
                $_SESSION["set"]= "true";
                $_SESSION["name"] = $name;
                $_SESSION["surname"] = $surname;
                $_SESSION["email"] = $email;
                $_SESSION["password"] = $password;
               
                $sql_insert_data="INSERT INTO user_account( email, password, first_name, surname) VALUES (\"{$email}\",\"{$password}\",\"{$name}\",\"{$surname}\")";
                mysqli_query($con,$sql_insert_data);
                echo"<p>User Account created successfully</p>";
                $sql_get_user_id="select id from user_account where email = \"{$email}\" and password = \"{$password}\"";
                    
               $result=mysqli_query($con,$sql_get_user_id);
                $id = mysqli_fetch_assoc($result);
                
                $sql_create_application = "insert into app_personal_details_table(user_account_id) values ({$id['id']})"; 
                   
                mysqli_query($con, $sql_create_application);
                    
                     $sql_get_application_no="select application_no from app_personal_details_table where user_account_id={$id['id']}";
                $result_application_no=mysqli_query($con,$sql_get_application_no);
                    $application_no_data=mysqli_fetch_assoc($result_application_no);
                    $application_no= $application_no_data['application_no'];
                    echo"this line has been reached successfully";
                          
                $sql_create_application_university = "INSERT INTO app_program_applied(application_no) VALUES ({$application_no})";
                mysqli_query($con, $sql_create_application_university);
                header ("refresh:5; url=?page=dashboard");
                }
                
                ?>
</section>