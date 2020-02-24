<?php

$endpoints = [
  'except' => ['create', 'edit']
];



Route::get('uploads/{filename}','\BRM\Uploads\app\Controllers\Uploads@get')->where('filename', '.*');

Route::resource('api/1.0/uploads', '\BRM\Uploads\app\Controllers\Uploads', $endpoints);
