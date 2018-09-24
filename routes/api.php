<?php

/* $this->get('categories', 'Api\CategoryController@index');

$this->post('categories', 'Api\CategoryController@store');

$this->put('categories/{id}', 'Api\CategoryController@update');

$this->delete('categories/{id}', 'Api\CategoryController@delete'); */

/* $this->resources('categories', 'Api\CategoryController', [
    'except' => ['edit', 'create']
]); */





$this->group(['prefix' => 'v1', 'namespace' => 'Api\v1'], function(){
    //Retornar todos os produtos de uma determinada categoria
    $this->get('categories/{id}/products', 'CategoryController@products');

    $this->apiResource('categories', 'CategoryController');

    $this->apiResource('products', 'ProductController');
});



