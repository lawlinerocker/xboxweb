<?php
session_start();
$servername="localhost";
$username="root";
$password="123456789";
$dbname="shop";
$per_page=4;
if(isset($_GET["page"])) $start_page=$_GET["page"]*$per_page;
else $start_page=0;
$con=mysqli_connect($servername,$username,$password,$dbname);
if(!$con) die("Connnect mysql database fail!!".mysqli_connect_error());
$sql="SELECT * FROM product";
$result=mysqli_query($con,$sql);
$numrow=mysqli_num_rows($result)-2;

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
    echo "<div style='background-color:#201F24'>";
    echo "<div class='banner4'></div>";
    if(isset($_SESSION["cart"])){
        $total=0;
        echo "<div class='cartTextPanel'>";
        echo "<h1 style='color:#f9f9f9; '>Cart</h1>";
        // echo "<h1 class='cartText'>Cart</h1>";
        echo "</div>";
        for($i=0;$i<count($_SESSION["cart"]);$i++){
            $item=$_SESSION["cart"][$i];
            echo "<div class='cartPanel' style='background:#f9f9f9;font-size:30px;'>";
                // echo "<div class=".$item["img"].">";
                // echo "</div>";
                echo "<div style='margin:auto;' class=".$item["img"]."></div>";
                echo "<div class  style='color:#191919;='productDetail'>";
                    echo "<div class='delBlock'><a href='del_cart.php?i=".$i."'><h1 class='delbtn'>x<div class='btn'></div></h1></a></div>";
                    echo "<h2>Name of product : </h1>";
                    echo "<h3>".$item['name']."</h2>";
                    echo "<h2 class='priceProduct'>Price</h1>";
                    echo "<h3>".$item['price']." $</h1>";
                    $total+=$item['price'];
                echo "</div>";
            echo "</div>";
        }
    }
    echo "</div>";
    echo "<div style='background-color:#201F24'>";
    echo "<a href='del_all.php'><div class='rmAllbtn'><div class='btn'><h1>Empty</h1></div></div></a>";
    echo "<div class='totalPanel'><h1 style='color:white'>Total price : $total $</h1></div>";
    echo "<div style='background-color:#201F24'>";
    echo "<div class='contractPanel'><h1 class='contractText'>Contract</h1></div>";
    echo "<a href='add_product_to_cart_2.php?id=10'><div class='banner6' style='color:white'></div>";
    
    echo "<div class='submitPanel'>";
        echo "<div class='form'>";
?>

        <form action="summarypage.php" method="post">
        <label for="fname">First name:</label><br>
        <input type="text" id="fname" name="fname" value=""><br>
        <label for="lname">Last name:</label><br>
        <input type="text" id="lname" name="lname" value=""><br>
        <label for="address">Address:</label><br>
        <textarea id="address" name="address"  rows="4" cols="50"></textarea><br>
        <label for="mobile">mobile no.:</label><br>
        <input type="text" id="mobile" name="mobile" value=""><br>
        <input type="submit" onclick="return confirm('Are you sure you want to do that?')"value="Checkout">
        </form> 
<?php   
       echo "</div>";
        echo "</div>";
      
    echo "</div>";
    
  
  
    echo "<div class='btm' style='margin-left:3%;'></div>";
    echo "</div>";
echo "</body>";
?>
