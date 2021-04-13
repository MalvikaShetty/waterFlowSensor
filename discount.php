<?php
$q = $_REQUEST["q"];
$discount = $q*10; 
if ($q === "0"){
    echo "Make a selection to avail discount";
}
else{
   echo "Yay, you got " . $discount . "% discount!";
}
?>