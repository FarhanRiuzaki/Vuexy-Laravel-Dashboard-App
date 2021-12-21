<?php

namespace App\Models;

use App\Traits\RecordSignatureUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class UploadBulk extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;  
    use HasFactory, RecordSignatureUUID;
 
    protected $primaryKey   = 'id';
    public $incrementing    = false;
    
    protected $guarded      = [];
}
