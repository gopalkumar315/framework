<?php

$routes->get('','PagesController@home');
$routes->get('about','PagesController@about');
$routes->get('contact','PagesController@contact');

$routes->get('users','UsersController@index');
$routes->post('store','UsersController@store');
