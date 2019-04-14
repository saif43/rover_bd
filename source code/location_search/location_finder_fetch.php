<?php

include("connection.php");

session_start();

$query="";
$output="";
$counter=0;
$counter1=0;
$flag=0;
$flag1=0;
$subdistrict="";
$subdistrict_count=0;

























if(isset($_SESSION['explore_type']))
{
    $type=$_SESSION['explore_type'];
    
    $output.=
    '
    <div id="location_menu_body" class="col-md-3">
        <div id="location_menu" align="center" class="row">
            <div>
                <a href="location_finder.php"><img src="images/location_icon.png" width="30%" id="location_logo"></a>
                <label id="location_header">Locations</label>
            </div>
            <table style="text-align:center;">
                <tbody>
                    <br>
                    <tr <td><a onclick=gotodistrict("dhaka") id="menu_options">Dhaka</a></td></tr>
                    <tr><td><a onclick=gotodistrict("barisal") id="menu_options">Barisal</a></td></tr>
                    <tr><td><a onclick=gotodistrict("khulna") id="menu_options">Khulna</a></td></tr>
                    <tr><td><a onclick=gotodistrict("shylhet") id="menu_options">Shylhet</a></td></tr>
                    <tr><td><a onclick=gotodistrict("rajshahi") id="menu_options">Rajshahi</a></td></tr>
                    <tr><td><a onclick=gotodistrict("rangpur") id="menu_options">Rangpur</a></td></tr>
                    <tr><td><a onclick=gotodistrict("chittagong") id="menu_options">Chittagong</a></td></tr>    ';
    
 
    
    $output.='
    </tbody>
    </table>
    </div>
    </div>
    <div style="margin-left:20%;" class="col-md-7">';

    if($_SESSION['explore_type']=="park" || $_SESSION['explore_type']=="forest" || $_SESSION['explore_type']=="museum" || $_SESSION['explore_type']=="river" || $_SESSION['explore_type']=="historical" || $_SESSION['explore_type']=="island")
    {
        $query="SELECT restaurent_hotel_place.id,restaurent_hotel_place.name,restaurent_hotel_place.address,restaurent_hotel_place.subdistrict_name
        FROM restaurent_hotel_place JOIN division_district_subdistrict JOIN place_type
        ON restaurent_hotel_place.subdistrict_name=division_district_subdistrict.subdistrict_name 
        AND restaurent_hotel_place.id=place_type.place_id 
        AND restaurent_hotel_place.type ='place' 
        AND place_type.type='$type'
        ORDER BY division_district_subdistrict.subdistrict_name";
    }
    else
    {
        $x=$_SESSION['type'];

        $query="SELECT restaurent_hotel_place.id,restaurent_hotel_place.name,restaurent_hotel_place.address,restaurent_hotel_place.subdistrict_name
        FROM restaurent_hotel_place JOIN division_district_subdistrict JOIN place_type
        ON restaurent_hotel_place.subdistrict_name=division_district_subdistrict.subdistrict_name 
        AND restaurent_hotel_place.id=place_type.place_id 
        AND restaurent_hotel_place.type ='place' 
        AND place_type.type='$x'
        ORDER BY division_district_subdistrict.subdistrict_name";
    }
    
    
        $result = mysqli_query($conn,$query);
    
        while($row = mysqli_fetch_assoc($result))
        {
            $counter++;
            $counter1++;
            
            if($subdistrict!=$row["subdistrict_name"])
            {
                if($subdistrict!="")
                {
                    $output.='</div>
                    </div>
                </div>';
                    if($subdistrict_count>0)
                    {
                        $output.='<a data-slide="prev" href="#media'.$subdistrict_count.'" class="left carousel-control">‹</a>
                                <a data-slide="next" href="#media'.$subdistrict_count.'" class="right carousel-control">›</a>';
                    }
                    else
                    {
                        $output.='<a data-slide="prev" href="#media" class="left carousel-control">‹</a>
                                <a data-slide="next" href="#media" class="right carousel-control">›</a>';
                    }
                    $output.='<hr style="margin-top:-3%;margin-bottom:0%;margin-left:2%;width:142%;border-color:dodgerblue">
                    </div>
    </div>
    </div>
    </div>';
    
                    $subdistrict_count++;
                }
    
                $subdistrict=$row["subdistrict_name"];
                $counter=1;
            
            }
    
            if($counter==1 && $counter1==$result->num_rows)           // First Enter and last
            {
                $output.='
                <div id="contain" class="container" align="center">
                                     
                     <div style="margin-left:0%;margin-top:-3.5%;" class="row">
                        
                        <div>
                            <h2 align="left" style="margin-left:11.80%;margin-bottom:2.5%;">' .$subdistrict. '</h2>
                        </div>
                        <div class="col-md-8">';
    
                        if($subdistrict_count>0)    
                        {
                            $output.='<div class="carousel slide media-carousel" id="media'.$subdistrict_count.'">';
                        }
                        else
                        {
                            $output.='<div class="carousel slide media-carousel" id="media">';
                        }
                                
                            
                            $output.='<div class="carousel-inner">
                                    <div class="item active">
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div onclick=gotoLocation("'.$row["id"].'") id="image_body" class="col-md-3">
                                                <a id="image_link" class="thumbnail" href="#">
                                                    <img id="image" class="img-responsive" src="images/'.$row["id"].'.jpg">
                                                    <h5 style="font-size:15px;">' .$row["name"]. '</h5>
                                                    <h6 style="font-size:12px;">Location Reviews</h6>
                                                    <h6 style="font-size:12px;">' .$row["address"]. '</h6>
                                                </a>
                                            </div>
    
    
                                        </div>
                                    </div>
                                </div>';
                                if($subdistrict_count>0)
                                {
                                    $output.='<a data-slide="prev" href="#media'.$subdistrict_count.'" class="left carousel-control">‹</a>
                                            <a data-slide="next" href="#media'.$subdistrict_count.'" class="right carousel-control">›</a>';
                                }
                                else
                                {
                                    $output.='<a data-slide="prev" href="#media" class="left carousel-control">‹</a>
                                            <a data-slide="next" href="#media" class="right carousel-control">›</a>';
                                }
                            
                            
                                $output.='</div>
                        </div>
                    </div>
                </div>';
            }
            else if($counter==1)           // First Enter and last
            {
                $output.='
                <div id="contain" class="container" align="center">
                                    
                     <div style="margin-left:0%;margin-top:-3.5%;" class="row">
                        
                        <div>
                            <h2 align="left" style="margin-left:11.80%;margin-bottom:2.5%;">' .$subdistrict. '</h2>
                        </div>
                            <div class="col-md-8">';
                            if($subdistrict_count>0)    
                            {
                                $output.='<div class="carousel slide media-carousel" id="media'.$subdistrict_count.'">';
                            }
                            else
                            {
                                $output.='<div class="carousel slide media-carousel" id="media">';
                            }
                                    
                                
                                $output.='<div class="carousel-inner">
                                        <div class="item active">
                                            <div class="row">
                                                <div class="col-md-1"></div>
                                                <div onclick=gotoLocation("'.$row["id"].'") id="image_body" class="col-md-3">
                                                    <a id="image_link" class="thumbnail" href="#">
                                                    <img id="image" class="img-responsive" src="images/'.$row["id"].'.jpg">
                                                    <h5 style="font-size:15px;">' .$row["name"]. '</h5>
                                                    <h6 style="font-size:12px;">Location Reviews</h6>
                                                    <h6 style="font-size:12px;">' .$row["address"]. '</h6>
                                                    </a>
                                                </div>
                                            ';
            }
            else if(($counter-1)%3==0 && $counter1==$result->num_rows)          // Third change with last enter
            {
                $output.='
                </div>
                </div>
                            <div class="item">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div onclick=gotoLocation("'.$row["id"].'") id="image_body" class="col-md-3">
                                        <a id="image_link" class="thumbnail" href="#">
                                        <img id="image" class="img-responsive" src="images/'.$row["id"].'.jpg">
                                        <h5 style="font-size:15px;">' .$row["name"]. '</h5>
                                        <h6 style="font-size:12px;">Location Reviews</h6>
                                        <h6 style="font-size:12px;">' .$row["address"]. '</h6>
                                        </a>
                                    </div>
    
                                </div>
                            </div>
                        </div>';
                        if($subdistrict_count>0)
                        {
                            $output.='<a data-slide="prev" href="#media'.$subdistrict_count.'" class="left carousel-control">‹</a>
                                    <a data-slide="next" href="#media'.$subdistrict_count.'" class="right carousel-control">›</a>';
                        }
                        else
                        {
                            $output.='<a data-slide="prev" href="#media" class="left carousel-control">‹</a>
                                    <a data-slide="next" href="#media" class="right carousel-control">›</a>';
                        }
                    $output.='</div>
                </div>
            </div>
        </div>';
            }
            
            else if(($counter-1)%3==0)          // Third change
            {
                $output.='</div>
                </div>
                <div class="item">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div onclick=gotoLocation("'.$row["id"].'") id="image_body" class="col-md-3">
                            <a id="image_link" class="thumbnail" href="#">
                            <img id="image" class="img-responsive" src="images/'.$row["id"].'.jpg">
                            <h5 style="font-size:15px;">' .$row["name"]. '</h5>
                            <h6 style="font-size:12px;">Location Reviews</h6>
                            <h6 style="font-size:12px;">' .$row["address"]. '</h6>
                            </a>
                        </div>';
            }
            else if(($counter-1)%3!=0 && $counter1==$result->num_rows)          // Third change with last enter
            {
                $output.='
                                            <div onclick=gotoLocation("'.$row["id"].'") style="margin-left:2.5%;" id="image_body" class="col-md-3">
                                                <a id="image_link" class="thumbnail" href="#">
                                                <img id="image" class="img-responsive" src="images/'.$row["id"].'.jpg">
                                                <h5 style="font-size:15px;">' .$row["name"]. '</h5>
                                                <h6 style="font-size:12px;">Location Reviews</h6>
                                                <h6 style="font-size:12px;">' .$row["address"]. '</h6>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                                if($subdistrict_count>0)
                                {
                                    $output.='<a data-slide="prev" href="#media'.$subdistrict_count.'" class="left carousel-control">‹</a>
                                            <a data-slide="next" href="#media'.$subdistrict_count.'" class="right carousel-control">›</a>';
                                }
                                else
                                {
                                    $output.='<a data-slide="prev" href="#media" class="left carousel-control">‹</a>
                                            <a data-slide="next" href="#media" class="right carousel-control">›</a>';
                                }
                            $output.='</div>
                        </div>
                    </div>
                </div>';
            }
            else if(($counter-1)%3!=0)          // Third change with last enter
            {
                $output.='<div onclick=gotoLocation("'.$row["id"].'") style="margin-left:2.5%;" id="image_body" class="col-md-3">
                            <a id="image_link" class="thumbnail" href="#">
                                <img id="image" class="img-responsive" src="images/'.$row["id"].'.jpg">
                                <h5 style="font-size:15px;">' .$row["name"]. '</h5>
                                <h6 style="font-size:12px;">Location Reviews</h6>
                                <h6 style="font-size:12px;">' .$row["address"]. '</h6>
                            </a>
                        </div>
                            ';
            }
            
            
    
        }
    
        $output.='</div>
        <div class="col-md-1"></div>';
    
       //  session_destroy();
        
    
        echo $output;
}
































