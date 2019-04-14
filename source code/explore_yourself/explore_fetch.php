<?php

include("connection.php");

session_start();

$value=$_POST["value"];

$output='';
$query="";


if($value=="student" || $value=="jobholder" || $value=="business" || $value=="other")
{
    $_SESSION['occupation']=$value;

    $output.='
    <div align="left" id="questions_body" class="w3-container w3-animate-left">
    <label class="w3-container w3-center w3-animate-left" id="question"><label style="color:#5bc0de">#</label> What is your relationship status ?</label>
    </div>
    <div id="answers_body" class="w3-animate-left">
        <form id="answers_form" class="w3-container w3-animate-bottom" align="left" action="#">
            <br>
            <p onclick=pass("single")>
                <input style="outline:none" type="radio" id="test1" name="radio-group">
                <label id="test_label" for="test1">Single</label>
            </p>
            <p onclick=pass("married")>
                <input style="outline:none" type="radio" id="test2" name="radio-group">
                <label id="test_label" for="test2">Married</label>
            </p>
        </form>
    </div>
    
    ';
}
else if($value=="single" || $value=="married")
{
    $_SESSION['status']=$value;

    if($value=="single")
    {
        $output.='
        <div align="left" id="questions_body" class="w3-container w3-animate-left">
        <label class="w3-container w3-center w3-animate-left" id="question"><label style="color:#5bc0de">#</label> Whom are you going with ?</label>
        </div>
        <div id="answers_body" class="w3-animate-left">
            <form id="answers_form" class="w3-container w3-animate-bottom" align="left" action="#">
                <br>
                <p onclick=pass("alone")>
                    <input style="outline:none" type="radio" id="test2" name="radio-group">
                    <label id="test_label" for="test2">I am going alone</label>
                </p>
                <p onclick=pass("withfriends")>
                    <input style="outline:none" type="radio" id="test3" name="radio-group">
                    <label id="test_label" for="test3">I am going with friends</label>
                </p>
                <p onclick=pass("withfamily")>
                <input style="outline:none" type="radio" id="test4" name="radio-group">
                <label id="test_label" for="test4">I am going with family</label>
            </p>
            </form>
        </div>';
    }
    else if($value=="married")
    {
        $output.='
        <div align="left" id="questions_body" class="w3-container w3-animate-left">
        <label class="w3-container w3-center w3-animate-left" id="question"><label style="color:#5bc0de">#</label> Whom are you going with ?</label>
        </div>
        <div id="answers_body" class="w3-animate-left">
            <form id="answers_form" class="w3-container w3-animate-bottom" align="left" action="#">
                <br>
                <p onclick=pass("alone")>
                    <input style="outline:none" type="radio" id="test1" name="radio-group">
                    <label id="test_label" for="test1">I am going alone</label>
                </p>
                <p onclick=pass("withfriends")>
                    <input style="outline:none" type="radio" id="test2" name="radio-group">
                    <label id="test_label" for="test2">I am going with friends</label>
                </p>
                <p onclick=pass("withfamily")>
                    <input style="outline:none" type="radio" id="test3" name="radio-group">
                    <label id="test_label" for="test3">I am going with family</label>
                </p>
                <p onclick=pass("honeymoon")>
                    <input style="outline:none" type="radio" id="test4" name="radio-group">
                    <label id="test_label" for="test4">I am going for honeymoon</label>
                </p>
            </form>
        </div>';
    }

    
}

