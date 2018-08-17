<?php 
$servername= "localhost";
$username = "root";
$password = "12345678";
$dbname = "lms_demo_2";

$con = new mysqli($servername, $username, $password, $dbname);
// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
 } 
$get_book = "
SELECT Boo_id,Call_number,Boo_name,Pub_name , Aut_name
FROM book_
JOIN call_number on book_.Boo_Call_id = call_number.Call_id
JOIN publisher_ on book_.Boo_Pub_id = publisher_.Pub_id
JOIN author_ on book_.Boo_Aut_id = author_.Aut_id
JOIN category_ on book_.Boo_Cat_id = category_.Cat_id
order by Boo_id asc";

$result = $con->query($get_book);

    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Id: " . $row["Boo_id"]. " Call_number: " . $row["Call_number"]. " - Name: " . $row["Boo_name"]. " Publisher " . $row["Pub_name"]. " Author " . $row["Aut_name"] . "<br>";
    }
?>
