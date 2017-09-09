<?php
   include('config/setup.php');
    
    
    
    $email = $_POST["email"];
   
    
 $sqlselect ="SELECT email FROM subscribelist WHERE email='$email'";

$result=mysqli_query($con,$sqlselect);
$count=mysqli_num_rows($result);

if ( $count!=0 || $email=="")
{ mysqli_close($con);
    $response = array();
    $response["success"] = false;  
   
    echo json_encode($response);
 header ("refresh:20; url=../");
}

else{
    $sql="INSERT INTO subscribeList (email) VALUES ('$email')";
   

mysqli_query($con,$sql);
        
mysqli_close($con);
    $response["success"] = true;  
    
    echo json_encode($response);}
header ("refresh:20; url=../");
?>

