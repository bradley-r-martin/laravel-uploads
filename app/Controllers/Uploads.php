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
}
