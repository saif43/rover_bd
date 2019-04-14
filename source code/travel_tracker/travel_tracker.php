<?php
session_start();
include("connection.php");
$num=0;
$array = array();
$username=$_SESSION['name'];


    
$query = "SELECT DISTINCT district,kml_link FROM `check_in` WHERE user_name='$username'";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0){

    while($row = mysqli_fetch_array($result)){

    $array[] = $row["kml_link"];
    $num=$num+1;
    }
}

if(isset($_POST['check_in_button'])){


    $check = $_POST['check_in_input'];
    $check=str_replace("'","''",$check);
      
    $query = "SELECT * FROM place
              WHERE place.name='$check'";
              

    $result = mysqli_query($conn, $query);
 
    $row = mysqli_fetch_array($result); 
    $name=$row["name"];
    $name=str_replace("'","''",$name);
    $address=$row["address"];
    $lat=$row["lat"];
    $lng=$row["lng"];
    $district=$row["district"];
    $district=str_replace("'","''",$district);
     				
        				
    $query1 = "SELECT * FROM tracker
              WHERE d_name='$district'";
    
    $result1 = mysqli_query($conn, $query1);
 
    $row1 = mysqli_fetch_array($result1); 
    $kmls=$row1["kml_link"]; 


    $query2 = "INSERT INTO `check_in`(`user_name`, `place`, `address`, `lat`, `lng`,`district`,`kml_link`) VALUES ('$username','$name','$address','$lat','$lng','$district','$kmls')";
    $result1 = mysqli_query($conn, $query2);
    header("Location: /developer/travel_tracker/travel_tracker.php");
}

?>

<html>

