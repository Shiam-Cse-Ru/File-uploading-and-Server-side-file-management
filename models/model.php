<?php
$message="";
  class Model {
    

    public static function all() {
     
       $db = mysqli_connect("localhost", "root", "", "simple_blog");
       $result =mysqli_query($db,'SELECT * FROM posts WHERE active=1 ORDER BY `id` DESC');
       mysqli_close($db);

     if (mysqli_num_rows($result) == 0) {
        $message="There is no posts available";
    } 
    else {

   
    return $result;
    
      }
        
    }
      
    public static function my_post($user_id) {
     
       $db = mysqli_connect("localhost", "root", "", "simple_blog");
       $result =mysqli_query($db,"SELECT * FROM posts WHERE user_id='$user_id' ");
       mysqli_close($db);

     if (mysqli_num_rows($result) == 0) {
        $message="There is no posts available";
    } 
    else {

    return $result;
    
      }
        
    }

    public static  function TotalPosts($user_id)
  {
    $db = mysqli_connect("localhost", "root", "", "simple_blog");
    $sql = "SELECT user_id FROM `posts` WHERE `user_id`='{$user_id}'";
    $result = mysqli_query($db, $sql);
    if(mysqli_num_rows($result) == true) {
    
      $row = mysqli_num_rows($result);
      return $row;
    } else {
       
      return 0;
    }
  }


    public static  function TotalPublishPosts($user_id)
  {
    $i=1;
    $db = mysqli_connect("localhost", "root", "", "simple_blog");
    $sql = "SELECT user_id FROM `posts` WHERE `user_id`='{$user_id}' AND `active`='{$i}'";
    $result = mysqli_query($db, $sql);
    if(mysqli_num_rows($result) == true) {
    
      $row = mysqli_num_rows($result);
      return $row;
    } else {
       
      return 0;
    }
  }

    public static  function TotalDraftPosts($user_id)
  {
    $i=0;
    $db = mysqli_connect("localhost", "root", "", "simple_blog");
    $sql = "SELECT user_id FROM `posts` WHERE `user_id`='{$user_id}' AND `active`='{$i}'";
    $result = mysqli_query($db, $sql);
    if(mysqli_num_rows($result) == true) {
    
      $row = mysqli_num_rows($result);
      return $row;
    } else {
       
      return 0;
    }
  }
     public static  function TotalComments($user_id)
  {
    $i=0;
    $db = mysqli_connect("localhost", "root", "", "simple_blog");
    $sql = "SELECT user_id FROM `comments` WHERE `user_id`='{$user_id}'";
    $result = mysqli_query($db, $sql);
    if(mysqli_num_rows($result) == true) {
    
      $row = mysqli_num_rows($result);
      return $row;
    } else {
       
      return 0;
    }
  }

 public static  function GetUserIdByPostId($id)
  {
  $db = mysqli_connect("localhost", "root", "", "simple_blog");
      
       $result =mysqli_query($db,"SELECT user_id FROM comments WHERE post_id='$id' ");
       mysqli_close($db);

    
     if (mysqli_num_rows($result) == 0) {
        $message="There is no posts available";
    } 
    else {

    return $result;
    
      }
  }


 public static  function GetAllPhotosByalbumId($albumid)
  {
  $db = mysqli_connect("localhost", "root", "", "file_management");
      
       $result =mysqli_query($db,"SELECT * FROM photos WHERE album_id='$albumid' ");
       mysqli_close($db);

    
     if (mysqli_num_rows($result) == 0) {
        $message="There is no posts available";
    } 
    else {

    return $result;
    
      }
  }


   public static  function GetUserNameByPostId($id)
  {
    $db = mysqli_connect("localhost", "root", "", "simple_blog");
      
       $result =mysqli_query($db,"SELECT user_name FROM user WHERE user_id='$id' ");
       mysqli_close($db);

     if (mysqli_num_rows($result) == 0) {
        $message="There is no posts available";
    } 
    else {


       $row = mysqli_fetch_assoc($result);
      return $row;
     
   
   
    
      }
  }

    public static function find($id) {
     
      $db = mysqli_connect("localhost", "root", "", "simple_blog");
      
       $result =mysqli_query($db,"SELECT * FROM posts WHERE id='$id' ");
       mysqli_close($db);

     if (mysqli_num_rows($result) == 0) {
        $message="There is no posts available";
    } 
    else {


       $row = mysqli_fetch_assoc($result);
      return $row;
     
   
   
    
      }
    }

     public static function checkForExistingName($name)
  {
    // if ($name === "admin") {
    //   return true;
    // }
    $db = mysqli_connect("localhost", "root", "", "file_management");
    $sql = "SELECT name FROM `user` WHERE `name`='{$name}'";
    $result = mysqli_query($db, $sql);
    if(mysqli_num_rows($result) == true) {
      mysqli_close($db);
      return true;
    } else {
      mysqli_close($db);
      return false;
    }
  }

  public static function checkForExistingPassword($password)
  {
    // if ($name === "admin") {
    //   return true;
    // }
    $password=md5($password);
    $db = mysqli_connect("localhost", "root", "", "file_management");
    $sql = "SELECT password FROM `user` WHERE `password`='{$password}'";
    $result = mysqli_query($db, $sql);
    if(mysqli_num_rows($result) == true) {
      mysqli_close($db);
      return true;
    } else {
      mysqli_close($db);
      return false;
    }
  }


 public static function checkForExistingEmail($email)
  {
    // if ($name === "admin") {
    //   return true;
    // }
    $db = mysqli_connect("localhost", "root", "", "file_management");
    $sql = "SELECT email FROM `user` WHERE `email`='{$email}'";
    $result = mysqli_query($db, $sql);
    if(mysqli_num_rows($result) == true) {
      mysqli_close($db);
      return true;
    } else {
      mysqli_close($db);
      return false;
    }
  }


  public static function CreateNewuser($name, $email,$password,$date)
  {

    $db = mysqli_connect("localhost", "root", "", "file_management");
    $sql = "INSERT INTO `user` (`name`,`email`,`password`,`created_date`) VALUES ('{$name}','{$email}','{$password}','{$date}')";
    $result = mysqli_query($db, $sql);
    mysqli_close($db);
    if($result) {
      return true;
    } else {
      return false;
    }
  }


    public static function CreateNewAlbum($name,$user_id,$i,$date)
  {
    
  
    $db = mysqli_connect("localhost", "root", "", "file_management");
    $sql = "INSERT INTO `album` (`user_id`,`album_name`,`action`,`created_date`) VALUES ('{$user_id}','{$name}','{$i}','{$date}')";
    $result = mysqli_query($db, $sql);
    mysqli_close($db);
    if($result) {
      return true;
    } else {
      return false;
    }
  }

 public static function checkForUser($email)
  {
    $db = mysqli_connect("localhost", "root", "", "file_management");
    $sql = "SELECT * FROM `user` WHERE `email`='{$email}'";
    $result = mysqli_query($db, $sql);
    if(mysqli_num_rows($result) == 1) {
      mysqli_close($db);
      return true;
    } else {
      mysqli_close($db);
      return false;
    }
  }

   public static function getAlbumNameByUserId() {
     
       $db = mysqli_connect("localhost", "root", "", "file_management");
       $result =mysqli_query($db,"SELECT * FROM album WHERE action='1'");
       mysqli_close($db);

     if (mysqli_num_rows($result) == 0) {
        return false;
    } 
    else {

    return $result;
    
      }
        
    }

  public static function getMyAlbumByUserId($user_id) {
     
       $db = mysqli_connect("localhost", "root", "", "file_management");
       $result =mysqli_query($db,"SELECT * FROM album WHERE user_id='$user_id'");
       mysqli_close($db);

     if (mysqli_num_rows($result) == 0) {
        return false;
    } 
    else {

    return $result;
    
      }
        
    }



  public static function DeleteAlbum($id) {
     
       $db = mysqli_connect("localhost", "root", "", "file_management");
       $result =mysqli_query($db,"DELETE FROM album WHERE id='$id'");
      

     if ($result) {
        return true;
    } 
    else {

    return false;
    
      }
        
    }


      public static function DeletePhoto($id) {
     
       $db = mysqli_connect("localhost", "root", "", "file_management");
       $result =mysqli_query($db,"DELETE FROM album WHERE id='$id'");
      

     if ($result) {
        return true;
    } 
    else {

    return false;
    
      }
        
    }


    public static function GetphotoByAlbumId($albumid) {
     
       $db = mysqli_connect("localhost", "root", "", "file_management");
       $result =mysqli_query($db,"SELECT location FROM photos WHERE album_id='$albumid' ORDER BY id DESC");
       mysqli_close($db);

     if (mysqli_num_rows($result) == 0) {
        $message="There is no posts available";
    } 
    else {
      $row=mysqli_fetch_array($result);

    return $row;
    
      }
        
    }


       public static function GetUserName($userid) {
     
       $db = mysqli_connect("localhost", "root", "", "file_management");
       $result =mysqli_query($db,"SELECT name FROM user WHERE id='$userid'");
       mysqli_close($db);

     if (mysqli_num_rows($result) == 0) {
        $message="There is no posts available";
    } 
    else {
      $row=mysqli_fetch_array($result);

    return $row;
    
      }
        
    }



  public static  function getUserNameByUserEmail($email)
  {
    $db = mysqli_connect("localhost", "root", "", "file_management");
    $sql = "SELECT name FROM `user` WHERE `email`='{$email}'";
    $result = mysqli_query($db, $sql);
    if(mysqli_num_rows($result) == 1) {
      mysqli_close($db);
      $row = mysqli_fetch_row($result);
      return $row[0];
    } else {
      mysqli_close($db);
      return 0;
    }
  }


 

   public static function checkForExistingPost($title,$content)
  {
  
    $db = mysqli_connect("localhost", "root", "", "simple_blog");
    $sql = "SELECT title FROM `user` WHERE `title`='{$title}' AND `content`='{$content}' ";
    $result = mysqli_query($db, $sql);
    if(mysqli_num_rows($result) == 1) {
      mysqli_close($db);
      return true;
    } else {
      mysqli_close($db);
      return false;
    }
  }

  public static  function getUserIdByUserName($name)
  {
    $db = mysqli_connect("localhost", "root", "", "file_management");
    $sql = "SELECT id FROM `user` WHERE `name`='{$name}'";
    $result = mysqli_query($db, $sql);
    if(mysqli_num_rows($result) == 1) {
      mysqli_close($db);
      $row = mysqli_fetch_row($result);
      return $row[0];
    } else {
      mysqli_close($db);
      return 0;
    }
  }

public static  function AddNewPhoto($albumid, $name,$location,$date)
  {
    
    $db = mysqli_connect("localhost", "root", "", "file_management");
    $sql = "INSERT INTO `photos` (`album_id`, `name`, `location`, `created_date`) VALUES ('{$albumid}', '{$name}', '{$location}', '{$date}')";
    $result = mysqli_query($db, $sql);
    mysqli_close($db);
    if($result) {
      return true;
    } else {
      return false;
    }
  }


  public static  function GetUserjoindate($user_name)
  {
    $db = mysqli_connect("localhost", "root", "", "simple_blog");
    $sql = "SELECT created_date FROM `user` WHERE `user_name`='{$user_name}'";
    $result = mysqli_query($db, $sql);
    if(mysqli_num_rows($result) == 1) {
      mysqli_close($db);
      $row = mysqli_fetch_row($result);
      return $row[0];
    } else {
      mysqli_close($db);
      return 0;
    }
  }


  public static  function CreateNewPost($user_id, $title,$content,$description)
  {
    $i=1;
    $db = mysqli_connect("localhost", "root", "", "simple_blog");
    $sql = "INSERT INTO `posts` (`user_id`, `title`, `content`, `description`,`active`) VALUES ('{$user_id}', '{$title}', '{$content}', '{$description}', '{$i}')";
    $result = mysqli_query($db, $sql);
    mysqli_close($db);
    if($result) {
      return true;
    } else {
      return false;
    }
  }

    public static  function SaveAsDraft($user_id, $title,$content,$description)
  {
    $i=0;
    $db = mysqli_connect("localhost", "root", "", "simple_blog");
    $sql = "INSERT INTO `posts` (`user_id`, `title`, `content`, `description`,`active`) VALUES ('{$user_id}', '{$title}', '{$content}', '{$description}', '{$i}')";
    $result = mysqli_query($db, $sql);
    mysqli_close($db);
    if($result) {
      return true;
    } else {
      return false;
    }
  }


    public static function CreateComment($post_id, $user_id,$comment)
  {

    $db = mysqli_connect("localhost", "root", "", "simple_blog");
    $sql = "INSERT INTO `comments` (`post_id`,`user_id`,`body`) VALUES ('{$post_id}','{$user_id}','{$comment}')";
    $result = mysqli_query($db, $sql);
    mysqli_close($db);
    if($result) {
      return true;
    } else {
      return false;
    }
  }

   public static function Show_Comment($id) {
     
       $db = mysqli_connect("localhost", "root", "", "simple_blog");
       $result =mysqli_query($db,"SELECT * FROM comments WHERE post_id='$id' ");
       mysqli_close($db);

     if (mysqli_num_rows($result) == 0) {
        $message="There is no posts available";
    } 
    else {

    return $result;
    
      }
        
    }

    public static function UpdatePostPublish($id,$title, $content,$description)
  {
    $i=1;
    $db = mysqli_connect("localhost", "root", "", "simple_blog");
    $sql = "UPDATE `posts` SET `title` = '{$title}',`content` = '{$content}',`description` = '{$description}',`active` = '{$i}' WHERE `id`='{$id}'";
    $result = mysqli_query($db, $sql);
    mysqli_close($db);
    if($result) {
      return true;
    } else {
      return false;
    }
  }

   public static function UpdatePostDraft($id,$title, $content,$description)
  {
    $i=0;
    $db = mysqli_connect("localhost", "root", "", "simple_blog");
    $sql = "UPDATE `posts` SET `title` = '{$title}',`content` = '{$content}',`description` = '{$description}',`active` = '{$i}' WHERE `id`='{$id}'";
    $result = mysqli_query($db, $sql);
    mysqli_close($db);
    if($result) {
      return true;
    } else {
      return false;
    }
  }

  public static function DeletePost($id)
  {
    $db = mysqli_connect("localhost", "root", "", "simple_blog");
    $sql = "DELETE FROM posts WHERE id='$id'";
    $result = mysqli_query($db, $sql);
    mysqli_close($db);
    if($result) {
      return true;
    } else {
      return false;
    }
  }

  }
?>