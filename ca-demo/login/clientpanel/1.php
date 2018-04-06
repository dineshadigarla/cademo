<?php  
        include('header.php');
        //include('sidebar.php');
        class Files{
        public $filename;
        public $fileextension;
        public function __construct($filename,$fileextension){
           $this->filename=$filename;
           $this->fileextension=$fileextension;
        }
        }
        $final=array();
           $image=$_FILES['fileupload'];
           //print_r($image);
           $filename=$_FILES['fileupload']['name'];
           $filetmp=$_FILES['fileupload']['name'];
           $filetmpname=$_FILES['fileupload']['tmp_name'];
           $filesize=$_FILES['fileupload']['size'];
           $fileerror=$_FILES['fileupload']['error'];
           $fileType=$_FILES['fileupload']['type'];
           $fileext=explode('.',$filename);
           $fileActualExt=strtolower(end($fileext));
           $filenames=$fileext[0];
           //echo $filenames;
           $allowed=array('xls','doc','pdf','docx','xlsx');
           if(in_array($fileActualExt,$allowed)){
        	   if($fileerror===0){
        		   if($filesize<51000000){
        			   $filenamenew=$filenames.'.'.$fileActualExt;
        			   $fileDestination='uploads/'.$filenamenew;
        			   move_uploaded_file($filetmpname,$fileDestination);
        			   include('../database/db_conection.php');
        			   //$myobj=new Files($filename,$fileActualExt);
        			   //array_push($final,$myobj);
        			   $final=json_encode($final);
        			   $username=$_SESSION['username'];
                       $query5 = mysqli_query($conn,"insert into fileupload(filename,extension,uploadedby) values('$filenames','$fileActualExt','$username')");
                       if($query5)
        			   {
        				   //echo "Success";
        				    $_SESSION['msg']='Your files have been successfully uploaded.';
                            echo "<script>window.open('uploadfile.php','_self')</script>";
        			    
        			   }					 
        			      
        		   }
        		   else{
        		        $_SESSION['msg']='File Size Exceeded';
                        echo "<script>window.open('uploadfile.php','_self')</script>";
        		   }
        	   }
           }
           else{
                $_SESSION['msg']='Please select only pdf,xls,xlsx,doc,docx format only to upload.';
                echo "<script>window.open('uploadfile.php','_self')</script>";
           }
             include('footer.php');
          ?>
