<?php
include('connect.php');
 header('Content-Type: application/json');

 class Register
 {
 private $db;
 private $connection;
 function __construct()
 {
 //constructor call
 $this->db = new Connection();
 $this->connection=$this->db->get_connection();
 }
 public function does_user_exist($fname,$email,$phone,$lname,$password,$user_name)
 {
 $query = "SELECT * FROM user WHERE user_name='$user_name'";
 $result=mysqli_query($this->connection,$query);
 if(mysqli_num_rows($result)>0){
$json['status']=400;
$json['message']=' Sorry '.$user_name.' is already exist.';
   echo json_encode($json);
   mysqli_close($this->connection);
 }else {
   $query="insert into user(fname,email,phone, user_name,password,lname) values('$name','$email','$phone','$user_name','$pass','$lname')";
   $is_inserted=mysqli_query($this->connection,$query);
   if($is_inserted == 1){
$json['status']=200;
     $json['message']='Account created, Welcome '.$name;
   }else {
$json['status']=401;
     $json['message']='Something wrong';
   }
   echo json_encode($json);
   mysqli_close($this->connection);
 }
 } 
public function does_vendor_exist($fname,$email,$phone,$lname,$password,$user_name)
 {
 $query = "SELECT * FROM vendor WHERE phone='$phone'";
 $result=mysqli_query($this->connection,$query);
 if(mysqli_num_rows($result)>0){
$json['status']=400;
$json['message']=' Sorry '.$phone.' is already exist.';
   echo json_encode($json);
   mysqli_close($this->connection);
 }else {
   $query="insert into vendor(fname,email,phone, user_name,password,lname) values('$name','$email','$phone','$user_name','$pass','$lname')";
   $is_inserted=mysqli_query($this->connection,$query);
   if($is_inserted == 1){
$json['status']=200;
     $json['message']='Account created, Welcome '.$name;
   }else {
$json['status']=401;
     $json['message']='Something wrong';
   }
   echo json_encode($json);
   mysqli_close($this->connection);
 }
 }
 }

 $register=new Register();
 if(isset($_POST['fname'],$_POST['email'],$_POST['phone'],$_POST['lname'],$_POST['user_name'],$_POST['password'],$_POST['role']))
 {
$fname=$_POST['fname'];
   $lname=$_POST['lname'];
   $role=$_POST['role'];
   $email=$_POST['email'];
   $phone =$_POST['phone'];
 $user_name =$_POST['user_name'];
   $password=$_POST['password'];
 if (!empty($fname) && !empty($email) && !empty($phone) && !empty($user_name) && !empty($password)) {
     $encrypted_password=md5($password);
if($role=="customer"){
     $register-> does_user_exist($fname,$email,$phone,$user_name,$encrypted_password,$lname);}
Else{    
 $register-> does_vendor_exist($fname,$email,$phone,$user_name,$encrypted_password,$lname);

}
   }else {
$json['status']=100;
     $json['message']='You must fill all the fields';
     echo json_encode($json);
   }
 }

?>
