
<?php session_start(); ?>

<?php 

if (isset($_SESSION['user_name'])) {
    $user_name=$_SESSION['user_name'];
}

if (isset($_POST['public'])) {
     if (trim($_POST['name'])=='') {
                                $errmsg = "Please fill all the fields with valid data.";
                            } 

                              else {
                                $name = trim($_POST['name']);
                                
                                $Id=$_GET['id'];
                      
                                  // $userid=Model::getUserIdByUserName($user_name);
                                     
                                    if (Model::UpdateAlbumPublic($Id,$name)) {
                                        
                                    $successmsg="Album update successfully saved in public.";


                                    }

                                    else {
                                    $errmsg="Unknown problem occured.";

                                    }
                             

                            }

}


if (isset($_POST['private'])) {
     if (trim($_POST['name'])=='') {
                                $errmsg = "Please fill all the fields with valid data.";
                            } 

                              else {
                                $name = trim($_POST['name']);
                               
                                $Id=$_GET['id'];
                      
                                  // $userid=Model::getUserIdByUserName($user_name);
                                     
                                    if (Model::UpdateAlbumPrivate($Id,$name)) {
                                        
                                      $successmsg="Album update and successfully saved in private.";

                                    }

                                    else {
                                        $errmsg="Unknown problem occured.";
                                  }
                             

                            }

}


 ?>

 <?php 

$AlbumName=Model::GetAlbumNameByAlbumId($_GET['id']);
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
          
             <?php echo !empty($successmsg)?'<div class="alert alert-success">
              <a href="" class="close" data-dismiss="alert">×</a>
        <p>'.$successmsg.'</p>
      </div>':''; ?>


        <?php echo !empty($errmsg)?'<div class="alert alert-danger">
        <p>'.$errmsg.'</p>
      </div>':''; ?>
            <div class="jumbotron">

   <div class="panel panel-info">
                <div class="panel-heading">Create Album</div>
                <div class="panel-body">
        
                        <form role="form" method="POST" action="">
                        

                            <div class="form-group">
                                <label class=" control-label">Album Name</label>
                                <input type="text" class="form-control" name="name" value="<?php echo $AlbumName['album_name']; ?>" required="">

                               
                            </div>

                         

                            <div class="form-group">
                                <input type="submit" name="public" class="btn btn-primary" value="Publish">
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
