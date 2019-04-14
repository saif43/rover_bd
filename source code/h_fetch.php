<?php  
include("connection.php");
$request = mysqli_real_escape_string($conn, $_POST["query"]);
$query = "SELECT * FROM `restaurent_hotel_place` WHERE name LIKE '".$request."%'";
$result = mysqli_query($conn, $query);

//$data = array();

if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    { 
        $array[] = array (
            'name' => $row['name'],
          );
    
    }
    echo json_encode($array);
}
        

 ?>