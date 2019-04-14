<?php








//	SAIF STARTED WORKING AT 3:27 AM












require_once "config.php";

if (isset($_SESSION['access_token'])) {
	header('Location: index1.php');
	exit();
}

$loginURL = $gClient->createAuthUrl();

session_start();
$_SESSION['hotel']=0;
$_SESSION['location']=0;

if(isset($_POST['login_button'])){

    include_once('connection.php');

    $useremail = $_POST['login_email'];
    $password = $_POST['login_password'];

    $sql = "SELECT * from person where email='$useremail' AND password='$password'";

    $query = mysqli_query($conn,$sql);

    $row = mysqli_fetch_array($query);


    //gets id and password from the result
    $getuser = $row['name'];
    $getpassword = $row['password'];
    $getuserID = $row['person_id'];

 
    if($password==$getpassword){

        $_SESSION['name'] = $getuser;
        $_SESSION['userid'] = $getuserID; 
        header("Location: /developer/index1.php");
    }
    else{

     echo "<h4>Please try again</h4>";
    }

}

if(isset($_POST['location_search_button']))
{
    
    $_SESSION['location_name']=$_POST['location_input'];
    
    header("Location: /developer/location_search/location_finder.php");
}


if(isset($_POST['main_search_button']))
{
    include_once('connection.php');
    $name = $_POST['main_search_input'];

    $query = "SELECT * FROM restaurent_hotel_place WHERE restaurent_hotel_place.name LIKE '%$name%'";
    
    $result = mysqli_query($conn,$query);

    while($row = mysqli_fetch_assoc($result))
    {
        $type = $row['type'];
    }

    if($type == 'Place')
    {
        $_SESSION['location_name']=$name;
    
        header("Location: /developer/location_search/location_finder.php");
    }
    else if($type=="Hotel")
    {
        $_SESSION['hotel']=$name;
        header("Location: /developer/hotel_finder/hotel_finder.php");
        
    }

	            	

    
}





if(isset($_POST['hotel_finder_search_button'])){

    if(!empty($_POST['hotel'])){
        $_SESSION['hotel']=$_POST['hotel'];
    }
    else if(!empty($_POST['location'])){
        $_SESSION['location']=$_POST['location'];
    }
    header("Location: /developer/hotel_finder/hotel_finder.php");
}




?>


