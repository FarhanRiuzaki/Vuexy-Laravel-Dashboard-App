<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleHasTemplate extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function template()
    {
        return $this->hasOne(Template::class, 'id', 'template_id');
    }
}
