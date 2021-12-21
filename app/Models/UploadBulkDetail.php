<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadBulkDetail extends Model
{
    use HasFactory, UUID;
    
    const STATUS_COLOR = [
        '1'     => '#28c76f',
        '2'     => '#ea5455',
    ];

    protected $primaryKey   = 'id';
    public $incrementing    = false;

    
    protected $guarded      = [];
}
