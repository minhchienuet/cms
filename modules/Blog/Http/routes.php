<?php

Route::group(['middleware' => 'web', 'prefix' => 'blog', 'namespace' => 'Modules\Blog\Http\Controllers'], function()
{
	Route::get('/', 'BlogController@index');
	
	Route::group(['prefix' => 'documents'], function () {
        Route::get('/', [
            'as' => 'documents.index',
            'uses' => 'DocumentController@index'
        ]);
        Route::get('download/{filename}', [
			'as' => 'documents.download', 
			'uses' => 'DocumentController@download'
		]);
		Route::post('/upload',[ 
        	'as' => 'documents.upload', 
        	'uses' => 'DocumentController@upload'
        ]);
        Route::get('read/{filename}', [
			'as' => 'documents.read', 
			'uses' => 'DocumentController@read'
		]);
	});
});