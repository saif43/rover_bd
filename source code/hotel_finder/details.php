<?php
session_start;
/*$username=$_SESSION['name'];*/
include('connection.php');
error_reporting(E_ERROR | E_PARSE);
$h_id=$_GET['menukey'];
$h_id=str_replace("'","''",$h_id);

$query = "SELECT DISTINCT restaurent_hotel_place.name,restaurent_hotel_place.address,restaurent_hotel_place.subdistrict_name,restaurent_hotel_place.rating,restaurent_hotel_place.id,COUNT(review.comment) AS counted
FROM restaurent_hotel_place JOIN review 
ON restaurent_hotel_place.id=review.restaurent_hotel_place_id
WHERE restaurent_hotel_place.type='Hotel' 
AND restaurent_hotel_place.id='$h_id'";  
$result = mysqli_query($conn, $query);  
if(mysqli_num_rows($result) > 0)  
{  
    while($row = mysqli_fetch_array($result))  
    {  
        $h_name=$row["name"];
        $h_name=str_replace("'","''",$h_name);
        $area=$row["subdistrict_name"];
        $area=str_replace("'","''",$area);
        $address=$row["address"];
        $rating=$row["rating"];
        $comment_count= $row['counted'];
    }
}
?>

<html>

    <head>
    
        <title>Details &amp; Review</title>
        
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Merienda+One' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Julius+Sans+One" rel="stylesheet">
        <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
        

        
        
        <style>            
            
        
            body
            {
                /*background-image: url(images/hotel_finder/hotel_body_background2.jpg);*/
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
                background-attachment: fixed;
                background-repeat: no-repeat;
                background-position: center center;
                overflow-x: hidden;
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
            
            .nav_a,#navbar_option_login
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
            
            #navbar_option:hover,#navbar_option_features:hover,#navbar_option_login:hover
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
            
            
            
            
            
            #login {
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

            #login.open {
                -webkit-transform: translate(0px, 0px) scale(1, 1);
                -moz-transform: translate(0px, 0px) scale(1, 1);
                -o-transform: translate(0px, 0px) scale(1, 1);
                -ms-transform: translate(0px, 0px) scale(1, 1);
                transform: translate(0px, 0px) scale(1, 1); 
                transition: 700ms;
                opacity: 1;
            }
            
            
            #login .close {
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
            
            #login .close:hover
            {
                border: 1px solid;
                box-shadow: inset 0 0 25px rgba(255, 255, 255, .5), 0 0 25px rgba(255, 255, 255, .2);
                outline-color: rgba(229, 45, 39, 0);
                outline-offset: 15px;
                border-radius: 0;
                text-shadow: 1px 1px 1px #fff;  
            }
            
            
            #login_body
            {
                top:20%;
                display: inline-block;
                position: absolute;
                background: white;
                width: 33.33%;
                box-shadow: 0 0 20px 0 rgba(255, 255, 255, 0.2), 10px 10px 10px 0 rgba(255, 255, 255, 0.20);
                transition: all 500ms ease;
                border: 10px solid white;
            }
            #login_header
            {
                color: #0084ff;
                font-family: 'Julius Sans One';
                font-weight: bold;
                margin-bottom: 10%;
            }
            #login_email,#login_password
            {
                width: 80%;
                margin-bottom: 5%;
                padding-left: 20px;
                outline: none;
                font-family: Segoe UI Light;
                font-size: 20px;
                padding-bottom: 2px;
                padding-right: 20px;
                border: 1px solid gray;
                border-radius: 25%;
                transition: all 500ms ease;
            }
            #login_email:focus,#login_password:focus
            {
                
                background: #fff;
                color:#222;
            }
            #login_email:focus::-webkit-input-placeholder,#login_password:focus::-webkit-input-placeholder 
            {
                transition: all 500ms ease;
                opacity: 0;
            }
            #create_account
            {
                text-decoration:none;
                color:dodgerblue;
                cursor:pointer;
                text-transform: uppercase;
                transition: all 200ms ease;
            }
            #create_account:hover
            {
                color:#003666;
            }
            #login_button
            {
                position: relative;
                padding: 5px 50px;
                background: #0084ff;
                color: #fff;
                font-family: 'Julius Sans One';
                font-size: 18px;
                text-decoration: none !important;
                border: none;
                transition: all 500ms ease;
            }
            #login_button:hover 
            {
                color: white;
                opacity: 0.8;
            }
            
            
            /* Navbar & Search & Login*/
            
            
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
    
            /* Details & Review */
            
            #hotel_header_body
            {
                font-family: 'Julius Sans One';
                margin-left: 9.5%;
            }
            #hotel_header
            {
                font-family:sans-serif;
                font-weight: bold;
            }
            #hotel_address
            {
                font-family:sans-serif;
                font-size: 15px;
            }
            #hotel_rating
            {
                margin-top: -1%;
                float: left;
                color: #aaa;
                text-decoration: none;
                cursor: text;
            }
            
            
            #total_body
            {
                margin-top: -3%;
                margin-left: 0%;
                background-color: #F3F3F3;
            }
            #booking_body
            {
                color: dodgerblue;
                display: inline-block;
                position: relative;
                width: 100%;
                background-color: white;
                box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.20);
                border: 10px solid white;
            }
            #slider_body
            {
                -webkit-box-shadow: 0 10px 6px -6px rgba(0,0,0,0.5);
                -moz-box-shadow: 0 10px 6px -6px rgba(0,0,0,0.5);
                box-shadow: 0 10px 6px -6px rgba(0,0,0,0.5);
            }
            #images
            {
                background-color:#F3F3F3;
            }
            
            
            
            #near_by
            {
                margin-top: 5%;
                display: inline-block;
                position: relative;
                width: 100%;
                background-color: white;
                box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.20);
                border: 10px solid white;
            }
            #near_by_hotel_header
            {
                color: dodgerblue;
                margin-top: 0%;
                margin-left: 6.25%;
            }
            #image_body
            {
                display: inline-block;
                position:relative;
                margin-top: 5%;
                margin-left: 6.25%;
                height: 50%;
                transition: all 500ms ease;
                text-decoration-color: white;
                box-shadow: 0 0 15px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.20);
            }
            #image_body:hover
            {
                transform: scale(1.05);
                cursor: pointer;
                box-shadow: 0 -2px 30px 0 rgba(0, 0, 0, 0.2), 0 3px 10px 0 rgba(0, 0, 0, 0.20);
                
            }
            #hotel_image
            {
                padding-top:5%;
            }
            #hotel_name,#hotel_address
            {
                color: #222;
                font-weight: bold;
                font-family: sans-serif;
            }
            
            
            
            
            #review_body
            {
                margin-top: 0%;
                display: inline-block;
                position: relative;
                width: 100%;
                background-color: white;
                box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.20);
                border: 10px solid white;
            }
            #review_header
            {
                color: dodgerblue;
                margin-top: 0%;
                margin-left: 6.25%;
            }
            #review_rating
            {
                margin-top: -3%;
                float: right;
                color: #aaa;
                text-decoration: none;
                cursor: text;
            }
            
            
            
            #user_rating
            {
                float: right;
                margin-top: -3%;
                color: #aaa;
                text-decoration: none;
                cursor: text;
            }
            #user_rating:hover,
            #user_rating:hover ~ a,
            #user_rating:focus,
            #user_rating:focus ~ a		
            {
                color: dodgerblue;
                cursor: pointer;
            }
            #comment_box_header,#user_rate_header
            {
                margin-left: 6.25%;
                margin-top: 1%;
                font-size: 16px;
                color: dodgerblue;
            }
            #comment_box
            {
                box-sizing: border-box;
                margin-left: 6.25%;
                width: 87.25%;
                height: 10%;
                overflow-x: hidden;
                padding-top: 3px;
                padding-left: 15px;
                padding-right: 15px;
                font-size: 15px;
                border-radius: 10px;
                resize: none;
            }
            
            /* Details & Review*/
            
            /* Booking Body */
            
            #dates_body
            {
                width: 100%;
                margin: 0;
                margin-top: 7.5%;
            }
            #dates_body_1
            {
                width:45%;
                margin-left: 3%;
                float: left;
            }
            #dates_body_2
            {
                width:45%;
                margin-right: 3%;
                float: right;
            }
            #check_in_input1,#check_in_input2
            {
                position: relative;
                font-family: 'Julius Sans One';
                font-weight: bold;
            }
            
            
            
            .big 
            {
                font-size: 1.2em;
            }
            .custom-dropdown 
            {
                position: relative;
                display: inline-block;
                vertical-align: middle;
                margin-top: 7%;
            }
            .custom-dropdown select 
            {
                background-color: white;
                color: #222;
                font-size: inherit;
                padding-top: 0.5em;
                padding-bottom: 0.5em;
                padding-left: 5em;
                padding-right: 5em;	
                border: 1px solid dodgerblue;
                margin: 0;
                border-radius: 3px;
                text-overflow: '';
                -webkit-appearance: button;
            }
            .custom-dropdown::before,
            .custom-dropdown::after 
            {
                content: "";
                position: absolute;
                pointer-events: none;
            }
            .custom-dropdown::after 
            { 
                content: "\25BC";
                height: 1em;
                font-size: .625em;
                line-height: 1;
                right: 1.2em;
                top: 50%;
                margin-top: -.5em;
            }
            .custom-dropdown::before 
            {
                width: 2em;
                right: 0;
                top: 0;
                bottom: 0;
                border-radius: 0 3px 3px 0;
            }
            .custom-dropdown select[disabled] {
                color: white;
            }
            .custom-dropdown select[disabled]::after {
                color: white;
            }
            .custom-dropdown::before {
                background-color: dodgerblue;
            }
            .custom-dropdown::after {
                color: white;
            }
            
            #confirm_button
            {
                margin-top: 5%;
                border: none;
                background: dodgerblue;
                color: white;
                padding-top: 5px;
                padding-bottom: 5px;
                padding-left: 15px;
                padding-right: 15px;
                font-size: 20px;
                border-radius: 5px;
            }
            
            /* Booking Body */
            

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
                    <ul style="margin-left: 16%;" class="nav navbar-nav">
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
                          <a id="navbar_option_login" href="#login"><i style="font-size: 18px;" class="fa fa-user" aria-hidden="true"></i>&nbsp;Log-In</a>
                            <span class="hover"></span>
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
        
            .dropbtn 
            {
                background-color: dodgerblue;
                color: white;
                font-weight: bold;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
                padding: 10px;
                font-size: 16px;
                border: none;
                cursor: pointer;
            }
            .dropdown 
            {
                position: relative;
                display: inline-block;
            }
            .dropdown-content 
            {
                text-align: center;
                display: none;
                position: absolute;
                right: 0;
                background-color: #f9f9f9;
                border: 1px solid dodgerblue;
                border-top-left-radius: 10px;
                border-bottom-right-radius: 10px;
                border-bottom-left-radius: 10px;
                min-width: 400px;
                box-shadow: 0px 8px 20px 0px rgba(0,0,0,0.3);
                z-index: 1;
            }
            .dropdown-content a 
            {
                color: black;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
            }
            .dropdown:hover .dropdown-content 
            {
                display: block;
            }
            .dropdown:hover .dropbtn 
            {
                background-color: dodgerblue;
            }
            
            #check_out_button
            {
                background: transparent;
                border: 1px solid dodgerblue;
                border-radius: 5px;
                padding: 5px 15px;
                font-size: 16px;
                transition: all 400ms ease;
            }
            #check_out_button:hover
            {
                background: dodgerblue;
                color: white;
                border: 1px solid dodgerblue;
                padding: 5px 15px;
                font-size: 16px;
            }
            
        </style>
        
        
        <!-- Details Body With Booking -->
        <div class="row">
            <br><br><br>
            <div class="container"> 
                <div class="dropdown" style="float:right;">
                    <button class="dropbtn"><i style="font-size:20px;" class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;&nbsp;Cart</button>
                    <div class="dropdown-content">
                        <br>
                        <h4 id="hotel_name"></h4>
                        <hr style="margin:0;">
                        <a><h5 id="days"  style="font-family:sans-serif;font-wight:bold;margin-bottom:-5%;font-size:17px;"></h5></a>
                        <a><h5 id="days1" style="font-family:sans-serif;font-wight:bold;margin-bottom:-5%;font-size:17px;"></h5></a>
                        <a><h5 id="days2" style="font-family:sans-serif;font-wight:bold;font-size:17px;"></h5></a>
                        <hr style="margin:0;">
                        <a><button id="check_out_button">Check-Out</button></a>
                    </div>
                </div>
            </div>
            <br>
            
            <div style="margin-top:-6%;" id="hotel_header_body" class="container">
                <h2 id="hotel_header"><?php echo $h_name; ?></h2>
                <h5 id="hotel_address"><i style="color:dodgerblue;" class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $address; ?></h5>
                <label><a href="#review_body" style="color:dodgerblue;text-decoration:none;;font-size:17px;">Review&nbsp;(<?php echo $comment_count ?>)</a></label><br>
                <label style="margin-top:-0.6%;color:dodgerblue;font-size:16px;">Rating: <?php echo $rating; ?></label>
            </div>
        </div>
        
        <div id="total_body" class="row">
            <div class="col-md-1"></div>
            <div class="col-md-4">
                <div align="center" id="booking_body" class="form">
                    <h4>Lowest Price For Your Stay</h4>
                    <div id="dates_body">
                        <div id="dates_body_1" class="input-group date x" data-date-format="dd-mm-yyyy">
                            <input id="check_in_input1" name="date" class="form-control"  placeholder="Check-In">
                            <span class="input-group-addon btn" style="background:dodgerblue;color:white;border:1px solid dodgerblue;"><i class="fa fa-calendar" id="butt"></i></span>
                        </div>
                        <div id="dates_body_2" class="input-group date y" data-date-format="dd-mm-yyyy">
                            <input id="check_in_input2" name="date" class="form-control"  placeholder="Check-Out">
                            <span class="input-group-addon btn" style="background:dodgerblue;color:white;border:1px solid dodgerblue;"><i class="fa fa-calendar" id="butt"></i></span>
                        </div>
                    </div>
                    <div align="center">
                        <span class="custom-dropdown big">
                            <select id="single">    
                                <option value="1">1&nbsp;&nbsp;&nbsp;Single Bed Room</option>
                                <option value="2">2&nbsp;&nbsp;&nbsp;Single Bed Room</option>  
                                <option value="3">3&nbsp;&nbsp;&nbsp;Single Bed Room</option>
                                <option value="4">4&nbsp;&nbsp;&nbsp;Single Bed Room</option>
                                <option value="5">5&nbsp;&nbsp;&nbsp;Single Bed Room</option>
                                <option value="6">6&nbsp;&nbsp;&nbsp;Single Bed Room</option>
                                <option value="7">7&nbsp;&nbsp;&nbsp;Single Bed Room</option>  
                                <option value="8">8&nbsp;&nbsp;&nbsp;Single Bed Room</option>
                                <option value="9">9&nbsp;&nbsp;&nbsp;Single Bed Room</option>
                                <option value="10">10&nbsp;Single Bed Room</option>
                            </select>
                        </span>
                    </div>
                    <div align="center">
                        <span class="custom-dropdown big">
                            <select id="double">    
                                <option value="1">1&nbsp;&nbsp;&nbsp;Double Bed Room</option>
                                <option value="2">2&nbsp;&nbsp;&nbsp;Double Bed Room</option>  
                                <option value="3">3&nbsp;&nbsp;&nbsp;Double Bed Room</option>
                                <option value="4">4&nbsp;&nbsp;&nbsp;Double Bed Room</option>
                                <option value="5">5&nbsp;&nbsp;&nbsp;Double Bed Room</option>
                                <option value="6">6&nbsp;&nbsp;&nbsp;Double Bed Room</option>
                                <option value="7">7&nbsp;&nbsp;&nbsp;Double Bed Room</option>  
                                <option value="8">8&nbsp;&nbsp;&nbsp;Double Bed Room</option>
                                <option value="9">9&nbsp;&nbsp;&nbsp;Double Bed Room</option>
                                <option value="10">10&nbsp;Double Bed Room</option>
                            </select>
                        </span>
                    </div>
                    <div align="center">
                        <button id="confirm_button">Book Hotel</button>
                        <br><br>
                        <span id="confirm"></span>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div id="myCarousel" class="carousel slide">
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                        <li data-target="#myCarousel" data-slide-to="3"></li>
                        <li data-target="#myCarousel" data-slide-to="4"></li>
                    </ol>
                    <div id="slider_body" class="carousel-inner">
                        <div id="images" class="item active">
                            <img src="1.jpg" class="img-responsive">
                        </div>
                        <div id="images" class="item">
                            <img src="3.jpg" class="img-responsive">
                        </div>
                        <div id="images" class="item">
                            <img src="5.jpg" class="img-responsive">
                        </div>
                        <div id="images" class="item">
                            <img src="6.jpg" class="img-responsive">
                        </div>
                        <div id="images" class="item">
                            <img src="7.jpg" class="img-responsive">
                        </div>
                    </div>
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="icon-prev"></span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="icon-next"></span>
                    </a>  
                </div>
            </div>
            
        
            <div style="margin-left:1.5%;" class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div id="near_by" class="row">
                        <h2 id="near_by_hotel_header">Near By Hotels</h2>
                            <?php
                                $query = "SELECT * FROM restaurent_hotel_place WHERE (type='Hotel' AND subdistrict_name='$area' AND restaurent_hotel_place.name!='$h_name')";  
                                $result = mysqli_query($conn, $query);  
                                if(mysqli_num_rows($result) > 0)  
                                {  
                                    while($row = mysqli_fetch_array($result))  
                                    {  
                            ?>  
                                        <div align="center" id="image_body" class="col-md-3">
                                            <a style="text-decoration:none;">
                                                <img id="hotel_image" class="img-responsive" src="res_1.jpg">
                                                <h3 id="hotel_name"><?php echo $row["name"]; ?></h3>
                                                <input type="hidden" class="user_id" value="<?php echo $row['name'];?>"/>
                                                <h4 id="hotel_address"><?php echo $row["address"]; ?></h4>
                                            </a>
                                        </div>
                            <?php 
                                    }
                                }
                            ?>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
            
            
            <div style="margin-left:1.5%;" class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="row">
                        <div id="review_body" class="col-md-10">
                            <br><h2 id="review_header">Review (<?php echo $comment_count ?>)</h2>
                            <div id="review_by_person">
                                <hr style="width:90%;">
                                <div style="word-wrap: break-word; margin-left:6.25%;margin-right:10%;">
                                    <label style="color:dodgerblue;font-size:16px;"></label>
                                    <label style="color:dodgerblue;font-size:16px;"></label><br>
                                    <h5 style="font-size:15px;"></h5>
                                </div>
                                <hr style="width:90%;">
                            </div>
                            <div id="user_rate_body">
                                <label id="user_rate_header">|| RATE THE HOTEL</label>
                                <div style="margin-right:83%;margin-top:-1%;" class="rating rating2">
                                    <form action="" method="POST">
                                        <a id="user_rating" onclick="myAjax(5)" href="#5" style="font-size:25px;" value="5">★</a>
                                        <a id="user_rating" onclick="myAjax(4)" href="#4" style="font-size:25px;" value="4">★</a>
                                        <a id="user_rating" onclick="myAjax(3)" href="#3" style="font-size:25px;" value="3">★</a>
                                        <a id="user_rating" onclick="myAjax(2)" href="#2" style="font-size:25px;" value="2">★</a>
                                        <a id="user_rating" onclick="myAjax(1)" href="#1" style="font-size:25px;" value="1">★</a>
                                    </form>
                                </div>  
                            </div>
                                
                                <div id="comment_box_body">
                                    <label id="comment_box_header">|| COMMENT BOX</label>
                                        <form action="details.php?menukey=<?php echo $h_name ?>" method="POST">
                                            <div>
                                                <textarea name="comment_box" id="comment_box" style="font-family:sans-serif;"></textarea>
                                                <div align="center">
                                                    <br><a class="btn btn-info" name="comment_button" id="comment_button">POST</a>
                                                </div>   
                                                                                    
                                            </div>
                                        </form>
                                </div>                      
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        
        <!-- Details Body With Booking -->
        
        
        <!-- Modals -->
        
        <div id="search">
            <button type="button" class="close">X</button>
            <form>
                <input type="search" value="" placeholder="Type Keywords Here..." />
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
        
        <div id="login">
            <button type="button" class="close">X</button>
            <form>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div align="center" id="login_body" class="col-md-4">
                        <h1 id="login_header">LOG-IN</h1>
                        <input id="login_email" placeholder="Email">
                        <input id="login_password" placeholder="Password"><br>
                        <a id="create_account">Create An Account ?</a><br><br>
                        <button id="login_button">Submit</button>
                    </div>
                </div>
            </form>
        </div>
        
        <!-- Modals -->
        
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
                var x = document.getElementById("navbar_body");
                var y = document.getElementById("login");
                $('a[href="#login"]').on('click', function(event) {
                    event.preventDefault();
                    $('#login').addClass('open');
                    x.style.zIndex = 999;
                    y.style.zIndex = 1000;
                });
                $('#login, #login button.close').on('click keyup', function(event) {
                    
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
        
        
        <script>
            var date_input;
            var date_input1;
            $(document).ready(function(){
                date_input=$('.x'); //our date input has the name "date"
                var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
                date_input.datepicker({
                    format: 'dd/mm/yyyy',
                    container: container,
                    todayHighlight: true,
                    autoclose: true,
                });
            });
            $(document).ready(function(){
                date_input1=$('.y'); //our date input has the name "date"
                var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
                date_input1.datepicker({
                    format: 'dd/mm/yyyy',
                    container: container,
                    todayHighlight: true,
                    autoclose: true,
                });
            });
        </script>
        <!-- Javascripts -->
        
    </body>
    
</html>

<script>
            
    $(function(){
        $('.well').click(function(){
            var name= $(this).find('.user_id').val();
	        $.post( "details.php", { data: name } ).done(function( data ) { $( "body" ).html(data);});
        });
    });

 </script>

<script>
    $('#confirm_button').on('click', function(){
        $("#confirm").text("Added To Cart!");
        $("#hotel_name").text("Selected Hotel: <?php echo $h_name; ?>");
        var d = $('#check_in_input1').val();
        var date = d.slice(0,2);
        var d1 = $('#check_in_input2').val();
        var date1 = d1.slice(0,2);
        var a=date1-date;
        var e = document.getElementById("single");
        var single = e.options[e.selectedIndex].text;
        var e = document.getElementById("double");
        var double = e.options[e.selectedIndex].text;
        $("#days").text("Total Days of stay : " + a );
        $("#days1").text(single);
        $("#days2").text(double);
    });
</script>

<script>

$.ajax({  

        url:"comment_backend.php",  
        method:"POST",  
        data:{location: "<?php echo $h_id ?>"},  
        success:function(data)  
        {  
            $('#review_by_person').html(data);  
        }  
}); 

$('#comment_button').click(function(){  

    var comment = $('#comment_box').val();
    var hotelid = "<?php echo $h_id ?>";

    $.ajax({  
        url:"comment_backend.php",  
        method:"POST",  
        data:{comment:comment, location:hotelid},  
        success:function(data)  
        {  
            $('#review_by_person').html(data); 
            $('#comment_box').val('');
        }  
    });  
});
</script>