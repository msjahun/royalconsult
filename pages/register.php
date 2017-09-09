 <?php include('config/sub.header.php'); ?>
<!-- Main -->
			<section id="main" class="container 75%">
				<header>
					<h2>Welcome</h2>
					<p>Register in order to create and manage your university application</p>
				</header>
				<div class="box">
					<form method="post" action="?page=reglanding">
						<div class="row uniform 50%">
							<div class="2u 12u(mobilep)">
                                <h4>Name:</h4>
							</div>
							<div class="6u 12u(mobilep)">
								<input type="text" name="name" id="email" value="" placeholder="firstname" required/>
							</div>
						</div>
                        <div class="row uniform 50%">
							<div class="2u 12u(mobilep)">
                                <h4>Surname:</h4>
							</div>
							<div class="6u 12u(mobilep)">
								<input type="text" name="surname" id="surname" value="" placeholder="Surname" required/>
							</div>
						</div>
                        
                        
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
								<input type="password" name="password" id="password" value="" placeholder="Password" onblur="validate()" required/>
							</div>
						</div>
                        <div class="row uniform 50%">
							<div class="2u 12u(mobilep)">
                                <h4>Retype Password:</h4>
							</div>
							<div class="6u 12u(mobilep)">
								<input type="password" name="retype_password" id="retype_password"  onblur="validate()" placeholder="Password" required/>
                                <p id='password_validation' style='color:red;'></p>
							</div>
						</div>
						
					<div class="row uniform">
							<div class="9u">
								<ul class="actions align-center">
									<li><input class="special small" id='register_btn' type="submit" value="Register" /></li>
									
								</ul>
							</div>
                            
						</div>
                        
                        <hr>
                        <div class="row uniform">
                        <h4> Or you sign in if you already have an account <a href="?page=signin" >Sign In</a> </h3>

				
                        </div>
					</form>
				</div>
                <?php include('config/social.php'); ?>
			</section>


<script>
function validate() {
var x= document.getElementById("password");
    var y= document.getElementById("retype_password");
if(x.value==y.value){
    document.getElementById("password_validation").innerHTML="";
    document.getElementById("register_btn").removeAttribute("disabled");
}
    else{
document.getElementById("password_validation").innerHTML="password not same";
    document.getElementById("register_btn").disabled = true;
}
}
   
</script>
