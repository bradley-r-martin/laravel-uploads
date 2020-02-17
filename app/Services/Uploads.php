<?php

namespace BRM\Uploads\app\Services;

class Uploads
{
    use \BRM\Vivid\app\Traits\Vivid;
    public function __construct()
    {
        $this->model = \BRM\Uploads\app\Models\Upload::class;
        $this->fields = [
          'file'
        ];
        $this->filters = [];
        $this->includes = [];
        $this->sanitise = [];
    }

    /**
     * store
     *
     * @param mixed $data
     * @return void
     */
    public function store($data = [])
    {
        $this->validation = [
          'file' => ['required']
        ];
        $this->hook('beforeSave', function () {
            if (class_exists('\BRM\Tenants\FrameworkServiceProvider')) {
              $file = $this->data['file']->store('', 'tenant');
              $directory = app(\Hyn\Tenancy\Website\Directory::class);
            }else{
              $file = $this->data['file']->store('');
              $directory = new \Storage();
            }
            if (!$directory->exists($file)) {
              $this->response = ['status'=>'failed','data'=>['errors'=>['Unable to save file']]];
              return false;
            }
            $contents = $directory->get($file);
            $this->record->file = '/uploads/'.$file;
            $this->record->mime = $this->data['file']->getMimeType($file);
            $this->record->size =  $this->data['file']->getSize();
            $this->record->hash = md5($contents);
            $this->record->name = $this->data['file']->getClientOriginalName();
        });
        return $this->vivid('store', $data);
    }
}
