<?php session_start(); ?>
<?php 

$message="";

                    if (isset($_POST['submit'])) {

                            if (trim($_POST['name'])=='' || trim($_POST['email'])=='' || trim($_POST['password'])=='') {
                                $message = "Please fill all the fields with valid data.";
                            } 

                            else {
                                $name = trim($_POST['name']);
                                $email = trim($_POST['email']);
                                $password = trim($_POST['password']);
                                $date=date("Y-m-d h:i:sa");
                                if (Model::checkForExistingEmail($email)) {
                                    $_SESSION['registration_error'] = "<span class='error'>The provided email is unavailable. Enter a different email.</span>";
                                      header("Location: ?controller=pages&action=register");
                                } 

                                else {
                                    $password = md5($password);
                                    if (Model::CreateNewuser($name, $email, $password,$date)) {
                                         //$user_id = getUserIdByUserName($name);
                                         $_SESSION['email'] = $email;
                                            header('Location: ?controller=pages&action=home');

                                    }

                                    else {
              $_SESSION['registration_error'] = "<span class='error'>Unknown problem occured. Try again.</span>";
              header("Location: ?controller=pages&action=register");
            }
                                }
                            }
                            
                        }

                        else {
                           //header("Location: ?controller=pages&action=register");
                        }

 ?>


<div class="container">
    <?php include 'header.php'; ?>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <?php if (isset($_SESSION['registration_error'])) {
           
         ?>
       <div class="flash alert-danger">
        <p class="panel-body"><?php echo $_SESSION['registration_error']; ?></p>
      </div>
      <?php } ?>
            <div class="panel panel-info">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                        
                        <form role="form" method="post" action="?controller=pages&action=register">
                        
                              <div class="form-group">
                                <label class=" control-label">Name</label>
                                <input type="name" class="form-control" name="name" value="" required="">

                                
                            </div>

                            <div class="form-group">
                                <label class=" control-label">E-Mail Address</label>
                                <input type="email" class="form-control" name="email" value="" required="">

                                
                            </div>

                            <div class="form-group">
                                <label class=" control-label">Password</label>
                                <input type="password" class="form-control" name="password" required="">

                               
                            </div>

                        

                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-primary">
                                    
                               

                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>

