<?php
        if(isset($_POST['login-submit']))
        {
           require 'dbh.inc.php';
           
           
            $username=mysqli_real_escape_string($conn,$_POST['username']);
            
            $pass=mysqli_real_escape_string($conn,$_POST['pass']);
        
    
    
            if(empty($username) || empty($pass))
            { 
               header("Location: ../login.php?error=emptyfeilds&username=".$username);
               exit();
                        
            
            }
            else
                {
                    $sql="SELECT * FROM users WHERE uid=? OR email=?;";
                 $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$sql))
               {
                    header("Location: ../login.php?error=sqlerror");
                    exit();
                   echo "SQL Statement failed";
                 }
                else
                 {
                    mysqli_stmt_bind_param($stmt,"ss",$username,$username);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);            
                    if($row = mysqli_fetch_assoc($result))
                    {
                    
                    $pwdcheck = password_verify($pass,$row['pass']);
            
                
                    if($pwdcheck == false)
                     {
                     header("Location: ../login.php?login=wrngpass");
                     exit();
                    
                    }
                    else if($pwdcheck == true)
                    {
                     
                     session_start();
                     $_SESSION['id']=$row['id'];
                     $_SESSION['sid']=$row['uid'];
                     $_SESSION['user']=$username;
                     header("Location: ../search.php?login=success");
                      exit();
                    
                    }
                    else{
                    
                    
                     header("Location: ../login.php?login=wrngpass");
                     exit();
                    
                    }
                    
                    }
                      else{
    
                    header("Location: ../login.php?login=nouser");
                       exit();            
              
                    
                    }
                    
                    
                    }
             }

        }
        else{
        
         header("Location: ../login.php");
                exit();            
            
        }