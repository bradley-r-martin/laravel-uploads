<?php

$endpoints = [
  'except' => ['create', 'edit']
];



Route::get('uploads/{filename}', function ($filename) {
  if (class_exists('\BRM\Tenants\FrameworkServiceProvider')) {
    $directory = app(\Hyn\Tenancy\Website\Directory::class);
  }else{
    $directory = new \Storage();
  }
  if (!$directory->exists($filename)) {
      abort(404);
  }
  $file = $directory->get($filename);
  $type = $directory->mimeType($filename);
  $response = \Response::make($file, 200);
  $response->header("Content-Type", $type);
  return $response;
})->where('filename', '.*');



Route::resource('api/1.0/uploads', 'BRM\Uploads\app\Controllers\Uploads', $endpoints);
