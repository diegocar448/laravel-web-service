<?php

/* $this->get('categories', 'Api\CategoryController@index');

$this->post('categories', 'Api\CategoryController@store');

$this->put('categories/{id}', 'Api\CategoryController@update');

$this->delete('categories/{id}', 'Api\CategoryController@delete'); */

/* $this->resources('categories', 'Api\CategoryController', [
    'except' => ['edit', 'create']
]); */

//Retornar todos os produtos de uma determinada categoria
$this->get('categories/{id}/products', 'Api\CategoryController@products');


$this->apiResource('categories', 'Api\CategoryController');


$this->apiResource('products', 'Api\ProductController');

