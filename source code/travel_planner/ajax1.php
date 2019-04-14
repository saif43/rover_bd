<?php  

 session_start(); 
 $double_room= 5000*$_SESSION['days'];
 

 if(isset($_POST["number"]) AND ($_SESSION['num']=0))  
 {    
    $total=$_SESSION['total'];
    $_SESSION['num']=1;
    $total=$total - $double_room;
    $_SESSION['total']=$total;
    $_SESSION['total1']=$total;
    echo $total;
 }
 else if(isset($_POST["number"]) AND ($_SESSION['num']=1)){

    $total=$_SESSION['total'];
    $total=$total - $double_room;
    $_SESSION['total']=$total;
    $_SESSION['total1']=$total;
    echo $total;
 }

?>