 <?php include('config/sub.header.php'); ?>
<?php include('config/setup.php');?>
<!-- Main -->
<!-- this is the page, where we'll set the cookies or go the back to the previous page if password is not the same -->
			<section id="main" class="container 75%">
				<header>
                    
					<h2><i id="spin" class="fa fa-circle-o-notch fa-1x" style="-webkit-animation: fa-spin 2s infinite linear;
  animation: fa-spin 2s infinite linear;"></i>Logging in...</h2>
					
				<?php
              
               $email=$_POST['email'];
               $password=$_POST['password'];
                
                   $sql_check_if_email_pass_exist="select email from user_account where email='{$email}' and password='{$password}'";
                
                $verify_returned_result =mysqli_query($con, $sql_check_if_email_pass_exist);
                $num_of_rows=mysqli_num_rows($verify_returned_result);
                //echo"<p>The number of rows is {$num_of_rows}</p>";
                 
                if($num_of_rows>0){
                $_SESSION["set"]= "true";
                $_SESSION["email"] = $email;
                $_SESSION["password"] = $password;
               
               
                echo"<p><a href='?page=dashboard'>click here </a>to manually go to your dashboard, if you're not automatically redirected to the dashboard page</p>";
				
                header ("refresh:5; url=?page=dashboard");
                }
               
                else{
                    echo"<p>Incorrect login details, please try to login again using the correct details or register if you don't have a user account</p>";
                    header ("refresh:5; url=?page=signin");}
                
                
                echo"</header>";
                
                ?>
</section>