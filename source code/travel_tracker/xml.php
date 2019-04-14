<?php
session_start();
include_once("connection.php");
$username=$_SESSION['name'];
function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}


$query = "SELECT * FROM check_in WHERE user_name='$username'";
$result = mysqli_query($conn, $query);  
header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';

// Iterate through the rows, printing XML nodes for each
while($row = mysqli_fetch_array($result)){
  // Add to XML document node
  echo '<marker ';
  echo 'name="' . parseToXML($row['place']) . '" ';
  echo 'address="' . parseToXML($row['address']) . '" ';
  echo 'lat="' . $row['lat'] . '" ';
  echo 'lng="' . $row['lng'] . '" ';
  echo '/>';
}

// End XML file
echo '</markers>';
?>