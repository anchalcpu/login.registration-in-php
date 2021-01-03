<?php
include('../connect.php');
header('Content-Type: application/json');

class User
{
private $db;
private $connection;
function __construct()
{
$this->db = new Connection();
$this->connection=$this->db->get_connection();
}
public function does_user_exist($user_name,$password){
$query = "SELECT * FROM user WHERE user_name ='$user_name' AND password='$password'";
$result=mysqli_query($this->connection,$query);
if(mysqli_num_rows($result)>0){
$row= mysqli_fetch_array($result);
$data = array(); 
array_push($data,array( "user_id"=>$row['id'],
"name"=>$row['fname'],
"email"=>$row['email'],
"mobile"=>$row['phone'],
"password"=>$row['password'], ) );

$json['status']=1;
$json['message']='Login Successful';
$json['detail']=$data;

echo json_encode($json);

mysqli_close($this->connection);
}else { 
$json['status']=2;
$json['message']='Wrong User_name or password';
echo json_encode($json);
mysqli_close($this->connection);
}
}
}
$user = new User();
if(isset($_POST['user_name'],$_POST['password']))
{
$user_name =$_POST['user_name'];
$password =$_POST['password'];
if (!empty($user_name) && !empty($password)) {
$encrypted_password=md5($password);
$user-> does_user_exist($user_name,$encrypted_password);
}else {
$json['status']=100;
$json['message']='You must fill both fields';
echo json_encode($json);
}
}
?>

