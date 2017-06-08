  <div class="row">

  <div class="navbar navbar-default navbar-inverse"  role="navigation">
  
  <div class="container">
    <div class="nav-header">

      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
  
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>

      </button>
  
      <a href="#" class="navbar-brand">Blog</a>

    </div>
  
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
              <li ><a href='?controller=pages&action=home'>Home</a></li>
            <li class="active "><a href='?controller=posts&action=index'>Blog</a></li>
           <li><a href='?controller=pages&action=register'>Register</a></li>

           <li><a href='?controller=pages&action=login'>Login</a></li>


         <li class="dropdown"> 

          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php if (isset($_SESSION['user_name'])) {
          echo $_SESSION['user_name'];
          } ?><b class="caret"></b></a>

        <ul class="dropdown-menu">
        
          <li ><a href="dog.html">Dogs</a></li>
          <li><a href="cat.html">Cats</a></li>
          <li><a href="other.html">Other animals</a></li>
          

        </ul>



            </li>
        </ul>
  

        <form class="navbar-form navbar-right" role="search">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="     Search">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
             </form>




      </div>


  </div>

</div>
  </div>