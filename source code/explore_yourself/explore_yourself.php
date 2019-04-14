<html>

    <head>
    
        <title>Explore Yourself</title>
        
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/shop-homepage.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Julius+Sans+One" rel="stylesheet">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        

        
        
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
    
            
            /* Explore Youself */
            
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
                background: url(images/explore_yourself/7.jpg)no-repeat center;
                background-size: cover;
                animation:fade 20s infinite;
                -webkit-animation:fade 20s infinite;
            } 
            .slide2 
            {
                background: url(images/explore_yourself/8.jpg)no-repeat center;
                background-size: cover;
                animation:fade2 20s infinite;
                -webkit-animation:fade2 20s infinite;
            }
            .slide3 
            {
                background: url(images/explore_yourself/9.jpg)no-repeat center;
                background-size: cover;
                animation:fade3 20s infinite;
                -webkit-animation:fade3 20s infinite;
            }
            .slide4 
            {
                background: url(images/explore_yourself/5.jpg)no-repeat center;
                background-size: cover;
                animation:fade4 20s infinite;
                -webkit-animation:fade4 20s infinite;
            }
            .slide5 
            {
                background: url(images/explore_yourself/1.jpg)no-repeat center;
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
            
            #explore_yourself_header
            {
                position: relative;
                font-family: 'Julius Sans One',sans-serif;
                color: white;
                margin-top: 5%;
                font-size: 50px;
                -webkit-animation: neon 2s ease-in-out infinite alternate;
                -moz-animation: neon 2s ease-in-out infinite alternate;
                animation: neon 2s ease-in-out infinite alternate;
            }

            #questions_body
            {
                display: inline-block;
                border-bottom: 100px solid rgba(0,0,0,0.7);
                border-right: 80px solid transparent;
                position: absolute;
                top: 150px;
                left: 0px;
                -webkit-animation-duration: 1s;
                animation-duration: 1s;
                width: 80%;
                text-align: left;
            }
            #question
            {
                position: absolute;
                font-family: 'Julius Sans One';
                font-size: 28px;
                padding-top: 3.5%;
                color: white;
                width: auto;
                word-wrap: break-word;
            }

            #answers_body
            {
                position:absolute;
                -webkit-animation-duration: 1s;
                animation-duration: 1s;
                background: rgba(0,0,0,0.7);
                top: 300px;
                left: 0px;
                width: 50%;
                border-radius: 15px;
            }
            #answers_form
            {
                -webkit-animation-duration: 1s;
                animation-duration: 1s;
                margin-left: 5%;
            }


            [type="radio"]:checked,
            [type="radio"]:not(:checked) {
                position: absolute;
                outline: none;
                transition: all 300ms ease;
            }
            #test_label:hover
            {
                color: #5bc0de;   
            }
            [type="radio"]:checked + label
            {
                position: relative;
                padding-left: 30px;
                cursor: pointer;
                font-family: 'Julius Sans One';
                line-height: 30px;
                display: inline-block;
                color: #5bc0de;
                font-size: 23px;
                outline: none;
                transition: all 300ms ease;
            }
            [type="radio"]:not(:checked) + label
            {
                position: relative;
                padding-left: 30px;
                padding-right: 50px;
                cursor: pointer;
                font-family: 'Julius Sans One';
                line-height: 30px;
                display: inline-block;
                color: #fff;
                font-size: 23px;
                outline: none;
                transition: all 300ms ease;
            }
            [type="radio"]:checked + label:before,
            [type="radio"]:not(:checked) + label:before {
                content: '';
                position: absolute;
                left: -4;
                top: 2;
                width: 20px;
                height: 20px;
                border: 1px solid #5bc0de;
                border-radius: 100%;
                background: #fff;
                outline: none;
            }
            [type="radio"]:checked + label:after,
            [type="radio"]:not(:checked) + label:after {
                content: '';
                width: 12px;
                height: 12px;
                background: #5bc0de;
                position: absolute;
                top: 6px;
                left: 0px;
                outline: none;
                border-radius: 100%;
                -webkit-transition: all 300ms ease;
                transition: all 300ms ease;
            }
            [type="radio"]:not(:checked) + label:after {
                opacity: 0;
                -webkit-transform: scale(0);
                transform: scale(0);
                outline: none;
            }
            [type="radio"]:checked + label:after {
                opacity: 1;
                -webkit-transform: scale(1);
                transform: scale(1);
                outline: none;
            }
            
            /* Explore Youself */
            

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
                    <a class="navbar-brand" href="http://appf.uiu.ac.bd/developer/">Rover BD</a>
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
                          <a style="margin-top:5%;" id="navbar_option_logout">&nbsp;Saif Ahmed Anik</a>
                          <span id="hover1" class="hover"></span>
                        </li>
                    </ul>    
                </div>      
                    <div style="float:left" align="center" class="collapse" id="features">
                        <ul style="margin-left:330px;" class="nav navbar-nav">
                            <hr style="margin-top: 0px; margin-bottom: 0px;">
                            <li><a class="nav_a" id="navbar_option" href="http://appf.uiu.ac.bd/developer/location_search/location_finder.php">Locations</a><span class="hover"></span></li>
                            <li><a class="nav_a" id="navbar_option" href="http://appf.uiu.ac.bd/developer/hotel_finder/hotel_finder.php">Hotel Finder</a><span class="hover"></span></li>
                            <li><a class="nav_a" id="navbar_option" href="http://appf.uiu.ac.bd/developer/travel_planner/travel_planner.php">Travel Planner</a><span class="hover"></span></li>
                            <li><a class="nav_a" id="navbar_option" href="http://appf.uiu.ac.bd/developer/travel_tracker/travel_tracker.php">Travel Tracker</a><span class="hover"></span></li>
                            <li><a class="nav_a" id="navbar_option" href="explore_yourself.php">Explore Yourself</a><span class="hover"></span></li>
                        </ul>  
                    </div>
                </div>
            </nav>
        </div>
        
        
        <!-- Explore Yourself -->
        
        <div class='slider'>
            <div class='slide1'></div>
            <div class='slide2'></div>
            <div class='slide3'></div>
            <div class='slide4'></div>
            <div class='slide5'></div>
        </div>
    
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-9">
                <div align="left" class="row">
                    <h1 id="explore_yourself_header">Explore Yourself</h1>
                </div>


                
                <div id="explore_yourself_body2">


                    <div align="left" id="questions_body" class="w3-container w3-animate-left">
                        <label class="w3-container w3-center w3-animate-left" id="question"><label style="color:#5bc0de">#</label> What kind of place do you like ?</label>
                    </div>
                    <div id="answers_body" class="w3-animate-left">
                        <form id="answers_form" class="w3-container w3-animate-bottom" align="left" action="#">
                            <br>
                            <p onclick=pass("student")>
                                <input style="outline:none" type="radio" id="test1" name="radio-group">
                                <label id="test_label" for="test1">Student</label>
                            </p>
                            <p onclick=pass("jobholder")>
                                <input style="outline:none" type="radio" id="test2" name="radio-group">
                                <label id="test_label" for="test2">Jobholder</label>
                            </p>
                            <p onclick=pass("business")>
                                <input style="outline:none" type="radio" id="test3" name="radio-group">
                                <label id="test_label" for="test3" style="word-wrap: break-word;">Business</label>
                            </p>
                            <p onclick=pass("other")>
                                <input style="outline:none" type="radio" id="test3" name="radio-group">
                                <label id="test_label" for="test3" style="word-wrap: break-word;">Other</label>
                            </p>
                        </form>
                    </div>


                </div>



            </div>
            <div class="col-md-2"></div>
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

            function pass(value)
            {
                // if(value=="mountain_hike" || value=="mountain_visit" || value=="mountain_trekk" || value=="mountain_trail" || value=="sea_dark_bike" || value=="sea_boat_ride" || value=="sea_dive" || value=="sea_parag_ride")
                // {
                    
                // }
                if(value=="mountain_hike" || value=="mountain_visit" || value=="mountain_trekk" || value=="mountain_trail" || value=="sea_dark_bike" || value=="sea_boat_ride" || value=="sea_dive" || value=="sea_parag_ride" || value=="park" || value=="forest" || value=="museum" || value=="river" || value=="historical" || value=="island")
                {
                    location.href="../location_search/location_finder.php?explore_type="+value+"";
                }
                else
                {
                    $.ajax({  
                    url:"explore_fetch.php",  
                    method:"POST",  
                    data:{value:value},  
                    success:function(data)  
                    {  
                        $('#explore_yourself_body2').fadeOut(1000, function(){
                            $(this).html(data);
                            $(this).fadeIn(700);
                        });

                    }  
                });
                }

                
                    
            }


        </script>
        
        <!-- Javascripts -->
        
    </body>
    
</html>