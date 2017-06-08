<?php
  class PagesController {
    public function home() {
  
      require_once('views/pages/home.php');
    }

     public function album() {
      
      require_once('views/pages/album.php');
    }

     public function create_album() {
      
      require_once('views/pages/create_album.php');
    }


     public function upload() {
      
      require_once('views/pages/upload.php');
    }

    public function register(){


      require_once('views/pages/register.php');
    }

 
  

    public function logout(){


      require_once('views/pages/logout.php');
    }
    public function error() {
      require_once('views/pages/error.php');
    }
  }
?>