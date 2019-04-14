<?php

$location = $_POST['location'];
include("connection.php");

session_start();

if(isset($_POST['comment']))
{
    $comment = $_POST['comment'];
    $userid=$_SESSION['userid'];


    $query = "INSERT INTO review(person_id,restaurent_hotel_place_id,comment) VALUES ('$userid','$location','$comment')";

    mysqli_query($conn,$query);

}    
    
$query = "SELECT person.name,comment,date(review.date) AS date FROM review NATURAL JOIN person WHERE restaurent_hotel_place_id='$location' ORDER BY review.date";

$result = mysqli_query($conn,$query);
$output='';


while($row = mysqli_fetch_assoc($result))
{
    $output.= '<hr style="width:90%;">
            <div style="word-wrap: break-word; margin-left:6.25%;margin-right:10%;">
                <label style="color:dodgerblue;font-size:16px;">'.$row['name'].'&nbsp;&nbsp;</label>
                <label style="color:dodgerblue;font-size:16px;">'.$row['date'].'</label><br>
                <h5 style="font-size:15px;">'.$row['comment'].'</h5>
            </div>
            <hr style="width:90%;">';
}

echo $output;



?>