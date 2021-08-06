<?php

namespace App\Models;

use App\Traits\RecordSignature;
use App\Traits\RecordSignatureUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateDetail extends Model
{
    use HasFactory, RecordSignatureUUID;

    protected $guarded = [];

    public function page()
    {
        return $this->hasOne(Page::class, 'id', 'page_id');
    }
}
