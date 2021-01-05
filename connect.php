<?php
$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);
$connection = new mysqli($server, $username, $password, $db);
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