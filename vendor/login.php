<?php
include('../connect.php');
header('Content-Type: application/json');

class vendor
{
private $db;
private $connection;
function __construct()
{
$this->db = new Connection();
$this->connection=$this->db->get_connection();
}
public function does_vendor_exist($user_name,$password){
$query = "SELECT * FROM vendor WHERE phone ='$phone' AND password='$password'";
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
$json['message']='Wrong mobile or password';
echo json_encode($json);
mysqli_close($this->connection);
}
}
}
$user = new vendor();
if(isset($_POST['phone'],$_POST['password']))
{
$user_name =$_POST['user_name'];
$password =$_POST['password'];
if (!empty($user_name) && !empty($password)) {
$encrypted_password=md5($password);
$user-> does_vendor_exist($user_name,$encrypted_password);
}else {
$json['status']=100;
$json['message']='You must fill both fields';
echo json_encode($json);
}
}
?>

