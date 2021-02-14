<?php
        if(isset($_POST['admin-submit']))
        {
           require 'dbh.inc.php';
           
           
            $username=mysqli_real_escape_string($conn,$_POST['username']);
            
            $pass=mysqli_real_escape_string($conn,$_POST['password']);
        
    
    
            if(empty($username) || empty($pass))
            { 
               header("Location: ../admin.php?error=emptyfeilds&username=".$username);
               exit();
                        
            
            }
            else
                {
                    $sql="SELECT * FROM admin WHERE uid=? OR email=?;";
                 $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$sql))
               {
                    header("Location: ../admin.php?error=sqlerror");
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
                        if($pass == $row['password'])
                        {
                         $pwdcheck = true;
                         echo $pwdcheck;
                         }
                         else
                         {
                          $pwdcheck = false;
                          echo $pwdcheck;
                         }
                
                       if($pwdcheck == false)
                                {
                                 header("Location: ../admin.php?login=wrngpass");
                                    exit();
                    
                                    }
                                else if($pwdcheck == true)
                                {
                               
                                 session_start();
                              $_SESSION['a_id']=$row['id'];
                             $_SESSION['a_sid']=$row['uid'];
                             $_SESSION['user']=$username;
                             header("Location: ../a_search.php?login=success");
                                      exit();
                    
                                }
                                else{

                                 header("Location: ../admin.php?login=wrngpass");
                                exit();
                    
                                     }
                    
                    }
                      else{
    
                    header("Location: ../admin.php?login=nouser");
                       exit();            
              
                    
                    }
                    
                    
                    }
             }

        }
        else{
        
         header("Location: ../admin.php");
                exit();            
            
        }