<head>

    <title>Travel Tracker</title>
    
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
        
        html,Body
        {
            height: 100%;
        }
        
        body
        {
            background-image: url(images/travel_tracker.jpg);
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
        
        
        /* Footer */
        
        #footer
        {
            background: #141414;
            font-family: 'Julius Sans One', sans-serif;
            color:#fff;
            height: 30%;
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

        #travel_tracker_header
        {
            display: inline-block;
            position: relative;
            font-family: 'Julius Sans One', sans-serif;
            font-weight: bold;
            margin-top: -1%;
            color: #fff;
            -webkit-animation: neon1 2s ease-in-out infinite alternate;
            -moz-animation: neon1 2s ease-in-out infinite alternate;
            animation: neon1 2s ease-in-out infinite alternate;
        }
        
        #track_in_fill,#tracker_fill
        {
            display: inline-block;
            position: relative;
            width: 100%;
            background: rgba(0,0,0,0.6);
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.3), 0 5px 15px 0 rgba(0, 0, 0, 0.50);
            transition: all 500ms ease;
            border: 5px solid rgba(255,255,255,0.5);
            border-radius: 10px;
            -webkit-animation: neon1 2s ease-in-out infinite alternate;
            -moz-animation: neon1 2s ease-in-out infinite alternate;
            animation: neon1 2s ease-in-out infinite alternate;
        }
        #track_in_header,#tracker_header
        {
            font-family: 'Julius Sans One', sans-serif;
            margin-top: 2%;
            padding-top: 10px;
            color: white;
            font-weight: bold;
        }
        #track_in_image,#tracker_image
        {
            height: 30%;
            -webkit-box-shadow: 0px 2px 6px 2px rgba(0,0,0,0.75);
            -moz-box-shadow: 0px 2px 6px 2px rgba(0,0,0,0.75);
            box-shadow: 0px 2px 6px 2px rgba(0,0,0,0.75);
            transition: 500ms;
        }
        #track_in_image:hover,#tracker_image:hover
        {
            transform: scale(1.03,1.03);
            cursor: pointer;
        }
        
        #check_in_body
        {
            background: rgba(255,255,255,0.2);
            border: 3px solid rgba(255,255,255,0.3);
            padding-top: 2%;
            padding-bottom: 2.5%;
        }
        
        #check_in_input
        {
            margin-right: 5%;
            width: 60%;
            height: 5%;
            padding-left: 10px;
            padding-right: 10px;
            font-family: sans-serif;
            font-size: 15px;
            background: white;
            color: white;
            outline: none;
            border: none;
            border-bottom: 2px solid rgba(255,255,255,0.3);
            transition: all 500ms ease;
        }
        
        #check_in_input:focus
        {
            color: #222;
            border-radius: 25%;
        }
        #check_in_input:focus::-webkit-input-placeholder {
            transition: all 500ms ease;
            opacity: 0;
        }
        
        #check_in_button 
        {
            position: relative;
            color: #fff;
            cursor: pointer;
            top: 2px;
            font-size:18px;
            margin-top: 10%;
            font-weight: 400;
            padding-top: 5px;
            padding-left: 20px;
            padding-right: 20px;
            padding-bottom: 5px;
            background: linear-gradient(#403B4A,#E7E9BB);
            border-radius: 5px;
            color: #fff;
            font-family: Segoe UI;
            font-weight: 600;
            text-decoration: none !important;
            border: none;
            transition: all 500ms ease;
        }
        

        #check_in_button:hover 
        {
            color: white;
            opacity: 0.8;
        }
        
        
        #track_in {
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

        #track_in.open {
            -webkit-transform: translate(0px, 0px) scale(1, 1);
            -moz-transform: translate(0px, 0px) scale(1, 1);
            -o-transform: translate(0px, 0px) scale(1, 1);
            -ms-transform: translate(0px, 0px) scale(1, 1);
            transform: translate(0px, 0px) scale(1, 1); 
            transition: 700ms;
            opacity: 1;
        }

        #track_in .close {
            position: absolute;
            top: 35px;
            right: 25px;
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
        
        #track_in .close:hover
        {
            border: 1px solid;
            box-shadow: inset 0 0 25px rgba(255, 255, 255, .5), 0 0 25px rgba(255, 255, 255, .2);
            outline-color: rgba(229, 45, 39, 0);
            outline-offset: 15px;
            border-radius: 0;
            text-shadow: 1px 1px 1px #fff;  
        }
        
        
        #tracker {
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

        #tracker.open {
            -webkit-transform: translate(0px, 0px) scale(1, 1);
            -moz-transform: translate(0px, 0px) scale(1, 1);
            -o-transform: translate(0px, 0px) scale(1, 1);
            -ms-transform: translate(0px, 0px) scale(1, 1);
            transform: translate(0px, 0px) scale(1, 1); 
            transition: 700ms;
            opacity: 1;
        }

        #tracker .close {
            position: absolute;
            top: 35px;
            right: 35px;
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
        
        #tracker .close:hover
        {
            border: 1px solid;
            box-shadow: inset 0 0 25px rgba(255, 255, 255, .5), 0 0 25px rgba(255, 255, 255, .2);
            outline-color: rgba(229, 45, 39, 0);
            outline-offset: 15px;
            border-radius: 0;
            text-shadow: 1px 1px 1px #fff;  
        }
        
        
        
        #track_in_map
        {
            display: inline-block;
            position: relative;
            top: 12px;
            margin-left: 15px;
            width: 100%;
            height: 90%;
            background: rgba(0,0,0,0.25);
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.3), 0 5px 15px 0 rgba(0, 0, 0, 0.50);
            transition: all 500ms ease;
            border: 5px solid rgba(255,255,255,0.5);
        }
        
        #map_track_in
        {
            filter: brightness(110%);
            height: 100%;
            width: 100%;
        }
        
                    
        #track_in_list
        {
            display: inline-block;
            position: relative;
            top: 12px;
            font-size: 16px;
            margin-left: 15px;
            width: 100%;
            height:74%;
            color: white;
            overflow-y:auto; 
            background: rgba(0,0,0,0.25);
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.3), 0 5px 15px 0 rgba(0, 0, 0, 0.50);
            transition: all 500ms ease;
            border: 5px solid rgba(255,255,255,0.5);
        }

        #tracker_share_header
        {
            margin-left:12%;
            color:lightgray;
            font-family:'Julius Sans One';
            font-size:28px;
            -webkit-animation: neon1 2s ease-in-out infinite alternate;
            -moz-animation: neon1 2s ease-in-out infinite alternate;
            animation: neon1 2s ease-in-out infinite alternate;
        }
                
        
        
        #tracker_map
        {
            display: inline-block;
            position: relative;
            top: 12px;
            margin-left: 15px;
            width: 100%;
            height: 90%;
            background: rgba(0,0,0,0.25);
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.3), 0 5px 15px 0 rgba(0, 0, 0, 0.50);
            transition: all 500ms ease;
            border: 5px solid rgba(255,255,255,0.5);
        }
        
        #map_tracker
        {
            height: 100%;
            width: 100%;
            filter: brightness(110%);
        }
        
        
        .slide1,.slide2,.slide3,.slide4,.slide5 
        {
            position: fixed;
            bottom: 0%;
            left: 0%;
            height: 100%;
            width: 100%;
            overflow: hidden;
            background: #000;
            transition: all 500ms ease;
        }
        .slide1 
        {
            background: url(images/7.jpg)no-repeat center;
            background-size: cover;
            animation:fade 20s infinite;
            -webkit-animation:fade 20s infinite;
        } 
        .slide2 
        {
            background: url(images/8.jpg)no-repeat center;
            background-size: cover;
            animation:fade2 20s infinite;
            -webkit-animation:fade2 20s infinite;
        }
        .slide3 
        {
            background: url(images/9.jpg)no-repeat center;
            background-size: cover;
            animation:fade3 20s infinite;
            -webkit-animation:fade3 20s infinite;
        }
        .slide4 
        {
            background: url(images/5.jpg)no-repeat center;
            background-size: cover;
            animation:fade4 20s infinite;
            -webkit-animation:fade4 20s infinite;
        }
        .slide5 
        {
            background: url(images/1.jpg)no-repeat center;
            background-size: cover;
            animation:fade5 20s infinite;
            -webkit-animation:fade5 20s infinite;
        }

        @keyframes fade
        {
            0%    {opacity:1}
            20%   {opacity:0}
            40%   {opacity:0}
            60%   {opacity:0}
            80%   {opacity:0}
            100%  {opacity:1}
        }
        @keyframes fade2
        {
            0%    {opacity:0}
            20%   {opacity:1}
            40%   {opacity:0}
            60%   {opacity:0}
            80%   {opacity:0}
            100%  {opacity:0}
        }
        @keyframes fade3
        {
            0%    {opacity:0}
            20%   {opacity:0}
            40%   {opacity:1}
            60%   {opacity:0}
            80%   {opacity:0}
            100%  {opacity:0}
        }
        @keyframes fade4
        {
            0%    {opacity:0}
            20%   {opacity:0}
            40%   {opacity:0}
            60%   {opacity:1}
            80%   {opacity:0}
            100%  {opacity:0}
        }
        @keyframes fade5
        {
            0%    {opacity:0}
            20%   {opacity:0}
            40%   {opacity:0}
            60%   {opacity:0}
            80%   {opacity:1}
            100%  {opacity:0}
        }
        
    </style>
    
