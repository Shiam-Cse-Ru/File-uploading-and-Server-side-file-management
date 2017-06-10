
<?php session_start(); ?>
<?php 

if (isset($_SESSION['name'])) {
	$user_name=$_SESSION['name'];
}

 
  $GetAllPhotos=Model::GetAllPhotosByalbumId($_GET['id']);


     



 ?>


<?php include 'header.php'; ?>
<div class="container">

 <section id="portfolio">
	      <div class="container wow fadeInUp">
	        <div class="row">
	          <div class="col-md-12">
	            <h3 class="section-title">All Photos</h3>
	            <div class="section-title-divider"></div>
	          </div>
	        </div>
	        
	        <div class="row">

	        <?php
         if ($GetAllPhotos) {
         
        

	         while($row=mysqli_fetch_array($GetAllPhotos)){ 
	        	
                $url=$row['location'];
                $name=$row['name'];
                $created_date=$row['created_date'];
       
	        	?>

	          <div class="col-md-3 text-center">
	            <a class="portfolio-item" style="background-image: url(upload/<?php echo $url; ?>);" href="upload/<?php echo $url; ?>">
	              <div class="details">
	                
	              <h4><?php echo $name; ?></h4>
	              <p>Created Date<br><?php echo $created_date; ?></p>
	              </div>
          
	            </a>

	          </div>

	        <?php } }   else{?>
           
    	    <div class="row">
	    <div class="col-md-8 col-md-offset-2 text-center">
	    <div class="panel panel-info text-center">
	    	<?php  
         	echo "<h2>You have No Photos</h2>
               </div>
      <a class='btn btn-info' href='?controller=pages&action=upload'>Upload Photo</a>

         	";
     	 
        }

       ?>


	    </div>	

	    </div>
	        </div>
	      </div>
	    </section>

</div>
<?php include 'footer.php'; ?>

