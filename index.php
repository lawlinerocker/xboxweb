<?php
session_start();
$servername="localhost";
$username="root";
$password="123456789";
$dbname="shop";
$per_page=2;
if(isset($_GET["page"])) $start_page=$_GET["page"]*$per_page;
else $start_page=0;
$con=mysqli_connect($servername,$username,$password,$dbname);
if(!$con) die("Connnect mysql database fail!!".mysqli_connect_error());
$sql="SELECT * FROM product";
$result=mysqli_query($con,$sql);
$numrow=mysqli_num_rows($result);

echo "<!DOCTYPE html>";
echo "<html lang='en'>";
echo "<head>";
echo "<link rel='stylesheet' href='main.css'>";
echo "</head>";
echo "<body>";
    echo "<header>";
        echo "<div class='container'>";
            echo "<nav>";
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
    echo "<div class='banner'></div>";
    echo "<div class='topsell'><h1 class='topsell_text'>Best Selling</h1>";
    echo "<div class='navbestsell'><h1></h1>";
    for($i=0;$i<ceil($numrow/$per_page);$i++)
         echo "<a href='index.php?page=$i'><div class='navpage1'><h1 class='navpage'>".($i+1)."</h1></div></a>";
    echo "</div>";
    echo "<div class='twoside'>";
    $sql="SELECT * FROM product LIMIT $start_page,$per_page";
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            echo "<a href='add_product_to_cart.php?id=".$row["id"]."'><div class=".$row["img"]."></div></a>";
            // echo "<a href='add_product_to_cart.php?id=".$row["id"]."'></a>";
            
        }
    }
    echo "</div>";
    echo "<div class=''><h1 class='topsell_text'>Gamepass</h1></div>";
    echo "</div>";
    echo "<a href='add_product_to_cart.php?id=9'><div class='banner2'></div></a>";
    
    echo "<a href='add_product_to_cart.php?id=10'><div class='banner3'></div></a>";
    echo "<div class='support'>";
        echo "<div class='support1'></div>";
        echo "<div class='support2'></div>";
        echo "<div class='btm'></div>";
    echo "</div>";
echo "</body>";
?>