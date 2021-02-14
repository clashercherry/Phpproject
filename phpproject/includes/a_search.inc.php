<?php
require 'dbh.inc.php';
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <title>a_search</title>
        <link href ="../content.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
        <div id="main">
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
        <div class="navsearch">
              <form action="a_search.inc.php" method="post">
                <input type='text' placeholder='Search....' name='search' class="search">
                <button type='submit' name='search-submit' class="sub"><i class="fa fa-search"></i>search</button>
                </form>
        </br>
          <div class="middle">
            <?php
                
            if(isset($_POST['search-submit']))
            {
            $search = mysqli_real_escape_string($conn,$_POST['search']);
            if(empty($search))
            {
            
                echo "<img src='https://cdn.dribbble.com/users/2206821/screenshots/9135984/media/79d6fe89c39b4116e5ecadc809c3b50a.png' class='notfound'>";

            }
            else
            {
            $sql = "select * from file where username like '%$search%' or gname like'%$search%' or title like '%$search%' or year like '%$search%'";
           // echo $sql;
            $result = mysqli_query($conn,$sql);
           // echo $result;
            $queryresult = mysqli_num_rows($result) ;
            // echo  $queryresult;
            if($queryresult>0)
            {
                echo "<h2>".$queryresult." results found</h2>";
                while($row=mysqli_fetch_assoc($result))
                {
                     echo  "
                            <a href='read.php?filename=".$row['id']."'download class='btn'><i class='fa fa-download'></i></a>
                           <a href='includes/delete.inc.php?id=".$row['id']."&filename=".$row['filename']"'class='trash'><i class='fa fa-trash' aria-hidden='true'></i></a>
                            <a href='read.php?filename=".$row['id']."'>
                            <div class='content'>
                                    <h2>".$row['title']."</h2>
                                     <h3>Author: ".$row['username']."</h3>
                                      <h3>Guidename: ".$row['gname']."</h3>   
                                          <h3>Year: ".$row['year']."</h3>
                                </div></a>";
                }
            }
            else
            {
             echo "<img src='../images/no results' class='notfound'>";

            
            }

        }
       
       }

                ?>
                </div>
<div class="right">
</div>




<style>
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top:0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
  
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
  margin-top:10px;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <h1 style="color:grey;text-align:center;text-transform: uppercase"><?php echo $_SESSION['user'];?></h1>
  <a href="../a_upload.php">UPLOAD</a>
  <a href="https://reva.edu.in">REVA university</a>
  <a href="https://moodle.reva.edu.in/moodle/">Moddle</a>
  <a href="https://reva.edu.in/contact-us">Contact</a>
  <a href="logout.inc.php" class="down">Logout</a>
</div>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
      
       
</body>
</html>
                    
