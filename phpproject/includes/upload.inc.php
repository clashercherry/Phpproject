<?php
    if(isset($_POST['file-submit']))
    {
        require '../includes/dbh.inc.php';
        $file = $_FILES['file'];
        
       // print_r($file);
       
        $filename = $_FILES['file']['name'];  
        $filetmpname = $_FILES['file']['tmp_name'];  
        $filesize = $_FILES['file']['size'];
        $fileerror=$_FILES['file']['error'];
        $filetype = $_FILES['file']['type'];     
        
        $fileext = explode('.',$filename);
        $fileactualtext = strtolower(end($fileext));
        $file_destination = base64_encode(file_get_contents(addslashes($filetmpname)));
        $allowed = array('pdf','png');
        
        if(in_array($fileactualtext,$allowed))
        {
                if($fileerror === 0)
                {
                        if($filesize<2000000)
                        {
                          /* $filenamenew=uniqid('',true).".". $fileactualtext ;
                          $file_destination = '../uploads/'. $filenamenew;*/
                       /* move_uploaded_file($filetmpname,$file_destination);*/
                        $username=mysqli_real_escape_string($conn,$_POST['uname']);
                        $uid=mysqli_real_escape_string($conn,$_POST['uid']);
                        $email=mysqli_real_escape_string($conn,$_POST['email']);
                        $gname=mysqli_real_escape_string($conn,$_POST['gname']);
                        $ptitle=mysqli_real_escape_string($conn,$_POST['title']);
                        $year=mysqli_real_escape_string($conn,$_POST['year']);
         
                        
                        
                        if(empty($username)||empty($uid)||empty($email)||empty($gname)||empty($ptitle)||empty($year))
                        {
                                  header("Location: ../upload.php?error=emptyfeilds");
                                  exit();    
                        }
                        else if(!filter_var($email,FILTER_VALIDATE_EMAIL))
                        {
                                 header("Location: ../upload.php?error=invalidemail&$username".$username."&mail".$email);
                                 exit();                       
                        }
                        else
                        {
                             $sql = "insert into file(username,uid,email,gname,title,filename,year) values('$username','$uid','$email','$gname','$ptitle','$file_destination','$year');";
                            // $stmt = mysqli_stmt_init($conn);
                            //if(!mysqli_stmt_prepare($stmt,$sql))
                            //{                       
                             //    header("Location: ../upload.php?error=sqlinputerror");
                                          //exit();                              
                            //}
                            
                            //else
                            //{                 
                              //      mysqli_stmt_bind_param($stmt,"sssssbs",$username,$uid,$email,$gname,$ptitle,$file_destination,$year);
                                //    mysqli_stmt_execute($stmt);
                               //mysql_query($conn,$sql);
                                  // if( !mysqli_stmt_execute($stmt))
                                    if(!mysqli_query($conn,$sql))
                                   {
                                        header("Location: ../upload.php?error=sqlinputerror");
                                          exit();                         
                                   }
                                   else
                                     header("Location: ../search.php?upload=success");
                            // }
                    
                        }
                        }
                        else
                        {
                            echo "your file is too big!";
                            header("Location: ../upload.php?error=toobig");
                            exit();
                            
                        }
                }
                else
                {
                echo "there is an error in uploading your files";
                 header("Location: ../upload.php?error=uploading_error");
                            exit();
                
                }
        
        }
        else
        {
            echo "you can't upload files of this type";
             header("Location: ../upload.php?error=type_error");
                            exit();
        }
        
         mysqli_stmt_close($stmt);
         mysqli_close($conn);   
        
    }
    else
    {
            echo "you must login first";
             header("Location: ../upload.php?error=noone_logined");
                            exit();  
    }
    