else if(isset($_SESSION['location_name']))
{
    $location_name=$_SESSION['location_name'];
    unset($_SESSION['location_name']);
    
    $output.=
    '
    <div id="location_menu_body" class="col-md-3">
        <div id="location_menu" align="center" class="row">
            <div>
                <a href="location_finder.php"><img src="images/location_icon.png" width="30%" id="location_logo"></a>
                <label id="location_header">Locations</label>
            </div>
            <table style="text-align:center;">
                <tbody>
                    <br>
                    <tr><td><a onclick=gotodistrict("dhaka") id="menu_options">Dhaka</a></td></tr>
                    <tr><td><a onclick=gotodistrict("barisal") id="menu_options">Barisal</a></td></tr>
                    <tr><td><a onclick=gotodistrict("khulna") id="menu_options">Khulna</a></td></tr>
                    <tr><td><a onclick=gotodistrict("shylhet") id="menu_options">Shylhet</a></td></tr>
                    <tr><td><a onclick=gotodistrict("rajshahi") id="menu_options">Rajshahi</a></td></tr>
                    <tr><td><a onclick=gotodistrict("rangpur") id="menu_options">Rangpur</a></td></tr>
                    <tr><td><a onclick=gotodistrict("chittagong") id="menu_options">Chittagong</a></td></tr>    ';
    
 
    
    $output.='
    </tbody>
    </table>
    </div>
    </div>
    <div style="margin-left:20%;" class="col-md-7">';

    $query="SELECT restaurent_hotel_place.id,restaurent_hotel_place.name,restaurent_hotel_place.address,restaurent_hotel_place.subdistrict_name
        FROM restaurent_hotel_place JOIN division_district_subdistrict
        ON restaurent_hotel_place.subdistrict_name=division_district_subdistrict.subdistrict_name 
        AND restaurent_hotel_place.type ='place' 
        AND restaurent_hotel_place.name LIKE '%$location_name%'
        ORDER BY division_district_subdistrict.subdistrict_name";
    
    
        $result = mysqli_query($conn,$query);
    
        while($row = mysqli_fetch_assoc($result))
        {
            $counter++;
            $counter1++;
            
            if($subdistrict!=$row["subdistrict_name"])
            {
                if($subdistrict!="")
                {
                    $output.='</div>
                    </div>
                </div>';
                    if($subdistrict_count>0)
                    {
                        $output.='<a data-slide="prev" href="#media'.$subdistrict_count.'" class="left carousel-control">‹</a>
                                <a data-slide="next" href="#media'.$subdistrict_count.'" class="right carousel-control">›</a>';
                    }
                    else
                    {
                        $output.='<a data-slide="prev" href="#media" class="left carousel-control">‹</a>
                                <a data-slide="next" href="#media" class="right carousel-control">›</a>';
                    }
                    $output.='<hr style="margin-top:-3%;margin-bottom:0%;margin-left:2%;width:142%;border-color:dodgerblue">
                    </div>
    </div>
    </div>
    </div>';
    
                    $subdistrict_count++;
                }
    
                $subdistrict=$row["subdistrict_name"];
                $counter=1;
            
            }
    
            if($counter==1 && $counter1==$result->num_rows)           // First Enter and last
            {
                $output.='
                <div id="contain" class="container" align="center">
                                     
                     <div style="margin-left:0%;margin-top:-3.5%;" class="row">
                        
                        <div>
                            <h2 align="left" style="margin-left:11.80%;margin-bottom:2.5%;">' .$subdistrict. '</h2>
                        </div>
                        <div class="col-md-8">';
    
                        if($subdistrict_count>0)    
                        {
                            $output.='<div class="carousel slide media-carousel" id="media'.$subdistrict_count.'">';
                        }
                        else
                        {
                            $output.='<div class="carousel slide media-carousel" id="media">';
                        }
                                
                            
                            $output.='<div class="carousel-inner">
                                    <div class="item active">
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div onclick=gotoLocation("'.$row["id"].'") id="image_body" class="col-md-3">
                                                <a id="image_link" class="thumbnail" href="#">
                                                    <img id="image" class="img-responsive" src="images/'.$row["id"].'.jpg">
                                                    <h5 style="font-size:15px;">' .$row["name"]. '</h5>
                                                    <h6 style="font-size:12px;">Location Reviews</h6>
                                                    <h6 style="font-size:12px;">' .$row["address"]. '</h6>
                                                </a>
                                            </div>
    
    
                                        </div>
                                    </div>
                                </div>';
                                if($subdistrict_count>0)
                                {
                                    $output.='<a data-slide="prev" href="#media'.$subdistrict_count.'" class="left carousel-control">‹</a>
                                            <a data-slide="next" href="#media'.$subdistrict_count.'" class="right carousel-control">›</a>';
                                }
                                else
                                {
                                    $output.='<a data-slide="prev" href="#media" class="left carousel-control">‹</a>
                                            <a data-slide="next" href="#media" class="right carousel-control">›</a>';
                                }
                            
                            
                                $output.='</div>
                        </div>
                    </div>
                </div>';
            }
            else if($counter==1)           // First Enter and last
            {
                $output.='
                <div id="contain" class="container" align="center">
                                    
                     <div style="margin-left:0%;margin-top:-3.5%;" class="row">
                        
                        <div>
                            <h2 align="left" style="margin-left:11.80%;margin-bottom:2.5%;">' .$subdistrict. '</h2>
                        </div>
                            <div class="col-md-8">';
                            if($subdistrict_count>0)    
                            {
                                $output.='<div class="carousel slide media-carousel" id="media'.$subdistrict_count.'">';
                            }
                            else
                            {
                                $output.='<div class="carousel slide media-carousel" id="media">';
                            }
                                    
                                
                                $output.='<div class="carousel-inner">
                                        <div class="item active">
                                            <div class="row">
                                                <div class="col-md-1"></div>
                                                <div onclick=gotoLocation("'.$row["id"].'") id="image_body" class="col-md-3">
                                                    <a id="image_link" class="thumbnail" href="#">
                                                    <img id="image" class="img-responsive" src="images/'.$row["id"].'.jpg">
                                                    <h5 style="font-size:15px;">' .$row["name"]. '</h5>
                                                    <h6 style="font-size:12px;">Location Reviews</h6>
                                                    <h6 style="font-size:12px;">' .$row["address"]. '</h6>
                                                    </a>
                                                </div>
                                            ';
            }
            else if(($counter-1)%3==0 && $counter1==$result->num_rows)          // Third change with last enter
            {
                $output.='
                </div>
                </div>
                            <div class="item">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div onclick=gotoLocation("'.$row["id"].'") id="image_body" class="col-md-3">
                                        <a id="image_link" class="thumbnail" href="#">
                                        <img id="image" class="img-responsive" src="images/'.$row["id"].'.jpg">
                                        <h5 style="font-size:15px;">' .$row["name"]. '</h5>
                                        <h6 style="font-size:12px;">Location Reviews</h6>
                                        <h6 style="font-size:12px;">' .$row["address"]. '</h6>
                                        </a>
                                    </div>
    
                                </div>
                            </div>
                        </div>';
                        if($subdistrict_count>0)
                        {
                            $output.='<a data-slide="prev" href="#media'.$subdistrict_count.'" class="left carousel-control">‹</a>
                                    <a data-slide="next" href="#media'.$subdistrict_count.'" class="right carousel-control">›</a>';
                        }
                        else
                        {
                            $output.='<a data-slide="prev" href="#media" class="left carousel-control">‹</a>
                                    <a data-slide="next" href="#media" class="right carousel-control">›</a>';
                        }
                    $output.='</div>
                </div>
            </div>
        </div>';
            }
            
            else if(($counter-1)%3==0)          // Third change
            {
                $output.='</div>
                </div>
                <div class="item">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div onclick=gotoLocation("'.$row["id"].'") id="image_body" class="col-md-3">
                            <a id="image_link" class="thumbnail" href="#">
                            <img id="image" class="img-responsive" src="images/'.$row["id"].'.jpg">
                            <h5 style="font-size:15px;">' .$row["name"]. '</h5>
                            <h6 style="font-size:12px;">Location Reviews</h6>
                            <h6 style="font-size:12px;">' .$row["address"]. '</h6>
                            </a>
                        </div>';
            }
            else if(($counter-1)%3!=0 && $counter1==$result->num_rows)          // Third change with last enter
            {
                $output.='
                                            <div onclick=gotoLocation("'.$row["id"].'") style="margin-left:2.5%;" id="image_body" class="col-md-3">
                                                <a id="image_link" class="thumbnail" href="#">
                                                <img id="image" class="img-responsive" src="images/'.$row["id"].'.jpg">
                                                <h5 style="font-size:15px;">' .$row["name"]. '</h5>
                                                <h6 style="font-size:12px;">Location Reviews</h6>
                                                <h6 style="font-size:12px;">' .$row["address"]. '</h6>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                                if($subdistrict_count>0)
                                {
                                    $output.='<a data-slide="prev" href="#media'.$subdistrict_count.'" class="left carousel-control">‹</a>
                                            <a data-slide="next" href="#media'.$subdistrict_count.'" class="right carousel-control">›</a>';
                                }
                                else
                                {
                                    $output.='<a data-slide="prev" href="#media" class="left carousel-control">‹</a>
                                            <a data-slide="next" href="#media" class="right carousel-control">›</a>';
                                }
                            $output.='</div>
                        </div>
                    </div>
                </div>';
            }
            else if(($counter-1)%3!=0)          // Third change with last enter
            {
                $output.='<div onclick=gotoLocation("'.$row["id"].'") style="margin-left:2.5%;" id="image_body" class="col-md-3">
                            <a id="image_link" class="thumbnail" href="#">
                                <img id="image" class="img-responsive" src="images/'.$row["id"].'.jpg">
                                <h5 style="font-size:15px;">' .$row["name"]. '</h5>
                                <h6 style="font-size:12px;">Location Reviews</h6>
                                <h6 style="font-size:12px;">' .$row["address"]. '</h6>
                            </a>
                        </div>
                            ';
            }
            
            
    
        }
    
        $output.='</div>
        <div class="col-md-1"></div>';
    
       //  session_destroy();
        
    
        echo $output;
}


































