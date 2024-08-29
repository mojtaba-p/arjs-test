<?php $is_iphone = strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone') !== false; 
if($is_iphone){
    include 'iphone.php';
} else {
    include 'other.php';
}