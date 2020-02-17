<?php

namespace BRM\Uploads\app\Models;

use Illuminate\Database\Eloquent\Model;


class Upload extends Model
{
    use \BRM\Vivid\app\Traits\Model;

    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';
    const DELETED_AT = 'deletedAt';
  
    protected $hidden = [
      'deletedAt',
    ];

    protected $dates = [
      'createdAt',
      'updatedAt',
      'deletedAt'
    ];
}
