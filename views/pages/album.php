
<?php session_start(); ?>
<?php 

if (isset($_SESSION['name'])) {
	$user_name=$_SESSION['name'];
}

 
  $user_id=Model::getUserIdByUserName($user_name);
  $album_name=Model::getAlbumNameByUserId($user_id);

     



 ?>

<div class="container">
	
<?php include 'header.php'; ?>
 <section id="portfolio">
	      <div class="container wow fadeInUp">
	        <div class="row">
	          <div class="col-md-12">
	            <h3 class="section-title">Photo Album</h3>
	            <div class="section-title-divider"></div>
	          </div>
	        </div>
	        
	        <div class="row">
	        <?php while($row=mysqli_fetch_array($album_name)){ 
                $albumid=$row['id'];
                $albumname=$row['album_name'];
  

                $Getphoto=Model::GetphotoByAlbumId($albumid);
                $run=mysqli_fetch_array($Getphoto);
                $pic=$run['location'];
	        	?>

	          <div class="col-md-3">
	            <a class="portfolio-item" style="background-image: url(upload/<?php echo $pic; ?>);" href="">
	              <div class="details">
	                <h4>Photo 1</h4>
	                <span>In Sopnopuri</span>
	              </div>
	            </a>
	          </div>
	        <?php  }?>
	          
	        </div>
	      </div>
	    </section>


</div>