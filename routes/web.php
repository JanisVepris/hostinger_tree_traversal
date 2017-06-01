<?php

Route::group(['prefix' => 'categories'], function () {
    Route::get('list/iterative', 'Category\CategoryController@iterative')->name('categories.list.iterative');
    Route::get('list/recursive', 'Category\CategoryController@recursive')->name('categories.list.recursive');
    Route::resource('', 'Category\CategoryController', [
        'only' => ['create', 'store'],
        'names' => [
            'create' => 'categories.create',
            'store' => 'categories.store',
        ],
    ]);
});
