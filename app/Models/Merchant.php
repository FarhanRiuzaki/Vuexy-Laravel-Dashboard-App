<?php

namespace App\Models;

use App\Traits\RecordSignature;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    use HasFactory,RecordSignature, UUID;
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $guarded = [];
    
}
