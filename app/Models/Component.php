<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    use HasFactory, UUID;

    protected $primaryKey   = 'id';
    public $incrementing    = false;

    protected $guarded = [];

    public function componentParameterApi()
    {
        return $this->hasMany(ComponentParameterApi::class, 'component_id');
    }
}
