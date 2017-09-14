<?php
$bg_array = array("#CEED9D", "#ECED9D", "#EDCF9D", "#EC9CA7", "#ED9DD0", "#EE9DE2", "#D69DEC", "#9E9CEC");
$bg = array_rand($bg_array, 1);
?>
<div class="banner" style="background-color:<?php echo $bg_array[$bg]; ?>;">
    <div class="txt-title"><?php $message = file_get_contents('mittag.txt');
        echo $message; ?></div>
    <div class="txt-subtitle"><?php $message = file_get_contents('abend.txt');
        echo $message; ?></div>
</div>
