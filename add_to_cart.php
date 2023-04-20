<?php

class add_to_cart
{
    function addProduct()
    {
        $_SESSION['cart'][$pid]['qty']=$qty;
    }
    function updateProduct()
    {
        if(isset($_SESSION['cart'][$pid])){
            $_SESSION['cart'][$pid]['qty']=$qty;
        }
    }
    function removeProduct()
    {
        if(isset($_SESSION['cart'][$pid])){
            unset($_SESSION['cart'][$pid]);
        }
    }
    function emptyProduct()
    {
        unset($_SESSION['cart']);
    }
     function totalProduct()
    {
        if(isset($_SESSION['cart'])){
            return count($_SESSION['cart']);
        }else{
            return 0;
        }
    }
   
}
?>