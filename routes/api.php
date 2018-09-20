<?php

/* $this->get('categories', 'Api\CategoryController@index');

$this->post('categories', 'Api\CategoryController@store');

$this->put('categories/{id}', 'Api\CategoryController@update');

$this->delete('categories/{id}', 'Api\CategoryController@delete'); */

/* $this->resources('categories', 'Api\CategoryController', [
    'except' => ['edit', 'create']
]); */

$this->apiResource('categories', 'Api\CategoryController');