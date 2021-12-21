<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class masterAccount extends Model
{
    use HasFactory, UUID;

    protected $primaryKey   = 'id';
    public $incrementing    = false;

    protected $guarded = [];
}
