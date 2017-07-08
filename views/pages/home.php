<?php session_start(); ?>
<?php 

 if (isset($_POST['submit'])) {
                            if (trim($_POST['email'])=='' || trim($_POST['password'])=='') {
                                $errmsg = "Please fill all the fields with valid data.";
                            } else {
                                $email = trim($_POST['email']);
                                $password = trim($_POST['password']);
                                $password = md5($password);

                                $user = Model::checkForUser($email);

                                if ($user == null) {
                                   $errmsg="Wrong username or password.";

                                } else {
                                    $name=Model::getUserNameByUserEmail($email);
                                    $_SESSION['name'] = $name;
                                    $successmessage = "Logging-in successful.";
                                     echo"<script>window.open('?controller=pages&action=album','_self')</script>";
                                }
                            }
                            
                        }





 ?>




 <?php include 'header.php'; ?>
<div class="container">
   
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
       <?php if (isset($_SESSION['email'])) {
           
         ?>
       <div class="alert alert-success">
      <a href="" class="close" data-dismiss="alert">×</a>
        <p><?php echo "Registration Successful.Please Login"; ?></p>
      </div>
      <?php } ?>

      <?php if (!empty($errmsg)) {
           
         ?>
       <div class="alert alert-danger">
      <a href="" class="close" data-dismiss="alert">×</a>
        <p><?php echo $errmsg; ?></p>
      </div>
      <?php } ?>
            <div class="panel panel-info">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
        
                        <form role="form" method="POST" action="?controller=pages&action=home">
                        

                            <div class="form-group">
                                <label class=" control-label">E-Mail Address</label>
                                <input type="email" class="form-control" name="email" value="">

                                
                            </div>

                            <div class="form-group">
                                <label class=" control-label">Password</label>
                                <input type="password" class="form-control" name="password">

                               
                            </div>

                        

                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-primary" value="Login">
                                    <i class="fa fa-btn fa-sign-in"></i>
                                </input>

                              
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>


 <?php include 'footer.php'; ?>