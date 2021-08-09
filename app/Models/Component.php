<?php

namespace App\Models;

use App\Traits\RecordSignatureUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    use HasFactory, RecordSignatureUUID;

    protected $primaryKey   = 'id';
    public $incrementing    = false;

    protected $guarded = [];

    public function componentParameterApi()
    {
        return $this->hasMany(ComponentParameterApi::class, 'component_id');
    }

    public function page()
    {
        return $this->belongsTo(Page::class, 'page_id', 'id');
    }
}
