<?php

namespace BRM\Uploads\app\Services;

class Uploads
{
    use \BRM\Vivid\app\Traits\Vivid;
    public function __construct()
    {
        $this->model = \BRM\Uploads\app\Models\Upload::class;
        $this->fields = [
          'file',
          'status'
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
            $file = $this->data['file']->store('', 'tenant');
            $this->record->file = '/uploads/'.$file;
        });
      
        return $this->vivid('store', $data);
    }
}
