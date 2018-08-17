<?php 
include"Db_connect.php";

$Boo_name = $con->real_escape_string($_REQUEST['Boo_name']);
$Boo_year = $con->real_escape_string($_REQUEST['Boo_year']);
$Boo_price = $con->real_escape_string($_REQUEST['Boo_price']);
$Boo_Cat_id = $con->real_escape_string($_REQUEST['Boo_Cat_id']);

$insert = "insert into book_ (Boo_name,Boo_year,Boo_price,Boo_Cat_id)
VALUES('$Boo_name','$Boo_year','$Boo_price','$Boo_Cat_id')";

if($con->query($insert)=== true ){
   
   echo "Records added successfully.";

} else{

   echo "ERROR: Could not able to execute $sql. " . $con->error;

}
$con->close(); 


// $insert = "insert into book_ (Boo_name,Boo_year,Boo_price,Boo_Cat_id)
// VALUES('atk of tt','2222','111','400')";

// if($con->query($insert)=== true ){
   
   // echo "Records added successfully.";

// } else{

   // echo "ERROR: Could not able to execute $sql. " . $con->error;

// } 


?>