else if(isset($_POST['division']))
{
    $division=$_POST['division'];
    
    unset($_SESSION['location']);
    $_SESSION['division']=$division;
    
    $output.=
    '
    <div id="location_menu_body" class="col-md-3">
        <div id="location_menu" align="center" class="row">
            <div>
                <a href="location_finder.php"><img src="images/location_icon.png" width="30%" id="location_logo"></a>
                <label id="location_header">Locations</label>
            </div>
            <table style="text-align:center;">
                <tbody>
                    <br>';
    
    if($division=="dhaka")
    {
        $output.='
        <tr style="border:1px solid dodgerblue;"><td><a onclick=gotodistrict("dhaka") id="menu_options">Dhaka</a></td></tr>
        <tr><td><a onclick=gotodistrict("barisal") id="menu_options">Barisal</a></td></tr>
        <tr><td><a onclick=gotodistrict("khulna") id="menu_options">Khulna</a></td></tr>
        <tr><td><a onclick=gotodistrict("shylhet") id="menu_options">Shylhet</a></td></tr>
        <tr><td><a onclick=gotodistrict("rajshahi") id="menu_options">Rajshahi</a></td></tr>
        <tr><td><a onclick=gotodistrict("rangpur") id="menu_options">Rangpur</a></td></tr>
        <tr><td><a onclick=gotodistrict("chittagong") id="menu_options">Chittagong</a></td></tr>    
        ';
    }
    else if($division=="barisal")
    {
        $output.='
        <tr><td><a onclick=gotodistrict("dhaka") id="menu_options">Dhaka</a></td></tr>
        <tr style="border:1px solid dodgerblue;"><td><a onclick=gotodistrict("barisal") id="menu_options">Barisal</a></td></tr>
        <tr><td><a onclick=gotodistrict("khulna") id="menu_options">Khulna</a></td></tr>
        <tr><td><a onclick=gotodistrict("shylhet") id="menu_options">Shylhet</a></td></tr>
        <tr><td><a onclick=gotodistrict("rajshahi") id="menu_options">Rajshahi</a></td></tr>
        <tr><td><a onclick=gotodistrict("rangpur") id="menu_options">Rangpur</a></td></tr>
        <tr><td><a onclick=gotodistrict("chittagong") id="menu_options">Chittagong</a></td></tr>    
        ';
    }
    else if($division=="khulna")
    {
        $output.='
        <tr><td><a onclick=gotodistrict("dhaka") id="menu_options">Dhaka</a></td></tr>
        <tr><td><a onclick=gotodistrict("barisal") id="menu_options">Barisal</a></td></tr>
        <tr style="border:1px solid dodgerblue;"><td><a onclick=gotodistrict("khulna") id="menu_options">Khulna</a></td></tr>
        <tr><td><a onclick=gotodistrict("shylhet") id="menu_options">Shylhet</a></td></tr>
        <tr><td><a onclick=gotodistrict("rajshahi") id="menu_options">Rajshahi</a></td></tr>
        <tr><td><a onclick=gotodistrict("rangpur") id="menu_options">Rangpur</a></td></tr>
        <tr><td><a onclick=gotodistrict("chittagong") id="menu_options">Chittagong</a></td></tr>    
        ';
    }
    else if($division=="shylhet")
    {
        $output.='
        <tr><td><a onclick=gotodistrict("dhaka") id="menu_options">Dhaka</a></td></tr>
        <tr><td><a onclick=gotodistrict("barisal") id="menu_options">Barisal</a></td></tr>
        <tr><td><a onclick=gotodistrict("khulna") id="menu_options">Khulna</a></td></tr>
        <tr style="border:1px solid dodgerblue;"><td><a onclick=gotodistrict("shylhet") id="menu_options">Shylhet</a></td></tr>
        <tr><td><a onclick=gotodistrict("rajshahi") id="menu_options">Rajshahi</a></td></tr>
        <tr><td><a onclick=gotodistrict("rangpur") id="menu_options">Rangpur</a></td></tr>
        <tr><td><a onclick=gotodistrict("chittagong") id="menu_options">Chittagong</a></td></tr>    
        ';
    }
    else if($division=="rajshahi")
    {
        $output.='
        <tr><td><a onclick=gotodistrict("dhaka") id="menu_options">Dhaka</a></td></tr>
        <tr><td><a onclick=gotodistrict("barisal") id="menu_options">Barisal</a></td></tr>
        <tr><td><a onclick=gotodistrict("khulna") id="menu_options">Khulna</a></td></tr>
        <tr><td><a onclick=gotodistrict("shylhet") id="menu_options">Shylhet</a></td></tr>
        <tr style="border:1px solid dodgerblue;"><td><a onclick=gotodistrict("rajshahi") id="menu_options">Rajshahi</a></td></tr>
        <tr><td><a onclick=gotodistrict("rangpur") id="menu_options">Rangpur</a></td></tr>
        <tr><td><a onclick=gotodistrict("chittagong") id="menu_options">Chittagong</a></td></tr>    
        ';
    }
    else if($division=="rangpur")
    {
        $output.='
        <tr><td><a onclick=gotodistrict("dhaka") id="menu_options">Dhaka</a></td></tr>
        <tr><td><a onclick=gotodistrict("barisal") id="menu_options">Barisal</a></td></tr>
        <tr><td><a onclick=gotodistrict("khulna") id="menu_options">Khulna</a></td></tr>
        <tr><td><a onclick=gotodistrict("shylhet") id="menu_options">Shylhet</a></td></tr>
        <tr><td><a onclick=gotodistrict("rajshahi") id="menu_options">Rajshahi</a></td></tr>
        <tr style="border:1px solid dodgerblue;"><td><a onclick=gotodistrict("rangpur") id="menu_options">Rangpur</a></td></tr>
        <tr><td><a onclick=gotodistrict("chittagong") id="menu_options">Chittagong</a></td></tr>    
        ';
    }
    else if($division=="chittagong")
    {
        $output.='
        <tr><td><a onclick=gotodistrict("dhaka") id="menu_options">Dhaka</a></td></tr>
        <tr><td><a onclick=gotodistrict("barisal") id="menu_options">Barisal</a></td></tr>
        <tr><td><a onclick=gotodistrict("khulna") id="menu_options">Khulna</a></td></tr>
        <tr><td><a onclick=gotodistrict("shylhet") id="menu_options">Shylhet</a></td></tr>
        <tr><td><a onclick=gotodistrict("rajshahi") id="menu_options">Rajshahi</a></td></tr>
        <tr><td><a onclick=gotodistrict("rangpur") id="menu_options">Rangpur</a></td></tr>
        <tr style="border:1px solid dodgerblue;"><td><a onclick=gotodistrict("chittagong") id="menu_options">Chittagong</a></td></tr>    
        ';
    }
    
    $output.='
    </tbody>
    </table>
    </div>
    </div>
    <div style="margin-left:20%;" class="col-md-7">';
    
    $query="SELECT restaurent_hotel_place.id,restaurent_hotel_place.name,restaurent_hotel_place.address,restaurent_hotel_place.subdistrict_name
            FROM restaurent_hotel_place JOIN division_district_subdistrict 
            ON restaurent_hotel_place.subdistrict_name=division_district_subdistrict.subdistrict_name 
            AND division_district_subdistrict.division_name='$division' 
            AND restaurent_hotel_place.type='place'
            ORDER BY division_district_subdistrict.subdistrict_name";
    
        $result = mysqli_query($conn,$query);
    
        while($row = mysqli_fetch_assoc($result))
        {
            $counter++;
            $counter1++;
            
            if($subdistrict!=$row["subdistrict_name"])
            {
                if($subdistrict!="")
                {
                    $output.='</div>
                    </div>
                </div>';
                    if($subdistrict_count>0)
                    {
                        $output.='<a data-slide="prev" href="#media'.$subdistrict_count.'" class="left carousel-control">‹</a>
                                <a data-slide="next" href="#media'.$subdistrict_count.'" class="right carousel-control">›</a>';
                    }
                    else
                    {
                        $output.='<a data-slide="prev" href="#media" class="left carousel-control">‹</a>
                                <a data-slide="next" href="#media" class="right carousel-control">›</a>';
                    }
                    $output.='<hr style="margin-top:-3%;margin-bottom:0%;margin-left:2%;width:142%;border-color:dodgerblue">
                    </div>
    </div>
    </div>
    </div>';
    
                    $subdistrict_count++;
                }
    
                $subdistrict=$row["subdistrict_name"];
                $counter=1;
            
            }
    
            if($counter==1 && $counter1==$result->num_rows)           // First Enter and last
            {
                $output.='
                <div id="contain" class="container" align="center">
                                    
                     <div style="margin-left:0%;margin-top:-3.5%;" class="row">
                        
                        <div>
                            <h2 align="left" style="margin-left:11.80%;margin-bottom:2.5%;">' .$subdistrict. '</h2>
                        </div>
                        <div class="col-md-8">';
    
                        if($subdistrict_count>0)    
                        {
                            $output.='<div class="carousel slide media-carousel" id="media'.$subdistrict_count.'">';
                        }
                        else
                        {
                            $output.='<div class="carousel slide media-carousel" id="media">';
                        }
                                
                            
                            $output.='<div class="carousel-inner">
                                    <div class="item active">
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div onclick=gotoLocation("'.$row["id"].'") id="image_body" class="col-md-3">
                                                <a id="image_link" class="thumbnail" href="#">
                                                    <img id="image" class="img-responsive" src="images/'.$row["id"].'.jpg">
                                                    <h5 style="font-size:15px;">' .$row["name"]. '</h5>
                                                    <h6 style="font-size:12px;">Location Reviews</h6>
                                                    <h6 style="font-size:12px;">' .$row["address"]. '</h6>
                                                </a>
                                            </div>
    
    
                                        </div>
                                    </div>
                                </div>';
                                if($subdistrict_count>0)
                                {
                                    $output.='<a data-slide="prev" href="#media'.$subdistrict_count.'" class="left carousel-control">‹</a>
                                            <a data-slide="next" href="#media'.$subdistrict_count.'" class="right carousel-control">›</a>';
                                }
                                else
                                {
                                    $output.='<a data-slide="prev" href="#media" class="left carousel-control">‹</a>
                                            <a data-slide="next" href="#media" class="right carousel-control">›</a>';
                                }
                            
                            
                                $output.='</div>
                        </div>
                    </div>
                </div>';
            }
            else if($counter==1)           // First Enter and last
            {
                $output.='
                <div id="contain" class="container" align="center">
                                    
                     <div style="margin-left:0%;margin-top:-3.5%;" class="row">
                        
                        <div>
                            <h2 align="left" style="margin-left:11.80%;margin-bottom:2.5%;">' .$subdistrict. '</h2>
                        </div>
                            <div class="col-md-8">';
                            if($subdistrict_count>0)    
                            {
                                $output.='<div class="carousel slide media-carousel" id="media'.$subdistrict_count.'">';
                            }
                            else
                            {
                                $output.='<div class="carousel slide media-carousel" id="media">';
                            }
                                    
                                
                                $output.='<div class="carousel-inner">
                                        <div class="item active">
                                            <div class="row">
                                                <div class="col-md-1"></div>
                                                <div onclick=gotoLocation("'.$row["id"].'") id="image_body" class="col-md-3">
                                                    <a id="image_link" class="thumbnail" href="#">
                                                    <img id="image" class="img-responsive" src="images/'.$row["id"].'.jpg">
                                                    <h5 style="font-size:15px;">' .$row["name"]. '</h5>
                                                    <h6 style="font-size:12px;">Location Reviews</h6>
                                                    <h6 style="font-size:12px;">' .$row["address"]. '</h6>
                                                    </a>
                                                </div>
                                            ';
            }
            else if(($counter-1)%3==0 && $counter1==$result->num_rows)          // Third change with last enter
            {
                $output.='
                </div>
                </div>
                            <div class="item">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div onclick=gotoLocation("'.$row["id"].'") id="image_body" class="col-md-3">
                                        <a id="image_link" class="thumbnail" href="#">
                                        <img id="image" class="img-responsive" src="images/'.$row["id"].'.jpg">
                                        <h5 style="font-size:15px;">' .$row["name"]. '</h5>
                                        <h6 style="font-size:12px;">Location Reviews</h6>
                                        <h6 style="font-size:12px;">' .$row["address"]. '</h6>
                                        </a>
                                    </div>
    
                                </div>
                            </div>
                        </div>';
                        if($subdistrict_count>0)
                        {
                            $output.='<a data-slide="prev" href="#media'.$subdistrict_count.'" class="left carousel-control">‹</a>
                                    <a data-slide="next" href="#media'.$subdistrict_count.'" class="right carousel-control">›</a>';
                        }
                        else
                        {
                            $output.='<a data-slide="prev" href="#media" class="left carousel-control">‹</a>
                                    <a data-slide="next" href="#media" class="right carousel-control">›</a>';
                        }
                    $output.='</div>
                </div>
            </div>
        </div>';
            }
            
            else if(($counter-1)%3==0)          // Third change
            {
                $output.='</div>
                </div>
                <div class="item">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div onclick=gotoLocation("'.$row["id"].'") id="image_body" class="col-md-3">
                            <a id="image_link" class="thumbnail" href="#">
                            <img id="image" class="img-responsive" src="images/'.$row["id"].'.jpg">
                            <h5 style="font-size:15px;">' .$row["name"]. '</h5>
                            <h6 style="font-size:12px;">Location Reviews</h6>
                            <h6 style="font-size:12px;">' .$row["address"]. '</h6>
                            </a>
                        </div>';
            }
            else if(($counter-1)%3!=0 && $counter1==$result->num_rows)          // Third change with last enter
            {
                $output.='
                                            <div onclick=gotoLocation("'.$row["id"].'") style="margin-left:2.5%;" id="image_body" class="col-md-3">
                                                <a id="image_link" class="thumbnail" href="#">
                                                <img id="image" class="img-responsive" src="images/'.$row["id"].'.jpg">
                                                <h5 style="font-size:15px;">' .$row["name"]. '</h5>
                                                <h6 style="font-size:12px;">Location Reviews</h6>
                                                <h6 style="font-size:12px;">' .$row["address"]. '</h6>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                                if($subdistrict_count>0)
                                {
                                    $output.='<a data-slide="prev" href="#media'.$subdistrict_count.'" class="left carousel-control">‹</a>
                                            <a data-slide="next" href="#media'.$subdistrict_count.'" class="right carousel-control">›</a>';
                                }
                                else
                                {
                                    $output.='<a data-slide="prev" href="#media" class="left carousel-control">‹</a>
                                            <a data-slide="next" href="#media" class="right carousel-control">›</a>';
                                }
                            $output.='</div>
                        </div>
                    </div>
                </div>';
            }
            else if(($counter-1)%3!=0)          // Third change with last enter
            {
                $output.='<div onclick=gotoLocation("'.$row["id"].'") style="margin-left:2.5%;" id="image_body" class="col-md-3">
                            <a id="image_link" class="thumbnail" href="#">
                                <img id="image" class="img-responsive" src="images/'.$row["id"].'.jpg">
                                <h5 style="font-size:15px;">' .$row["name"]. '</h5>
                                <h6 style="font-size:12px;">Location Reviews</h6>
                                <h6 style="font-size:12px;">' .$row["address"]. '</h6>
                            </a>
                        </div>
                            ';
            }
            
            
    
        }
    
        $output.='</div>
        <div class="col-md-1"></div>';
    
        
       //  session_destroy();
        
    
        echo $output;
}

































