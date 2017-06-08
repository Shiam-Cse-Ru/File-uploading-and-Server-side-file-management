<?php session_start(); ?>
<?php 

if (isset($_SESSION['user_name'])) {
	$user_name=$_SESSION['user_name'];

}

       $user_id=Model::getUserIdByUserName($user_name);
       $posts = Model::my_post($user_id);
       $username=Model::getUserNameByUserId($user_id);
      $_SESSION['my_post_success']=$posts;
 ?>

 <div class="container">
<?php include 'header.php'; ?>

<?php if (isset($_SESSION['delete_success'])) {
 echo'<div class="flash alert-info">
        <p class="panel-body">
          Post Successfully Delete
        </p>
      </div>';
      unset($_SESSION['delete_success']);
} 
else if(isset($_SESSION['delete_error'])){
 echo'<div class="flash alert-info">
        <p class="panel-body">
          Something wrong
        </p>
      </div>';
     unset($_SESSION['delete_error']);
}


      ?>

<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">
  <div class="panel-heading">
    <h3>My Posts</h3>
   
  </div>
  <div class="panel-body">
 <div class="">

 <?php if (isset($_SESSION['my_post_success'])) {
 
  while($post=mysqli_fetch_array($posts)) { ?>
    <div class="list-group">
    <div class="list-group-item">
      <h3><a href="#">  <h3><?php echo $post['title']; ?></h3></a>
              </h3>
      <button class="btn btn-default" style="float: right"><a href="?controller=pages&action=edit_post&id=<?php echo $post['id']; ?>">Edit Post</a></button>

      <p>Jun 02,2017 at 01:59 pm By <a href="#"> <?php echo $username['user_name'];?></a></p>
      

    </div>
    <div class="list-group-item">
      <article>
        <p><?php echo $post['content']; ?></p>
   <p> <a href='?controller=posts&action=show&id=<?php echo $post['id']; ?>' class="btn btn-primary">Read More</a></p>
      </article>
    </div>
  </div>
<?php 
} 
}

else{

echo "<div class='alert alert-info'>
  <strong>Opps!</strong> You have no post available.
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
  



  
