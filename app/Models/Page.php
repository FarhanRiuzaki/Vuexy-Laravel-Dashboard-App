<?php

namespace App\Models;

use App\Traits\RecordSignature;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory, UUID;

    protected $primaryKey   = 'id';
    public $incrementing    = false;

    protected $guarded  = [];

    public function component()
    {
        return $this->hasMany(Component::class, 'page_id');
    }
}
