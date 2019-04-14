<?php
session_start();




if(isset($_GET['explore_type']))
{
    $_SESSION['explore_type']=$_GET['explore_type'];
    $_GET['explore_type']="";
    echo "<script type='text/javascript'> explore(); </script>"; 

}
else
{
	unset($_SESSION['explore_type']);
}

if(isset($_SESSION['location_name']))
{
    echo "<script type='text/javascript'> seelocation(); </script>"; 
}
else
{
	unset($_SESSION['location_name']);
}


// if(isset($_POST['loc_search_button']))
// {
//     $_SESSION['location_name'] = $_POST['loc_search_input'];
//     echo "<script type='text/javascript'> seelocation(); </script>"; 
// }

?>



<html>
  
      <head>
      
          <title>Location Finder</title>
          
          <link href="css/bootstrap.min.css" rel="stylesheet">
          <link href="css/shop-homepage.css" rel="stylesheet">
          <script src="js/jquery.js"></script>
          <script src="js/bootstrap.min.js"></script>
          <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
          <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
          <link href="https://fonts.googleapis.com/css?family=Julius+Sans+One" rel="stylesheet">
          <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
          <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
      
          
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
            
            .nav_a,#navbar_option_login,#navbar_option_logout
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
            
            #navbar_option:hover,#navbar_option_features:hover,#navbar_option_login:hover,#navbar_option_logout:hover
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
                      text-shadow: 0 0 10px dodgerblue, 0 0 20px dodgerblue, 0 0 30px dodgerblue, 0 0 40px dodgerblue, 0 0 50px dodgerblue;
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
      
              
              /* Location */
                  
                  /* Location Body */
              
                  
                  #location_logo
                  {
                      margin-left:-15%;
                      margin-top:0%;
                      margin-bottom:1%;
                      transition: all 500ms ease;
                  }
  
                  #location_header
                  {
                      font-family: 'Julius Sans One', sans-serif;
                      font-weight: bold;
                      font-size: 30px;
                      margin-left: -8%;
                      margin-right: -4%;
                  }
                  #location_menu_body
                  {
                      position: fixed;
                      margin-top: -12%;
                  }
                  #location_menu
                  {
                      margin-left: 5%;
                      font-family: 'Julius Sans One', sans-serif;
                      font-weight: bold;
                  }
                  #menu_options
                  {   
                      font-size: 30px;
                      color: #222;
                      text-decoration: none;
                      cursor: pointer;
                      padding-top: 2%;
                      line-height: 40px;
                      transition: all 500ms ease;
                  }
                  #menu_options:hover
                  {
                      font-size: 38px;
                      padding: 10px;
                  }
              
                  /* Location Body */            
  
                  /* Location Type */
              
                  div.radio-box 
                   {
                      margin-top: -4%;
                      margin-left: 10%;
                      margin-bottom: 2%;
                      width: 80%;
                      display: flex;
                      align-items: center;
                      justify-content: space-around;
                  }
                  #catagory_header
                  {
                      font-family: 'Julius Sans One';
                      font-size: 20px;
                      color: dodgerblue;
                      margin-top: -2%;
                      margin-left: 10%;
                      margin-bottom: 5%;
                  }
              
                  .catagory_option
                  {
                      top: 1px;
                      padding-top: 10px;
                      padding-bottom: 10px;
                      width: 12.5%;
                      border-radius: 5px;
                      margin-left: -3.15%;
                      position: relative;
                      color: #fff;
                      font-family: 'Julius Sans One';
                      font-size: 17px;
                      font-weight: 600;
                      text-decoration: none !important;
                      border: none;
                      transition: all 300ms ease;
                  }

                  .catagory_option:after
                  {
                      content: '';
                      position: absolute;
                      border-radius: 5px;
                      top: 2px;
                      left: 2px;
                      width: calc(100% - 4px);
                      height: 50%;
                      background: linear-gradient(rgba(255,255,255,0.8), rgba(255,255,255,0.2));
                  }

                  .catagory_option:hover
                  {
                      color: white;
                      cursor: pointer;
                      opacity: 0.8;
                      -webkit-box-shadow: 0 10px 6px -6px rgba(0,0,0,0.30);
                      -moz-box-shadow: 0 10px 6px -6px rgba(0,0,0,0.30);
                      box-shadow: 0 10px 6px -6px rgba(0,0,0,0.30);
                  }
              
                  #catagory_option_1
                  {
                      background: linear-gradient(#008B00,#0f9b0f,#00EE00);
                  }
                  #catagory_option_2
                  {
                      background: linear-gradient(#ff5722,#ffeb3b);
                  }
                  #catagory_option_3
                  {
                      background: linear-gradient(#004d40,#00bfa5,#1de9b6,#a7ffeb);  
                      
                  }
                  #catagory_option_4
                  {
                      background: linear-gradient(#20002c,#4a148c,#8b54f2);
                  }
                  #catagory_option_5
                  {
                      background: linear-gradient(#dd2c00,#bf360c,#ef6c00,#ffa000);
                  }
                  #catagory_option_6
                  {
                      background: linear-gradient(#000046,#1CB5E0);
                  }
                  #catagory_option_7
                  {
                      background: linear-gradient(#1a237e,#18ffff);
                  }
               
                  /* Location Type */
              
                  /* Location Slider */
  
                  .media-carousel 
                  {
                    margin-bottom: -5%;
                    padding: 0 40px 30px 40px;
                  }
                  .media-carousel .carousel-control.left 
                  {     
                    background-image: none;
                    background: none repeat scroll 0 0 dodgerblue;
                    border: 4px solid #FFFFFF;
                    border-radius: 50%;
                    height: 40px;
                    width : 40px;
                    font-size: 20px;
                    left: 7.5%;
                    margin-top: 13%;
                    transition: all 500ms ease;
                  }
                  .media-carousel .carousel-control.right 
                  {
                    right: -28.75%;
                    background-image: none;
                    background: none repeat scroll 0 0 dodgerblue;
                    border: 4px solid #FFFFFF;
                    border-radius: 50%;
                    height: 40px;
                    width : 40px;
                    font-size: 20px;
                    margin-top: 13%;
                    transition: all 500ms ease;
                  }
                  .media-carousel .carousel-indicators li 
                  {   
                    background: #c0c0c0;
                  }
                  .media-carousel .carousel-indicators .active 
                  {
                    background: #333333;
                  }
                  #image_body
                  {
                      outline: none;
                      transition: all 500ms ease;
                  }
                  #image_body:hover
                  {
                      border-radius: 2px;
                      filter: brightness(108%);
                      transform: scale(1.025);
                      box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.20);
                  }
                  #image_link
                  {
                      outline: none;
                      border: none;
                      color: #222;
                      text-decoration: none;
                      font-family:sans-serif;
                      transition: all 500ms ease;
                  }
                  #image
                  {
                      transform: scaleX(1.15);
                      margin-top: 5px;
                      padding-left: 5px;
                      padding-right: 5px;
                      width: calc(100%+50px);
                      height: 175px;
                  }
  
                  .media-carousel img
                  {
                      margin-top: 5%;
                      width: 100%;
                      height: 18%;
                  }
                  .carousel-inner
                  {
                      margin-top: -3%;
                      margin-left: 0px;
                      width:150%;
                      outline: none;
                  }
  
                  /* Location Slider */
  
                  /* Location Search */
  
                  .search-box
                    {
                        position: relative;
                        display: inline-block;
                        width: 100%;
                        font-size: 18px;
                        margin-left: 5%;
                    }
                    .search-box input[type="text"]
                    {
                        height: 40px;
                        padding: 5px 20px;
                        width: 100%;
                        border: 1px solid dodgerblue;
                        font-size: 18px;
                        border-radius: 10px;
                        transition: all 500ms ease;
                    }
                    .search-box input[type="text"]:focus
                    {
                        background: #44c7f4;
                        color:white;
                    }
                    .search-box input[type="text"]:focus::-webkit-input-placeholder
                    {
                        transition: all 500ms ease;
                        color: white;
                    }
                    .result
                    {
                        position: absolute;
                        background: rgba(255,255,255,0.95);
                        z-index: 999;
                        top: 100%;
                        left: 0;
                        font-family: sans-serif;
                        font-size: 16px;
                    }
                    .search-box input[type="text"], .result{
                        width: 100%;
                        box-sizing: border-box;
                    }
                    .result p{
                        margin: 0;
                        padding: 7px 10px;
                        border: 1px solid #CCCCCC;
                        border-top: none;
                        cursor: pointer;
                    }
                    .result p:hover
                    {
                        background: rgba(68,199,244,0.6);
                    }
  
                  /* Location Search */
  
              /* Location */
  
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
                    <div style="float: left; margin-left:5%;" class="navbar-header">
                      <a class="navbar-brand" href="http://appf.uiu.ac.bd/developer/">Rover BD</a>
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
                      <li><a class="nav_a" id="navbar_option" href="location_finder.php">Locations</a><span class="hover"></span></li>
                      <li><a class="nav_a" id="navbar_option" href="http://appf.uiu.ac.bd/developer/hotel_finder/hotel_finder.php">Hotel Finder</a><span class="hover"></span></li>
                      <li><a class="nav_a" id="navbar_option" href="http://appf.uiu.ac.bd/developer/travel_planner/travel_planner.php">Travel Planner</a><span class="hover"></span></li>
                      <li><a class="nav_a" id="navbar_option" href="http://appf.uiu.ac.bd/developer/travel_tracker/travel_tracker.php">Travel Tracker</a><span class="hover"></span></li>
                      <li><a class="nav_a" id="navbar_option" href="http://appf.uiu.ac.bd/developer/explore_yourself/explore_yourself.php">Explore Yourself</a><span class="hover"></span></li>
                    </ul>  
                  </div>
                  </div>
                </nav>
            </div>
          
          <style>
                #loc_search_button
                {
                    float: left;
                    background: transparent;
                    color: #44c7f4;
                    border: 2px solid #44c7f4;
                    font-size: 25px;
                    border-radius: 7px;
                    height: 6.25%;
                    width: 55%;
                    padding-top: 2.5%; 
                    text-decoration: none;
                    transition: all 400ms ease;  
                }
                #loc_search_button:hover
                {
                    color: white;
                    background: #44c7f4;
                }
          </style>
          
          
          <div style="margin-top:4%;margin-bottom:-2%;margin-left:-6%;" align="center" class="row">     
              <form action="location_finder.php" method="post">
                  <div class="col-md-4"></div>
                  <div class="col-md-6">
                        <div class="col-xs-3"></div>
                        <div class="col-xs-7">
                            <div class="search-box">
                                <input type="text" id="loc_search_input" name="loc_search_input" autocomplete="off" placeholder="Search By Location Name"/> 
                                <div class="result"></div>
                            </div>
                        </div>
                        <div class="col-xs-2"><a id="loc_search_button" name="loc_search_button>"<i class="fa fa-search"></i></a></div>
                  </div>
                  <div class="col-md-2"></div>
              </form>
          </div>
          
          <div align="center" class="row">     
              <div class="col-md-2"></div>
              <div class="col-md-10"> 
                  <main >
                      <label id="catagory_header">View only</label>
                      <div class="radio-box">
                          <a class="catagory_option" id="catagory_option_5" name="catagory_options" onclick=passlocation('park')>Park</a>
                          <a class="catagory_option" id="catagory_option_2" name="catagory_options" onclick=passlocation('historical')>Historical</a>
                          <a class="catagory_option" id="catagory_option_1" name="catagory_options" onclick=passlocation('forest')>Forest</a>
                          <a class="catagory_option" id="catagory_option_3" name="catagory_options" onclick=passlocation('mountain')>Mountain</a>
                          <a class="catagory_option" id="catagory_option_7" name="catagory_options" onclick=passlocation('sea')>Sea</a>
                          <a class="catagory_option" id="catagory_option_6" name="catagory_options" onclick=passlocation('river')>River</a>
                          <a class="catagory_option" id="catagory_option_4" name="catagory_options" onclick=passlocation('museum')>Museum</a>
                    </div>
                </main>
              </div>
          </div>
          
        <div id="locations" style="margin-top:-5%;" class="row">   
            
            
            
        </div>
          
          <!-- Location Finder Body -->
          
          
          
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
                        <input style="padding-top:10px;padding-bottom:10px;width:60%;" type="button" value="Log-In With Google" class="btn btn-danger"><br><br>
                        &nbsp;<input style="padding-top:10px;padding-bottom:10px;background:#3b5998;color:white;width:60%;" type="button" value="Log-In With Facebook" class="btn">
                        <br><br>
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
          
          <script type="text/javascript">
            $(document).ready(function(){
                $('.search-box input[type="text"]').on("keyup input", function(){
                    var inputVal = $(this).val();
                    var resultDropdown = $(this).siblings(".result");
                    if(inputVal.length){
                        $.get("backend-search.php", {term: inputVal}).done(function(data){
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
              
            $.ajax({  
                    url:"location_finder_fetch.php",  
                    method:"POST",  
                    data:{division:'dhaka'},  
                    success:function(data)  
                    {  
                        $('#locations').html(data); 
                    }  
                });
           
  
              
            $(document).ready(function(){    
                $('#location_search_input').typeahead({
                    source: function (query, result) {
                        $.ajax({
                            url: "location_search_fetch.php",
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

                $("#loc_search_input").keyup(function(event) {
                    if (event.keyCode === 13) {
                    $("#loc_search_button").click();
                    $('#loc_search_input').val('');
                    $(window).click();
                        
                    }
                });

                $(window).click(function(e) {

                });
            
               
            });

            

                        
            $(function () {
            $(document).scroll(function () {
                var $nav = $(".navbar-fixed-top");
                $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
            });
            });
        
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
        
            $(document).ready(function() {
            $('#media').carousel({
                pause: true,
                interval: false,
            });
            });

            // $("#loc_search_button").click(function(){
            //     alert("The paragraph was clicked.");
            // });

             $("#loc_search_button").click(function() {
                    var location =$("#loc_search_input").val();

                    if(location!='')
                    {
                        $.ajax({  
                        url:"location_finder_fetch.php",  
                        method:"POST",  
                        data:{location:location},  
                        success:function(data)  
                        {  
                            $("#locations").html(data); 
                        }  
                    });
                    }
                });

            function passlocation(type)
            {
                $("html, body").animate({ scrollTop: 0 }, "slow");
                    
                $.ajax({  
                    url:"location_finder_fetch.php",  
                    method:"POST",  
                    data:{type:type},  
                    success:function(data)  
                    {  
                        $('#locations').fadeIn().html(data); 
                    }  
                });   
            }

            function gotodistrict(division)
            {
                $("html, body").animate({ scrollTop: 0 }, "slow");
                
                $('#location_search_input').val(''); 
                $.ajax({  
                    url:"location_finder_fetch.php",  
                    method:"POST",  
                    data:{division:division},  
                    success:function(data)  
                    {  
                        $('#locations').fadeIn().html(data); 
                    }  
                });    

            }


            function gotoLocation(name)
            {
                location.href = "details.php?id="+name+"";
                // $.post( "x.php", { data1: name } ).done(function( data ) { $( "body" ).html(data);}); 
                
            }
            


            function explore()
            {
                
                $.ajax({  
                    url:"location_explore_fetch.php",  
                    success:function(data)  
                    {  
                        if(data!='')
                        {
                            $('#locations').fadeIn().html(data);
                        } 
                    }  
                });    

            }
            function seelocation()
            {
                
                $.ajax({  
                    url:"location_explore_fetch.php",  
                    success:function(data)  
                    {  
                        if(data!='')
                        {
                            $('#locations').fadeIn().html(data);
                        } 
                    }  
                });    

            }
              
          </script>
          
          <!-- Javascripts -->
          
      </body>
      
  </html>