<?php
session_start();
$location=$_SESSION['location'];
$total_budget=$_SESSION['atotal'];
$travel_group=$_SESSION['travel1'];
$travel_updown=$_SESSION['travel2'];
$food=$_SESSION['food'];
$left_budget=$_SESSION['total1'];
//$days=$_SESSION['days'];
$hotel_cost=($total_budget-($left_budget+$food+$travel_updown+$travel_group));

if(isset($_POST['logout_button'])){

    header("Location: /developer/logout.php");
}

if(isset($_POST['view_profile_button'])){

    header("Location: /developer/profile/profile.php");
}

?>
<html>

    <head>
    
        <title>Travel Planner Output</title>
        
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/shop-homepage.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Julius+Sans+One" rel="stylesheet">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/ui/1.12.0-beta.1/jquery-ui.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.1.135/jspdf.min.js"></script>
        <script type="text/javascript" src="http://cdn.uriit.ru/jsPDF/libs/adler32cs.js/adler32cs.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2014-11-29/FileSaver.min.js
        "></script>
        <script type="text/javascript" src="libs/Blob.js/BlobBuilder.js"></script>
        <script type="text/javascript" src="http://cdn.immex1.com/js/jspdf/plugins/jspdf.plugin.addimage.js"></script>
        <script type="text/javascript" src="http://cdn.immex1.com/js/jspdf/plugins/jspdf.plugin.standard_fonts_metrics.js"></script>
        <script type="text/javascript" src="http://cdn.immex1.com/js/jspdf/plugins/jspdf.plugin.split_text_to_size.js"></script>
        <script type="text/javascript" src="http://cdn.immex1.com/js/jspdf/plugins/jspdf.plugin.from_html.js"></script>
        <script type="text/javascript" src="js/basic.js"></script>
        

        
        
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
        
            #output_body
            {
                position: relative;
                background: white;
                box-shadow: 0 0 20px 0 rgba(0,0,0,0.2), 0 5px 5px 0 rgba(0,0,0,0.3);
                transition: all 500ms ease;
                border-top: 40px solid white;
                border-bottom: 40px solid white;
            }
            #output_header
            {
                font-family: 'Julius Sans One';
                color: #00c4ff;
                font-weight: bold;
            }
            
        </style>
        
        <!-- Output -->
        <br><br><br><br><br>
        <div id="output_body" align="center" class="container">
            <div align="center">
                <div align="center" >
                    <h1 id="output_header">Your Plan</h1>
                </div>
                <hr style="width:90%;border-color:#00c4ff;">
            </div>
            <br>
            <div id="content" align="center">
                <h2>YOUR DESTINATION: </h2>
                <h3><?php echo $location; ?></h3>
                <br>
                <h2>YOUR TOTAL BUDGET: </h2>
                <h3><?php echo $total_budget; ?></h3>
                <br>
                <h2>YOUR LOCAL TRANSPORTAION COST: </h2>
                <h3><?php echo $travel_group; ?></h3>
                <br>
                <h2>YOUR COST FOR UP-DOWN TRAVEL: </h2>
                <h3><?php echo $travel_updown; ?></h3>
                <br>
                <h2>YOUR TOTAL COST FOR FOOD: </h2>
                <h3><?php echo $food; ?></h3>
                <br>
                <h2>LEFT OUT BUDGET FOR YOUR TRIP: </h2>
                <h3><?php echo $left_budget; ?></h3>
                <br>
                <h2>YOUR COST FOR HOTEL: </h2>
                <h3><?php echo $hotel_cost; ?></h3>
                <br>
            </div>
            
            <div id="editor"></div>
            <button class="btn btn-success" id="cmd">Generate PDF</button>
        </div>
        
        <!-- Output -->
        
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
        
        <script>
            $(".incr-btn").on("click", function (e) {
                var $button = $(this);
                var oldValue = $button.parent().find('.quantity').val();
                $button.parent().find('.incr-btn[data-action="decrease"]').removeClass('inactive');
                if ($button.data('action') == "increase") {
                    var newVal = parseFloat(oldValue) + 1;
                } else {
                    // Don't allow decrementing below 1
                    if (oldValue > 1) {
                        var newVal = parseFloat(oldValue) - 1;
                    } else {
                        newVal = 0;
                        $button.addClass('inactive');
                    }
                }
                $button.parent().find('.quantity').val(newVal);
                e.preventDefault();
            });
        </script>
        <!-- Javascripts -->
        <script>
            $(function () {
                
                    var specialElementHandlers = {
                        '#editor': function (element,renderer) {
                            return true;
                        }
                    };
                 $('#cmd').click(function () {
                        var doc = new jsPDF();
                        doc.fromHTML(
                            $('#content').html(), 15, 15, 
                            { 'width': 170, 'elementHandlers': specialElementHandlers }, 
                            function(){ doc.save('rover_plan.pdf'); }
                        );
                
                    });  
            });
        </script>
        
    </body>
    
</html>