else if(isset($_POST['location']))
{
    $location=$_POST['location'];
    $_SESSION['location']=$location;
    
    
    $output.=
    '
    <div id="location_menu_body" class="col-md-3">
        <div id="location_menu" align="center" class="row">
            <div>
                <a href="location_finder.php"><img src="images/location_icon.png" width="30%" id="location_logo"></a>
                <label id="location_header">Locations</label>
            </div>
            <table style="text-align:center;">
                <tbody>
                    <br>
                    
                    <tr><td><a onclick=gotodistrict("dhaka") id="menu_options">Dhaka</a></td></tr>
                    <tr><td><a onclick=gotodistrict("barisal") id="menu_options">Barisal</a></td></tr>
                    <tr><td><a onclick=gotodistrict("khulna") id="menu_options">Khulna</a></td></tr>
                    <tr><td><a onclick=gotodistrict("shylhet") id="menu_options">Shylhet</a></td></tr>
                    <tr><td><a onclick=gotodistrict("rajshahi") id="menu_options">Rajshahi</a></td></tr>
                    <tr><td><a onclick=gotodistrict("rangpur") id="menu_options">Rangpur</a></td></tr>
                    <tr><td><a onclick=gotodistrict("chittagong") id="menu_options">Chittagong</a></td></tr>';
    
   
    
    $output.='
    </tbody>
    </table>
    </div>
    </div>
    <div style="margin-left:20%;" class="col-md-7">';
    
    $query="SELECT restaurent_hotel_place.id,restaurent_hotel_place.name,restaurent_hotel_place.address,restaurent_hotel_place.subdistrict_name
            FROM restaurent_hotel_place JOIN division_district_subdistrict 
            ON restaurent_hotel_place.subdistrict_name=division_district_subdistrict.subdistrict_name 
            AND restaurent_hotel_place.name LIKE '%$location%' 
            AND restaurent_hotel_place.type='place'";
    
        $result = mysqli_query($conn,$query);
    
        while($row = mysqli_fetch_assoc($result))
        {
            $counter++;
            $counter1++;
            
            if($subdistrict!=$row["subdistrict_name"])
            {
                if($subdistrict!="")
                {
                    $output.='</div>
                    </div>
                </div>';
                    if($subdistrict_count>0)
                    {
                        $output.='<a data-slide="prev" href="#media'.$subdistrict_count.'" class="left carousel-control">‹</a>
                                <a data-slide="next" href="#media'.$subdistrict_count.'" class="right carousel-control">›</a>';
                    }
                    else
                    {
                        $output.='<a data-slide="prev" href="#media" class="left carousel-control">‹</a>
                                <a data-slide="next" href="#media" class="right carousel-control">›</a>';
                    }
                    $output.='<hr style="margin-top:-3%;margin-bottom:0%;margin-left:2%;width:142%;border-color:lightgray">
                    </div>
    </div>
    </div>
    </div>';
    
                    $subdistrict_count++;
                }
    
                $subdistrict=$row["subdistrict_name"];
                $counter=1;
            
            }
    
            if($counter==1 && $counter1==$result->num_rows)           // First Enter and last
            {
                $output.='
                <div id="contain" class="container" align="center">
                                    
                     <div style="margin-left:0%;margin-top:-3.5%;" class="row">
                        
                        <div>
                            <h2 align="left" style="margin-left:11.80%;margin-bottom:2.5%;">' .$subdistrict. '</h2>
                        </div>
                        <div class="col-md-8">';
    
                        if($subdistrict_count>0)    
                        {
                            $output.='<div class="carousel slide media-carousel" id="media'.$subdistrict_count.'">';
                        }
                        else
                        {
                            $output.='<div class="carousel slide media-carousel" id="media">';
                        }
                                
                            
                            $output.='<div class="carousel-inner">
                                    <div class="item active">
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div onclick=gotoLocation("'.$row["id"].'") id="image_body" class="col-md-3">
                                                <a id="image_link" class="thumbnail" href="#">
                                                    <img id="image" class="img-responsive" src="images/'.$row["id"].'.jpg">
                                                    <h5 style="font-size:15px;">' .$row["name"]. '</h5>
                                                    <h6 style="font-size:12px;">Location Reviews</h6>
                                                    <h6 style="font-size:12px;">' .$row["address"]. '</h6>
                                                </a>
                                            </div>
    
    
                                        </div>
                                    </div>
                                </div>';
                                if($subdistrict_count>0)
                                {
                                    $output.='<a data-slide="prev" href="#media'.$subdistrict_count.'" class="left carousel-control">‹</a>
                                            <a data-slide="next" href="#media'.$subdistrict_count.'" class="right carousel-control">›</a>';
                                }
                                else
                                {
                                    $output.='<a data-slide="prev" href="#media" class="left carousel-control">‹</a>
                                            <a data-slide="next" href="#media" class="right carousel-control">›</a>';
                                }
                            
                            
                                $output.='</div>
                        </div>
                    </div>
                </div>';
            }
            else if($counter==1)           // First Enter and last
            {
                $output.='
                <div id="contain" class="container" align="center">
                                    
                     <div style="margin-left:0%;margin-top:-3.5%;" class="row">
                        
                        <div>
                            <h2 align="left" style="margin-left:11.80%;margin-bottom:2.5%;">' .$subdistrict. '</h2>
                        </div>
                            <div class="col-md-8">';
                            if($subdistrict_count>0)    
                            {
                                $output.='<div class="carousel slide media-carousel" id="media'.$subdistrict_count.'">';
                            }
                            else
                            {
                                $output.='<div class="carousel slide media-carousel" id="media">';
                            }
                                    
                                
                                $output.='<div class="carousel-inner">
                                        <div class="item active">
                                            <div class="row">
                                                <div class="col-md-1"></div>
                                                <div onclick=gotoLocation("'.$row["id"].'") id="image_body" class="col-md-3">
                                                    <a id="image_link" class="thumbnail" href="#">
                                                    <img id="image" class="img-responsive" src="images/'.$row["id"].'.jpg">
                                                    <h5 style="font-size:15px;">' .$row["name"]. '</h5>
                                                    <h6 style="font-size:12px;">Location Reviews</h6>
                                                    <h6 style="font-size:12px;">' .$row["address"]. '</h6>
                                                    </a>
                                                </div>
                                            ';
            }
            else if(($counter-1)%3==0 && $counter1==$result->num_rows)          // Third change with last enter
            {
                $output.='
                </div>
                </div>
                            <div class="item">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div onclick=gotoLocation("'.$row["id"].'") id="image_body" class="col-md-3">
                                        <a id="image_link" class="thumbnail" href="#">
                                        <img id="image" class="img-responsive" src="images/'.$row["id"].'.jpg">
                                        <h5 style="font-size:15px;">' .$row["name"]. '</h5>
                                        <h6 style="font-size:12px;">Location Reviews</h6>
                                        <h6 style="font-size:12px;">' .$row["address"]. '</h6>
                                        </a>
                                    </div>
    
                                </div>
                            </div>
                        </div>';
                        if($subdistrict_count>0)
                        {
                            $output.='<a data-slide="prev" href="#media'.$subdistrict_count.'" class="left carousel-control">‹</a>
                                    <a data-slide="next" href="#media'.$subdistrict_count.'" class="right carousel-control">›</a>';
                        }
                        else
                        {
                            $output.='<a data-slide="prev" href="#media" class="left carousel-control">‹</a>
                                    <a data-slide="next" href="#media" class="right carousel-control">›</a>';
                        }
                    $output.='</div>
                </div>
            </div>
        </div>';
            }
            
            else if(($counter-1)%3==0)          // Third change
            {
                $output.='</div>
                </div>
                <div class="item">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div onclick=gotoLocation("'.$row["id"].'") id="image_body" class="col-md-3">
                            <a id="image_link" class="thumbnail" href="#">
                            <img id="image" class="img-responsive" src="images/'.$row["id"].'.jpg">
                            <h5 style="font-size:15px;">' .$row["name"]. '</h5>
                            <h6 style="font-size:12px;">Location Reviews</h6>
                            <h6 style="font-size:12px;">' .$row["address"]. '</h6>
                            </a>
                        </div>';
            }
            else if(($counter-1)%3!=0 && $counter1==$result->num_rows)          // Third change with last enter
            {
                $output.='
                                            <div onclick=gotoLocation("'.$row["id"].'") style="margin-left:2.5%;" id="image_body" class="col-md-3">
                                                <a id="image_link" class="thumbnail" href="#">
                                                <img id="image" class="img-responsive" src="images/'.$row["id"].'.jpg">
                                                <h5 style="font-size:15px;">' .$row["name"]. '</h5>
                                                <h6 style="font-size:12px;">Location Reviews</h6>
                                                <h6 style="font-size:12px;">' .$row["address"]. '</h6>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                                if($subdistrict_count>0)
                                {
                                    $output.='<a data-slide="prev" href="#media'.$subdistrict_count.'" class="left carousel-control">‹</a>
                                            <a data-slide="next" href="#media'.$subdistrict_count.'" class="right carousel-control">›</a>';
                                }
                                else
                                {
                                    $output.='<a data-slide="prev" href="#media" class="left carousel-control">‹</a>
                                            <a data-slide="next" href="#media" class="right carousel-control">›</a>';
                                }
                            $output.='</div>
                        </div>
                    </div>
                </div>';
            }
            else if(($counter-1)%3!=0)          // Third change with last enter
            {
                $output.='<div onclick=gotoLocation("'.$row["id"].'") style="margin-left:2.5%;" id="image_body" class="col-md-3">
                            <a id="image_link" class="thumbnail" href="#">
                                <img id="image" class="img-responsive" src="images/'.$row["id"].'.jpg">
                                <h5 style="font-size:15px;">' .$row["name"]. '</h5>
                                <h6 style="font-size:12px;">Location Reviews</h6>
                                <h6 style="font-size:12px;">' .$row["address"]. '</h6>
                            </a>
                        </div>
                            ';
            }
            
            
    
        }
    
        $output.='</div>
        <div class="col-md-1"></div>';
    
        
       //  session_destroy();
        
    
        echo $output;
}


























