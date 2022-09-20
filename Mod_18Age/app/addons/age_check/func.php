<?php

if (!defined('BOOTSTRAP')) { die('Access denied'); }

function fn_age_check ($birthday)
{
    $birthday = (strtotime(date('m/d/Y'))-strtotime($birthday))/(60*60*24*365);

    return $birthday;
}
