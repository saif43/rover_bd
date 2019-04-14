<?php

session_start();
include('connection.php');
$package1=array(350,300,1600);
$package2=array(350,150,1600);
$_SESSION['num']=0;
//$_SESSION['total']=0; 
//$_SESSION['total1']=0;
//unset($_SESSION["total"]);
$total_budget;
$result;
$a;

if(isset($_POST['logout_button'])){

    header("Location: /developer/logout.php");
}

if(isset($_POST['view_profile_button'])){

    header("Location: /developer/profile/profile.php");
}

if(isset($_POST['execute_plan']))
{
    header("Location: planner_output.php");
}

if(isset($_POST['plan_button']))
{
    $location=$_POST['destination'];
    $location=str_replace("'","''",$location);
    $_SESSION['location']=$location;
    //$_SESSION['location']=$location;
    $budget=$_POST['budget'];
    $days=$_POST['days'];
    $_SESSION['days']=$days;
    $group=$_POST['size'];

    $query = "SELECT * FROM restaurent_hotel_place NATURAL JOIN division_district_subdistrict WHERE restaurent_hotel_place.type='place' AND division_district_subdistrict.subdistrict_name=
              (SELECT restaurent_hotel_place.subdistrict_name FROM restaurent_hotel_place WHERE restaurent_hotel_place.name='$location')";  
    $result = mysqli_query($conn, $query);

    $query1 = "SELECT * FROM restaurent_hotel_place NATURAL JOIN division_district_subdistrict WHERE restaurent_hotel_place.type='hotel' AND division_district_subdistrict.subdistrict_name=
               (SELECT restaurent_hotel_place.subdistrict_name FROM restaurent_hotel_place WHERE restaurent_hotel_place.name='$location')";  
    $result1 = mysqli_query($conn, $query1);

    

    if($group>5)
    {
        $total_budget = ($budget*$group);
        $_SESSION['atotal']=$total_budget;
        $a=$total_budget;

        
        $group_food_cost=$package2[0] * $group * $days;
        $_SESSION['food']=$group_food_cost;
        $total_budget=$total_budget - $group_food_cost;
        $group_travel_cost=$package2[1] * $group * $days;
        $total_budget=$total_budget - $group_travel_cost;
        $group_updown_cost=$package2[2] * $group;
        $total_budget=$total_budget - $group_updown_cost;
        $_SESSION['total']=$total_budget;
        
        $_SESSION['travel1']=$group_travel_cost;
        $_SESSION['travel2']=$group_updown_cost;
        
    }

    else if($group<=5 && $group>1)
    {

        $total_budget = ($budget*$group);
        $_SESSION['atotal']=$total_budget;
        $a=$total_budget;

        $group_food_cost=$package1[0] * $group * $days;
        $_SESSION['food']=$group_food_cost;
        $total_budget=$total_budget - $group_food_cost;
        $group_travel_cost=$package1[1] * $group * $days;
        $total_budget=$total_budget - $group_travel_cost;
        $group_updown_cost=$package1[2] * $group;
        $total_budget=$total_budget - $group_updown_cost;
        $_SESSION['total']=$total_budget;
        $_SESSION['travel1']=$group_travel_cost;
        $_SESSION['travel2']=$group_updown_cost;
        
 
    }

    else if($group==1)
    {

        $total_budget = $budget;
        $_SESSION['atotal']=$total_budget;
        $a=$total_budget;
        
        $group_food_cost=$package[0] * $days;
        $_SESSION['food']=$group_food_cost;
        $total_budget=$total_budget-$group_food_cost;
        $group_travel_cost=$package[1] * $days;
        $total_budget=$total_budget-$group_travel_cost;
        $_SESSION['total']=$total_budget;
        $_SESSION['travel1']=$group_travel_cost;
        $_SESSION['travel2']=$group_updown_cost;
        
        
    }

    else{

        /*echo ("Please Enter Proper Group Size"). "<br>";*/
    }
}

?>

