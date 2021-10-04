<?php

//Default
// $app->get('/default/index/([\d]+)', function(){}); d-> number 
// App::get('/default/index/([\S]+)', true ); S-> string

App::get('/');
App::get('/default/index', true ); 
App::get('/default/detail/([\d]+)', true);
App::get('/default/login', false);


App::get('/user/index', false);