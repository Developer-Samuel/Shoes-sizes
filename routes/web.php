<?php

if(isset($_GET['action']))
{
    $request = $_GET['action'];

    switch($request)
    {
        case 'home':
            $route = "HomeController@indexAction";
            break;
        case 'add-shoes':
            $route = "HomeController@addShoesAction";
            break;
        default:
            echo "Not found! 404";
            break;
    }
}