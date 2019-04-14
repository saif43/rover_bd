<?php  

session_start();
$well=0;
$well1=0;
$basic=0;
$result; 
include('connection.php'); 
$query = "SELECT * FROM `restaurent_hotel_place` WHERE type='Hotel'";  
$result1 = mysqli_query($conn, $query);

?> 

<?php
 if(isset($_POST['google_map_header'])){

     header("Location: /developer/rover/hotel_map.php");

 }


 if(!empty($_SESSION['name'])) {

    echo '<style type="text/css">
    #navbar_option_login {
        display: none;
    }
    </style>';
 }

?>

<html>

    <head>
    
        <title>Hotel Finder</title>
        
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/shop-homepage.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Julius+Sans+One" rel="stylesheet">
        <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
  
        

        
        
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
            
            /* Navbar & Search & Login */
        
            
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
                display: inline-block;
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
              .nav_a,#navbar_option_logout
            {
                display: inline-block;
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
                box-shadow: inset 0 0 25px rgba(255, 255, 255, .3), 0 0 25px rgba(255, 255, 255, .3);
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
                background: rgba(255,255,255,0.3);
                width: 33.33%;
                box-shadow: 0 0 20px 0 rgba(255, 255, 255, 0.1), 10px 10px 10px 0 rgba(255, 255, 255, 0.1);
                transition: all 500ms ease;
            }
            #login_header
            {
                color: white;
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
                background: rgba(255,255,255,0.5);
                font-family: sans-serif;
                font-size: 20px;
                padding-bottom: 2px;
                padding-right: 20px;
                border: 1px solid white;
                transition: all 500ms ease;
            }
            #login_email:focus,#login_password:focus
            {
                
                background: rgba(0,0,0,0.5);
                color:white;
            }
            #login_email:focus::-webkit-input-placeholder,#login_password:focus::-webkit-input-placeholder 
            {
                transition: all 500ms ease;
                opacity: 0;
            }
            #create_account
            {
                text-decoration:none;
                color:white;
                cursor:pointer;
                text-transform: uppercase;
                transition: all 200ms ease;
            }
            #create_account:hover
            {
                color:dodgerblue;
            }
            #login_button
            {
                position: relative;
                padding: 3px 30px;
                color: #fff;
                border-radius: 10%;
                opacity: 1;
                font-size: 16px;
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
            #login_button:hover 
            {
                border: 1px solid;
                box-shadow: inset 0 0 25px rgba(255, 255, 255, .5), 0 0 25px rgba(255, 255, 255, .2);
                outline-color: rgba(229, 45, 39, 0);
                outline-offset: 15px;
                border-radius: 0;
                text-shadow: 1px 1px 1px #fff;
            }
            
            
            /* Navbar & Search & Login */
            
            
            
            
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
            
            
            /* Hotel Finder */
                
                /* Hotel Finder Body */

                #hotel_header_body,#hotel_header
                {
                    font-family: 'Julius Sans One', sans-serif;
                    font-weight: bold;
                    font-size: 35px;
                }
                
                /* Hotel Search */

                #hotel_search_input
                {
                    display: inline-block;
                    width: 25%;
                    height: 6%;
                    outline: none;
                    font-family: sans-serif;
                    padding-left: 15px;
                    padding-right: 15px;
                    border: 1px solid gray;
                    border-right: none;
                    border-top-left-radius: 10px;
                    border-bottom-left-radius: 10px;
                    transition: all 500ms ease;
                }

                #hotel_search_input:focus::-webkit-input-placeholder {
                    transition: all 500ms ease;
                    opacity: 0;
                }
                #hotel_search_input1
                {
                    display: none;
                    width: 25%;
                    height: 6%;
                    outline: none;
                    font-family: sans-serif;
                    padding-left: 15px;
                    padding-right: 15px;
                    border: 1px solid gray;
                    border-right: none;
                    border-top-left-radius: 10px;
                    border-bottom-left-radius: 10px;
                    transition: all 500ms ease;
                }

                #hotel_search_input1:focus::-webkit-input-placeholder {
                    transition: all 500ms ease;
                    opacity: 0;
                }


                #hotel_search_button
                {
                    width: 4%;
                    margin-left: -5px;
                    height: 6%;
                    background: lightgray;
                    outline: none;
                    border: 1px solid gray;
                    border-left: none;
                    color:gray;
                    border-top-right-radius: 10px;
                    border-bottom-right-radius: 10px;
                    transition: all 500ms ease;
                }

                #hotel_search_button:hover
                {
                    background: dodgerblue;
                    color: #fff;
                }

                /* Hotel Search */
            
                /* Radio Buttons */
                .btn-circle 
                {
                    width: 55px;
                    height: 55px;
                    text-align: center;
                    border: 1px solid #1CB5E0;
                    background: white;
                    color: #222;
                    padding: 18px 0px;
                    font-size: 12px;
                    border-radius: 50%;
                    outline: none;
                    transition: all 500ms ease;
                }

                .btn-circle.btn-lg 
                {
                    width: 50px;
                    height: 50px;
                    padding: 13px 13px;
                    font-size: 18px;
                    line-height: 1.33;
                    border-radius: 25px;
                    outline: none;
                } 
                /* Radio Buttons */

            /* Hotel Finder */

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

            .well{
            background: transparent;
            border: none;
            }
            #google_map_header
                { 
                    color: white; 
                    font: 24px/45px 'Julius Sans One', sans-serif; 
                    letter-spacing: -1px;  
                    background: rgb(0, 0, 0); /* fallback color */
                    background: rgba(0, 0, 0, 0.7);
                    padding-top: 5px;
                    padding-bottom: 5px;
                    padding-left: 15px;
                    padding-right: 15px; 
                    cursor: pointer;
                    text-decoration: none; 
                }
                #google_map_form
                {
                    display: inline-block;
                    background: url('google_map.png'); 
                    position: relative;
                    width: 100%;
                    height: 30%;
                    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.20);
                    transition: all 500ms ease;
                    border: 10px solid white;
                }
                #google_map_form:hover 
                {
                    transform: scale(1.03,1.03);
                    border-radius: 5px;
                }

                
                #price_body
                {
                    display: inline-block;
                    position: relative;
                    width: 100%;
                    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.20);
                    transition: all 500ms ease;
                    border: 10px solid white;
                }
                #price_header,#star_header,#selection_header
                {
                    font-family: 'Julius Sans One', sans-serif;
                    margin-top: 2%;
                }
                #price_range
                {
                    outline: none;
                    width: 80%;
                    height: 5px;
                    margin-bottom: 5%;
                    background-color: lightgray;
                    background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #473e4f), color-stop(100%, #51475a));
                    background-image: -webkit-linear-gradient(dodgerblue, dodgerblue);
                    background-image: -moz-linear-gradient(dodgerblue, dodgerblue);
                    background-image: -o-linear-gradient(dodgerblue, dodgerblue);
                    background-image: linear-gradient(dodgerblue, dodgerblue);
                    background-size: 50% 100%;
                    background-repeat: no-repeat;
                    border-radius: 10px;
                    cursor: pointer;
                    -webkit-appearance: none;
                }
                #price_range::-webkit-slider-runnable-track {
                    box-shadow: none;
                    border: none;
                    background: transparent;
                    -webkit-appearance: none;
                }
                #price_range::-moz-range-track {
                    box-shadow: none;
                    border: none;
                    background: transparent;
                }
                #price_range::-moz-focus-outer {
                    border: 0;
                }
                #price_range::-webkit-slider-thumb {
                    width: 20px;
                    height: 20px;
                    border: 1px solid lightgray;
                    background: #fff;
                    border-radius: 100%;
                    box-shadow: 0 0 1px 0px rgba(0,0,0,0.1);
                    -webkit-appearance: none;
                }
                #price_range::-moz-range-thumb {
                    width: 20px;
                    height: 20px;
                    border: 1px solid lightgray;
                    background: #fff;
                    border-radius: 100%;
                    box-shadow: 0 0 1px 0px rgba(0,0,0,0.1);
                }
                
                #star_body
                {
                    display: inline-block;
                    position: relative;
                    width: 100%;
                    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.20);
                    transition: all 500ms ease;
                    border: 10px solid white;
                }
                .rating a
                {
                    float:right;
                    color: #aaa;
                    text-decoration: none;
                    -webkit-transition: color .5s;
                    -moz-transition: color .5s;
                    -o-transition: color .5s;
                    transition: color .5s;
                }
                .rating a:hover,
                .rating a:hover ~ a,
                .rating a:focus,
                .rating a:focus ~ a		
                {
                    color: dodgerblue;
                    cursor: pointer;
                }
                .rating2 
                {
                    direction: rtl;
                }
                .rating2 a 
                {
                    float:none
                }
                
                #selection_visibility
                {
                    visibility: visible;
                }
                #selection_body
                {
                    display: inline-block;
                    position: relative;
                    width: 100%;
                    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.20);
                    transition: all 500ms ease;
                    border: 10px solid white;
                }
                #clear_button
                {
                    font-family: 'Julius Sans One', sans-serif;
                    outline: none;
                    background: transparent;
                    border: none;
                    font-size: 15px;
                    font-weight: bold;
                    color: dodgerblue;
                    transition: all 500ms ease;
                }
                #clear_button:hover
                {
                    color: darkred;
                }
                
                
                #hotel_body
                {
                    display: inline-block;
                    position: relative;
                    width: 100%;
                    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.20);
                    transition: all 500ms ease;
                    border: 10px solid white;   
                }
                
                #hotel_image 
                {
                    -webkit-box-shadow: 0px 2px 6px 2px rgba(0,0,0,0.75);
                    -moz-box-shadow: 0px 2px 6px 2px rgba(0,0,0,0.75);
                    box-shadow: 0px 2px 6px 2px rgba(0,0,0,0.75);
                    transition: 500ms;
                }

                #hotel_image:hover 
                {
                    transform: scale(1.04,1.04);
                }
                
                #hotel_review_button
                {
                    font-family: 'Julius Sans One', sans-serif;
                    outline: none;
                    font-size: 15px;
                    margin-right: 8%;
                    font-weight: bold;
                    color: dodgerblue;
                    cursor: pointer;
                    text-decoration: none;
                    transition: all 500ms ease;
                }
                
                #hotel_review_button:hover
                {
                    color: darkred;
                }
                
                #hotel_details_button
                {
                    position: relative;
                    padding: 5px 50px;
                    background-color: dodgerblue;
                    background: linear-gradient(#36D1DC,#36D1DC);
                    border-radius: 5px;
                    color: #fff;
                    font-family: Segoe UI;
                    font-size: 18px;
                    font-weight: 600;
                    text-decoration: none !important;
                    border: none;
                    transition: all 500ms ease;
                }

                #hotel_details_button:after
                {
                    content: '';
                    position: absolute;
                    top: 2px;
                    left: 2px;
                    width: calc(100% - 4px);
                    height: 50%;
                    border-radius: 10px;
                    background: linear-gradient(rgba(255,255,255,0.8), rgba(255,255,255,0.2));
                }

                #hotel_details_button:hover 
                {
                    color: white;
                    opacity: 0.8;
                }
                
                /* View Map */
            
        </style>
        
    </head>
    
    <body>
        <div>
            <nav id="navbar_body" class="navbar navbar-inverse navbar-fixed-top">
              <div>
                <div style="float: left; margin-left:5%;" class="navbar-header">
                  <a class="navbar-brand" href="/developer/index.php">Rover BD</a>
                </div>
              <div align="center" >
                <ul style="margin-left: 15%;" class="nav navbar-nav">
                  <li><a class="nav_a" id="navbar_option" href="#about_us">About</a><span class="hover"></span></li>
                  <li><a class="nav_a" id="navbar_option" href="#services">Services</a><span class="hover"></span></li>
                  <li><a class="nav_a" id="navbar_option" href="#footer">Contact</a><span class="hover"></span></li>
                  <li><a class="nav_a" id="navbar_option_features" data-toggle="collapse" data-target="#features">Features</a><span class="hover"></span></li>
                </ul>
              </div>
              <div style="float: right; margin-right: 5%;">
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


    
        <!-- Hotel Finder Body -->
        <div>
            <div style="margin-top:0%;" align="center" id="hotel_header_body" class="row">
                <br>
                <h1 id="hotel_header">Hotel Finder  <?php echo $_SESSION['name']; ?></h1>
            </div>
            <div style="margin-top:-4.5%;" align="center"class="row">
                <form class="form-horizontal col-xs-10 col-xs-offset-1" method="post" action="hotel_finder.php">
                    <div class="form-group">
                        <div class="flex-container" data-toggle="buttons">
                            <label style="padding-right:20px;font-family:sans-serif;font-size:18px;font-weight:200;">Search By</label>
                            <a id="hotel_radio" class="btn btn-info btn-circle" type="radio" value="0" onclick="myFunc()">Hotels</a>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <a id="location_radio" class="btn btn-info btn-circle" type="radio" value="1" onclick="myFunc1()">Location</a>
                        </div>
                    </div>
                </form>
            </div>
            <div style="margin-top:-6%;" align="center" class="row"> 
                <div class="flex-container">
                    <form action="hotel_finder.php" method="POST">
                        <input  name="hotel_search_input" id="hotel_search_input" placeholder="Search Hotels By Name" autocomplete="off">
                        <input name="hotel_search_input1" id="hotel_search_input1" placeholder="Search Hotels By Locations" autocomplete="off">
                        <button name="hotel_search_button" id="hotel_search_button"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
             
            
            <div style="margin-top:-5%;" class="row">
                <div class="container">
                    <hr>
                    <br>
                    
                    <div style="border-right: 1px solid lightgray;" class="col-md-4">
                        <div id="google_map_form" align="center" class="form"> 
                            <br><br><br>
                            <form action="hotel_finder.php" method="POST">
                            <input style="border:none;" type="submit" name="google_map_header" id="google_map_header" value="SEE MAP"/>
                            </form>
                        </div>
                        
                        <br><br>
                        <form action="hotel_finder.php" method="POST"> 
                            <div id="price_body" align="center" class="form"> 
                                <h2 id="price_header">Sort By Price</h2><br>
                                <input name="price_range" id="price_range" type="range" min="0" max="15000" value="0"/>
                                <span id="price_ra"></span>
                            </div>
                        </form>
                        
                        <br>
                        <div id="star_body" align="center" class="form"> 
                            <h2 id="star_header">Sort By Star</h2>
                            <div class="rating rating2" align="center">
                            <form action="hotel_finder.php" method="POST">
                                    <a onclick="myAjax(5)" href="#5" style="font-size:30px;" value="5">★</a>
                                    <a onclick="myAjax(4)" href="#4" style="font-size:30px;" value="4">★</a>
                                    <a onclick="myAjax(3)" href="#3" style="font-size:30px;" value="3">★</a>
                                    <a onclick="myAjax(2)" href="#2" style="font-size:30px;" value="2">★</a>
                                    <a onclick="myAjax(1)" href="#1" style="font-size:30px;" value="1">★</a>
                                </form>
                            </div>
                        </div>
                        <div id="selection_visibility">
                            <br>
                            <div id="selection_body" align="center" class="form"> 
                                <h2 id="selection_header">Your Selections</h2>
                                    <div class="flex-container">
                                    <span id="price"></span>
                                    </div>
                                    <div class="flex-container">
                                    <span id="star"></span>
                                    </div>

                                <button id="clear_button" onclick="myClear()">Clear</button>
                            </div>
                        </div>
                    </div>
                    <div id="hotel_main" class="col-md-8">
                       
                    <?php  

                        if(isset($_POST["hotel_search_button"]))
                        {
                            if(!empty($_POST['hotel_search_input'])){

                                $well = $_POST['hotel_search_input'];
                                $well=str_replace("'","''",$well);
                                $_SESSION['place'] = $_POST['hotel_search_input'];
                                $query = "SELECT * FROM restaurent_hotel_place WHERE (type='Hotel' AND name='$well')";  
                                $result = mysqli_query($conn, $query);  
                                if(mysqli_num_rows($result) > 0)  
                                {  
                                    while($row = mysqli_fetch_array($result))  
                                    {  
                                        $basic=$row["subdistrict_name"];
                                        $basic=str_replace("'","''",$basic);
                                    }
                                }
                            }

                            else if(!empty($_POST['hotel_search_input1'])){
                                
                                $well1 = $_POST['hotel_search_input1'];
                                $well1=str_replace("'","''",$well1);
                                $_SESSION['place'] = $_POST['hotel_search_input1'];
                            }
                            
                            $query = "SELECT * FROM restaurent_hotel_place WHERE (subdistrict_name='$well1' or name='$well')";  
                            $result = mysqli_query($conn, $query);  
                            if(mysqli_num_rows($result) > 0)  
                            {  
                                while($row = mysqli_fetch_array($result))  
                                {  
                    ?>  

                                    <div id="hotel_body" align="center" class="form">
                                        <div class="col-md-6">
                                            <img id="hotel_image" class="img-responsive" src="hotel.jpg">
                                        </div>

                                        <div class="col-md-1"></div>
                                        <div id="ore" class="well">
                                            <div align="left" class="col-md-5">
                                                    <h1><?php echo $row["name"]; $tempid=$row['name']; ?></h1>
                                                    <input type="hidden" class="user_id" value="<?php echo $row['id'];?>"/>
                                                    <h2 style="margin-top:-5px;">Tk. <?php echo $row["price"]; ?></h2>
                                                    <h4>Area : <?php echo $row["subdistrict_name"]; ?></h4>
                                                    <h4>Amenities : WiFi,Pool.</h4>
                                                    <h4>Address : xyz,123,Dhaka.</h4>
                                                    <h4>Rating : <?php echo $row["rating"]; ?></h4>
                                                    <div class="flex-container">
                                                            <a id="hotel_review_button">Reviews</a>
                                                            <button name="hotel_details_button" onclick=baal('<?php echo $tempid ?>') id="hotel_details_button">Details</button>
                                                    </div>
                                            </div>  
                                    </div>
                                    </div>
                                    <br><br><br>
                    <?php 
                                }
                            }
                       
                        
                            if(!empty($basic)){
                    ?>
                                <div align="center">
                                    <h2>HOTELS YOU MAY ALSO LIKE IN THIS AREA</h2>
                                </div>
                                    
                                <hr>
                                <br>
                                <?php 
                                $query = "SELECT * FROM restaurent_hotel_place WHERE (subdistrict_name='$basic' AND name!='$well')"; 
                                $result = mysqli_query($conn, $query);  
                                if(mysqli_num_rows($result) > 0)  
                                {  
                                    while($row = mysqli_fetch_array($result))  
                                    {  
                    ?>     
                                            <div id="hotel_body" align="center" class="form">
                                                <div class="col-md-6">
                                                    <img id="hotel_image" class="img-responsive" src="hotel.jpg">
                                                </div>
                
                                                <div class="col-md-1"></div>
                                                <div id="ore" class="well">
                                                    <div align="left" class="col-md-5">
                                                            <h1><?php echo $row["name"]; ?></h1>
                                                            <input type="hidden" class="user_id" value="<?php echo $row['id'];?>"/>
                                                            <h2 style="margin-top:-5px;">Tk. <?php echo $row["price"]; ?></h2>
                                                            <h4>Area : <?php echo $row["subdistrict_name"]; ?></h4>
                                                            <h4>Amenities : WiFi,Pool.</h4>
                                                            <h4>Address : xyz,123,Dhaka.</h4>
                                                            <h4>Rating : <?php echo $row["rating"]; ?></h4>
                                                            <div class="flex-container">
                                                                <a id="hotel_review_button">Reviews</a>
                                                                <button name="hotel_details_button" id="hotel_details_button">Details</button>
                                                            </div>
                                                    </div>  
                                            </div>
                                            </div>
                                            <br><br><br>
                    <?php 
                                        }
                                    }
                                }
                            }
                            else if( (empty($_POST['hotel_search_input'])) AND (empty($_SESSION['hotel']))){
                                
                                $basic=1;
                                
                                if(mysqli_num_rows($result1) > 0)  
                                {  
                                    while($row = mysqli_fetch_array($result1))  
                                    {  
                    ?>  
                                
                                        <div id="hotel_body" align="center" class="form">
                                            <div class="col-md-6">
                                                <img id="hotel_image" class="img-responsive" src="hotel.jpg">
                                            </div>
                                            
                                            <div class="col-md-1"></div>
                                            <div id="ore" class="well">
                                                <div align="left" class="col-md-5">
                                                    <h1 id="name"><?php echo $row["name"]; ?></h1>
                                                    <input type="hidden" class="user_id" value="<?php echo $row['id'];?>"/>
                                                    <h2 style="margin-top:-5px;">Tk. <?php echo $row["price"]; ?></h2>
                                                    <h4>Area : <?php echo $row["subdistrict_name"]; ?></h4>
                                                    <h4>Amenities : WiFi,Pool.</h4>
                                                    <h4>Address : xyz,123,Dhaka.</h4>
                                                    <h4>Rating : <?php echo $row["rating"]; ?></h4>
                                                    <div class="flex-container">
                                                        <a id="hotel_review_button">Reviews</a>                                                 
                                                        <button class="hotel_details_button" name="hotel_details_button" id="hotel_details_button" onclick="<?php $_SESSION['place']=$row["name"]; ?>">Details</button>
                                                    </div>
                                                </div>
                                                </div>
                                        </div>
                                        <br><br><br>
                    <?php  
                                    }  
                                }
                            }
                            else if(!empty($_SESSION['hotel'])){
                                
                                $well = $_SESSION['hotel'];
                                $well=str_replace("'","''",$well);
                                $query = "SELECT * FROM restaurent_hotel_place WHERE (name='$well')";  
                                $result = mysqli_query($conn, $query); 
                                if(mysqli_num_rows($result) > 0)  
                                {  
                                    while($row = mysqli_fetch_array($result))  
                                    {  
                    ?>  
                                        <div id="hotel_body" align="center" class="form">
                                            <div class="col-md-6">
                                                <img id="hotel_image" class="img-responsive" src="hotel.jpg">
                                            </div>

                                            <div class="col-md-1"></div>
                                            <div id="ore" class="well">
                                                <div align="left" class="col-md-5">
                                                    <h1 id="name"><?php echo $row["name"]; ?></h1>
                                                    <input type="hidden" class="user_id" value="<?php echo $row['id'];?>"/>
                                                    <h2 style="margin-top:-5px;">Tk. <?php echo $row["price"]; ?></h2>
                                                    <h4>Area : <?php echo $row["subdistrict_name"]; ?></h4>
                                                    <h4>Amenities : WiFi,Pool.</h4>
                                                    <h4>Address : xyz,123,Dhaka.</h4>
                                                    <h4>Rating : <?php echo $row["rating"]; ?></h4>
                                                    <div class="flex-container">
                                                        <a id="hotel_review_button">Reviews</a>                                                 
                                                        <button class="hotel_details_button" name="hotel_details_button" id="hotel_details_button">Details</button>
                                                    </div>
                                                </div>
                                        </div>
                                        </div>
                                        <br><br><br>
                    <?php  
                                    }
                                }
                    ?>
                                <div align="center">
                                    <h2>HOTELS YOU MAY ALSO LIKE IN THIS AREA</h2>
                                </div>         
                                <hr>
                                <br>
                    <?php 
                                $query1 = "SELECT * FROM restaurent_hotel_place WHERE (name='$well')";  
                                $result1 = mysqli_query($conn, $query1);  
                                if(mysqli_num_rows($result1) > 0)  
                                {  
                                    while($row1 = mysqli_fetch_array($result1))  
                                    { 
                                        $area=$row1['subdistrict_name'];
                                        $area=str_replace("'","''",$area);
                                    }
                                }
                                $query = "SELECT * FROM restaurent_hotel_place WHERE (subdistrict_name='$area' AND name!='$well')";  
                                $result = mysqli_query($conn, $query);  
                                if(mysqli_num_rows($result) > 0)  
                                {  
                                    while($row = mysqli_fetch_array($result))  
                                    {  
                    ?>     
                                        <div id="hotel_body" align="center" class="form">
                                            <div class="col-md-6">
                                                <img id="hotel_image" class="img-responsive" src="hotel.jpg">
                                            </div>
            
                                            <div class="col-md-1"></div>
                                            <div id="ore" class="well">
                                                <div align="left" class="col-md-5">
                                                        <h1><?php echo $row["name"]; ?></h1>
                                                        <input type="hidden" class="user_id" value="<?php echo $row['id'];?>"/>
                                                        <h2 style="margin-top:-5px;">Tk. <?php echo $row["price"]; ?></h2>
                                                        <h4>Area : <?php echo $row["subdistrict_name"]; ?></h4>
                                                        <h4>Amenities : WiFi,Pool.</h4>
                                                        <h4>Address : xyz,123,Dhaka.</h4>
                                                        <h4>Rating : <?php echo $row["rating"]; ?></h4>
                                                        <div class="flex-container">
                                                            <a id="hotel_review_button">Reviews</a>
                                                            <button name="hotel_details_button" id="hotel_details_button">Details</button>
                                                        </div>
                                                </div>  
                                        </div>
                                        </div>
                                        <br><br><br>
                    <?php 
                                    }
                                }
                            }
                    ?>  
                    
                                
        
        </div>
        <!-- Hotel Finder Body -->
        
        
        
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
                        <input id="login_email" type="email" placeholder="Email">
                        <input id="login_password" type="password" placeholder="Password"><br>
                        <a id="create_account">Create An Account ?</a><br><br>
                        <button id="login_button">Submit</button>
                        <br><br>
                    </div>
                </div>
            </form>
        </div>            
                    
        <!-- Modals -->
        
        
        <!-- Javascripts -->
        
        <script>
            $('#price_range').on('input', function(e){
              var min = e.target.min,
                  max = e.target.max,
                  val = e.target.value;

              $(e.target).css({
                'backgroundSize': (val - min) * 100 / (max - min) + '% 100%'
              });
            }).trigger('input');
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
            $(document).ready(function() {
              $('#media').carousel({
                pause: true,
                interval: false,
              });
            });
        </script>
        <!-- Javascripts -->
        <script>
     
        
            function myFunc() {

                    $(document).ready(function(){ 
                        $('#hotel_search_input').typeahead({
                            source: function (query, result) {
                                $.ajax({
                                    url: "h_fetch.php",
                                    method: "POST",
                                    data: {
                                        query: query
                                    },
                                    dataType: "json",
                                    success: function (data) {
                                        result($.map(data, function (item) {
                                            return item;
                                        }));
                                    }
                                })
                            }
                        });
                    });
                    
                    $('#hotel_search_input').css({
                        'display': 'inline-block',
                    })
                    $('#hotel_search_input1').css({
                        'display': 'none'
                    })
                    
                
                $('#hotel_radio').css({
                        'background': '#1CB5E0',
                        'color': 'white'
                    })
                $('#location_radio').css({
                        'background': 'white',
                        'color': '#222'
                    })


                       
            }

            function myFunc1() {

                $(document).ready(function(){    
                    $('#hotel_search_input1').typeahead({
                        source: function (query, result) {
                            $.ajax({
                                url: "d_fetch.php",
                                method: "POST",
                                data: {
                                    query: query
                                },
                                dataType: "json",
                                success: function (data) {
                                    result($.map(data, function (item) {
                                        return item;
                                    }));
                                }
                            })
                        }
                    });
                });

                
                
                $('#location_radio').css({
                        'background': '#1CB5E0',
                        'color': 'white'
                    })
                $('#hotel_search_input1').css({
                        'display': 'inline-block'
                    })
                    $('#hotel_search_input').css({
                        'display': 'none'
                    })
                $('#hotel_radio').css({
                        'background': 'white',
                        'color': '#222'
                    })
            }
            function myClear(){

                document.getElementById("price_range").value = "0" ;
                $('#price_range').css({
                    'background': 'lightgray'
                    })
                $("#price_ra").text("Hotel within Budget of Tk. 0 ");
                $("#price").text("");
                $("#star").text("");

                $.ajax({
                    
                    url:"basic.php",  
                    method:"POST", 
                    success: function( data ) {
                        $("#hotel_main").html(data);
                    }
    
                });
            }
    </script>

<script>  
 //function for price ranger
 var price=0;
 var bass="<?php echo $basic ?>";
 
</script> 

<script> 

    $(document).ready(function(){ 
        
        
        $('#price_range').change(function(){  

            price = $(this).val();  
            $("#price_ra").text("Hotel within Budget of Tk." + price); 
            $("#price").text("Selected Amount: Tk." + price);  

            $.ajax({  

                url:"range.php",  
                method:"POST",  
                data:{price:price},  
                success:function(data){  
                    $("#hotel_main").html(data); 
                        
                }  
            });      
        });  
    });  
    
    //function for star rating
    function myAjax(star) {

        $("#star_range").text("Chosen Number of Star: " + star); 
        $("#star").text("Selected Number of Star: " + star); 
        
        if(price == 0){
            
            $.ajax({

                url:"star.php",  
                method:"POST", 
                data:{ eve : star },
                success: function( data ) {
                    $("#hotel_main").html(data);
                }

            });


        }

        if(price > 0){
            
            $.ajax({

                url:"ajax.php",  
                method:"POST", 
                data:{ eve : star ,price: price},
                success: function( data ) {
                    $("#hotel_main").html(data);
                }

            });
        }

    }
 </script>  
 <script>

        // $('#hotel_details_button').click(function(){
        //     //var name= $(this).find('#user_id').val();
        //     var name = 'xxx';
        //     // location.href="details.php?place="+name+"";
            
        //     $.post( "details.php", { data: name } ).done(function( data ) { $( "body" ).html(data);});
        // });

            
            
      $(function(){
        $('.well').click(function(){
            var name= $(this).find('.user_id').val();
	        //$.post( "details.php", { data: name } ).done(function( data ) { $( "body" ).html(data);});
            location.href="details.php?menukey="+name;
        });
    });

 </script>

</body>
    
</html>