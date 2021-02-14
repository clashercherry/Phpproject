<?php 

// The location of the PDF file 
// on the server 
$fileid = $_GET['id']; 


require "./dbh.inc.php";
 
 $sql="SELECT * FROM  file WHERE id=$fileid ";
$result = mysqli_query($conn,$sql);
$queryresult = mysqli_num_rows($result) ;
$row=mysqli_fetch_assoc($result);
$file=base64_decode(stripslashes($row['filename']));
header("content-type: application/pdf;base64");//for pdf file
header('Accept-Ranges: bytes');
header('Content-Transfer-Encoding: binary');
echo $file;
?> 