<html>

    <head>
    
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Rover BD</title>
        
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/shop-homepage.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/script.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Julius+Sans+One" rel="stylesheet">

        
        
        <style>
        
            body
            {
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
            
            
            .dropdown-menu 
            {
                background: rgba(0,0,0,0.6);
                color: #fff !important;
                transition: all 500ms ease;
            }
            .dropdown-menu li a:hover
            {
                background: rgba(0,0,0,0.7);
            }

            
            /* Navbar & Search & Login*/
            
            
            
            /* Videos */
            
            .no-video .video-container video,
            .touch .video-container video {
                display: none;
            }
            .no-video .video-container .poster,
            .touch .video-container .poster {
                display: block !important;
            }
            .video-container {
                position: relative;
                bottom: 0%;
                left: 0%;
                height: 100%;
                width: 100%;
                overflow: hidden;
                background: #000;
            }
            .video-container .filter {
                z-index: 100;
                position: absolute;
                background: rgba(0, 0, 0, 0.4);
                width: 100%;
            }
            .video-container video {
                position: absolute;
                z-index: 0;
                bottom: 0;
            }
            .video-container video.fillWidth {
                width: 100%;
            }
            
            
            /* Location Body */
            
            #location_form-main
            {
                width:100%;
                float:left;
                padding-top:0px;
            }

            #location_form-div {
                z-index: 10;
                background-color:rgba(0,0,0,0.5);
                padding-left:35px;
                padding-right:35px;
                padding-top:35px;
                padding-bottom:35px;
                width: 30%;
                float: left;
                position: absolute;
                margin-top:11%;
                margin-left: 60%;
                -moz-border-radius: 7px;
                -webkit-border-radius: 7px;
                -webkit-box-shadow: 10px 10px 10px -4px rgba(0,0,0,0.70);
	            -moz-box-shadow: 10px 10px 10px -4px rgba(0,0,0,0.70);
	            box-shadow: 10px 10px 10px -4px rgba(0,0,0,0.70);
            }
            
            #location_body
            {
                display: block;
            }
            
            #location_header
            {
                font-family: 'Julius Sans One', sans-serif;
                font-size: 40px;
            }
            
            #location_search {
                position: relative;
                z-index: 1;
                display: inline-block;
                font-size: 16px;
                font-family: 'Julius Sans One', sans-serif;
                margin: 1em;
                max-width: 85%;
                width: calc(100% - 2em);
                vertical-align: top;
            }

            .input__field 
            {
                text-align: center;
                position: relative;
                display: block;
                float: right;
                padding: 0.8em;
                width: 60%;
                border: none;
                font-size: 20px;
                border-radius: 0;
                background: #f0f0f0;
                color: #fff;
                font-family: 'Julius Sans One', sans-serif;
            }

            .input__field:focus {
                outline: none;
            }

            .input__label {
                display: inline-block;
                float: right;
                padding: 0 1em;
                width: 40%;
                color: #fff;
                font-weight: bold;
                font-size: 70.25%;
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;
                -webkit-touch-callout: none;
                -webkit-user-select: none;
                -khtml-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }

            .input__label-content {
                position: relative;
                display: block;
                padding: 1.6em 0;
                width: 100%;
            }

            .graphic {
                position: absolute;
                top: 0;
                left: 0;
                fill: none;
            }

            .input--shoko {
                overflow: hidden;
                padding-bottom: 2.5em;
            }

            .input__field--shoko {
                padding: 0;
                margin-top: 1.2em;
                width: 100%;
                background: transparent;
                color: #fff;
                font-size: 1.55em;
            }

            .input__label--shoko {
                position: absolute;
                top: 2em;
                left: 0;
                display: block;
                width: 100%;
                text-align: center;
                padding: 0em;
                text-transform: uppercase;
                letter-spacing: 1px;
                color: #fff;
                pointer-events: none;
                -webkit-transform-origin: 0 0;
                transform-origin: 0 0;
                -webkit-transition: -webkit-transform 0.5s 0.2s, color 0.3s;
                transition: transform 0.5s 0.2s, color 0.3s;
                -webkit-transition-timing-function: ease-out;
                transition-timing-function: ease-out;
            }

            .graphic--shoko {
                stroke: #fff;
                pointer-events: none;
                stroke-width: 2px;
                top: 1.25em;
                bottom: 0px;
                height: 3.275em;
                -webkit-transition: -webkit-transform 0.7s, stroke 0.7s;
                transition: transform 0.7s, stroke 0.7s;
                -webkit-transition-timing-function: cubic-bezier(0, 0.25, 0.5, 1);
                transition-timing-function: cubic-bezier(0, 0.25, 0.5, 1);
            } 

            .input__field--shoko:focus + .input__label--shoko,
            .input--filled .input__label--shoko {
                color: #fff;
                -webkit-transform: translate3d(0, 3em, 0) scale3d(1.0, 0.90, 1);
                transform: translate3d(0, 3em, 0) scale3d(1.0, 0.90, 1);
            }

            .input__field--shoko:focus ~ .graphic--shoko,
            .input--filled .graphic--shoko {
                stroke: #fff;
                -webkit-transform: translate3d(-66.6%, 0, 0);
                transform: translate3d(-66.6%, 0, 0);
            }
            
            #location_search_button 
            {
              margin-top: 0px;    
              background: transparent; 
              color: #fff;
              cursor: pointer;
              font-size:16px;
              font-family: 'Julius Sans One', sans-serif;
              font-weight: 400;
              padding-top: 10px;
              padding-bottom: 10px;
              max-width: 160px; 
              text-decoration: none;
              text-transform: uppercase;
              vertical-align: middle;
              width: 100%;     
              border: 0 solid;
              box-shadow: inset 0 0 20px rgba(255, 255, 255, 0);
              outline: 2px solid;
              outline-color: rgba(255, 255, 255, .5);
              outline-offset: 0px;
              text-shadow: none;
              transition: all 1000ms cubic-bezier(0.19, 1, 0.22, 1);
            } 

            #location_search_button:hover {
              border: 1px solid;
              box-shadow: inset 0 0 25px rgba(255, 255, 255, .5), 0 0 25px rgba(255, 255, 255, .2);
              outline-color: rgba(229, 45, 39, 0);
              outline-offset: 25px;
              border-radius: 0;
              text-shadow: 1px 1px 1px #fff; 
            }
            
            #location_headings
            {
                z-index: 10;
                float: left;
                top: 30%;
                left: 12%;
                position: absolute;                
            }
            #location_heading1
            {
                font: 400 50px/1.5 'Julius Sans One', sans-serif;
                color: #fff;
                text-shadow: 3px 3px 0px rgba(0,0,0,0.1), 7px 7px 0px rgba(0,0,0,0.05);
                -webkit-animation: neon 2s ease-in-out infinite alternate;
                -moz-animation: neon 2s ease-in-out infinite alternate;
                animation: neon 2s ease-in-out infinite alternate;
            }
            #location_heading2
            {
                font: 400 25px/1.5 'Julius Sans One', sans-serif;
                color: #fff;
                text-shadow: 3px 3px 0px rgba(0,0,0,0.1), 7px 7px 0px rgba(0,0,0,0.05);
            }
            /* Location Body */
            
            
            
            /* Hotel Finder Body */
            
            #hotel_finder_form-main
            {
                width:100%;
                float:left;
                padding-top:0px;
            }

            #hotel_finder_form-div {
                z-index: 10;
                background-color:rgba(0,0,0,0.5);
                padding-left:35px;
                padding-right:35px;
                padding-top:35px;
                padding-bottom:35px;
                width: 30%;
                float: left;
                position: absolute;
                margin-top:6%;
                margin-left: 60%;
                -moz-border-radius: 7px;
                -webkit-border-radius: 7px;
                -webkit-box-shadow: 10px 10px 10px -4px rgba(0,0,0,0.70);
	            -moz-box-shadow: 10px 10px 10px -4px rgba(0,0,0,0.70);
	            box-shadow: 10px 10px 10px -4px rgba(0,0,0,0.70);
            }
            
            #hotel_finder_body
            {
                display: block;
            }
            
            
            /* Radio Buttons */
                .btn-circle 
                {
                    width: 55px;
                    height: 55px;
                    text-align: center;
                    border: 1px solid lightgray;
                    background: rgba(255,255,255,0.1);
                    color: #fff;
                    padding: 18px 0px;
                    font-size: 12px;
                    border-radius: 50%;
                    outline: none;
                    transition: all 500ms ease;
                }
                .btn-circle:hover
                {
                    color: white;
                    background: rgba(0,0,0,0.5);
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
            
                        
            #hotel_finder_hotel_search,#hotel_finder_location_search
            {
                font-family: 'Julius Sans One', sans-serif;
                font-size: 40px;
            }

            ::-webkit-input-placeholder 
            { 
                color: white;
                font-size: 18px;
            }

            #hotel_finder_hotel_search
            {
                position: relative;
                z-index: 1;
                display: inline-block;
                font-size: 16px;
                font-family: 'Julius Sans One', sans-serif;
                margin: 1em;
                max-width: 85%;
                width: calc(100% - 2em);
                vertical-align: top;

            }

            #hotel_finder_location_search
            {
                position: relative;
                z-index: 1;
                display: none;
                font-size: 16px;
                font-family: 'Julius Sans One', sans-serif;
                margin: 1em;
                max-width: 85%;
                width: calc(100% - 2em);
                vertical-align: top;

            }

            #hotel_finder_search_button 
            {
              margin-top: 0px;
              background: transparent; 
              color: #fff;
              cursor: pointer;
              font-size:16px;
              font-family: 'Julius Sans One', sans-serif;
              font-weight: 400;
              padding-top: 10px;
              padding-bottom: 10px;
              max-width: 160px; 
              text-decoration: none;
              text-transform: uppercase;
              vertical-align: middle;
              width: 100%;     
              border: 0 solid;
              box-shadow: inset 0 0 20px rgba(255, 255, 255, 0);
              outline: 2px solid;
              outline-color: rgba(255, 255, 255, .5);
              outline-offset: 0px;
              text-shadow: none;
              transition: all 1500ms cubic-bezier(0.19, 1, 0.22, 1);
            } 

            #hotel_finder_search_button:hover {
              border: 1px solid;
              box-shadow: inset 0 0 25px rgba(255, 255, 255, .5), 0 0 25px rgba(255, 255, 255, .2);
              outline-color: rgba(229, 45, 39, 0);
              outline-offset: 25px;
              border-radius: 0;
              text-shadow: 1px 1px 1px #fff; 
            }
            
            #hotel_finder_headings
            {
                z-index: 10;
                float: left;
                top: 24.5%;
                left: 12%;
                position: absolute;                
            }
            #hotel_finder_heading1
            {
                font: 400 50px/1.5 'Julius Sans One', sans-serif;
                color: #fff;
                text-shadow: 3px 3px 0px rgba(0,0,0,0.1), 7px 7px 0px rgba(0,0,0,0.05);
                -webkit-animation: neon 2s ease-in-out infinite alternate;
                -moz-animation: neon 2s ease-in-out infinite alternate;
                animation: neon 2s ease-in-out infinite alternate;
            }
            #hotel_finder_heading2
            {
                font: 400 25px/1.5 'Julius Sans One', sans-serif;
                color: #fff;
                text-shadow: 3px 3px 0px rgba(0,0,0,0.1), 7px 7px 0px rgba(0,0,0,0.05);
            }
            
            /* Hotel Finder Body */
            
            
            /* About Us */
            
            #about_us
            {
                background: url('images/index_page/about_us_background.jpg');
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
                /*background-attachment: fixed;*/
                background-repeat: no-repeat;
                background-position: center center;
            }
            #about_us_header
            {
                 font-family: 'Julius Sans One', sans-serif;
                 font-weight:bold;  
                 margin-left: 13%;
                 font-size: 40px;
            }
            #about_us_feature_header
            {
                font-family: 'Julius Sans One', sans-serif;
                font-weight:bold;
            }
            #about_us_feature_explanation
            {
                font-family: 'Julius Sans One', sans-serif;
                 font-weight:bold;
            }
            
            /* About Us */
            
           
            /* Services */
            
            #services_header
            {
                font-family: 'Julius Sans One', sans-serif;
                font-size: 50px;
                font-weight: bold;
            }
            
            #services_package_odd
            {
                margin-left: 36%;
            }
            #services_package_even
            {
                margin-left: 30%;
            }
               
            #services_feature_header
            {
                font-family: 'Julius Sans One', sans-serif;
                font-size: 30px;
                font-weight: bold;
            }
            #services_feature_explanation
            {
                float: left;
                font-family: 'Julius Sans One', sans-serif;
                font-size: 16px;
                font-weight: bold;
            }
                
            
            /* Services */
            
            
            
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
            
            #divider
            {
                border:none;
                width: 100%;
                height: 50px;
                color: black;
                background: linear-gradient(#ADA996,#F2F2F2,#F2F2F2,#ADA996);
            }
            
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
            
            
            /* Others */
            #profile{

                display: none;
            }
            #navbar_option_login{
                display: inline-block;
            }
            
        </style>
        
    </head>
    
    <body>
            <div>
                <nav id="navbar_body" class="navbar navbar-inverse navbar-fixed-top">
                  <div>
                    <div style="float: left; margin-left:5%;" class="navbar-header">
                      <a class="navbar-brand" href="http://appf.uiu.ac.bd/developer">Rover BD</a>
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
                          <a id="navbar_option_login" href="#login"><i style="font-size: 18px;" class="fa fa-user" aria-hidden="true"></i>&nbsp;Log-In</a>
                            <span class="hover"></span>
                        </li>      
                    </ul>    
                  </div>      
                  <div style="float:left" align="center" class="collapse" id="features">
                    <ul style="margin-left:280px;" class="nav navbar-nav">
                      <hr style="margin-top: 0px; margin-bottom: 0px;">
                      <li><a class="nav_a" id="navbar_option" href="location_search/location_finder.php">Locations</a><span class="hover"></span></li>
                      <li><a class="nav_a" id="navbar_option" href="hotel_finder/hotel_finder.php">Hotel Finder</a><span class="hover"></span></li>
                      <li><a class="nav_a" id="navbar_option" onclick="myFunction()">Travel Planner</a><span class="hover"></span></li>
                      <li><a class="nav_a" id="navbar_option" onclick="myFunction()">Travel Tracker</a><span class="hover"></span></li>
                      <li><a class="nav_a" id="navbar_option" onclick="myFunction()">Explore Yourself</a><span class="hover"></span></li>
                    </ul>  
                  </div>
                  </div>
                </nav>
            </div>

            <style>
                #live_update_body
                {
                    position: fixed;
                    top: 130px;
                    z-index: 900;
                    left: 0;
                    background: rgba(179,0,0,0.6);
                    border: 2px solid #670000;
                    color:white;
                    width: 140px;
                    height: 40px;
                    border-top-right-radius: 5px;
                    border-bottom-right-radius: 5px;
                    -webkit-transition: all 0.4s ease;
                    -moz-transition: all 0.4s ease;
                    -o-transition: all 0.4s ease;
                    transition: all 0.4s ease;
                    -webkit-box-shadow: 10px 10px 10px -4px rgba(0,0,0,0.5);
                    -moz-box-shadow: 10px 10px 10px -4px rgba(0,0,0,0.5);
                    box-shadow: 10px 10px 10px -4px rgba(0,0,0,0.5);
                }
                
                #live_update_header
                {
                    margin-top: 7%;
                    margin-left: 5%;
                    margin-right: 5%;
                    font-weight: bold;
                    font-size: 16px;
                    color: white;
                    font-family: 'Julius Sans One';
                }
                #inner_update
                {
                    display: none;
                }
                #live_update_body:hover
                {
                    width: 250px;
                    height: 200px;
                    overflow-y: auto;
                    border-radius: none;
                    background: rgba(255,255,255,0.7);
                    color: darkred;
                    border: 2px solid #670000;
                    -webkit-box-shadow: 10px 10px 10px -4px rgba(0,0,0,0.3);
                    -moz-box-shadow: 10px 10px 10px -4px rgba(0,0,0,0.3);
                    box-shadow: 10px 10px 10px -4px rgba(0,0,0,0.3);
                }
                #live_update_body:hover #inner_update
                {
                    color: black;
                    font-family: sans-serif;
                    display: block;
                    margin-left: 5%;
                    margin-right: 5%;
                }
                #live_update_body:hover #live_update_header
                {
                    color: darkred;
                    font-size: 20px;
                    font-weight: bold;
                }
                #live_update_body::-webkit-scrollbar {
                    width: 1em;
                }
                #live_update_body::-webkit-scrollbar-track {
                    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
                }
                #live_update_body::-webkit-scrollbar-thumb {
                  background-color: #670000;
                  outline: 1px solid rgba(179,0,0,0.8);
                }
                
            </style>
            
            <div align="center" id="live_update_body">
                <h5 id="live_update_header">LIVE UPDATE</h5>
                <br>
                <div style="margin-top:-5%;" id="inner_update" >
                    <h4> Saint Martin Will Be Unavailable For Tourism Until January 27th. </h4><hr>
                    <h4> Ruma hill tracks are unavailable for trekking due to heavy rainfall. </h4><hr>
                    <h4> THose who are travelling to Ratargul in Sylhet,make sure you take carbolic acid to avoid snakes. </h4><hr>
                </div>
            </div>
            
            <div id="location_body">
                <div class="video-container">
                    <div id="location_headings">
                        <h1 id="location_heading1">Travel For Life</h1>
                        <h3 id="location_heading2">“We Travel Not To Escape Life,<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;But For Life Not To Escape Us.”</h3>
                    </div>
                    <div id="location_form-main">
                      <div id="location_form-div">
                        <form class="form" id="location_form1"  method="post" action="index.php">
                            <div align="center">
                                <h1 id="location_header" style="color: #fff;margin-top: -2%;">Location Search</h1>
                               
                               
                                <form method="post" action="index.php">
                                    <div>
                                        <span id="location_search" class="input input--shoko">
                                            <input class="input__field input__field--shoko" type="text" id="location_input" name="location_input" placeholder="Type Location Name" autocomplete="off">
                                            <svg class="graphic graphic--shoko" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
                                                <path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
                                                <path d="M0,2.5c0,0,298.666,0,399.333,0C448.336,2.5,513.994,13,597,13c77.327,0,135-10.5,200.999-10.5c95.996,0,402.001,0,402.001,0"/>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="row">
                                        <button name="location_search_button" id="location_search_button">Search</button>
                                    </div>
                                </form>


                            </div>  
                        </form>
                      </div>
                    </div>
                    <div class="filter"></div>
                    <video id="location_video" style="width:100% !important;" class="fill-width" autoplay loop>
                        <source src="images/index_page/lock.mp4" type="video/mp4" />
                    </video>
                </div>
            </div>

            <div id="divider">
            </div>

            <div id="hotel_finder_body">
                <div class="video-container">
                    <div id="hotel_finder_headings">
                        <h1 id="hotel_finder_heading1">Live With Happiness</h1>
                        <h3 id="hotel_finder_heading2">“Travel Is The Only Thing You Buy<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;That Makes You Richer.”</h3>
                    </div>
                    <div id="hotel_finder_form-main">
                      <div id="hotel_finder_form-div">
                        <form class="form" id="hotel_finder_form1">
                            <div align="center">
                                <h1 id="hotel_finder_header" style="color: #fff;margin-top: -2%;">Hotel Finder Search</h1>
                                <div style="margin-top:10%;margin-bottom:-5%;" align="center"class="row">
                                <form class="form-horizontal col-xs-10 col-xs-offset-1" method="post" action="index.php">
                                    <div class="form-group">
                                        <div class="flex-container" data-toggle="buttons">
                                            <label style="padding-right:20px;font-family:sans-serif;font-size:18px;font-weight:200;color:#fff;">Search By</label>
                                            <a id="hotel_radio" class="btn btn-info btn-circle" type="radio" value="0" onclick="myFunc()">Hotels</a>
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <a id="location_radio" class="btn btn-info btn-circle" type="radio" value="1" onclick="myFunc1()">Location</a>
                                        </div>
                                    </div>
                                </form>
                                </div>
                                
                                <form method="post" action="index.php">
                                    <div>
                                        <span id="hotel_finder_hotel_search" class="input input--shoko">
                                            <input class="input__field input__field--shoko" type="text" name="hotel" id="hotel" placeholder="Search By Hotel Name" autocomplete="off">
                                            <svg class="graphic graphic--shoko" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
                                                <path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
                                                <path d="M0,2.5c0,0,298.666,0,399.333,0C448.336,2.5,513.994,13,597,13c77.327,0,135-10.5,200.999-10.5c95.996,0,402.001,0,402.001,0"/>
                                            </svg>
                                        </span>
                                        <span id="hotel_finder_location_search" class="input input--shoko">
                                            <input class="input__field input__field--shoko" type="text" name="location" id="location" placeholder="Search By Location" autocomplete="off">
                                            <svg class="graphic graphic--shoko" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
                                                <path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
                                                <path d="M0,2.5c0,0,298.666,0,399.333,0C448.336,2.5,513.994,13,597,13c77.327,0,135-10.5,200.999-10.5c95.996,0,402.001,0,402.001,0"/>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="row">
                                        <button name="hotel_finder_search_button" id="hotel_finder_search_button">Search</button>
                                    </div>
                                </form>
                            </div>  
                        </form>
                      </div>
                    </div>
                    <div class="filter"></div>
                    <video id="hotel_finder_video" class="fill-width" autoplay loop>
                        <source src="images/index_page/italia.mp4" type="video/mp4" />
                    </video>
                </div>
            </div>
        
            <div id="divider">
            </div>
            
        
            <div id="about_us">
                <br><br><br><br><br><br>
                <h1 id="about_us_header">Lets Travel , Without Hassel</h1>
                <br><br><br><br><br><br>
                <div align="center" class="row">
                    <div style="margin-left:5%;" class="col-md-2">
                    <img style="width:100px;height:100px;" src="images/index_page/fa_compas.png">
                    <h3 id="about_us_feature_header">SEARCH</h3>
                    <h4 id="about_us_feature_explanation" style="margin-left:0px;">Search For all available traveling locations in Bangladesh!</h4>
                    </div>
                    <div class="col-md-2">
                    <img style="width:100px;height:100px;" src="images/index_page/fa_backpack.png">
                    <h3 id="about_us_feature_header">PLAN</h3>
                    <h4 id="about_us_feature_explanation" style="margin-left:0px;" align="center">Make customize tour plan with your family or friends!</h4>
                    </div>
                    <div class="col-md-2">
                    <img style="width:100px;height:100px;" src="images/index_page/fa_calendar.png">
                    <h3 id="about_us_feature_header">BOOK</h3>
                    <h4 id="about_us_feature_explanation" style="margin-left:0px;" align="center">Find and Book hotel and all kinds of available transport in your destined 
                        location under one platform!
                    </h4>
                    </div>
                    <div class="col-md-2">
                    <img style="width:100px;height:100px;" src="images/index_page/fa_share.png">        
                    <h3 id="about_us_feature_header">SHARE</h3>
                    <h4 id="about_us_feature_explanation" style="margin-left:0px;" align="center">Share your trips and pictures with your community!.</h4>
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <br><br><br><br><br><br><br>
            </div>

        
            <div id="divider">
            </div>
        
            
            <div id="services">
                <br><br>
                <div align="center">
                    <h2 id="services_header">Services</h2>
                </div>
                <br><br><br><br>
                <div style="margin-left:-5.5%;" class="row">
                    <div class="col-md-5">
                        <div  id="services_package_odd">
                            <h1 id="services_feature_header">SEARCH DESTINATION</h1>
                            <br><br>
                            <h3 id="services_feature_explanation">
                                * Dynamically searches all traveling <br>&nbsp;&nbsp;locations in Bangladesh for you !<br><br>
                                * Shows all description, attractions <br>&nbsp;&nbsp;and activities to do !<br><br>
                                * Maps to find the location easily !
                            </h3>
                        </div>
                    </div>
                    <div ailgn="center" class="col-md-6">
                        <br>
                        <img style="margin-top:0px;margin-left:5%;height:70%;width:95%;" src="images/index_page/location_search.png">
                    </div>
                    <div class="col-md-1"></div>
                </div>
                
                <br><br><br>
                
                <hr style="width:80%;border-color:gray;">
                
                <br><br><br>
                
                <div style="margin-left:-5.5%;"  class="row">
                    <div ailgn="center" class="col-md-6">
                        <br>
                        <img style="margin-left:25%;height:70%;width:95%;" src="images/index_page/travel_planner.png">
                    </div>
                    <div class="col-md-5">
                        <div id="services_package_even">
                            <h1 id="services_feature_header">TRAVEL PLANNER</h1>
                            <br><br>
                            <h3 id="services_feature_explanation">
                                * Make customize tour plan with your &nbsp;&nbsp;family or friends !<br><br>
                                * Plan on how much money you will be &nbsp;&nbsp;spending and where !<br><br>
                                * Budget maker for food, hotels and &nbsp;&nbsp;transportation!<br><br>
                                * Dynamically shows you attractive &nbsp;&nbsp;places to visit on your destination &nbsp;&nbsp;based on your staying days !<br><br>
                            </h3>
                        </div>
                    </div>
                </div>
                
                <br><br><br>
                
                <hr style="width:80%;border-color:gray;">
                
                <br><br><br>
                
                <div style="margin-left:-5.5%;" class="row">
                    <div class="col-md-5">
                        <div id="services_package_odd">
                            <h1 id="services_feature_header">HOTEL FINDER</h1>
                            <br><br>
                            <h3 id="services_feature_explanation">
                                * Find hotels near your destination !<br><br>
                                * Search through our amazing &nbsp;&nbsp;collection of hotels !<br><br>
                                * Sort your hotel preferences based &nbsp;&nbsp;on your budget, hotel ratings and &nbsp;&nbsp;reviews by other users !

                            </h3>
                        </div>
                    </div>
                    <div ailgn="center" class="col-md-6">
                        <br>
                        <img style="margin-top:0px;margin-left:5%;height:70%;width:95%;" src="images/index_page/hotel_finder.png">
                    </div>
                </div>
                
                <br><br><br>
                
                <hr style="width:80%;border-color:gray;">
                
                <br><br><br>
                
                <div style="margin-left:-5.5%;" class="row">
                    <div ailgn="center" class="col-md-6">
                        <br>
                        <img style="margin-left:25%;height:70%;width:95%;" src="images/index_page/explore_yourself.png">
                    </div>
                    <div class="col-md-5">
                        <div id="services_package_even">
                            <h1 id="services_feature_header">EXPLORE YOURSELF</h1>
                            <br><br>
                            <h3 id="services_feature_explanation">
                                * Our integrated AI system to know &nbsp;&nbsp;about the traveller in you !<br><br>   
                                * Answer 10 Questions to let us know &nbsp;&nbsp;about yourself !<br><br>
                                * We will suggest you places based on &nbsp;&nbsp;your taste, lifestyle and you can &nbsp;&nbsp;afford!<br><br>
                            </h3>
                        </div>
                    </div>
                </div>
                
                <br><br><br>
                
                <hr style="width:80%;border-color:gray;">
                
                <br><br><br>
                
                <div style="margin-left:-5.5%;" class="row">
                    <div class="col-md-5">
                        <div id="services_package_odd">
                            <h1 id="services_feature_header">TRAVEL TRACKER</h1>
                            <br><br>
                            <h3 id="services_feature_explanation">
                                * Check-In to places you are visiting &nbsp;&nbsp;and share it with your community !<br><br>
                                * The places you travel will be marked &nbsp;&nbsp;in the map of Bangladesh !<br><br>
                                * Along with the mark you will be &nbsp;&nbsp;able to see when you travelled to &nbsp;&nbsp;that place and travel plan if you &nbsp;&nbsp;made any !<br><br>

                            </h3>
                        </div>
                    </div>
                    <div ailgn="center" class="col-md-6">
                        <br>
                        <img style="margin-top:0px;margin-left:5%;height:70%;width:95%;" src="images/index_page/travel_tracker.png">
                    </div>
                </div>
                <br><br><br><br><br><br>
            </div>
        
        
            <div id="footer" align="center">
                    <h2 style="padding-top: 25px;">Md. Zahid Hossain Khan 011-142-151</h2>
                    <h2>CM Muktadir 011-142-082</h2>
                    <h2>Saif Ahmed Anik 011-141-149</h2>
            </div>
        
        <!-- Modals -->

        <style>
            .search-box
            {
                margin-top: 10%;
                margin-left: 30%;
                width: 40%;
                position: relative;
                display: inline-block;
                font-size: 14px;
            }
            .search-box input[type="text"]
            {
                position: absolute;
                top: 50%;
                width: 100%;
                color: rgb(255, 255, 255);
                background: rgba(0, 0, 0, 0);
                font-size: 50px;
                text-align: center;
                border: 0px;
                margin: 0px auto;
                margin-bottom: 10%;
                padding-left: 30px;
                padding-right: 30px;
                outline: none;
            }
            .result{
                border-bottom-left-radius: 20px;
                border-bottom-right-radius: 20px;
                background: rgba(0,0,0,0.5);
                margin-top: 12%;
                position: absolute;
                z-index: 999;
                top: 110%;
                left: 0;
            }
            .search-box input[type="text"], .result{
                width: 100%;
                box-sizing: border-box;
            }
            
            .search-box input[type="text"]::-webkit-input-placeholder {
                font-size: 50px;
                color: gray;
            }
            .result p{
                color: white;
                font-size: 18px;
                margin: 0;
                padding: 7px 10px;
                border-top: none;
                cursor: pointer;
            }
            .result p:hover{
                background: rgba(255,255,255,0.5);
            }
            
        </style>
        
    
    <div id="search">
        <button type="button" class="close">X</button>
        <form action="index.php" method="POST">
            <div class="search-box">
                <input type="text" id="main_search_input" name="main_search_input" placeholder="Type Keywords Here..." autocomplete="off"/>
                <div class="result"></div>    
            </div>
            <button type="submit" id="main_search_button" name="main_search_button" class="btn btn-primary">Search</button>
        </form>
    </div>
        
        
        <div id="login">
            <button type="button" class="close">X</button>
            <form action="index.php" method="POST">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div align="center" id="login_body" class="col-md-4">
                        <h1 id="login_header">LOG-IN</h1>
                        <input name="login_email" id="login_email" placeholder="Username">
                        <input type='password' name="login_password" id="login_password" placeholder="Password"><br>
                        <a id="create_account">Create An Account ?</a><br><br>
                        <button name="login_button" id="login_button" onclick="profile()">Submit</button>
                        <br><br><br>
                        <input style="padding-top:10px;padding-bottom:10px;width:60%;" type="button" onclick="window.location = '<?php echo $loginURL ?>';" value="Log-In With Google" class="btn btn-danger"><br><br>
                        &nbsp;<input style="padding-top:10px;padding-bottom:10px;background:#3b5998;color:white;width:60%;" type="button" value="Log-In With Facebook" class="btn">
                        <br><br>
                    </div>
                </div>
            </form>
        </div>
        
        <!-- Modals -->
    
    </body>
    
    <!-- Javascripts -->

        <script type="text/javascript">
        

        $(document).ready(function(){
            $('.search-box input[type="text"]').on("keyup input", function(){
                /* Get input value on change */
                var inputVal = $(this).val();
                var resultDropdown = $(this).siblings(".result");
                if(inputVal.length){
                    $.get("search_fetch.php", {term: inputVal}).done(function(data){
                        // Display the returned data in browser
                        resultDropdown.html(data);
                    });
                } else{
                    resultDropdown.empty();
                }
            });

            // Set search input value on click of result item
            $(document).on("click", ".result p", function(){
                $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
                $(this).parent(".result").empty();
            });
        });
        </script>    
        
        
        <script>
            $(function () {
                var x = document.getElementById("navbar_body");
                var y = document.getElementById("search");
                $('a[href="#search"]').on('click', function(event) {
                    event.preventDefault();
                    $('#search').addClass('open');
                    $('#search > form > input[type="search"]').focus();
                    $('body').css('overflow', 'hidden');
                    x.style.zIndex = 999;
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
     
        
            function myFunc() {

                $(document).ready(function(){ 
                    $('#hotel').typeahead({
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

                $('#hotel_finder_hotel_search').css({
                    'display': 'inline-block',
                })
                $('#hotel_finder_location_search').css({
                    'display': 'none'
                })
                $('#hotel_radio').css({
                        'background': 'rgba(0,0,0,0.5)',
                        'color': 'white'
                    })
                $('#location_radio').css({
                        'background': 'rgba(255,255,255,0.1)',
                        'color': 'white'
                    })


                       
            }

            // Location Search Ajax

            $(document).ready(function(){    
                    $('#location_input').typeahead({
                        source: function (query, result) {
                            $.ajax({
                                url: "location_search_ajax.php",
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

            // Location Search Ajax


            function myFunc1() {

                $(document).ready(function(){    
                    $('#location').typeahead({
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
                        'background': 'rgba(0,0,0,0.5)',
                        'color': 'white'
                    })
                    $('#hotel_finder_location_search').css({
                        'display': 'inline-block',
                    })
                    $('#hotel_finder_hotel_search').css({
                        'display': 'none'
                    })
                $('#hotel_radio').css({
                        'background': 'rgba(255,255,255,0.1)',
                        'color': 'white'
                    })
            }
    </script>
    
    <!-- <script>

$(document).ready(function () {
    $('#main_search_input').typeahead({
        source: function (query, result) {
            $.ajax({
                url: "search_fetch.php",
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
</script> -->

<script>

function profile(){

        $('#profile').css({
            'display': 'inline-block'
        })
        $('#navbar_option_login').css({
            'display': 'none'
        })
}
    
</script>
<script>
    function myFunction() {
        alert("Please Log-in To Get Access To This Page!");
    }
</script>



        
        <!-- Javascripts -->
    
</html>






        