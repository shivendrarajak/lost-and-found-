<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<style>
    body{
    background-image: url("TIP0cW.jpg");
    

}
    </style>

</head>

<body>
 <?php
$type=$_POST["type"];
echo " Type: $first <br>";

$description=$_POST["description"];
echo "Description: $Second <br>";

$date=$_POST["date"];
echo "Date: $third <br>";

$time=$_POST["time"];
echo "Time: $fourth <br>";

$place =$_POST["place"];
echo "Place: $fifth <br>";    



$conn = new mysqli('localhost','root','','finalproject');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
    $stmt = $conn->prepare("insert into report_iteam (Type, Item_description,Date,Time,Place) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $type,$description,$date,$time, $place);
    
    if ($stmt->execute()) {
        // Redirect to login page after successful submission
        header("Location: index.html");
        exit();
    } else {
        echo "Error: ".$stmt->error;
    }
    
    $stmt->close();
    $conn->close();

}


?> 


</body>
</html>