<?php  
include("connection.php");
$request = mysqli_real_escape_string($conn, $_POST["query"]);
$query = "  SELECT restaurent_hotel_place.name 
            FROM restaurent_hotel_place WHERE restaurent_hotel_place.type='place' 
            AND restaurent_hotel_place.name LIKE '%".$request."%' ";
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
else
{
    $array[] = array (
        'name' => 'No result found',
      );

      echo json_encode($array);
    
}
        

 ?>