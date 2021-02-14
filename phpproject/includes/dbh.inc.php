<?php
// $dbservername = "localhost";
// $dbusername = "root";
// $dbpassword = "";
// $dbname = "project";
 
//  $conn = mysqli_connect($dbservername ,$dbusername,$dbpassword,$dbname);

// if(!$conn)
// {
//     die("Connection failed:".mysqli_connect_error());
// }
// 
//PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:phpproject.database.windows.net,1433; Database = project", "Admin_phpproject", "CHERRYpassword*143");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "Admin_phpproject", "pwd" => "CHERRYpassword*143", "Database" => "project", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:phpproject.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);
?>
