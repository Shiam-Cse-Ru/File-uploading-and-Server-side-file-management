
<?php session_start(); ?>

<?php 

if (isset($_SESSION['name'])) {
	$user_name=$_SESSION['name'];
}

if (isset($_POST['submit'])) {
	$name=$_POST['name'];
	  $date=date("Y-m-d h:i:sa");
	if (empty($name)) {
		$statusMsg="Please enter the album name";
	}
	else{

      $user_id=Model::getUserIdByUserName($user_name);
      $CreateAlbum=Model::CreateNewAlbum($name,$user_id,$date);
      if ($CreateAlbum) {
      	$create="Album Create successfull";
      }
      else{

      	$statusMsg="Album Not Create";
      }
echo $user_id;
	}
}


 ?>

<div class="container">
	
<?php include 'header.php'; ?>
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
	        
	           <?php echo !empty($create)?'<div class="flash alert-success">
        <p class="panel-body">'.$create.'</p>
      </div>':''; ?>


        <?php echo !empty($statusMsg)?'<div class="flash alert-danger">
        <p class="panel-body">'.$statusMsg.'</p>
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
                                <input type="submit" name="submit" class="btn btn-primary">
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