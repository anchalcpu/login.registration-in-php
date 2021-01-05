<?php
define('hostname','localhost');
define('user','root');
define('password','');
define('db_name','General_Store');
class Connection{
   private $connect;
   function __construct(){
   $this->connect=mysqli_connect(hostname,user,password,db_name) or die("DB Connection error.");
   }
   public function get_connection()
   {
       return $this->connect;
    }
}
?>