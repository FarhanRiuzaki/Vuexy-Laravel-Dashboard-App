<?php

namespace App\Models;

use App\Traits\RecordSignatureUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory, RecordSignatureUUID;

    protected $guarded = [];

    public function templateDetail()
    {
        return $this->hasMany(TemplateDetail::class, 'template_id');
    }

    public function roleHasTemplate()
    {
        return $this->hasOne(RoleHasTemplate::class, 'template_id');
    }
}
