<?php
namespace BRM\Uploads\app\Controllers;

use Illuminate\Routing\Controller;

class Uploads extends Controller
{
    use \BRM\Vivid\app\Traits\Control;

    public function __construct()
    {
        $this->service = \BRM\Uploads\app\Services\Uploads::class;
    }

    public function get($filename){
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
    }


}
