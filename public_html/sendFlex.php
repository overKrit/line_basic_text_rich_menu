<?php

    require 'allflex/flexBear.php';
    require 'allflex/flexDog.php';
    require 'allflex/flexCat.php';

    function checkKeyWord($pictureUrl, $text, $displayName)
    {
        error_log(print_r("line sendFlex.php text : " . $text, true));
        error_log(print_r("line sendFlex.php pictureUrl : " . $pictureUrl, true));
        error_log(print_r("line sendFlex.php displayName : " . $displayName, true));
        if($text == 'หมี')
        {
            return flexBear($pictureUrl, $text, $displayName);
        }
        else if($text == 'หมา')
        {
            return flexDog($pictureUrl, $text, $displayName);
        }
        else if($text == 'แมว')
        {
            return flexCat($pictureUrl, $text, $displayName);
        }
    }
?>