<html>

    <head>
    
        <title>Travel Planner</title>
        
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/shop-homepage.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Julius+Sans+One" rel="stylesheet">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        

        
        
        <style>            
            
        
            body
            {
                overflow-y: auto;
                margin: 0;
                padding: 0;
            }  
            
            /* Navbar & Search */
        
            
            .navbar
            {
              background-color: rgba(0,0,0,0.90);
              border: none;
              transition: all 500ms ease;
            }
    
            .navbar-fixed-top.scrolled 
            {
                transform: scale(1.03,1.03);    
                background-color: rgba(0,0,0,0.95);
                -webkit-box-shadow: 0 10px 6px -6px rgba(0,0,0,0.20);
	            -moz-box-shadow: 0 10px 6px -6px rgba(0,0,0,0.20);
	            box-shadow: 0 10px 6px -6px rgba(0,0,0,0.20);    
                z-index: 1000;
            }
            .navbar-brand
            {
                font-family: 'Julius Sans One', sans-serif;
                font-size:30px !important;
                font-weight: bold;
                text-transform:uppercase;
                color:#FFF !important;
                letter-spacing:2px;
                -webkit-animation: neon 2s ease-in-out infinite alternate;
                -moz-animation: neon 2s ease-in-out infinite alternate;
                animation: neon 2s ease-in-out infinite alternate;
            }
            
            .nav_a,#navbar_option_logout
            {
                font:500 10px 'Julius Sans One', sans-serif;
                letter-spacing:2px;
                padding:16px !important;
                color:#fff !important;
                text-transform:uppercase;
                position:relative;
                z-index:1000;
                outline: none;
                cursor: pointer;
                transition: all 400ms ease;
              }
            
            #navbar_option:hover,#navbar_option_features:hover,#navbar_option_logout:hover
              {
                outline: none;
                font-weight: bold;
                color:#FFF !important;
                -webkit-transform: scale(1.2);
                -ms-transform: scale(1.2);   
                -moz-transform: scale(1.2);
                transform: scale(1.2);  
              }
            
            .hover
            {
              display:block;
              position:absolute;
              width:0%;
              height:100%;
              top:0px;
              left:0px;
              background: rgba(255,255,255,0.1) !important;
              z-index:0;
              opacity:0;
            }

            #hover1
            {
              display:block;
              position:absolute;
              width:0%;
              height:100%;
              top:0px;
              left:0px;
              background: darkred !important;
              z-index:0;
              opacity:0;
            }
            
            #search {
                position: fixed;
                top: 0px;
                left: 0px;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.9);

                -webkit-transition: all 0.5s ease-in-out;
                -moz-transition: all 0.5s ease-in-out;
                -o-transition: all 0.5s ease-in-out;
                -ms-transition: all 0.5s ease-in-out;
                transition: all 0.5s ease-in-out;

                -webkit-transform: translate(0px, -100%) scale(0, 0);
                -moz-transform: translate(0px, -100%) scale(0, 0);
                -o-transform: translate(0px, -100%) scale(0, 0);
                -ms-transform: translate(0px, -100%) scale(0, 0);
                transform: translate(0px, -100%) scale(0, 0);

                opacity: 0;
            }

            #search.open {
                -webkit-transform: translate(0px, 0px) scale(1, 1);
                -moz-transform: translate(0px, 0px) scale(1, 1);
                -o-transform: translate(0px, 0px) scale(1, 1);
                -ms-transform: translate(0px, 0px) scale(1, 1);
                transform: translate(0px, 0px) scale(1, 1); 
                transition: 700ms;
                opacity: 1;
            }

            #search input[type="search"] {
                position: absolute;
                top: 50%;
                width: 100%;
                color: rgb(255, 255, 255);
                background: rgba(0, 0, 0, 0);
                font-size: 50px;
                font-weight: 300;
                text-align: center;
                border: 0px;
                margin: 0px auto;
                margin-top: -5%;
                padding-left: 30px;
                padding-right: 30px;
                outline: none;
            }
            #search .btn {
                position: absolute;
                top: 60%;
                left: 45%;
                background: transparent; 
                color: #fff;
                cursor: pointer;
                font-size:16px;
                font-family: 'Julius Sans One', sans-serif;
                font-weight: 400;
                padding-top: 8px;
                padding-bottom: 8px;
                text-decoration: none;
                text-transform: uppercase;
                vertical-align: middle;
                width: 10%;     
                border: 0 solid;
                box-shadow: inset 0 0 20px rgba(255, 255, 255, 0);
                outline: 2px solid;
                outline-color: rgba(255, 255, 255, .5);
                outline-offset: 0px;
                text-shadow: none;
                transition: all 1500ms cubic-bezier(0.19, 1, 0.22, 1);
            }
            
            #search .btn:hover
            {
                border: 1px solid;
                box-shadow: inset 0 0 25px rgba(255, 255, 255, .5), 0 0 25px rgba(255, 255, 255, .2);
                outline-color: rgba(229, 45, 39, 0);
                outline-offset: 15px;
                border-radius: 0;
                text-shadow: 1px 1px 1px #fff;  
            }
            
            #search .close {
                position: absolute;
                top: 10%;
                right: 5%;
                color: #fff;
                border-radius: 10%;
                opacity: 1;
                padding: 10px 17px;
                font-size: 27px;
                outline: none;
                background: transparent; 
                cursor: pointer;
                font-family: 'Julius Sans One', sans-serif;
                font-weight: 400;
                text-decoration: none;
                text-transform: uppercase;
                vertical-align: middle;
                border: 0 solid;
                box-shadow: inset 0 0 20px rgba(255, 255, 255, 0);
                outline: 2px solid;
                outline-color: rgba(255, 255, 255, .5);
                outline-offset: 0px;
                text-shadow: none;
                transition: all 1500ms cubic-bezier(0.19, 1, 0.22, 1);
            }
            
            #search .close:hover
            {
                border: 1px solid;
                box-shadow: inset 0 0 25px rgba(255, 255, 255, .5), 0 0 25px rgba(255, 255, 255, .2);
                outline-color: rgba(229, 45, 39, 0);
                outline-offset: 15px;
                border-radius: 0;
                text-shadow: 1px 1px 1px #fff;  
            }
            
            
            /* Navbar & Search */
            
            
            /* Neon Effects */
            
            @-webkit-keyframes neon
            {
                to 
                {
                    text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #fff, 0 0 40px #fff, 0 0 70px #fff, 0 0 80px #fff;
                }
            }
            
            @-webkit-keyframes neon1
            {
                to 
                {
                    text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #fff, 0 0 40px #fff, 0 0 50px #fff;
                }
            }
            
            /* Neon Effects */
            
            /* Divider */
            
            #navbar_divider
            {
                position: absolute;
                margin-left: -15px;
                margin-top: 10px;
                height: 5vh;
                width: 1px;
                border: none;
                background-color: gray;
            }
            
            /* Page Divider */
    
            
            

            /* Footer */
        
            #footer
                {
                background: #141414;
                margin-bottom: -100%;
                font-family: 'Julius Sans One', sans-serif;
                color:#fff;
                height: 25%;
            }

            /* Footer */

            /* Others */
            
            .row{float: left; width: 100%; padding: 20px 0 50px;}
            :focus{outline: none;}

            .col-3{float: left; width: 27.33%; margin: 40px 3%; position: relative;} 
            hotel_finder_search[type="text"]{font: 15px/24px "Lato", Arial, sans-serif; color: #333; width: 100%; box-sizing: border-box; letter-spacing: 1px;}

            .effect-9{border: 1px solid #ccc; padding: 7px 14px 9px; transition: 0.4s;}

            .effect-9 ~ .focus-border:before,
            .effect-9 ~ .focus-border:after{content: ""; position: absolute; top: 0; right: 0; width: 0; height: 2px; background-color: #3399FF; transition: 0.2s; transition-delay: 0.2s;}
            .effect-9 ~ .focus-border:after{top: auto; bottom: 0; right: auto; left: 0; transition-delay: 0.6s;}
            .effect-9 ~ .focus-border i:before,
            .effect-9 ~ .focus-border i:after{content: ""; position: absolute; top: 0; left: 0; width: 2px; height: 0; background-color: #3399FF; transition: 0.2s;}
            .effect-9 ~ .focus-border i:after{left: auto; right: 0; top: auto; bottom: 0; transition-delay: 0.4s;}
            .effect-9:focus ~ .focus-border:before,
            .effect-9:focus ~ .focus-border:after{width: 100%; transition: 0.2s; transition-delay: 0.6s;}
            .effect-9:focus ~ .focus-border:after{transition-delay: 0.2s;}
            .effect-9:focus ~ .focus-border i:before,
            .effect-9:focus ~ .focus-border i:after{height: 100%; transition: 0.2s;}
            .effect-9:focus ~ .focus-border i:after{transition-delay: 0.4s;}

            
            
        </style>
        
    </head>
    
    <body>
        <div>
            <nav id="navbar_body" class="navbar navbar-inverse navbar-fixed-top">
                <div>
                    <div style="float: left; margin-left:3%;" class="navbar-header">
                    <a class="navbar-brand" href="/developer/index.php">Rover BD</a>
                </div>
                <div align="center" >
                    <ul style="margin-left: 19%;" class="nav navbar-nav">
                        <li><a class="nav_a" id="navbar_option" href="#about_us">About</a><span class="hover"></span></li>
                        <li><a class="nav_a" id="navbar_option" href="#services">Services</a><span class="hover"></span></li>
                        <li><a class="nav_a" id="navbar_option" href="#footer">Contact</a><span class="hover"></span></li>
                        <li><a class="nav_a" id="navbar_option_features" data-toggle="collapse" data-target="#features">Features</a><span class="hover"></span></li>
                    </ul>
                </div>   
                    
                <div style="float: right; margin-right: 3%;">
                    <ul class="nav navbar-nav">
                        <li>
                            <a class="nav_a" id="navbar_option" href="#search"><i style="font-size: 20px;" class="fa fa-search" aria-hidden="true"></i></a>
                        </li>
                        <hr id="navbar_divider">     
                        <li>
                            <a style="margin-top:5%;" id="navbar_option_logout">&nbsp;Muktadir Anzan</a>
                            <span id="hover1" class="hover"></span>
                      </li>
                    </ul>    
                </div>      
                    <div style="float:left" align="center" class="collapse" id="features">
                        <ul style="margin-left:330px;" class="nav navbar-nav">
                            <hr style="margin-top: 0px; margin-bottom: 0px;">
                            <li><a class="nav_a" id="navbar_option" href="/developer/location_search/location_finder.php">Locations</a><span class="hover"></span></li>
                            <li><a class="nav_a" id="navbar_option" href="/developer/hotel_finder/hotel_finder.php">Hotel Finder</a><span class="hover"></span></li>
                            <li><a class="nav_a" id="navbar_option" href="/developer/travel_planner/travel_planner.php">Travel Planner</a><span class="hover"></span></li>
                            <li><a class="nav_a" id="navbar_option" href="/developer/travel_tracker/travel_tracker.php">Travel Tracker</a><span class="hover"></span></li>
                            <li><a class="nav_a" id="navbar_option" href="/developer/explore_yourself/explore_yourself.php">Explore Yourself</a><span class="hover"></span></li>
                        </ul>  
                    </div>
                </div>
            </nav>
        </div>
        
        <style>

            @import url(https://fonts.googleapis.com/css?family=Open+Sans:600);
            .word 
            {
                position:absolute;
                margin-left: 0%;
                width: 100%;
                opacity: 0;
            }

            .letter 
            {
                display: inline-block;
                position: relative;
                transform-origin: 50% 50% 25px;
            }

            .letter.out 
            {
                transform: rotateX(90deg);
                transition: transform 0.32s cubic-bezier(0.55, 0.055, 0.675, 0.19);
            }

            .letter.behind 
            {
                transform: rotateX(-90deg);
            }

            .letter.in 
            {
                transform: rotateX(0deg);
                transition: transform 0.38s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            }

            .location { color:#2db928;}
            .hotel { color: #ffdb00;}
            .travel { color: #1e90ff; }
            .tracker { color: #ed1c16; }
            .explore { color: #6633cc; }

            #input_field_header
            {
                font-family: 'Julius Sans One';
                color: #00c4ff;
                font-weight: bold;
                margin-top: -0.5%;
            }
            #input_fields_body
            {
                display: inline-block;
                position: relative;
                width: 100%;
                background: white;
                box-shadow: 0 0 20px 0 rgba(0,0,0,0.2), 0 5px 5px 0 rgba(0,0,0,0.3);
                transition: all 500ms ease;
                border-top: 25px solid white;
                border-bottom: 40px solid white;
            }
            #parent1
            {
                width: 100%;
            }
            #child_input_1
            {
                width:45%;
                margin-left: 5%;
                float: left;
                
            }
            #child_input_2
            {
                width:45%;
                float: left;
            }
            #parent2
            {
                width: 100%;
                margin-top: -2%;
            }
            #child_input_3
            {
                width:45%;
                margin-left: 5%;
                float: left;
            }
            #child_input_4
            {
                width:45%;
                float: left;
            }
            .inputs
            {
                width: 70%;
                outline: none; 
                border: 1px solid gray;
                border-radius: 25px;
                padding-left: 5%;
                padding-right: 5%;
                height: 6%;
                font-family: sans-serif;
                font-size: 18px;
            }
            .inputs:focus::-webkit-input-placeholder
            {
                transition: all 500ms ease;
                opacity: 0;
            }
            ::-webkit-input-placeholder 
            { 
                color: gray;
            }
            #plan_button
            {
                background: transparent;
                outline: none;
                display: inline-block;
                border:4px solid #00c4ff;
                padding: 25px 15px;
                border-radius: 50%;
                box-shadow: 0 0 20px 0 rgba(0,0,0,0.2), 0 5px 5px 0 rgba(0,0,0,0.3);
                font-family: 'Julius Sans One';
                font-size: 20px;
                font-weight: bold;
                color: #00c4ff;
                margin-top: -2%;
                text-decoration: none;
                transition: all 500ms ease;
            }
            #plan_button:hover
            {
                transform: scale(1.1);
                color: white;
                cursor: pointer;
                background: #00c4ff;
            }
            
            
            #location_body
            {
                display:  inline-block;
                position: relative;
                width: 100%;
                font-family: 'Julius Sans One';
                background: white;
                box-shadow: 0 0 20px 0 rgba(0,0,0,0.2), 0 5px 5px 0 rgba(0,0,0,0.3);
                transition: all 500ms ease;
                border: 20px solid white;
            }
            #hotel_body
            {
            	display:none;
                position: relative;
                width: 100%;
                font-family: 'Julius Sans One';
                background: white;
                box-shadow: 0 0 20px 0 rgba(0,0,0,0.2), 0 5px 5px 0 rgba(0,0,0,0.3);
                transition: all 500ms ease;
                border: 20px solid white;
            }
            #room_part
            {
                display: none;
                position: relative;
                width: 100%;
                font-family: 'Julius Sans One';
                background: white;
                box-shadow: 0 0 20px 0 rgba(0,0,0,0.2), 0 5px 5px 0 rgba(0,0,0,0.3);
                transition: all 500ms ease;
                border: 20px solid white;
            }
            #location_header,#hotel_header,#room_part_header
            {
                font-family: 'Julius Sans One';
                color: #00c4ff;
                font-weight: bold;
                text-align: center;
            }
            #image_link
            {
                text-decoration: none;
                color: #222;
                font-family: 'Julius Sans One';
                }
                
            #image_body
            {
                transition: all 500ms ease;
                background: white;
                border: none;
                border-top: 1px solid lightgray;
                border-bottom: 1px solid lightgray;
                border-radius: none;
                height:55%;
                display: inline-block;
            }
            #image_body:hover
            {
                transform: scale(1.05);
                filter: brightness(120%);
                cursor: pointer;
            }
            
            #image_body:hover h3
            {
                color: #00c4ff;
            }
            #image_body:hover h4
            {
                color: #00c4ff;
            }
            #image_body_location
            {
                transition: all 500ms ease;
                background: transparent;
                border: none;
                border-radius: none;
                height:40%;
                display: inline-block;
                margin-bottom: 5%;
            }
            #image_body_location:hover
            {
                transform: scale(1.05);
                filter: brightness(120%);
                cursor: pointer;
            }
            
            #image_body_location:hover h3
            {
                color: #00c4ff;
            }
            #image_body_location:hover h4
            {
                color: #00c4ff;
            }
            #edit_button_1,#edit_button_2,#edit_button_3,#edit_button_4
            {
                background:white;
                outline: none;
                font-family: 'Julius Sans One';
                font-weight: bold;
                color: #00c4ff;
                padding: 10px;
                text-decoration: none;
                text-transform: uppercase;
                border: 3px solid #00c4ff;
                transition: all 300ms ease;
            }
            #execute_plan
            {
                background:white;
                outline: none;
                font-family: 'Julius Sans One';
                font-weight: bold;
                font-size: 20px;
                color: #33ff00;
                padding-top: 10px;
                padding-bottom: 10px;
                padding-left: 20px;
                padding-right: 20px;
                text-decoration: none;
                text-transform: uppercase;
                border: 3px solid #33ff00;
                border-radius: 15px;
                transition: all 300ms ease;
            }
            #execute_plan:hover
            {
                background: #33ff00;
                color: white;
                -webkit-box-shadow: 0 10px 6px -6px rgba(0,0,0,0.30);
	            -moz-box-shadow: 0 10px 6px -6px rgba(0,0,0,0.30);
	            box-shadow: 0 10px 6px -6px rgba(0,0,0,0.30);
            }
            #edit_button_1:hover,#edit_button_2:hover,#edit_button_3:hover,
            #edit_button_4:hover
            {
                background: #00c4ff;
                color: white;
                -webkit-box-shadow: 0 10px 6px -6px rgba(0,0,0,0.30);
	            -moz-box-shadow: 0 10px 6px -6px rgba(0,0,0,0.30);
	            box-shadow: 0 10px 6px -6px rgba(0,0,0,0.30);
            }
            
            #go_button_1
            {
                background: transparent;
                outline: none;
                display: inline-block;
                border:4px solid #00c4ff;
                padding: 20px 20px;
                border-radius: 50%;
                box-shadow: 0 0 20px 0 rgba(0,0,0,0.2), 0 5px 5px 0 rgba(0,0,0,0.3);
                font-family: 'Julius Sans One';
                font-size: 20px;
                font-weight: bold;
                color: #00c4ff;
                text-decoration: none;
                transition: all 500ms ease;   
                margin-top: -6%;
                margin-bottom: -5%;
            }
            #go_button_1:hover
            {
                transform: scale(1.1);
                color: white;
                cursor: pointer;
                background: #00c4ff;
            }

            
            #pricing_table_body
            {
                display: none;
                position: relative;
                width: 100%;
                font-family: 'Julius Sans One';
                background: white;
                box-shadow: 0 0 20px 0 rgba(0,0,0,0.2), 0 5px 5px 0 rgba(0,0,0,0.3);
                transition: all 500ms ease;
                border: 20px solid white; 
            }
            #table_input_1,#table_input_2,#table_input_3
            {
                width: 75%;
                outline: none;
                border-radius: 10px;
                border: 1px solid gray;
                padding-left: 15px;
                padding-right: 15px;
                font-family: sans-serif;
                font-size: 16px;
                padding-top: 3px;
                padding-bottom: 3px;
                text-align: center;
            }

            #change_budget_1,#change_budget_2,#change_budget_3
            {
                background: white;
                outline: none;
                text-align: center;
                border: 2px solid #00c4ff;
                color: #00c4ff;
                border-radius: 10px;
                font-family: sans-serif;
                font-size: 16px;
                font-weight: bold;
                padding: 5px 10px;
                transition: all 400ms ease;
            }
            #change_budget_1:hover,#change_budget_2:hover,
            #change_budget_3:hover
            {
                background: #00c4ff;
                color: white;

            }
            #pricing_table_header
            {
                font-family: 'Julius Sans One';
                color: #00c4ff;
                font-weight: bold;
                text-align: center;
            }
            .pricing 
            {
                position: relative;
                margin-bottom: 15px;
                border: 3px solid #eee;
                border-radius: 15px;
                transition: all 500ms ease;
            }
            .pricing:hover 
            {
                border: 3px solid #00c4ff;
                box-shadow: 0 0 20px 0 rgba(0,0,0,0.2), 0 5px 5px 0 rgba(0,0,0,0.3);
            }
            .pricing:hover h4 {
                color: #00c4ff;
            }
            .pricing-head 
            {
                text-align: center;
            }
            .pricing-head h3,.pricing-head h4 
            {
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
                transition: all 500ms ease;
                margin: 0;
                line-height: normal;
            }
            .pricing-head h3 span,
            .pricing-head h4 span 
            {
                display: block;
                margin-top: 5px;
                font-size: 14px;
                font-style: italic;
            }
            .pricing-head h3 
            {
                font-weight: 300;
                color: #fafafa;
                padding: 12px 0;
                font-size: 27px;
                background: #00c4ff;
            }
            .pricing-head h4 {
                color: #bac39f;
                padding: 5px 0;
                font-size: 54px;
                font-weight: 300;
                background: #fbfef2;
                border-bottom: solid 1px #f5f9e7;
            }
            .pricing-head h4 i {
                top: -8px;
                font-size: 28px;
                font-style: normal;
                position: relative;
            }
            .pricing-head h4 span {
                top: -10px;
                font-size: 14px;
                font-style: normal;
                position: relative;
            }
            .pricing-content li {
                color: gray;
                font-size: 15px;
                padding: 7px 15px;
                border-bottom: solid 1px #f5f9e7;
            }
            
            #go_button_2
            {
                background: transparent;
                outline: none;
                display: inline-block;
                border:4px solid #00c4ff;
                padding: 20px 20px;
                border-radius: 50%;
                box-shadow: 0 0 20px 0 rgba(0,0,0,0.2), 0 5px 5px 0 rgba(0,0,0,0.3);
                font-family: 'Julius Sans One';
                font-size: 20px;
                font-weight: bold;
                color: #00c4ff;
                text-decoration: none;
                transition: all 500ms ease;   
                margin-top: -1%;
                margin-bottom: -3%;
            }
            #go_button_2:hover
            {
                transform: scale(1.1);
                color: white;
                cursor: pointer;
                background: #00c4ff;
            }
            
            #go_button_3
            {
                background: transparent;
                outline: none;
                display: inline-block;
                border:4px solid #00c4ff;
                padding: 20px 20px;
                text-decoration: none;
                border-radius: 50%;
                box-shadow: 0 0 20px 0 rgba(0,0,0,0.2), 0 5px 5px 0 rgba(0,0,0,0.3);
                font-family: 'Julius Sans One';
                font-size: 20px;
                font-weight: bold;
                color: #00c4ff;
                transition: all 500ms ease;   
            }
            #go_button_3:hover
            {
                transform: scale(1.1);
                color: white;
                cursor: pointer;
                background: #00c4ff;
            }
            .count-input {
                position: relative;
                width: 80%;
                max-width: 30%;
                margin: 10px 0;
            }
            .count-input input {
                width: 100%;
                height: 40px;
                border: 2px solid lightgray;
                font-family: sans-serif;
                border-radius: 15px;
                font-size: 20px;
                background: none;
                color: #222;
                text-align: center;
            }
            .count-input input:focus {
                outline: none;
            }
            .count-input .incr-btn {
                display: block;
                position: absolute;
                width: 30px;
                height: 30px;
                font-size: 35px;
                font-weight: 300;
                text-align: center;
                line-height: 30px;
                top: 50%;
                right: 0;
                margin-top: -15px;
                text-decoration:none;
            }
            .count-input .incr-btn:first-child {
              right: auto;
              left: 1%;
              top: 50%;
            }
            .count-input.count-input-sm {
              max-width: 125px;
            }
            .count-input.count-input-sm input {
              height: 36px;
            }
            .count-input.count-input-lg {
              max-width: 200px;
            }
            .count-input.count-input-lg input {
              height: 70px;
              border-radius: 3px;
            }
            #single_plus,#single_minus,#double_plus,#double_minus
            {
                color: #00c4ff;
                font-family: 'Julius Sans One';
                font-weight: bold;
                text-decoration: none;
                transition: all 100ms ease;
            }
            #single_plus:hover,#single_minus:hover,#double_plus:hover,#double_minus:hover
            {
                color:#00b0e6;   
            }
            #rooms_number_header
            {
                margin-left: 2%;
                color: #00c4ff;
                font-weight: bold;
                font-family: 'Julius Sans One';   
            }
            
            #parent
            {
                width:100%;

            }
            #child1
            {
                width:45%;
                margin-left: 5%;
                float: left;

            }
            #child2
            {
                width:45%;
                float: left;
            }
            
        </style>
        
        <!-- Travel Planner -->
        
        <div id="travel_planner_body" align="center"  class="container">
            <br><br><br>
            <div style="font-family: 'Open Sans', sans-serif;font-weight: 600;letter-spacing: 5px;" align="center" class="container">
                <div class="col-md-3"></div>
                <div class="col-md-3" style="font-size:55px;">
                    <label class="word location">Location</label>
                    <label class="word hotel">Hotel</label>
                    <label class="word travel">Travel</label>
                    <label class="word tracker">Tracker</label>
                    <label class="word explore">Explore</label>
                </div><br><br><br>
                <div>
                    <label style="font-size: 30px;">Planner</label>
                </div>
            </div>
            <br><br>
            <div style="margin-left:0%;margin-top:0%;background:#F3F3F3;" class="row">
                <form style="margin-top:-2%;" action="travel_planner.php" method="POST"> 
                    <div id="input_fields_body" align="center" class="form"> 
                        <br><br>
                        <h3 id="input_field_header">Please Fill Up The Inputs To Generate Plan</h3>
                        <br><br><br>
                        <div id="parent1">
                            <div id="child_input_1">
                                <input class="inputs" name="destination" id="destination" placeholder="Enter Destination">
                            </div>
                            <div id="child_input_2">
                                <input class="inputs" name="size" id="size" placeholder="Enter Group Size">
                            </div>
                        </div>
                        <div align="center">
                            <button class="plan_button" name="plan_button" id="plan_button" >PLAN</button>
                        </div>
                        <br>
                        <div id="parent2">
                            <div id="child_input_3">
                                <input class="inputs" name="days" id="days" placeholder="Enter Days of Stay">
                            </div>
                            <div id="child_input_4">
                                <input class="inputs" name="budget" id="budget" placeholder="Enter Budget Per Person">
                            </div>
                        </div>
                        <br><br><br><br>
                    </div>
                </form>
                
                <div id="start_of_location_body">
                    <br><br><br><br>
                </div>
                
                <!-- Location Part -->
                
                <div class="location_body" id="location_body">
                    <div align="center">
                        <h3 id="location_header">Choose Your Locations</h3>
                    </div>
                    <br>
                    <div align="center">
                        <a href="#travel_planner_body" id="edit_button_1">Edit Previous</a>    
                    </div>
                    <br><br><br>
                    <?php
                    if(isset($_POST['plan_button'])){

                        if(mysqli_num_rows($result) > 0)  
                        {  
                            while($row = mysqli_fetch_array($result))  
                            { 
                        ?> 
                            <div id="image_body_location" align="center" class="col-md-3 choose">
                                <a id="image_link">
                                    <img class="img-responsive" src="images/res_3.jpg">
                                    <input type="checkbox" id="check_it">
                                    <h3 style="margin-top:10%;font-family:sans-serif;"><?php echo $row["name"]; ?></h3>
                                    <input type="hidden" class="place_name" name="place_name" id="place_name" value="<?php echo $row['name'];?>"/>
                                    <span id="check"></span>
                                    <h4 style="font-family:sans-serif;"><?php echo $row["address"]; ?></h4>
                                </a>     
                            </div>
                    <?php
                            }
                        }
                    }
                    else{
                    ?>   
                        <div aliign="center">
                            <h2 style="font-family:'Julius Sans One';">No Plans Made Yet!</h2>
                            <br><br><br>
                        </div>
                    <?php
                    }
                    ?>
                    
                        <div align="center" class="row" style="margin-left:0%;margin-bottom:-2%;">
                            <a href="#start_of_pricing_table_body" id="go_button_1">GO</a>
                        </div>
                </div>
                
                <!-- Location Part -->
                
                <div id="start_of_pricing_table_body">
                    <br><br><br><br>
                </div>
                
                <!-- Pricing Table -->
                <div id="pricing_table_body">
                    <div>
                        <h3 id="pricing_table_header">Choose Your Trip System</h3>
                    </div>
                    <br>
                    <div align="center">
                        <a href="#start_of_location_body" id="edit_button_2">Edit Previous</a>    
                    </div>
                    <br><br><br>
                    <div class="col-md-3">
                        <div class="pricing hover-effect">
                            <div class="pricing-head">
                                <h3>TOTAL BUDGET</h3>
                                <h4><i>TK</i><?php echo $a;?><i>.00</i>
                                </h4>
                            </div>
                            <ul style="text-align:center;" class="pricing-content list-unstyled">
                                <li>
                                    <?php echo("Total Left Out Budget: "). "<br>";
                                          echo $total_budget. "<br>"; ?>
                                </li>
                                <li>
                                    <?php echo("Left Out Budget Each Person: "). "<br>";
                                          echo ($total_budget) / ($group); ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="pricing hover-effect">
                            <div class="pricing-head">
                                <h3>TRANSPORTATION</h3>
                                <h4><i>TK</i><?php echo $group_travel_cost; ?><i>.00</i>
                                </h4>
                            </div>
                            <ul style="text-align:center;" class="pricing-content list-unstyled">
                                <li>
                                    <?php echo("Cost for Each Person's Travel: "). "<br>";
                                        echo $group_travel_cost/ ($group);?>
                                </li>
                                
                                <li>
                                    <input placeholder="Input Cost Here" id="table_input_1">
                                    <br>
                                    <br>
                                    <button id="change_budget_1">Change Budget</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="pricing hover-effect">
                            <div class="pricing-head">
                                <h3>UP-DOWN FARE</h3>
                                <h4><i>TK</i><?php echo $group_updown_cost; ?><i>.00</i>
                                </h4>
                            </div>
                            <ul style="text-align:center;" class="pricing-content list-unstyled">
                                <li>
                                    <?php echo("Cost for Travel: "). "<br>";
                                        echo "TK.".$group_updown_cost/ ($group)."Per Person";?>
                                </li>
                                <li>
                                    <input placeholder="Input Cost Here" id="table_input_2">
                                    <br>
                                    <br>
                                    <button id="change_budget_2">Change Budget</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="pricing hover-effect">
                            <div class="pricing-head">
                                <h3>COST FOR FOOD</h3>
                                <h4><i>TK</i><?php echo $group_food_cost; ?><i>.00</i>
                                </h4>
                            </div>
                            <ul style="text-align:center;" class="pricing-content list-unstyled">
                                <li>
                                    <?php echo("Cost for Food Per Person: "). "<br>";
                                        echo $group_food_cost/ ($group);?>
                                </li>
                                <li>
                                    <input placeholder="Input Cost Here" id="table_input_3">
                                    <br>
                                    <br>
                                    <button id="change_budget_3">Change Budget</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div align="center" class="row" style="margin-left:0%;">
                        <a href="#hotel_body" id="go_button_2" class="go_button_2">GO</a>
                    </div>
                </div>
                
                
                <!-- Pricing Table -->
                
                <div id="start_of_hotel_body">
                    <br><br><br><br>
                </div>
                
                <!-- Hotel Part -->
                
                <div id="hotel_body">
                    <div align="center">
                        <h3 id="hotel_header">Choose Your Hotels To Stay</h3>
                    </div>
                    <br>
                    <div align="center">
                        <a href="#start_of_pricing_table_body" id="edit_button_3">Edit Previous</a>    
                    </div>
                    <br><br><br>
                    <?php
                    if(isset($_POST['plan_button'])){
                        if(mysqli_num_rows($result1) > 0)  
                        {  
                            while($row1 = mysqli_fetch_array($result1))  
                            { 
                        ?> 
                                <div id="image_body" align="center" class="col-md-3 well">
                                    <a id="image_link">
                                        <img class="img-responsive" src="images/res_3.jpg">
                                        <h3 style="margin-top:10%;font-family:sans-serif;"><?php echo $row1["name"]; ?></h3>
                                        <input type="hidden" class="user_id" value="<?php echo $row1['name'];?>"/>
                                        <h4 style="font-family:sans-serif;"><?php echo $row1["address"]; ?></h4>
                                        <h4 style="font-family:sans-serif;">TK. <?php echo $row1["price"]; ?></h4>
                                    </a>
                                </div>

                        <?php
                            }
                        }
                    }
                    else{
                    ?>   
                        <div aliign="center">
                            <h2 style="font-family:'Julius Sans One';">No Plans Made Yet!</h2>
                            <br><br><br>
                        </div>
                    <?php
                    }
                    ?>
                    <div align="center" class="row" style="margin-left:0%;margin-bottom:-2%;">
                        <a href="#room_part" id="go_button_3">GO</a>
                    </div>
                </div>
                
                <!-- Hotel Part -->
                
                <div id="start_of_room_part">
                    <br><br><br><br>
                </div>
                
                <!-- Room Part -->
                
                <div id="room_part">
                    <div align="center">
                        <h3 id="room_part_header">Select Your Rooms</h3>
                        <h4 id="hotel_name"></h4>
                        <h4 id="price"><?php echo $_SESSION['total'];?></h4>
                        <span id="price_range1"></span>
                        <br>
                        <span id="price_range2"></span>
                        <br>
                    </div>
                    <br>
                    <div align="center">
                        <a href="#start_of_hotel_body" id="edit_button_4">Edit Previous</a>    
                    </div>
                    <br><br>
                    <div id="parent">
                        <div id="child1" align="center">
                            <div>
                                <h4 id="rooms_number_header">Number Of Single Room</h4>
                            </div>
                            <div style="width:50%;" class="input-group">
                                <span class="input-group-btn">
                                    <button style="width:35px;height:35px;border-radius:50%;" type="button" class="btn btn-danger btn-number"  data-type="minus" data-field="quant[1]">
                                    <span class="glyphicon glyphicon-minus"></span>
                                    </button>
                                </span>
                                <input style="margin-left:3%;border-radius:15px;text-align:center;outline:none;" type="text" name="quant[1]" class="form-control input-number" value="0" min="0" max="100">
                                <span  class="input-group-btn">
                                    <button style="margin-left:25%;width:35px;height:35px;border-radius:50%;" type="button" class="btn btn-success btn-number" data-type="plus" data-field="quant[1]">
                                        <span class="glyphicon glyphicon-plus"></span>
                                    </button>
                                </span>
                            </div>
                        </div>
                        <div id="child2" align="center">
                            <div>
                                <h4 id="rooms_number_header">Number Of Double Room</h4>
                            </div>
                            <div style="width:50%;" class="input-group">
                                <span class="input-group-btn">
                                    <button style="width:35px;height:35px;border-radius:50%;" type="button" class="btn btn-danger btn-number1"  data-type="minus" data-field="quant[2]">
                                        <span class="glyphicon glyphicon-minus"></span>
                                    </button>
                                </span>
                                <input style="margin-left:3%;border-radius:15px;text-align:center;outline:none;" type="text" name="quant[2]" class="form-control input-number1" value="0" min="0" max="100">
                                <span class="input-group-btn">
                                    <button style="margin-left:25%;width:35px;height:35px;border-radius:50%;" type="button" class="btn btn-success btn-number1" data-type="plus" data-field="quant[2]">
                                        <span class="glyphicon glyphicon-plus"></span>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <form action="travel_planner.php" method="POST">
                        <div align="center" style="margin-top:15%;margin-bottom:2.5%;">
                            <button name="execute_plan" id="execute_plan">Execute Plan</button>   
                        </div>
                    </form>
                </div>
                
                <!-- Room Part -->
                
            </div>
            
        </div>
        
        <!-- Explore Yourself -->
        
        
        
        <!-- Modals -->
        
        <div id="search">
            <button type="button" class="close">X</button>
            <form>
                <input type="search" value="" placeholder="Type Keywords Here..." />
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
        
        <!-- Modals -->
        
        <script>
        
        </script>
        
        <script>
            $(function () {
                var x = document.getElementById("navbar_body");
                var y = document.getElementById("search");
                $('a[href="#search"]').on('click', function(event) {
                    event.preventDefault();
                    $('#search').addClass('open');
                    $('#search > form > input[type="search"]').focus();
                    x.style.zIndex = 1;
                    y.style.zIndex = 1000;
                });
                $('#search, #search button.close').on('click keyup', function(event) {
                    if (event.target.className == 'close' || event.keyCode == 27) {
                        $(this).removeClass('open');
                    }
                });
            });
        </script>
        
        <script>
            $(function () {
              $(document).scroll(function () {
                var $nav = $(".navbar-fixed-top");
                $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
              });
            });
        </script>
        
        <script>
            $( "li" ).hover(
              function() {
                  $(this).find("span").stop().animate({
                  width:"100%",
                  opacity:"1",
                }, 400, function () {
                })
              }, function() {
                  $(this).find("span").stop().animate({
                  width:"0%",
                  opacity:"0",
                }, 400, function () {
                })
              }
            );
        </script>
        
        
        <!-- Javascripts -->
        
    </body>

    <script>
        /*$("#plan_button").click(function(){
            $("#location_body").css("display", "inline-block");
        });*/
        $('#go_button_1').click(function(){
            $('#pricing_table_body').css({
                'display': 'inline-block'
            })
        });
        $('#go_button_2').click(function(){
            $('#hotel_body').css({
                'display': 'inline-block'
            })
        });
        $('#go_button_3').click(function(){
            $('#room_part').css({
                'display': 'inline-block'
            })
        });
        
        
        $('#edit_button_1').click(function(){
            $('#location_body').css({
                'display': 'none'
            })
        });
        $('#edit_button_2').click(function(){
            $('#pricing_table_body').css({
                'display': 'none'
            })
        });
        $('#edit_button_3').click(function(){
            $('#hotel_body').css({
                'display': 'none'
            })
        });
        $('#edit_button_4').click(function(){
            $('#room_part').css({
                'display': 'none'
            })
        });
    
    </script>
    
    <script>
    //plugin bootstrap minus and plus
//http://jsfiddle.net/laelitenetwork/puJ6G/
$('.btn-number').click(function(e){
    e.preventDefault();
    
    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if(type == 'minus') {
            
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
            } 
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
            }
            if(parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
            }

        }
    } else {
        input.val(0);
    }
});
$('.input-number').focusin(function(){
   $(this).data('oldValue', $(this).val());
});
$('.input-number').change(function() {
    
    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());
    $("#price_range1").text("Selected Single Room :" +valueCurrent);
    name = $(this).attr('name');
    if(valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    $.ajax({  

            url:"ajax.php",  
            method:"POST",  
            data:{number:valueCurrent},  
            success:function(data){     
            }  
    });      
});
$(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) || 
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

    $('.btn-number1').click(function(e){
    e.preventDefault();
    
    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if(type == 'minus') {
            
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
            } 
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
            }
            if(parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
            }

        }
    } else {
        input.val(0);
    }
});
$('.input-number1').focusin(function(){
   $(this).data('oldValue', $(this).val());
});
$('.input-number1').change(function() {
    
    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());
    $("#price_range2").text("Selected Double Room :" +valueCurrent);
    name = $(this).attr('name');
    if(valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    $.ajax({  

            url:"ajax1.php",  
            method:"POST",  
            data:{number:valueCurrent},  
            success:function(data){  
            }  
        }); 
    
    
});
$(".input-number1").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) || 
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });    
</script>

<script>
    $(function(){
        $('.well').click(function(){
            var hot_name= $(this).find('.user_id').val();
            $("#hotel_name").text("Selected Hotel: " + hot_name);
        });
    });

</script>
<script>
    $(function(){
        $('.choose').click(function(){
            document.getElementById("check_it").checked = true;
            var hot_name= $(this).find('.place_name').val();
            //$("#check").text("Selected Place: " + hot_name);
        });
    });

</script>

<script>

    var words = document.getElementsByClassName('word');
    var wordArray = [];
    var currentWord = 0;
    words[currentWord].style.opacity = 1;
    for (var i = 0; i < words.length; i++) {
        splitLetters(words[i]);
    }
    function changeWord() {
        var cw = wordArray[currentWord];
        var nw = currentWord == words.length-1 ? wordArray[0] : wordArray[currentWord+1];
        for (var i = 0; i < cw.length; i++) {
            animateLetterOut(cw, i);
        }
        for (var i = 0; i < nw.length; i++) {
            nw[i].className = 'letter behind';
            nw[0].parentElement.style.opacity = 1;
            animateLetterIn(nw, i);
        }
        currentWord = (currentWord == wordArray.length-1) ? 0 : currentWord+1;
    }
    function animateLetterOut(cw, i) {
        setTimeout(function() {
            cw[i].className = 'letter out';
        }, i*80);
    }

    function animateLetterIn(nw, i) {
        setTimeout(function() {
            nw[i].className = 'letter in';
        }, 340+(i*80));
    }
    function splitLetters(word) {
        var content = word.innerHTML;
        word.innerHTML = '';
        var letters = [];
        for (var i = 0; i < content.length; i++) {
            var letter = document.createElement('label');
            letter.className = 'letter';
            letter.innerHTML = content.charAt(i);
            word.appendChild(letter);
            letters.push(letter);
        }
        wordArray.push(letters);
    }
    changeWord();
    setInterval(changeWord, 1500);
</script>

    
</html>