<?php  
include("connection.php");
$request = mysqli_real_escape_string($conn, $_POST["query"]);
$query = "SELECT DISTINCT subdistrict_name FROM `restaurent_hotel_place` WHERE type='Hotel' AND subdistrict_name LIKE '".$request."%'";
$result = mysqli_query($conn, $query);

//$data = array();

if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    { 
        $array[] = array (
            'name' => $row['subdistrict_name'],
          );
    
    }
    echo json_encode($array);
}
        

 ?>