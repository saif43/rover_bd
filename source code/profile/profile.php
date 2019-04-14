<?php
session_start();
?>
<html>

    <head>
    
        <title>Profile:</title>
        
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/shop-homepage.css" rel="stylesheet">
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
                background-image: url(profile_background.jpg);
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
            
            /* Navbar & Search */
            
            /* Neon Effects */
            
            @-webkit-keyframes neon
            {
                to 
                {
                    text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #fff, 0 0 40px #fff, 0 0 70px #fff, 0 0 80px #fff;
                }
            }
            
            /* Neon Effects */
            
            
            
            /* Profile */
            
            #profile_body
            {
                display: inline-block;
                position: relative;
                width: 60%;
                color: white;
                background: rgba(0,0,0,0.7);
                border-radius: 50px;
                box-shadow: 0 0 20px 0 rgba(0,0,0,0.2), 0 5px 5px 0 rgba(0,0,0,0.3);
                transition: all 500ms ease;
                border-top: 20px solid rgba(0,0,0,0.0);
                border-bottom: 20px solid rgba(0,0,0,0.0);
            }
            
            #image
            {
                box-shadow: 0 0 20px 0 rgba(0,0,0,0.3), 0 5px 5px 0 rgba(0,0,0,0.4);
                border-radius:50%;
                width:200px;
                transition: all 500ms ease;
            }
            #image:hover
            {
                box-shadow: 0 0 20px 0 rgba(0,0,0,0.1), 0 5px 5px 0 rgba(0,0,0,0.2);
                transform: scale(1.2);
            }
            #profile_header
            {
                color:white;
                font-family:'Julius Sans One';
                font-size:50px;
                -webkit-animation: neon 2s ease-in-out infinite alternate;
                -moz-animation: neon 2s ease-in-out infinite alternate;
                animation: neon 2s ease-in-out infinite alternate;
            }
            
            /* Profile */
            
            
        </style>
        
    </head>
    
    <body>
        
        <div>
                <nav id="navbar_body" class="navbar navbar-inverse navbar-fixed-top">
                  <div>
                    <div style="float: left; margin-left:5%;" class="navbar-header">
                      <a class="navbar-brand" href="http://appf.uiu.ac.bd/developer/index1.php">Rover BD</a>
                    </div>
                  <div align="center" >
                    <ul style="margin-left: 15%;" class="nav navbar-nav">
                      <li><a class="nav_a" id="navbar_option" href="#about_us">About</a><span class="hover"></span></li>
                      <li><a class="nav_a" id="navbar_option" href="#services">Services</a><span class="hover"></span></li>
                      <li><a class="nav_a" id="navbar_option" href="#footer">Contact</a><span class="hover"></span></li>
                      <li><a class="nav_a" id="navbar_option_features" data-toggle="collapse" data-target="#features">Features</a><span class="hover"></span></li>
                    </ul>
                  </div>
                  <div align="center" style="float: right; margin-right: 5%;">
                    <ul class="nav navbar-nav">
                      <li>
                          <a class="nav_a" id="navbar_option" href="#search"><i style="font-size: 20px;" class="fa fa-search" aria-hidden="true"></i></a>
                      </li>
                      <hr id="navbar_divider">    
                      <li>
                        <a id="navbar_option_logout" style="cursor:pointer;" class="dropdown-toggle" type="button" data-toggle="dropdown"><?php echo $_SESSION['name'] ?> &#9679;</a>
                        <ul class="dropdown-menu">
                            <form align="center" action="" method="POST">
                                <li><button style="background:transparent;outline:none;border:none;color:white;transition:all 500ms ease;" id="view_profile_button" href="profile.php">View Profile</button></li>
                                <li class="divider"></li>
                                <li><button style="background:transparent;border:none;outline:none;color:white;transition:all 500ms ease;" name="logout_button" id="logout_button" href="#">Log-Out</button></li>
                            </form>
                        </ul>
                      </li>   
                    </ul>    
                  </div>   
                
                  <style>
                      #features > ul > li
                      {
                          display:inline-block;
                          position: relative;   
                      }
                      #features > ul 
                      {
                          text-align:center;
                      }
                  </style>      
                      
                  <div style="float:left" align="center" class="collapse" id="features">
                    <ul style="margin-left:280px;" class="nav navbar-nav">
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

        
        <!-- Profile -->
            
        <div align="center" class="container">
            <br><br><br>
            <h1 id="profile_header">Profile</h1>
            <br><br>
            <div id="profile_body">
                <br>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <img id="image" class="img-responsive" src="<?php echo $_SESSION['picture'] ?>">
                    </div>
                    <div style="margin-top:5%;" align="left">
                        <h3><i style="color:#1e90ff" class="fa fa-user"></i>&nbsp;&nbsp;<?php echo $_SESSION['name'] ?></h3>
                        <h4 style="margin-top:3%;"><i style="color:#1e90ff" class="fa fa-envelope"></i>&nbsp;&nbsp;<?php echo $_SESSION['email'] ?></h4>
                        <h4 style="margin-top:3%;"><i style="color:#1e90ff" class="fa fa-phone"></i>&nbsp;&nbsp;+8801923491285</h4>
                        <h4 style="margin-top:3%;"><i style="color:#1e90ff" class="fa fa-user"></i>&nbsp;&nbsp;<?php echo $_SESSION['gender'] ?></h4>
                    </div>
                </div>  
                <br>
            </div>
        </div>
        
        <!-- Profile -->
        
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
    
</html>