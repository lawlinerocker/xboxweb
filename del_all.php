<?php
session_start();
$i=$_GET['i'];
if(isset($_SESSION["cart"])){
    $_SESSION['cart'] = [];
}
?>
<script>
    window.alert("Empty the busket");
    window.location.replace("cart.php");
</script>