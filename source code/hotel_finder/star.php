<?php

session_start();

if(isset($_POST['hotel_details_button'])){

    header("Location: details.php");

}

if(!empty($_SESSION['place']) AND isset($_POST['eve']))
{

    $place=$_SESSION['place'];
    $place=str_replace("'","''",$place);
    $s=$_POST['eve'];
    $_SESSION['star']=$_POST['eve'];
    include("connection.php");  
    $query = "SELECT * FROM restaurent_hotel_place WHERE subdistrict_name='$place' AND rating='$s'";  

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
                        <h4>Address : <?php echo $row["address"]; ?></h4>
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
            
    else  
    {  
        $output = "No Hotel Found";  
?>
        <div align="center" class="row">
            <br><br>    
            <h2><?php echo $output;?> </h2>
        </div>
<?php        
    
    } 
     
}        

?>

 <script>

    $(function(){
        $('.well').click(function(){
            var name= $(this).find('.user_id').val();
            $.post( "details.php", { data: name } ).done(function( data ) { $( "body" ).html(data);});
        });
    });

 </script>