else if($value=="alone" || $value=="withfriends" || $value=="withfamily" || $value=="honeymoon")
{
    $_SESSION['goingwith']=$value;

    $output.='
    <div align="left" id="questions_body" class="w3-container w3-animate-left">
    <label class="w3-container w3-center w3-animate-left" id="question"><label style="color:#5bc0de">#</label> What kind of place do you like ?</label>
    </div>
    <div id="answers_body" class="w3-animate-left">
        <form id="answers_form" class="w3-container w3-animate-bottom" align="left" action="#">
            <br>
            <p onclick=pass("park")>
                <input style="outline:none" type="radio" id="test1" name="radio-group">
                <label id="test_label" for="test1">Ammusement Park</label>
            </p>
            <p onclick=pass("zoo")>
                <input style="outline:none" type="radio" id="test2" name="radio-group">
                <label id="test_label" for="test2">Zoo</label>
            </p>
            <p onclick=pass("sea")>
                <input style="outline:none" type="radio" id="test3" name="radio-group">
                <label id="test_label" for="test3">Sea</label>
            </p>
            <p onclick=pass("mountain")>
                <input style="outline:none" type="radio" id="test4" name="radio-group">
                <label id="test_label" for="test4">Mountain</label>
            </p>
            <p onclick=pass("none1")>
                <input style="outline:none" type="radio" id="test5" name="radio-group">
                <label id="test_label" for="test5">None of these / See more</label>
            </p>
        </form>
    </div>';



    
}
else if($value=="none1")
{
    $output.='
    <div align="left" id="questions_body" class="w3-container w3-animate-left">
    <label class="w3-container w3-center w3-animate-left" id="question"><label style="color:#5bc0de">#</label> What kind of place do you like ?</label>
    </div>
    <div id="answers_body" class="w3-animate-left">
        <form id="answers_form" class="w3-container w3-animate-bottom" align="left" action="#">
            <br>
            <p onclick=pass("forest")>
                <input style="outline:none" type="radio" id="test1" name="radio-group">
                <label id="test_label" for="test1">Forest</label>
            </p>
            <p onclick=pass("museum")>
                <input style="outline:none" type="radio" id="test2" name="radio-group">
                <label id="test_label" for="test2">Museum</label>
            </p>
            <p onclick=pass("river")>
                <input style="outline:none" type="radio" id="test3" name="radio-group">
                <label id="test_label" for="test3">River</label>
            </p>
            <p onclick=pass("historical")>
                <input style="outline:none" type="radio" id="test4" name="radio-group">
                <label id="test_label" for="test4">Historical</label>
            </p>
            <p onclick=pass("island")>
                <input style="outline:none" type="radio" id="test5" name="radio-group">
                <label id="test_label" for="test5">Island</label>
            </p>
        </form>
    </div>';
    

    

}
else if($value=="park")
{
    $_SESSION['type']=$value;

    $output.='
    <div align="left" id="questions_body" class="w3-container w3-animate-left">
    <label class="w3-container w3-center w3-animate-left" id="question"><label style="color:#5bc0de">#</label> What kind of activity do you want ?</label>
    </div>
    <div id="answers_body" class="w3-animate-left">
        <form id="answers_form" class="w3-container w3-animate-bottom" align="left" action="#">
            <br>
            <p onclick=pass("park_ride")>
                <input style="outline:none" type="radio" id="test1" name="radio-group">
                <label id="test_label" for="test1">Rides</label>
            </p>
            <p onclick=pass("park_visit")>
                <input style="outline:none" type="radio" id="test2" name="radio-group">
                <label id="test_label" for="test2">Visiting</label>
            </p>
            
        </form>
    </div>';
}
else if($value=="mountain")
{
    $_SESSION['type']=$value;

    if($_SESSION['goingwith']=="withfamily")
    {
        $output.='
        <div align="left" id="questions_body" class="w3-container w3-animate-left">
        <label class="w3-container w3-center w3-animate-left" id="question"><label style="color:#5bc0de">#</label> What kind of activity do you want ?</label>
        </div>
        <div id="answers_body" class="w3-animate-left">
            <form id="answers_form" class="w3-container w3-animate-bottom" align="left" action="#">
                <br>
                <p onclick=pass("mountain_visit")>
                    <input style="outline:none" type="radio" id="test2" name="radio-group">
                    <label id="test_label" for="test2">Visiting</label>
                </p>
    
                <p onclick=pass("mountain_trail")>
                    <input style="outline:none" type="radio" id="test4" name="radio-group">
                    <label id="test_label" for="test4">Trailing</label>
                </p>
                
                
            </form>
        </div>';
    }
    else
    {
        $output.='
        <div align="left" id="questions_body" class="w3-container w3-animate-left">
        <label class="w3-container w3-center w3-animate-left" id="question"><label style="color:#5bc0de">#</label> What kind of activity do you want ?</label>
        </div>
        <div id="answers_body" class="w3-animate-left">
            <form id="answers_form" class="w3-container w3-animate-bottom" align="left" action="#">
                <br>
                <p onclick=pass("mountain_hike")>
                    <input style="outline:none" type="radio" id="test1" name="radio-group">
                    <label id="test_label" for="test1">Hike</label>
                </p>
                <p onclick=pass("mountain_visit")>
                    <input style="outline:none" type="radio" id="test2" name="radio-group">
                    <label id="test_label" for="test2">Visiting</label>
                </p>
                <p onclick=pass("mountain_trekk")>
                    <input style="outline:none" type="radio" id="test3" name="radio-group">
                    <label id="test_label" for="test3">Trekking</label>
                </p>
                <p onclick=pass("mountain_trail")>
                    <input style="outline:none" type="radio" id="test4" name="radio-group">
                    <label id="test_label" for="test4">Trailing</label>
                </p>
                
                
            </form>
        </div>';
    }

    
}
else if($value=="sea")
{
    $_SESSION['type']=$value;

    if($_SESSION['goingwith']=="withfamily")
    {
        $output.='
        <div align="left" id="questions_body" class="w3-container w3-animate-left">
        <label class="w3-container w3-center w3-animate-left" id="question"><label style="color:#5bc0de">#</label> What kind of activity do you want ?</label>
        </div>
        <div id="answers_body" class="w3-animate-left">
            <form id="answers_form" class="w3-container w3-animate-bottom" align="left" action="#">
                <br>
                <p onclick=pass("sea_dark_bike")>
                    <input style="outline:none" type="radio" id="test1" name="radio-group">
                    <label id="test_label" for="test1">Dark Bike</label>
                </p>
                <p onclick=pass("sea_boat_ride")>
                    <input style="outline:none" type="radio" id="test2" name="radio-group">
                    <label id="test_label" for="test2">Boat Ride</label>
                </p>
                
                
                
            </form>
        </div>';
    }
    else
    {
        $output.='
        <div align="left" id="questions_body" class="w3-container w3-animate-left">
        <label class="w3-container w3-center w3-animate-left" id="question"><label style="color:#5bc0de">#</label> What kind of activity do you want ?</label>
        </div>
        <div id="answers_body" class="w3-animate-left">
            <form id="answers_form" class="w3-container w3-animate-bottom" align="left" action="#">
                <br>
                <p onclick=pass("sea_dive")>
                    <input style="outline:none" type="radio" id="test1" name="radio-group">
                    <label id="test_label" for="test1">Sea diving</label>
                </p>
                <p onclick=pass("sea_parag_ride")>
                    <input style="outline:none" type="radio" id="test2" name="radio-group">
                    <label id="test_label" for="test2">Parag Riding</label>
                </p>
                <p onclick=pass("sea_dark_bike")>
                    <input style="outline:none" type="radio" id="test3" name="radio-group">
                    <label id="test_label" for="test3">Dark Bike</label>
                </p>
                <p onclick=pass("sea_boat_ride")>
                    <input style="outline:none" type="radio" id="test4" name="radio-group">
                    <label id="test_label" for="test4">Boat Ride</label>
                </p>
                
                
                
            </form>
        </div>';
    }

    
}



echo $output;


?>

