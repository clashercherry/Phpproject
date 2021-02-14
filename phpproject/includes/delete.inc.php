<?php
    require 'dbh.inc.php';

if(isset($_GET["id"]))
{
    $id =$_GET['id'];
    $sql = "DELETE  FROM file WHERE id='$id';";
    $result = mysqli_query($conn,$sql);
    header("Location: ../a_search.php");

}



?>