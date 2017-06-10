



  <div class="navbar navbar-inverse navbar-static-top">
 
 <div class="container">
 
 <a href="#" class="navbar-brand">Upload Your file</a> <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse"></button>

      <div class="collapse navbar-collapse navHeaderCollapse">

       <ul class="nav navbar-nav">
           <?php if (isset($_SESSION['name'])) {
            
            ?>
           <li class="active"><a href='?controller=pages&action=album'>All Albums</a></li>
               <?php } ?>
              <?php if (!isset($_SESSION['name'])) {
            
            ?>
           <li><a href='?controller=pages&action=home'>Home</a></li>
               <?php } ?>

            <?php if (!isset($_SESSION['name'])) {
            
            ?>
           <li><a href='?controller=pages&action=register'>Register</a></li>
           <?php } ?>

        
         </ul>
         <?php if (isset($_SESSION['name'])) {
            
             $name=$_SESSION['name'];
           ?>
         <ul class="nav navbar-nav navbar-right">
         <li class="dropdown"> 

          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php 
          
          echo $name;
           ?><b class="caret"></b></a>

        <ul class="dropdown-menu">
        
         <li ><a href="?controller=pages&action=create_album">Add New Album</a></li>
          <li><a href="?controller=pages&action=upload">Upload Photo</a></li>
            <li><a href="?controller=pages&action=my_album">My Album</a></li>
          <li><a href="?controller=pages&action=logout">Log Out</a></li>
          

        </ul>



            </li>
        </ul>
   <?php } ?>
   
   
      </div>
    </div>
  </div>