<?php

if (!defined('BOOTSTRAP')) { die('Access denied'); }

use Tygh\Tygh;

$auth = & Tygh::$app['session']['auth'];

$cookie_expiration = 60*60*24*7; //устанавливаем временной период: секунды*минуты*часы*дни
$cookie_expiration_date = time()+$cookie_expiration; //устанавливаем период для cookie: время жизни + секунды*минуты*часы*дни
$need_age = (int) 18; //устанавливаем возраст для проверки

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($mode === 'birthday'){

        $birthday = fn_age_check ($_REQUEST['guest_data']['birthday']);

        if ($birthday >= $need_age) {
            $guest_id = $_COOKIE['guest_id'];
            $age_key = 'Y';
            fn_set_cookie('age_key', $age_key, $cookie_expiration_date);
        } else {
            $guest_id = $_COOKIE['guest_id'];
            $age_key ='N';
            fn_set_cookie('age_key', $age_key, $cookie_expiration_date);
        }

        return [
            CONTROLLER_STATUS_REDIRECT,
            'index.php',
        ];
    }
}

if(!isset($_COOKIE['age_key'])){
    $guest_id = $_SERVER['REMOTE_ADDR'];
    $age_key = 'Hi';
    //Пишем куки (имя куки, значение, время жизни - срок_действия_куки)
    fn_set_cookie('guest_id', $guest_id, $cookie_expiration_date);
    fn_set_cookie('age_key', $age_key, $cookie_expiration_date);  
}

Tygh::$app['view']->assign([
    'age_key' => $_COOKIE['age_key'],
]);
