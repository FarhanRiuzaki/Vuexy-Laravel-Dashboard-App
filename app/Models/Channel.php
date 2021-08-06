<?php

namespace App\Models;

use App\Traits\RecordSignatureUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use HasFactory, RecordSignatureUUID;

    protected $primaryKey   = 'id';
    public $incrementing    = false;

    protected $guarded = [];
}
