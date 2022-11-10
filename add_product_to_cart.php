<?php
session_start();
$id=$_GET['id'];
$servername="localhost";
$username="root";
$password="123456789";
$dbname="shop";
$con=mysqli_connect($servername,$username,$password,$dbname);
if(!$con) die("Connnect mysql database fail!!".mysqli_connect_error());
//echo "Connect mysql successfully!";
$sql="SELECT * FROM product WHERE id=$id";
$result=mysqli_query($con,$sql);

if(mysqli_num_rows($result)>0){
    $success=1;
    $row=mysqli_fetch_assoc($result);
    echo $row['id']."<br>";
    echo $row['name']."<br>";
    echo $row['price']."<br>";
    echo $row['img']."<br>";

    if(!isset($_SESSION["cart"]))
        $_SESSION["cart"]=array();
    $item=array("id"=>$row['id'],
                "name"=>$row['name'],
                "price"=>$row["price"],
                "img"=>$row["img"]);
    array_push($_SESSION["cart"],$item);
    print_r($_SESSION["cart"]);
}
else
{
    $success=0;
}
mysqli_close($con);
?>
<?php
  if($success!=0){
?>
<script>
    window.alert("Adding Successful");
    window.location.replace("index.php");
</script>
<?php
  }
  else
  {
?>
<script>
    window.alert("Error!!");
    window.location.replace("index.php");
</script>
<?php
  }
?>