else if(isset($_SESSION['location']) && isset($_POST['type']))
{
    $type=$_POST['type'];
    $_POST['type']='';
    $location=$_SESSION['location'];
    
    
    $output.=
    '
    <div id="location_menu_body" class="col-md-3">
        <div id="location_menu" align="center" class="row">
            <div>
                <a href="location_finder.php"><img src="images/location_icon.png" width="30%" id="location_logo"></a>
                <label id="location_header">Locations</label>
            </div>
            <table style="text-align:center;">
                <tbody>
                    <br>
                    
                    <tr><td><a onclick=gotodistrict("dhaka") id="menu_options">Dhaka</a></td></tr>
                    <tr><td><a onclick=gotodistrict("barisal") id="menu_options">Barisal</a></td></tr>
                    <tr><td><a onclick=gotodistrict("khulna") id="menu_options">Khulna</a></td></tr>
                    <tr><td><a onclick=gotodistrict("shylhet") id="menu_options">Shylhet</a></td></tr>
                    <tr><td><a onclick=gotodistrict("rajshahi") id="menu_options">Rajshahi</a></td></tr>
                    <tr><td><a onclick=gotodistrict("rangpur") id="menu_options">Rangpur</a></td></tr>
                    <tr><td><a onclick=gotodistrict("chittagong") id="menu_options">Chittagong</a></td></tr>';
    
   
    
    $output.='
    </tbody>
    </table>
    </div>
    </div>
    <div style="margin-left:20%;" class="col-md-7">';
    
    $query="SELECT restaurent_hotel_place.id,restaurent_hotel_place.name,restaurent_hotel_place.address,restaurent_hotel_place.subdistrict_name
            FROM restaurent_hotel_place JOIN division_district_subdistrict JOIN place_type
            ON restaurent_hotel_place.subdistrict_name=division_district_subdistrict.subdistrict_name 
            AND restaurent_hotel_place.name LIKE '%$location%' 
            AND place_type.type='$type' 
            AND restaurent_hotel_place.type='place'";
    
        $result = mysqli_query($conn,$query);
    
        while($row = mysqli_fetch_assoc($result))
        {
            $counter++;
            $counter1++;
            
            if($subdistrict!=$row["subdistrict_name"])
            {
                if($subdistrict!="")
                {
                    $output.='</div>
                    </div>
                </div>';
                    if($subdistrict_count>0)
                    {
                        $output.='<a data-slide="prev" href="#media'.$subdistrict_count.'" class="left carousel-control">‹</a>
                                <a data-slide="next" href="#media'.$subdistrict_count.'" class="right carousel-control">›</a>';
                    }
                    else
                    {
                        $output.='<a data-slide="prev" href="#media" class="left carousel-control">‹</a>
                                <a data-slide="next" href="#media" class="right carousel-control">›</a>';
                    }
                    $output.='<hr style="margin-top:-3%;margin-bottom:0%;margin-left:2%;width:142%;border-color:lightgray">
                    </div>
    </div>
    </div>
    </div>';
    
                    $subdistrict_count++;
                }
    
                $subdistrict=$row["subdistrict_name"];
                $counter=1;
            
            }
    
            if($counter==1 && $counter1==$result->num_rows)           // First Enter and last
            {
                $output.='
                <div id="contain" class="container" align="center">
                                    
                     <div style="margin-left:0%;margin-top:-3.5%;" class="row">
                        
                        <div>
                            <h2 align="left" style="margin-left:11.80%;margin-bottom:2.5%;">' .$subdistrict. '</h2>
                        </div>
                        <div class="col-md-8">';
    
                        if($subdistrict_count>0)    
                        {
                            $output.='<div class="carousel slide media-carousel" id="media'.$subdistrict_count.'">';
                        }
                        else
                        {
                            $output.='<div class="carousel slide media-carousel" id="media">';
                        }
                                
                            
                            $output.='<div class="carousel-inner">
                                    <div class="item active">
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div onclick=gotoLocation("'.$row["id"].'") id="image_body" class="col-md-3">
                                                <a id="image_link" class="thumbnail" href="#">
                                                    <img id="image" class="img-responsive" src="images/'.$row["id"].'.jpg">
                                                    <h5 style="font-size:15px;">' .$row["name"]. '</h5>
                                                    <h6 style="font-size:12px;">Location Reviews</h6>
                                                    <h6 style="font-size:12px;">' .$row["address"]. '</h6>
                                                </a>
                                            </div>
    
    
                                        </div>
                                    </div>
                                </div>';
                                if($subdistrict_count>0)
                                {
                                    $output.='<a data-slide="prev" href="#media'.$subdistrict_count.'" class="left carousel-control">‹</a>
                                            <a data-slide="next" href="#media'.$subdistrict_count.'" class="right carousel-control">›</a>';
                                }
                                else
                                {
                                    $output.='<a data-slide="prev" href="#media" class="left carousel-control">‹</a>
                                            <a data-slide="next" href="#media" class="right carousel-control">›</a>';
                                }
                            
                            
                                $output.='</div>
                        </div>
                    </div>
                </div>';
            }
            else if($counter==1)           // First Enter and last
            {
                $output.='
                <div id="contain" class="container" align="center">
                                    
                     <div style="margin-left:0%;margin-top:-3.5%;" class="row">
                        
                        <div>
                            <h2 align="left" style="margin-left:11.80%;margin-bottom:2.5%;">' .$subdistrict. '</h2>
                        </div>
                            <div class="col-md-8">';
                            if($subdistrict_count>0)    
                            {
                                $output.='<div class="carousel slide media-carousel" id="media'.$subdistrict_count.'">';
                            }
                            else
                            {
                                $output.='<div class="carousel slide media-carousel" id="media">';
                            }
                                    
                                
                                $output.='<div class="carousel-inner">
                                        <div class="item active">
                                            <div class="row">
                                                <div class="col-md-1"></div>
                                                <div onclick=gotoLocation("'.$row["id"].'") id="image_body" class="col-md-3">
                                                    <a id="image_link" class="thumbnail" href="#">
                                                    <img id="image" class="img-responsive" src="images/'.$row["id"].'.jpg">
                                                    <h5 style="font-size:15px;">' .$row["name"]. '</h5>
                                                    <h6 style="font-size:12px;">Location Reviews</h6>
                                                    <h6 style="font-size:12px;">' .$row["address"]. '</h6>
                                                    </a>
                                                </div>
                                            ';
            }
            else if(($counter-1)%3==0 && $counter1==$result->num_rows)          // Third change with last enter
            {
                $output.='
                </div>
                </div>
                            <div class="item">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div onclick=gotoLocation("'.$row["id"].'") id="image_body" class="col-md-3">
                                        <a id="image_link" class="thumbnail" href="#">
                                        <img id="image" class="img-responsive" src="images/'.$row["id"].'.jpg">
                                        <h5 style="font-size:15px;">' .$row["name"]. '</h5>
                                        <h6 style="font-size:12px;">Location Reviews</h6>
                                        <h6 style="font-size:12px;">' .$row["address"]. '</h6>
                                        </a>
                                    </div>
    
                                </div>
                            </div>
                        </div>';
                        if($subdistrict_count>0)
                        {
                            $output.='<a data-slide="prev" href="#media'.$subdistrict_count.'" class="left carousel-control">‹</a>
                                    <a data-slide="next" href="#media'.$subdistrict_count.'" class="right carousel-control">›</a>';
                        }
                        else
                        {
                            $output.='<a data-slide="prev" href="#media" class="left carousel-control">‹</a>
                                    <a data-slide="next" href="#media" class="right carousel-control">›</a>';
                        }
                    $output.='</div>
                </div>
            </div>
        </div>';
            }
            
            else if(($counter-1)%3==0)          // Third change
            {
                $output.='</div>
                </div>
                <div class="item">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div onclick=gotoLocation("'.$row["id"].'") id="image_body" class="col-md-3">
                            <a id="image_link" class="thumbnail" href="#">
                            <img id="image" class="img-responsive" src="images/'.$row["id"].'.jpg">
                            <h5 style="font-size:15px;">' .$row["name"]. '</h5>
                            <h6 style="font-size:12px;">Location Reviews</h6>
                            <h6 style="font-size:12px;">' .$row["address"]. '</h6>
                            </a>
                        </div>';
            }
            else if(($counter-1)%3!=0 && $counter1==$result->num_rows)          // Third change with last enter
            {
                $output.='
                                            <div onclick=gotoLocation("'.$row["id"].'") style="margin-left:2.5%;" id="image_body" class="col-md-3">
                                                <a id="image_link" class="thumbnail" href="#">
                                                <img id="image" class="img-responsive" src="images/'.$row["id"].'.jpg">
                                                <h5 style="font-size:15px;">' .$row["name"]. '</h5>
                                                <h6 style="font-size:12px;">Location Reviews</h6>
                                                <h6 style="font-size:12px;">' .$row["address"]. '</h6>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                                if($subdistrict_count>0)
                                {
                                    $output.='<a data-slide="prev" href="#media'.$subdistrict_count.'" class="left carousel-control">‹</a>
                                            <a data-slide="next" href="#media'.$subdistrict_count.'" class="right carousel-control">›</a>';
                                }
                                else
                                {
                                    $output.='<a data-slide="prev" href="#media" class="left carousel-control">‹</a>
                                            <a data-slide="next" href="#media" class="right carousel-control">›</a>';
                                }
                            $output.='</div>
                        </div>
                    </div>
                </div>';
            }
            else if(($counter-1)%3!=0)          // Third change with last enter
            {
                $output.='<div onclick=gotoLocation("'.$row["id"].'") style="margin-left:2.5%;" id="image_body" class="col-md-3">
                            <a id="image_link" class="thumbnail" href="#">
                                <img id="image" class="img-responsive" src="images/'.$row["id"].'.jpg">
                                <h5 style="font-size:15px;">' .$row["name"]. '</h5>
                                <h6 style="font-size:12px;">Location Reviews</h6>
                                <h6 style="font-size:12px;">' .$row["address"]. '</h6>
                            </a>
                        </div>
                            ';
            }
            
            
    
        }
    
        $output.='</div>
        <div class="col-md-1"></div>';
    
        
       //  session_destroy();
        
    
        echo $output;
}

































