<?php
session_start();
$fname= $_POST["fname"];
$lname= $_POST["lname"];
$address= $_POST["address"];
$mobile= $_POST["mobile"];
$servername="localhost";
$username="root";
$password="123456789";
$dbname="shop";
$con=mysqli_connect($servername,$username,$password,$dbname);
if(!$con) die("Connnect mysql database fail!!".mysqli_connect_error());
$sql="INSERT INTO order_product (fname, lname,address,mobile)";
$sql.="VALUES ('$fname', '$lname', '$address','$mobile');";
//echo $sql;
if (mysqli_query($con, $sql)) {
    $last_id = mysqli_insert_id($con);
    //echo "New record created successfully. Last inserted ID is: " . $last_id;
    // loop in session cart and insert each item to database
    $sql1="INSERT INTO order_details (order_id,product_id) VALUES ";
    for($i=0;$i<count($_SESSION["cart"]);$i++){
        $item_id=$_SESSION["cart"][$i]['id'];
        $sql1.="('$last_id','$item_id')";
        if($i<count($_SESSION["cart"])-1)
         $sql1.=",";
        else
         $sql.=";";
    }
   

echo "<!DOCTYPE html>";
echo "<html lang='en'>";
echo "<head>";
echo "<link rel='stylesheet' href='main.css'>";
echo "</head>";
echo "<body>";
echo "<!DOCTYPE html>";
echo "<html lang='en'>";
echo "<head>";
echo "<link rel='stylesheet' href='main.css'>";
echo "</head>";
echo "<body>";
echo "<header style='background-color:#202020'>";
echo "<div class='container'>";
    echo "<nav>";
    echo "<div></div>";
    echo "<div class='logo'></div>";
    echo "<ul>";
        echo "<li>";
            echo "<div class='line'></div>";
        echo "</li>";
    echo "</ul>";
    echo "<ul>";
        echo "<li>";
            echo "<a href='index.php'><div class='xbox'></div></a>";
        echo "</li>";
    echo "</ul>";
    echo "<ul>";
        echo "<div class='searchbar'><h1 class='search_text'>Search</h1></div>";
    echo "</ul>";
    echo "<ul>";
        echo "<a href='cart.php'><div class='cartsymbol'></div></a>";
    echo "</ul>";
    echo "<ul>";
        echo "<a href='cart.php'><h1>CART</h1></a>";
    echo "</ul>";
    
    echo "<ul>";
        echo "<div class='btn'></div>";
    echo "</ul>";
    echo "</nav>";
echo "</div>";
echo "</header>";
    echo "<div style='background:#191919;'</div>";
    echo "<a href='index.php'><div class='banner5'></div>";
    echo "<div style='background:#191919'>";
    echo "<div class='orderListPanel' style='display:flex;justify-content:center;background-color: #202020;'><h1 style='color:green'>Order</h1></div>";

    echo "<div class='listOrderPanel'>";
    echo "<div class='separate-space'>";
        echo "<h1 class='orderList'>ID</h1>";
    echo "</div>";
    echo "<div class='separate-space'>";
        echo "<h1 class='orderList'>Order Date</h1>";
    echo "</div>";
    echo "<div class='separate-space'>";
        echo "<h1 class='orderList'>First Name</h1>";
    echo "</div>";
    echo "<div class='separate-space'>";
        echo "<h1 class='orderList'>Last Name</h1>";
    echo "</div>";
    echo "<div class='separate-space'>";
        echo "<h1 class='orderList'>Mobile</h1>";
    echo "</div>";
    echo "</div>";

    $sql = "SELECT * FROM `order_product` WHERE 1";
    $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            echo "<div class='listOrderPanel'>";
                echo "<div class='separate-space'>";
                    echo "<h1 class='orderList'>".$row['id']."</h1>";
                echo "</div>";
                echo "<div class='separate-space'>";
                    echo "<h1 class='orderList'>".$row['date_time']."</h1>";
                echo "</div>";
                echo "<div class='separate-space'>";
                    echo "<h1 class='orderList'>".$row['fname']."</h1>";
                echo "</div>";
                echo "<div class='separate-space'>";
                    echo "<h1 class='orderList'>".$row['lname']."</h1>";
                echo "</div>";
                echo "<div class='separate-space'>";
                    echo "<h1 class='orderList'>".$row['mobile']."</h1>";
                echo "</div>";
            echo "</div>";
        }
    }
  }
  echo "</div>";
    echo "<div class='btm' style='margin-left:3%'></div>";
echo "</body>";
?>