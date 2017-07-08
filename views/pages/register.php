<?php session_start(); ?>
<?php 

                  $errmsg="";

                    if (isset($_POST['submit'])) {

                            if (trim($_POST['name'])=='' || trim($_POST['email'])=='' || trim($_POST['password'])=='') {
                                $errmsg = "Please fill all the fields with valid data.";
                            } 

                            else {
                                $name = trim($_POST['name']);
                                $email = trim($_POST['email']);
                                $password = trim($_POST['password']);
                               
                               $date=date("Y-m-d h:i:s",strtotime('+4 hour'));


                                if (Model::checkForExistingEmail($email)) {
                                   $errmsg="The provided email is unavailable.pls enter different email.";
                                } 

                            
                                else {
                                      
                             if (Model::checkForExistingName($name)) {
                              $errmsg="The provided name is unavailable.pls enter different name.";
                                }

                         

                                else{
                                   
                                       $password = md5($password);
                                    if (Model::CreateNewuser($name, $email, $password,$date)) {
                                         //$user_id = getUserIdByUserName($name);
                                         $_SESSION['email'] = $email;
                                         header('Location: ?controller=pages&action=home');

                                    }

                                    else {
                                  $errmsg="Unknown Problem occured.";
              
                                       }
                                }
                            }
                            }
                            
                        }

                        else {
                           //header("Location: ?controller=pages&action=register");
                        }

 ?>


<?php include 'header.php'; ?>
<div class="container">
    
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
           
      <?php echo !empty($errmsg)?'<div class="flash alert-danger">
        <a href="" class="close" data-dismiss="alert">×</a>

        <p class="panel-body">'.$errmsg.'</p>
      </div>':''; ?>
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
                                <input type="submit" name="submit" class="btn btn-primary" value="Register">
                                    
                               

                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>