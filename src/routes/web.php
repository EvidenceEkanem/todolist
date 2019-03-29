<?php

Route::namespace ('evidenceekanem\laravelTodoList\Controllers')->group(function () {
    Route::get('tasks', 'TaskController@index')->name('tasks.index');
    Route::post('tasks/add', 'TaskController@addTask')->name('tasks.store');
    Route::post('tasks/categories/add', 'TaskController@addCategory')->name('categories.store');
    Route::put('tasks/categories/{id?}', 'TaskController@updateCategories')->name('categories.update');
    Route::post('tasks/status', 'TaskController@updateTaskStatus')->name('tasks.status');
    Route::delete('tasks/categories/delete/{id}', [
        'uses' => 'TaskController@deleteCategory', 
        'as' => 'categories.delete'
    ]);
    Route::delete('tasks/delete/{id}', [
        'uses' => 'TaskController@deleteTask', 
        'as' => 'tasks.delete'
    ]);
});