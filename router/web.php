<?php

$router->get('index', 'UserController@index');
$router->get('users', 'UserController@user');
$router->post('profile', 'UserController@show');
$router->get('test/collect', 'UserController@testCollection');