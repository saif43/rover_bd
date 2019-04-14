<?php  
 session_start(); 
 $single_room=2000*$_SESSION['days'];
 
 if(isset($_POST["number"]) AND ($_SESSION['num']=0))  
 {    
    $total=$_SESSION['total'];
    $_SESSION['num']=1;
    $total=$total - $single_room;
    $_SESSION['total']=$total; 
    $_SESSION['total1']=$total;
 }
 else if((isset($_POST["number"]) AND ($_SESSION['num']=1))  
 {    
    $total=$_SESSION['total']; 
    $total=$total - $single_room;
    $_SESSION['total']=$total;
    $_SESSION['total1']=$total;
 }

 ?>