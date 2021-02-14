<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <title>A_login</title>
        <link href ="main.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
          
                if(!isset($_SESSION['a_sid']))   
                {                    
               echo"<header>
                  <nav>
                    <ul>
                     <li><a href='https://reva.edu.in/contact-us'>Contact-us</a></li>
                      <li><a href='https://moodle.reva.edu.in/moodle/'>Moodle</a></li>
                       <li><a href='https://reva.edu.in'>Reva University</a></li>
                      <li style='float:left'><a href='login.php' class='active'>Login</a></li>
                      <li><a href='signup.php'>Sign up</a></li>
                      <li><a href='login.php'>User</a></li>
                    </ul>
                </nav>
        </header>
        <img src='images/revalogo.jpg.png' alt='revalogo'>";
        }
       
       else{
       
       header("Location: ./a_search.php?login=alreadyloggedin");
      
       }
       ?>
        

       <?php
         if(!isset($_SESSION['a_sid']))   
        {                             
       echo" <div class='login_box'>
            <img src='images/people.png' alt='img' class='left_login'>
            <div id='right_login'>
            <h1>ADMIN</h1>
             <form action= 'includes/admin.inc.php' method='post'>
			<br><input type='text' name='username' placeholder='Username' class='login'required></br>
			<br><input type='password' name='password' placeholder ='Password' class='login' required></br>
			<br><button type='submit' name='admin-submit' class='log_sub'>submit</button></br>
		</form>
		</div>
		</div>";
		}
	   ?>
	   
	   <?php
	   
	    if(!isset($_GET['login']))
	    {
                exit();       	    
	    }
	    else
	    {
	        $logincheck = $_GET['login'];
	        if($logincheck =="wrngpass")
	        {
                echo "<p class='error'>Invalid password!</p>";
                exit();	        
	        
	        }
	        else if($logincheck == "nouser")
	        {
	               echo "<p class='error'>Invalid user!</p>";
                   exit();	         
	        }
	        else
	        {
	            echo "<p class='error'>Logined in!</p>";
                exit();	         
	                
	        }
	        
	    }
	   
	   ?>

	   
</body>
</html>
                    
