
<?php session_start(); ?>

<?php 

if (isset($_SESSION['name'])) {
	$user_name=$_SESSION['name'];
}

if (isset($_POST['submit'])) {
	$name=$_POST['name'];
	  $date=date("Y-m-d h:i:sa");
	if (empty($name)) {
		$errmsg="Please enter the album name";
	}
	else{
       $i=1;
      $user_id=Model::getUserIdByUserName($user_name);
      $CreateAlbum=Model::CreateNewAlbum($name,$user_id,$i,$date);
      if ($CreateAlbum) {
      $successmsg="Album Create successfull.Now Upload Photo ";
      }
      else{

      	$errmsg="Album Not Create";
      }

	}
}


if (isset($_POST['private'])) {
	$name=$_POST['name'];
	  $date=date("Y-m-d h:i:sa");
	if (empty($name)) {
		$errmsg="Please enter the album name";
	}
	else{
      $i=0;
      $user_id=Model::getUserIdByUserName($user_name);
      $CreateAlbum=Model::CreateNewAlbum($name,$user_id,$i,$date);
      if ($CreateAlbum) {
      	$successmsg="Album Create successfull.Now Upload Photo <a href='?controller=pages&action=upload' class='btn btn-primary'>";
      }
      else{

      	$errmsg="Album Not Create";
      }

	}
}


 ?>

<?php include 'header.php'; ?>
<div class="container">

 <section id="portfolio">
	      <div class="container wow fadeInUp">
	        <div class="row">
	          <div class="col-md-12">
	            <h3 class="section-title">Create New Album</h3>
	            <div class="section-title-divider"></div>
	          </div>
	        </div>
	        
	        <div class="row">
	        <div class="col-md-8  col-md-offset-2">
	        
	           <?php echo !empty($successmsg)?'<div class="flash alert-success">
        <p class="panel-body">'.$successmsg.' <a href="?controller=pages&action=upload" class="btn btn-primary">Upload</a></p>
      </div>':''; ?>


        <?php echo !empty($errmsg)?'<div class="flash alert-danger">
        <p class="panel-body">'.$errmsg.'</p>
      </div>':''; ?>
	          <div class="jumbotron">

   <div class="panel panel-info">
                <div class="panel-heading">Create Album</div>
                <div class="panel-body">
        
                        <form role="form" method="POST" action="?controller=pages&action=create_album">
                        

                            <div class="form-group">
                                <label class=" control-label">Album Name</label>
                                <input type="text" class="form-control" name="name" required="">

                               
                            </div>

                         

                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-primary" value="Publish">
                                    <i class="fa fa-btn fa-sign-in"></i>
                                </input>
                                <div class="pull-right">
                                     <input type="submit" name="private" class="btn btn-info" value="Private">
                                    
                                </input>
                                </div>
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

<?php include 'footer.php'; ?>