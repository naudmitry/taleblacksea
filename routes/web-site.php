<?php

Route::get('/',
    [
        'uses' => 'Site\IndexController@index',
        'as' => 'site.index',
    ])->middleware('geoIpRedirect');

Route::post('pre-entry/save',
    [
        'uses' => 'Site\PreEntryController@save',
        'as'   => 'front.pre-entry.save'
    ]);

Route::get('{slug}',
    [
        'uses' => 'Site\SlugController@index',
        'as' => 'slug.index',
    ]);