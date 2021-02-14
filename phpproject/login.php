<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <title>login</title>
        <link href ="main.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
          
                if(!isset($_SESSION['sid']))   
                {                    
               echo"<header>
                  <nav>
                    <ul>
                     <li><a href='https://reva.edu.in/contact-us'>Contact-us</a></li>
                      <li><a href='https://moodle.reva.edu.in/moodle/'>Moodle</a></li>
                       <li><a href='https://reva.edu.in'>Reva University</a></li>
                      <li style='float:left'><a href='login.php' class='active'>Login</a></li>
                      <li><a href='signup.php'>Sign up</a></li>
                      <li><a href='admin.php'>Admin</a></li>
                    </ul>
                </nav>
        </header>
        <img src='images/revalogo.jpg.png' alt='revalogo'>";
        }
       
       else{
       
       header("Location: ./search.php?login=alreadyloggedin");
       }
       ?>
        

       <?php
         if(!isset($_SESSION['sid']))   
        {                             
       echo" <div class='login_box'>
            <img src='images/people.png' alt='img' class='left_login'>
            <div id='right_login'>
            <h1>LOG IN</h1>
             <form action= 'includes/login.inc.php' method='post'>
			<br><input type='text' name='username' placeholder='Username' class='login'required></br>
			<br><input type='password' name='pass' placeholder ='Password' class='login' required></br>
			<br><button type='submit' name='login-submit' class='log_sub'>submit</button></br>
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
	               echo "<p class='error'>Invalid user/admin!</p>";
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
                    
