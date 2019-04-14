<?php

session_start();

$location_id = $_POST['location'];
$command = $_POST['command'];
$rating =$_POST['rating'];
$output='';
$userid=$_SESSION['userid'];
include("connection.php");




if($command==1)
{
    if($userid != '')
    {
        $query="REPLACE INTO rating(person_id,restaurent_hotel_place_id,rating) VALUES ('$userid','$location_id','$rating')";

        mysqli_query($conn,$query);

        $output.='<label id="user_rate_header">|| RATE THE LOCATION</label>
        <div style="margin-right:83%;margin-top:-1%;" class="rating rating2">';

        // for($i=5; $i>=1; $i--)
        for($i=1; $i<=5; $i++)
        {
            if($i > $rating)
            {
                $output.='<a id="location_rating" onclick="myAjax('.$i.')" style="font-size:25px;">★</a>';
            }
            else
            {
                $output.='<a id="location_rating" onclick="myAjax('.$i.')" style="font-size:25px;color:dodgerblue;">★</a>';
            }
        }

        $output.='</div>';

        $output.='<br>';

        echo $output;
    }
    else
    {
        $output.='<label id="user_rate_header">|| RATE THE LOCATION</label>
        <div style="margin-right:83%;margin-top:-1%;" class="rating rating2">';

        // for($i=5; $i>=1; $i--)
        for($i=1; $i<=5; $i++)
        {
            $output.='<a id="location_rating" onclick="myAjax('.$i.')" style="font-size:25px;">★</a>';
        }
 
        $output.='</div>';
        $output.='<br>';
        
        echo $output;
    }
}
if($command==2)
{
    $query="SELECT AVG(rating.rating) AS avgrate FROM rating WHERE rating.restaurent_hotel_place_id='$location_id' GROUP BY rating.restaurent_hotel_place_id";

    $result = mysqli_query($conn,$query);

    while($row = mysqli_fetch_assoc($result))
    {
        $avgRate = (int)$row['avgrate'];
    }
    $rating=$avgRate;

    for($i=1; $i<=5; $i++)
    {
        if($i > $rating)
        {
            $output.='<a id="location_rating" onclick="myAjax('.$i.')" style="font-size:25px;">★</a>';
        }
        else
        {
            $output.='<a id="location_rating" onclick="myAjax('.$i.')" style="font-size:25px;color:dodgerblue;">★</a>';
        }
    }

    $output.='<br>';
    

    echo $output;
}
if($command==3)
{
    $query="SELECT rating FROM rating WHERE rating.restaurent_hotel_place_id='$location_id' AND rating.person_id='$userid'";

    $result = mysqli_query($conn,$query);

    while($row = mysqli_fetch_assoc($result))
    {
        $rating = $row['rating'];
    }


    $output.='<label id="user_rate_header">|| RATE THE LOCATION</label>
    <div style="margin-right:83%;margin-top:-1%;" class="rating rating2">';

    // for($i=5; $i>=1; $i--)
    for($i=1; $i<=5; $i++)
    {
        if($i > $rating)
        {
            $output.='<a id="location_rating" onclick="myAjax('.$i.')" style="font-size:25px;">★</a>';
        }
        else
        {
            $output.='<a id="location_rating" onclick="myAjax('.$i.')" style="font-size:25px;color:dodgerblue;">★</a>';
        }
    }
    

    $output.='</div>';

    $output.='<br>';
    
    echo $output;
}
    

?>