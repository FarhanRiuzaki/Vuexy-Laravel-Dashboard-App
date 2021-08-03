<?php

namespace App\Models;

use App\Traits\RecordSignature;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory, RecordSignature;

    protected $guarded = [];

    public function component()
    {
        return $this->hasMany(Component::class, 'page_id');
    }
}
