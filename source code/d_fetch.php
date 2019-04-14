<?php  
include("connection.php");
$request = mysqli_real_escape_string($conn, $_POST["query"]);
$query = "SELECT DISTINCT area FROM `find` WHERE area LIKE '".$request."%'";
$result = mysqli_query($conn, $query);

//$data = array();

if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    { 
        $array[] = array (
            'name' => $row['area'],
          );
    
    }
    echo json_encode($array);
}
        

 ?>