<?php session_start(); ?>

<div class="container">
<?php include 'header.php'; ?>


<div class="row">
<div class="col-md-10 col-md-offset-1">

<div class="panel panel-default">
  <div class="panel-heading">
    <h3>Latest Posts</h3>
  </div>
  <div class="panel-body">
 <div class="">

 <?php 
$_SESSION['allposts']=$posts;
 if (isset($_SESSION['allposts'])) {

  while($post=mysqli_fetch_array($posts)) { ?>
    <div class="list-group">
    <div class="list-group-item">
      <h3><a href="#">  <h3><?php echo $post['title']; ?></h3></a>
              </h3>
      <p>Jun 02,2017 at 01:59 pm By <a href="#">shiam</a></p>
      
    </div>
    <div class="list-group-item">
      <article>
        <p><?php echo $post['content']; ?></p>
   <p> <a href='?controller=posts&action=show&id=<?php echo $post['id']; ?>' class="btn btn-primary">Read More</a></p>
      </article>
    </div>
  </div>
<?php } }

else{

 echo "<div class='alert alert-info'>
  <strong>Opps!</strong> There is no post available.
</div>";

}


?>
    
    
</div>
  </div>
</div>

</div>
</div>
 <footer>
  <nav class="navbar navbar-default navbar-inverse" style="background-color: #4B77BE;"  role="navigation">
   

      <p class="text-center"><b>Copyright@Abdullah Al Shiam</b></p>

    </nav>
    </footer>
</div><!-- end container -->
  
