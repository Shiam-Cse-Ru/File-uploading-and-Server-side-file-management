
<?php session_start(); ?>

<?php 
if (isset($_SESSION['name'])) {
	$user_name=$_SESSION['name'];
}

 
  $user_id=Model::getUserIdByUserName($user_name);
  $album_name=Model::getMyAlbumByUserId($user_id);

     

if (isset($_POST['upload'])) {

	$name=$_POST['name'];
	$albumid=$_POST['Id'];
	$date=date("Y-m-d h:i:sa");
	
	//image
 
       $tmp_dir = $_FILES['image']['tmp_name'];
       $imgFile =$_FILES['image']['name'];
       $imgSize = $_FILES['image']['size'];

	
	   if(empty($name)){
			$errMSG = "Please Enter name.";
		}
		else if(empty($albumid)){
			$errMSG = "Please select album name.";
		}
		else if(empty($imgFile)){
			$errMSG = "Please Select Image File.";
		}

	else
		{
			$upload_dir = 'upload/'; // upload directory
	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		
			// valid image extensions
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		
			// rename uploading image
			$userpic = rand(1000,1000000).".".$imgExt;
				
			// allow valid image file formats
			if(in_array($imgExt, $valid_extensions)){			
				// Check file size '5MB'
				if($imgSize < 5000000)				{
					  move_uploaded_file($_FILES["image"]["tmp_name"], "upload/" .$userpic);
                  $location = "upload/" . $_FILES["image"]["name"];
				}
				else{
					$errMSG = "Sorry, your file is too large.";
				}
			}
			else{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}
		}


			if(!isset($errMSG))
		{
		       
     	 	$addphoto=Model::AddNewPhoto($albumid,$name,$userpic,$date);

     	if ($addphoto) {
     		$successmsg="Photo Upload Successful";
     	}
     	else{

     		$errMSG="Something Wrong to your photo";
     	}	
		}


      
    
}


 ?>

<div class="container">
	
<?php include 'header.php'; ?>
 <section id="portfolio">
	      <div class="container wow fadeInUp">
	        <div class="row">
	          <div class="col-md-12">
	            <h3 class="section-title">Upload Your Photo</h3>
	            <div class="section-title-divider"></div>
	          </div>
	        </div>
	        
	        <div class="row">
	        <div class="col-md-8  col-md-offset-2">
	        
	           <?php echo !empty($successmsg)?'<div class="flash alert-success">
        <p class="panel-body">'.$successmsg.'</p>
      </div>':''; ?>


        <?php echo !empty($errMSG)?'<div class="flash alert-danger">
        <p class="panel-body">'.$errMSG.'</p>
      </div>':''; ?>
	          <div class="jumbotron">

   <div class="panel panel-info">
                <div class="panel-heading">Upload Photo</div>
                <div class="panel-body">
        
                        <form role="form" method="post" enctype="multipart/form-data">
                        

                            <div class="form-group">
                                <label class=" control-label">Photo Name</label>
                                <input type="text" class="form-control" name="name" required="">

                               
                            </div>

                         
                            <div class="form-group">
                                <label class=" control-label">Select Album</label><br>
                                <select name="Id">
                                	
                                	<?php  while ($row=mysqli_fetch_array($album_name)) {
          								 $albumid=$row['id'];
         								 $albumname=$row['album_name'];
     										
                                         echo "<option value='$albumid'>$albumname</option>";
        									   	}  ?>
                                </select>
                            
                            </div>

                            <div class="form-group">
                                <label class=" control-label">Choose Photo</label>
                                <input type="file" class="form-control" name="image" required="">

                               
                            </div>

                            <div class="form-group">
                                <input type="submit" name="upload" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i>
                                </input>

                            </div>
                        </form>
                </div>
            </div>
  </div>
  </div>
	        
	          
	          
	            
	           
	          
	        </div>
	      </div>
	    </section>







</div>