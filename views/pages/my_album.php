
<?php session_start(); ?>
<?php 

if (isset($_SESSION['name'])) {
	$user_name=$_SESSION['name'];
}

 
  $user_id=Model::getUserIdByUserName($user_name);
  $album_name=Model::getMyAlbumByUserId($user_id);

     



 ?>

<?php include 'header.php'; ?>
<div class="container">
	
 <section id="portfolio">
	      <div class="container wow fadeInUp">
	        <div class="row">
	          <div class="col-md-12">
	            <h3 class="section-title">My Albums</h3>
	            <div class="section-title-divider"></div>
	          </div>
	        </div>
	        
	        <div class="row">
	        

	        <?php
        if ($album_name) {
        	
   

	         while($row=mysqli_fetch_array($album_name)){ 
	        	
                $albumid=$row['id'];
                $albumname=$row['album_name'];
                $created_date=$row['created_date'];
                $userid=$row['user_id'];
                $Getphoto=Model::GetphotoByAlbumId($albumid);
                $GetUserName=Model::GetUserName($userid);
	        	?>

	          <div class="col-md-3" style="text-align: center;">
	          <div class="panel panel-body panel-info">
	            <a class="portfolio-item" style="background-image: url(upload/<?php echo $Getphoto['location']; ?>);" href="?controller=pages&action=my_photos&id=<?php echo $albumid; ?>" ">
	              <div class="details">
	              <h4>Created By: <?php echo $GetUserName[0]; ?></h4>
	                <h4>Album Name: <?php echo $albumname; ?></h4>
	                <p>Created Date<br><?php echo $created_date; ?></p>
	              </div>
                 
	            </a>


	               <a class="btn btn-warning" href="?controller=pages&action=delete&id=<?php echo $albumid; ?>" >Delete</a>
                   <a class="btn btn-info" href="?controller=pages&action=edit_album&id=<?php echo $albumid; ?>">Edit Album</a>

	          </div>
              </div>
	        <?php } }  else{?>

            
    
	        </div>
	      </div>
	    </section>

	    <div class="row">
	    <div class="col-md-8 col-md-offset-2 text-center">
	    <div class="panel panel-info text-center">
	    	<?php  
         	echo "<h2>You have No album</h2>
         	</div>
              <a class='btn btn-info' href='?controller=pages&action=create_album'>Create Album</a>

         	";
     	 
        }

       ?>


	    </div>	

	    </div>


</div>

<?php include 'footer.php'; ?>