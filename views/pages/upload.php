
<?php session_start(); ?>

<?php 
if (isset($_SESSION['name'])) {
	$user_name=$_SESSION['name'];
}

 
  $user_id=Model::getUserIdByUserName($user_name);
  $album_name=Model::getAlbumNameByUserId($user_id);

     

if (isset($_POST['upload'])) {

	$name=$_POST['name'];
	$albumid=$_POST['Id'];
	$date=date("Y-m-d h:i:sa");
	
	//image
       $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
       $image_name = addslashes($_FILES['image']['name']);
       $image_size = getimagesize($_FILES['image']['tmp_name']);

       move_uploaded_file($_FILES["image"]["tmp_name"], "upload/" . $_FILES["image"]["name"]);
       $location = "upload/" . $_FILES["image"]["name"];
     if (empty($name) or empty($albumid)) {
     	$errormsg="Pls fill up the all";
     }
     else{

     	 	$addphoto=Model::AddNewPhoto($albumid,$name,$location,$date);
     	if ($addphoto) {
     		$successmsg="Photo Upload Successful";
     	}
     	else{

     		$errormsg="Something Wrong to your photo";
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


        <?php echo !empty($errormsg)?'<div class="flash alert-danger">
        <p class="panel-body">'.$errormsg.'</p>
      </div>':''; ?>
	          <div class="jumbotron">

   <div class="panel panel-info">
                <div class="panel-heading">Upload Photo</div>
                <div class="panel-body">
        
                        <form role="form" method="POST" action="?controller=pages&action=upload" enctype="multipart/form-data">
                        

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