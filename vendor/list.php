<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Product List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,900|Oswald:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
   

    <link rel="stylesheet" href="../css/style.css">
    <style>




</style>
  </head>
  <body  data-offset="300">
  
  
    
    <div class="site-section" id="listings-section">
      <div class="container">
                      <h2 class="h4 text-black mb-5">Your Products </h2> 

        <div class="row">
          <div class="col-md-9 order-2 order-md-1">


              <div class="row large-gutters">

                  
<?php
$servername="localhost";
$username="root";
$password="";
$db="General_Store";
$conn=new MySQLi($servername,$username,$password,$db);
if($conn->connect_error)
{die("connection failed:".$conn->connect_error);
}

$id=$_GET["id"];
$query="select * from product where id= '$id' ";
$res=mysqli_query($conn,$query);
if(mysqli_num_rows($res)>0)
{
while($rows=mysqli_fetch_array($res))
{$links=$rows["image"];

Echo" <div class='col-md-4 col-lg-4 mb-8 mb-lg-8 '>
                    <div class='ftco-media-1'>
                      <div class='ftco-media-1-inner'><img src=images/$links class='img-fluid' style='height:300px;width:300px; border-radius:40px;'>

                        <div class='ftco-media-details' style='width:200px; overflow:hidden;'>
                          <h3>".$rows['title']."</h3>
                          <p>".$rows['description']."</p>
                          <strong>".$rows['price']."</strong></div>  </div> 
                    </div>
                  </div>";
}
}else
{ echo"<div class='col-md-6 mb-8 mb-lg-8 '>
                      <img src='../images/unnamed.png' class='img-fluid' style='height:400px;'></div>";
}
?>

                        
          
             
        
                </div>
          </div>
        </div>
      </div>
    </div>


    



    
  </body>
</html>