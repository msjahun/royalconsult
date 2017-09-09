<?php
    include('setup.php');
    
    
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message= $_POST["message"];
    



if ( $name=="" ||$email=="" ||$subject=="" ||$message=="")
{ mysqli_close($con);
    $response = array();
    $response["success"] = false;  
   
    echo json_encode($response);
 header ("refresh:20; url=../");
}

else{
    $sql="INSERT INTO contactTable (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
   

mysqli_query($con,$sql);
        
mysqli_close($con);
    $response["success"] = true;  
    
    echo json_encode($response);}
header ("refresh:20; url=../");
?>

