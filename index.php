<?php
session_start();
//this is the session start statement

?>

<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Royalty Educational Consultancy</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<?php include('config/scripts.php'); ?>
		<noscript>
			<?php include('config/css.php'); ?>
            <link rel='stylesheet' href='css/slider.css'/>
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
    
        <?php
    if(!isset($_GET['page']))
       echo "\n<body class='landing'>\n";
       else if(isset($_GET['page']) && $_GET['page']=='home')
        echo "\n<body class='landing'>\n"; 
        else if(isset($_GET['page']) && $_GET['page']=='courses')
             echo "\n<body class='landing'>\n";  
            else 
               echo"\n<body>\n";
        
                    ?>
		<!-- Header -->
			
           
		
		
        <?php
   
        if(isset($_GET['page'])){
             if($_GET['page']!="application")
        unset($_SESSION["sent"]);
    
            
            if(!isset($_SESSION["set"])&&($_GET['page']==="application" ||$_GET['page']==="dashboard"))
                $page='signin';
            
            
            else
        $page = $_GET['page'];}
                 else if(!isset($_GET['page'])){
                 $page='home';
                 unset($_SESSION["sent"]);}
    
        
        include('pages/'.$page.'.php');
        
        ?>
</section>
		<!-- CTA -->
			<?php include('config/subscribe.section.php'); ?>

		<!-- Footer -->
			<?php include('config/footer.php'); ?>
     

	</body>
</html>