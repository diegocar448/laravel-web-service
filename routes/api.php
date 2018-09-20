<?php

$this->get('categories', 'Api\CategoryController@index');

$this->post('categories', 'Api\CategoryController@store');

$this->put('categories/{id}', 'Api\CategoryController@update');