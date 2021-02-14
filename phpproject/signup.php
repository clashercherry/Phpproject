<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <title>signup</title>
        <link href ="main.css" rel="stylesheet">
</head>
<body>
        <header>
                <nav>
                    <ul>
                     <li><a href="https://reva.edu.in/contact-us">Contact-us</a></li>
                      <li><a href="https://moodle.reva.edu.in/moodle/">Moodle</a></li>
                       <li><a href="https://reva.edu.in">Reva University</a></li>
                      <li><a href="login.php">Login</a></li>
                      <li style="float:left"><a href="signup.php" class="active">Sign up</a></li>
                    </ul>
                </nav>
        </header>
        <img src="images/revalogo.jpg.png" alt="revalogo">
       	 <div class='login_box'>
         <form action="includes/signup.inc.php" method="post">
            <img src='images/people.png' alt='img' class='left_login'>
            <div id='right_login'>
            <h1>SIGN UP</h1>
			<br><input type='text' name='username' placeholder='Username' class='login'required></br>
			<input type='email' name='email' placeholder="E-mail" class="login"required></br>
			<input type='password' name='pwd1' placeholder ="Password" class="login" required></br>
			<input type='password' name='pwd2' placeholder ="confirm-Password" class="login" required></br>
			<br><button type='submit' name='signup-submit' class='log_sub'>submit</button></br>
		</form>
		</div>
		</div>
		<?php
		    if(isset($_GET['error']))
		    {
		        $errorcheck = $_GET['error'];
		        if($errorcheck == "emptyfeilds")
		        {
		            echo "<p class='error'>Fill all the feilds!</p>";
		            exit();
		        }
		        else if($errorcheck =='invalidemail')
		        {
		                echo "<p class='error'>Invalid E-mail!</p>";
		                 exit();
		        }
		        else if($errorcheck == "pwdmissmatch")
		        {
		             echo "<p class='error'>Password miss-match!</p>";
		            exit();
		        }
		        else if($errorcheck =='useralready_taken')
		        {
    		         echo "<p class='error'>User already present!</p>";
		            exit();
		        }
		        else if($errorcheck =='sqlprepare_error')
		        {
		             echo "<p class='error'>Error with database connection</p>";
		            exit();
		        }
		        else
		        {
		            echo "<p class='correct'>Signup success!</p>";
		            exit();
		        }
		    }
		    else
		    {
		    if(isset($_GET['signup']))
		    {
		        $errorcorrect = $_GET['signup'];
		        if($errorcorrect == 'success')
		        {
		            echo "<p class='correct'>Signup success!</p>";
		            exit();
		        }
		    }
		    }
		?>
</body>
</html>