</head>

<body>
<div>
    <nav id="navbar_body" class="navbar navbar-inverse navbar-fixed-top">
        <div>
            <div style="float: left; margin-left:3%;" class="navbar-header">
            <a class="navbar-brand" href="/developer/index1.php">Rover BD</a>
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
                <a id="navbar_option_login" href="#login"><i style="font-size: 18px;" class="fa fa-user" aria-hidden="true"></i>&nbsp;Muktadir Anzan</a>
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

    
    <div class='slider'>
        <div class='slide1'></div>
        <div class='slide2'></div>
        <div class='slide3'></div>
        <div class='slide4'></div>
        <div class='slide5'></div>
    </div>
    
    <!-- Travel Tracker Body -->
    
    <div align="center" class="row">
        <br><br><br>
        <h1 id="travel_tracker_header">Welcome to Travel Tracker, <?php echo $username?>!</h1>
    </div>

   
    <div style="margin-top:-4%;" class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div align="center" id="check_in_body" class="flex-container">
                <form action="travel_tracker.php" method="POST">
                    <input type="text" name="check_in_input" id="check_in_input" placeholder="Post Your Check-In" autocomplete="off">
                    <button name="check_in_button" id="check_in_button">Post</button>
                </form>
            </div>
        </div>  
    </div>
    

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-3">
            <div id="track_in_fill" align="center" class="form"> 
                <h2 id="track_in_header">Track-In</h2><br>
                <a href="#track_in"><img id="track_in_image" width="95%" class="img-responsive" src="images/track_in.png"></a>
                <br>
            </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-1"></div>
        <div class="col-md-3">
            <div id="tracker_fill" align="center" class="form"> 
                <h2 id="tracker_header">Tracker</h2><br>
                <a href="#tracker"><img id="tracker_image" width="95%" class="img-responsive" src="images/tracker1.jpg"></a>
                <br>
            </div>
        </div>
    </div>
    
    
    
    <!-- Modals -->
    
    <div id="search">
        <button type="button" class="close">X</button>
        <form>
            <input type="search" value="" placeholder="Type Keywords Here..." />
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
    
    <div id="tracker">
        <button type="button" class="close">X</button>
        <form>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-6">
                    <div id="tracker_map" align="center" class="form"> 
                        <div id="map_tracker"></div>  
                    </div>
                </div>
                
                <div class="col-md-3">
                <div style="margin-top:60%;margin-left:32%;border:5px solid rgba(255,255,255,0.5);">
                    <br><br>
                    <label id="tracker_share_header">Share On</label>
                    <br><br>
                    <img style="margin-left:20%;" class="img-responsive" width="25%" src="images/facebook.png">
                    <img style="margin-top:-24%;margin-left:60%;" class="img-responsive" width="23%" src="images/instagram2.png">
                    <br><br>
                </div>
            </div>
        </div>
    </form>