else if( isset($_SESSION['division']) && isset($_POST['type']) )
{
    $type=$_POST['type'];
    $_POST['type']='';
    
    $division=$_SESSION['division'];
    
    $output.=
    '
    <div id="location_menu_body" class="col-md-3">
        <div id="location_menu" align="center" class="row">
            <div>
                <a href="location_finder.php"><img src="images/location_icon.png" width="30%" id="location_logo"></a>
                <label id="location_header">Locations</label>
            </div>
            <table style="text-align:center;">
                <tbody>
                    <br>';
    
    if($division=="dhaka")
    {
        $output.='
        <tr style="border:1px solid dodgerblue;"><td><a onclick=gotodistrict("dhaka") id="menu_options">Dhaka</a></td></tr>
        <tr><td><a onclick=gotodistrict("barisal") id="menu_options">Barisal</a></td></tr>
        <tr><td><a onclick=gotodistrict("khulna") id="menu_options">Khulna</a></td></tr>
        <tr><td><a onclick=gotodistrict("shylhet") id="menu_options">Shylhet</a></td></tr>
        <tr><td><a onclick=gotodistrict("rajshahi") id="menu_options">Rajshahi</a></td></tr>
        <tr><td><a onclick=gotodistrict("rangpur") id="menu_options">Rangpur</a></td></tr>
        <tr><td><a onclick=gotodistrict("chittagong") id="menu_options">Chittagong</a></td></tr>    
        ';
    }
    else if($division=="barisal")
    {
        $output.='
        <tr><td><a onclick=gotodistrict("dhaka") id="menu_options">Dhaka</a></td></tr>
        <tr style="border:1px solid dodgerblue;"><td><a onclick=gotodistrict("barisal") id="menu_options">Barisal</a></td></tr>
        <tr><td><a onclick=gotodistrict("khulna") id="menu_options">Khulna</a></td></tr>
        <tr><td><a onclick=gotodistrict("shylhet") id="menu_options">Shylhet</a></td></tr>
        <tr><td><a onclick=gotodistrict("rajshahi") id="menu_options">Rajshahi</a></td></tr>
        <tr><td><a onclick=gotodistrict("rangpur") id="menu_options">Rangpur</a></td></tr>
        <tr><td><a onclick=gotodistrict("chittagong") id="menu_options">Chittagong</a></td></tr>    
        ';
    }
    else if($division=="khulna")
    {
        $output.='
        <tr><td><a onclick=gotodistrict("dhaka") id="menu_options">Dhaka</a></td></tr>
        <tr><td><a onclick=gotodistrict("barisal") id="menu_options">Barisal</a></td></tr>
        <tr style="border:1px solid dodgerblue;"><td><a onclick=gotodistrict("khulna") id="menu_options">Khulna</a></td></tr>
        <tr><td><a onclick=gotodistrict("shylhet") id="menu_options">Shylhet</a></td></tr>
        <tr><td><a onclick=gotodistrict("rajshahi") id="menu_options">Rajshahi</a></td></tr>
        <tr><td><a onclick=gotodistrict("rangpur") id="menu_options">Rangpur</a></td></tr>
        <tr><td><a onclick=gotodistrict("chittagong") id="menu_options">Chittagong</a></td></tr>    
        ';
    }
    else if($division=="shylhet")
    {
        $output.='
        <tr><td><a onclick=gotodistrict("dhaka") id="menu_options">Dhaka</a></td></tr>
        <tr><td><a onclick=gotodistrict("barisal") id="menu_options">Barisal</a></td></tr>
        <tr><td><a onclick=gotodistrict("khulna") id="menu_options">Khulna</a></td></tr>
        <tr style="border:1px solid dodgerblue;"><td><a onclick=gotodistrict("shylhet") id="menu_options">Shylhet</a></td></tr>
        <tr><td><a onclick=gotodistrict("rajshahi") id="menu_options">Rajshahi</a></td></tr>
        <tr><td><a onclick=gotodistrict("rangpur") id="menu_options">Rangpur</a></td></tr>
        <tr><td><a onclick=gotodistrict("chittagong") id="menu_options">Chittagong</a></td></tr>    
        ';
    }
    else if($division=="rajshahi")
    {
        $output.='
        <tr><td><a onclick=gotodistrict("dhaka") id="menu_options">Dhaka</a></td></tr>
        <tr><td><a onclick=gotodistrict("barisal") id="menu_options">Barisal</a></td></tr>
        <tr><td><a onclick=gotodistrict("khulna") id="menu_options">Khulna</a></td></tr>
        <tr><td><a onclick=gotodistrict("shylhet") id="menu_options">Shylhet</a></td></tr>
        <tr style="border:1px solid dodgerblue;"><td><a onclick=gotodistrict("rajshahi") id="menu_options">Rajshahi</a></td></tr>
        <tr><td><a onclick=gotodistrict("rangpur") id="menu_options">Rangpur</a></td></tr>
        <tr><td><a onclick=gotodistrict("chittagong") id="menu_options">Chittagong</a></td></tr>    
        ';
    }
    else if($division=="rangpur")
    {
        $output.='
        <tr><td><a onclick=gotodistrict("dhaka") id="menu_options">Dhaka</a></td></tr>
        <tr><td><a onclick=gotodistrict("barisal") id="menu_options">Barisal</a></td></tr>
        <tr><td><a onclick=gotodistrict("khulna") id="menu_options">Khulna</a></td></tr>
        <tr><td><a onclick=gotodistrict("shylhet") id="menu_options">Shylhet</a></td></tr>
        <tr><td><a onclick=gotodistrict("rajshahi") id="menu_options">Rajshahi</a></td></tr>
        <tr style="border:1px solid dodgerblue;"><td><a onclick=gotodistrict("rangpur") id="menu_options">Rangpur</a></td></tr>
        <tr><td><a onclick=gotodistrict("chittagong") id="menu_options">Chittagong</a></td></tr>    
        ';
    }
    else if($division=="chittagong")
    {
        $output.='
        <tr><td><a onclick=gotodistrict("dhaka") id="menu_options">Dhaka</a></td></tr>
        <tr><td><a onclick=gotodistrict("barisal") id="menu_options">Barisal</a></td></tr>
        <tr><td><a onclick=gotodistrict("khulna") id="menu_options">Khulna</a></td></tr>
        <tr><td><a onclick=gotodistrict("shylhet") id="menu_options">Shylhet</a></td></tr>
        <tr><td><a onclick=gotodistrict("rajshahi") id="menu_options">Rajshahi</a></td></tr>
        <tr><td><a onclick=gotodistrict("rangpur") id="menu_options">Rangpur</a></td></tr>
        <tr style="border:1px solid dodgerblue;"><td><a onclick=gotodistrict("chittagong") id="menu_options">Chittagong</a></td></tr>    
        ';
    }
    
    $output.='
    </tbody>
    </table>
    </div>
    </div>
    <div style="margin-left:20%;" class="col-md-7">';
    
    $query="SELECT restaurent_hotel_place.id,restaurent_hotel_place.name,restaurent_hotel_place.address,restaurent_hotel_place.subdistrict_name
            FROM restaurent_hotel_place JOIN division_district_subdistrict JOIN place_type
            ON restaurent_hotel_place.subdistrict_name=division_district_subdistrict.subdistrict_name 
            AND restaurent_hotel_place.id=place_type.place_id 
            AND division_district_subdistrict.division_name='$division' 
            AND restaurent_hotel_place.type ='place' 
            AND place_type.type='$type'
            ORDER BY division_district_subdistrict.subdistrict_name";
    
        $result = mysqli_query($conn,$query);
    
        while($row = mysqli_fetch_assoc($result))
        {
            $counter++;
            $counter1++;
            
            if($subdistrict!=$row["subdistrict_name"])
            {
                if($subdistrict!="")
                {
                    $output.='</div>
                    </div>
                </div>';
                    if($subdistrict_count>0)
                    {
                        $output.='<a data-slide="prev" href="#media'.$subdistrict_count.'" class="left carousel-control">‹</a>
                                <a data-slide="next" href="#media'.$subdistrict_count.'" class="right carousel-control">›</a>';
                    }
                    else
                    {
                        $output.='<a data-slide="prev" href="#media" class="left carousel-control">‹</a>
                                <a data-slide="next" href="#media" class="right carousel-control">›</a>';
                    }
                    $output.='<hr style="margin-top:-3%;margin-bottom:0%;margin-left:2%;width:142%;border-color:dodgerblue">
                    </div>
    </div>
    </div>
    </div>';
    
                    $subdistrict_count++;
                }
    
                $subdistrict=$row["subdistrict_name"];
                $counter=1;
            
            }
    
            if($counter==1 && $counter1==$result->num_rows)           // First Enter and last
            {
                $output.='
                <div id="contain" class="container" align="center">
                                  
                     <div style="margin-left:0%;margin-top:-3.5%;" class="row">
                        
                        <div>
                            <h2 align="left" style="margin-left:11.80%;margin-bottom:2.5%;">' .$subdistrict. '</h2>
                        </div>
                        <div class="col-md-8">';
    
                        if($subdistrict_count>0)    
                        {
                            $output.='<div class="carousel slide media-carousel" id="media'.$subdistrict_count.'">';
                        }
                        else
                        {
                            $output.='<div class="carousel slide media-carousel" id="media">';
                        }
                                
                            
                            $output.='<div class="carousel-inner">
                                    <div class="item active">
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div onclick=gotoLocation("'.$row["id"].'") id="image_body" class="col-md-3">
                                                <a id="image_link" class="thumbnail" href="#">
                                                    <img id="image" class="img-responsive" src="images/'.$row["id"].'.jpg">
                                                    <h5 style="font-size:15px;">' .$row["name"]. '</h5>
                                                    <h6 style="font-size:12px;">Location Reviews</h6>
                                                    <h6 style="font-size:12px;">' .$row["address"]. '</h6>
                                                </a>
                                            </div>
    
    
                                        </div>
                                    </div>
                                </div>';
                                if($subdistrict_count>0)
                                {
                                    $output.='<a data-slide="prev" href="#media'.$subdistrict_count.'" class="left carousel-control">‹</a>
                                            <a data-slide="next" href="#media'.$subdistrict_count.'" class="right carousel-control">›</a>';
                                }
                                else
                                {
                                    $output.='<a data-slide="prev" href="#media" class="left carousel-control">‹</a>
                                            <a data-slide="next" href="#media" class="right carousel-control">›</a>';
                                }
                            
                            
                                $output.='</div>
                        </div>
                    </div>
                </div>';
            }
            else if($counter==1)           // First Enter and last
            {
                $output.='
                <div id="contain" class="container" align="center">
                                  
                     <div style="margin-left:0%;margin-top:-3.5%;" class="row">
                        
                        <div>
                            <h2 align="left" style="margin-left:11.80%;margin-bottom:2.5%;">' .$subdistrict. '</h2>
                        </div>
                            <div class="col-md-8">';
                            if($subdistrict_count>0)    
                            {
                                $output.='<div class="carousel slide media-carousel" id="media'.$subdistrict_count.'">';
                            }
                            else
                            {
                                $output.='<div class="carousel slide media-carousel" id="media">';
                            }
                                    
                                
                                $output.='<div class="carousel-inner">
                                        <div class="item active">
                                            <div class="row">
                                                <div class="col-md-1"></div>
                                                <div onclick=gotoLocation("'.$row["id"].'") id="image_body" class="col-md-3">
                                                    <a id="image_link" class="thumbnail" href="#">
                                                    <img id="image" class="img-responsive" src="images/'.$row["id"].'.jpg">
                                                    <h5 style="font-size:15px;">' .$row["name"]. '</h5>
                                                    <h6 style="font-size:12px;">Location Reviews</h6>
                                                    <h6 style="font-size:12px;">' .$row["address"]. '</h6>
                                                    </a>
                                                </div>
                                            ';
            }
            else if(($counter-1)%3==0 && $counter1==$result->num_rows)          // Third change with last enter
            {
                $output.='
                </div>
                </div>
                            <div class="item">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div onclick=gotoLocation("'.$row["id"].'") id="image_body" class="col-md-3">
                                        <a id="image_link" class="thumbnail" href="#">
                                        <img id="image" class="img-responsive" src="images/'.$row["id"].'.jpg">
                                        <h5 style="font-size:15px;">' .$row["name"]. '</h5>
                                        <h6 style="font-size:12px;">Location Reviews</h6>
                                        <h6 style="font-size:12px;">' .$row["address"]. '</h6>
                                        </a>
                                    </div>
    
                                </div>
                            </div>
                        </div>';
                        if($subdistrict_count>0)
                        {
                            $output.='<a data-slide="prev" href="#media'.$subdistrict_count.'" class="left carousel-control">‹</a>
                                    <a data-slide="next" href="#media'.$subdistrict_count.'" class="right carousel-control">›</a>';
                        }
                        else
                        {
                            $output.='<a data-slide="prev" href="#media" class="left carousel-control">‹</a>
                                    <a data-slide="next" href="#media" class="right carousel-control">›</a>';
                        }
                    $output.='</div>
                </div>
            </div>
        </div>';
            }
            
            else if(($counter-1)%3==0)          // Third change
            {
                $output.='</div>
                </div>
                <div class="item">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div onclick=gotoLocation("'.$row["id"].'") id="image_body" class="col-md-3">
                            <a id="image_link" class="thumbnail" href="#">
                            <img id="image" class="img-responsive" src="images/'.$row["id"].'.jpg">
                            <h5 style="font-size:15px;">' .$row["name"]. '</h5>
                            <h6 style="font-size:12px;">Location Reviews</h6>
                            <h6 style="font-size:12px;">' .$row["address"]. '</h6>
                            </a>
                        </div>';
            }
            else if(($counter-1)%3!=0 && $counter1==$result->num_rows)          // Third change with last enter
            {
                $output.='
                                            <div onclick=gotoLocation("'.$row["id"].'") style="margin-left:2.5%;" id="image_body" class="col-md-3">
                                                <a id="image_link" class="thumbnail" href="#">
                                                <img id="image" class="img-responsive" src="images/'.$row["id"].'.jpg">
                                                <h5 style="font-size:15px;">' .$row["name"]. '</h5>
                                                <h6 style="font-size:12px;">Location Reviews</h6>
                                                <h6 style="font-size:12px;">' .$row["address"]. '</h6>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                                if($subdistrict_count>0)
                                {
                                    $output.='<a data-slide="prev" href="#media'.$subdistrict_count.'" class="left carousel-control">‹</a>
                                            <a data-slide="next" href="#media'.$subdistrict_count.'" class="right carousel-control">›</a>';
                                }
                                else
                                {
                                    $output.='<a data-slide="prev" href="#media" class="left carousel-control">‹</a>
                                            <a data-slide="next" href="#media" class="right carousel-control">›</a>';
                                }
                            $output.='</div>
                        </div>
                    </div>
                </div>';
            }
            else if(($counter-1)%3!=0)          // Third change with last enter
            {
                $output.='<div onclick=gotoLocation("'.$row["id"].'") style="margin-left:2.5%;" id="image_body" class="col-md-3">
                            <a id="image_link" class="thumbnail" href="#">
                                <img id="image" class="img-responsive" src="images/'.$row["id"].'.jpg">
                                <h5 style="font-size:15px;">' .$row["name"]. '</h5>
                                <h6 style="font-size:12px;">Location Reviews</h6>
                                <h6 style="font-size:12px;">' .$row["address"]. '</h6>
                            </a>
                        </div>
                            ';
            }
            
            
    
        }
    
        $output.='</div>
        <div class="col-md-1"></div>';
    
       //  session_destroy();
        
    
        echo $output;
}






































?>