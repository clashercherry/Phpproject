<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <title>upload</title>
        <link href ="main.css" rel="stylesheet">
</head>
<body>
<?php
echo"<header>
                  <nav>
                    <ul>
                     <li><a href='https://reva.edu.in/contact-us'>Contact-us</a></li>
                      <li><a href='https://moodle.reva.edu.in/moodle/'>Moodle</a></li>
                       <li><a href='https://reva.edu.in'>Reva University</a></li>
                      <li><a href='includes/logout.inc.php'>logout</a></li>
                       <li><a href='search.php'>search</a></li>
                    </ul>
                </nav>
        </header>";


echo "<form action='includes/upload.inc.php' method='POST'  class='con' enctype='multipart/form-data'>
            <h2>UPLOAD</h2>
			<input type='text' placeholder='Name' class='label1' name='uname' required></br>
			<input type='text' placeholder='srn' class='label1' name='uid' required></br>
			<input type='email' placeholder='Email' class='label1' name='email' required></br>
		    <input type='text' placeholder='Guidename' class='label1' name='gname' required></br>
		    <input type='text' placeholder='Project-title' class='label1' name='title' required></br>
		    <input type='text' placeholder='year' class='label1' name='year' required></br>
            <input type='file' name='file'></br>
          <button type='submit' name='file-submit' class='submit1'>UPLOAD</button>
        </form>";
        if(!isset($_GET['error']))
	    {
                exit();       	    
	    }
	    else
	    {
	        $error = $_GET['error'];
	        if($error =="sqlinputerror")
	        {
                echo("Error description: " . mysqli_error($con));
                exit();	        
	        
	        }
	        
	    }
?>     

</body>
</html>  