</div>
    
    <div id="track_in">
        <button type="button" class="close">X</button>
        <form>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-6">
                    <div id="track_in_map" align="center" class="form"> 
                        <div id="map_track_in"></div>  
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-3">
                <div class="col-md-1"></div>
                    <div class="flex-container">
                        <img width="25%;" style="filter:brightness(110%);margin-top:2%;margin-left:-2%" class="img-responsive" src="images/track_in_logo1.png">
                        <label style="margin-top:-18%;margin-left:25%;margin-bottom:5%;absolute;color:lightgray;font-family:'Julius Sans One';font-size:35px;">Checked_Ins</label>
                    </div>
                    <div id="track_in_list" align="center" class="form"> 
                    
                    <?php
                    include("connection.php");  
                    $query = "SELECT * FROM check_in WHERE user_name='$username'";
                    $result = mysqli_query($conn, $query); 
                    if(mysqli_num_rows($result) > 0)  
                    {  
                        while($row = mysqli_fetch_array($result))  
                        {  
                    ?>  
                            <h4 style="color:white;"><?php echo $row["place"]; ?></h4>  
                            <hr style="margin-bottom:0px">
                    <?php  
                        }  
                    }
                    ?>
                    </div>
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
        
        $(function () {
            var x = document.getElementById("navbar_body");
            var y = document.getElementById("track_in");
            $('a[href="#track_in"]').on('click', function(event) {
                event.preventDefault();
                $('#track_in').addClass('open');
                 x.style.zIndex = 1;
                y.style.zIndex = 1000;
            });
            $('#track_in, #track_in button.close').on('click keyup', function(event) {
                if (event.target.className == 'close' || event.keyCode == 27) {
                    $(this).removeClass('open');
                }
            });
        });
        
        
        $(function () {
            var x = document.getElementById("navbar_body");
            var y = document.getElementById("tracker");
            $('a[href="#tracker"]').on('click', function(event) {
                event.preventDefault();
                $('#tracker').addClass('open');
                 x.style.zIndex = 1;
                y.style.zIndex = 1000;
            });
            $('#tracker, #tracker button.close').on('click keyup', function(event) {
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
    
    
    <script>

        function initAutocomplete() {
            var map = new google.maps.Map(document.getElementById('map_tracker'), {
            
            center: {lat: 23.6850, lng: 90.3563},
            zoom: 7
            
            //center: new google.maps.LatLng(23.6850, 90.3563)
            });
            var n=<?php echo $num ?>;
            var num=<?php echo json_encode($array) ?>;
            for(a=0; a < n; a++){
                var url = num[a];
                this.kmlLayer = new google.maps.KmlLayer(url, { preserveViewport: true, map:map })
            }
        }
</script>


<script>
  var customLabel = {
    restaurant: {
      label: 'R'
    },
    bar: {
      label: 'B'
    }
  };

function initMap() {
    var map = new google.maps.Map(document.getElementById('map_track_in'), {
      center: new google.maps.LatLng(23.6850, 90.3563),
      zoom: 7
    });
    var infoWindow = new google.maps.InfoWindow;

      // Change this depending on the name of your PHP or XML file
      downloadUrl('xml.php', function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName('marker');
        Array.prototype.forEach.call(markers, function(markerElem) {
          //var id = markerElem.getAttribute('id');
          var name = markerElem.getAttribute('name');
          var address = markerElem.getAttribute('address');
          var type = markerElem.getAttribute('contact');
          var point = new google.maps.LatLng(
              parseFloat(markerElem.getAttribute('lat')),
              parseFloat(markerElem.getAttribute('lng')));

          var infowincontent = document.createElement('div');
          var strong = document.createElement('strong');
          strong.textContent = name
          infowincontent.appendChild(strong);
          infowincontent.appendChild(document.createElement('br'));

          var text = document.createElement('text');
          text.textContent = address
          infowincontent.appendChild(text);
          var icon = customLabel[type] || {};
          var marker = new google.maps.Marker({
            map: map,
            position: point,
            label: icon.label
          });
          marker.addListener('click', function() {
            infoWindow.setContent(infowincontent);
            infoWindow.open(map, marker);
          });
        });
      });
initAutocomplete();  
}



function downloadUrl(url, callback) {
    var request = window.ActiveXObject ?
        new ActiveXObject('Microsoft.XMLHTTP') :
        new XMLHttpRequest;

    request.onreadystatechange = function() {
      if (request.readyState == 4) {
        request.onreadystatechange = doNothing;
        callback(request, request.status);
      }
    };

    request.open('GET', url, true);
    request.send(null);
}

function doNothing() {}
</script>
 <script async defer
 src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCrW4E8ujeW_fjIyUz4qbVF2m6rLQIl_c4&callback=initMap">
</script>
    <!-- Javascripts -->

<script>

    $(document).ready(function(){    
        $('#check_in_input').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "fetch.php",
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
</script>
</body>
</html>