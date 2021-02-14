<?php
    
        if(isset($_POST['signup-submit']))
        {
        
               require '../includes/dbh.inc.php';
               
               
              $uid= mysqli_real_escape_string($conn,$_POST['username']);
               $email =  mysqli_real_escape_string($conn,$_POST['email']);
               $pwd1 = mysqli_real_escape_string($conn,$_POST['pwd1']);
               $pwd2 = mysqli_real_escape_string($conn,$_POST['pwd2']);
           
               if(empty($uid)||empty($email)||empty($pwd1)||empty($pwd2))
                {
                    header("Location: ../signup.php?error=emptyfeilds&username".$username."&mail".$email);
                    exit();                       
                }           
                else if(!filter_var($email,FILTER_VALIDATE_EMAIL))
                {
                header("Location: ../signup.php?error=invalidemail&$username".$username."&mail".$email);
                    exit();                       
                }
                else if($pwd1 !== $pwd2)
                {
                    header("Location: ../signup.php?error=pwdmissmatch");
                    exit();            
                }
                else
                {
                    $sql="SELECT uid FROM users WHERE uid=?;";
                    $stmt=mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt,$sql))
                    {
                    
                      header("Location: ../signup.php?error=sqlprepare_error");
                    exit();    
                    } 
                    else 
                    {
                            mysqli_stmt_bind_param($stmt,"s",$uid);
                            mysqli_stmt_execute($stmt);
                            mysqli_stmt_store_result($stmt);
                            $resultcheck = mysqli_stmt_num_rows($stmt);
                            if($resultcheck > 0)
                            {
                                 header("Location: ../signup.php?error=useralready_taken");
                    exit();  
                            
                            }
                            else
                            {
                             $sql = "insert into users(uid,email,pass) values(?,?,?);";
                             $stmt = mysqli_stmt_init($conn);
                            if(!mysqli_stmt_prepare($stmt,$sql))
                            {
                            
                                 header("Location: ../signup.php?error=sqlinputerror");
                    exit();                              
                            
                            }
                            
                            else
                            {
                             $hashed_pwd=password_hash($pwd1,PASSWORD_DEFAULT);                 
                                 mysqli_stmt_bind_param($stmt,"sss",$uid,$email,$hashed_pwd);
                                mysqli_stmt_execute($stmt);
                    
                             header("Location: ../signup.php?signup=success");
                    
                                            
                            
                            }
                            
                            }
                
                    }               
                }
           
  mysqli_stmt_close($stmt);
  mysqli_close($conn); 
               
        }
        else
        {
              header("Location: ../signup.php");
                exit();            
            
        
        
        }