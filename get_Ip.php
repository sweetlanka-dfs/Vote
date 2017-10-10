<?php

//---------GET USER-------------//
function getUserIP()
{
    // $_SERVER - это массив, содержащий информацию, такую как заголовки, пути и местоположения скриптов.
    // Записи в этом массиве создаются веб-сервером

    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    //$_SERVER['HTTP_CLIENT_IP']
    //$_SERVER['HTTP_X_FORWARDED_FOR'] - определение прокси сервeров
    //$_SERVER['REMOTE_ADDR'] - определение IP адреса
    //filter_var — Фильтрует переменную с помощью определенного фильтра

    if(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}

$ip = getUserIP();

echo $ip;
