<?php

namespace App\Traits;

use app\Observers\ModelObserver;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

trait RecordSignatureUUID
{

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($model) {
            $model->updated_by = Auth::User()->id;
        });

        static::creating(function ($model) {
            if(Auth::User() != null){
                $model->created_by = Auth::User()->id;
            }
            $model->incrementing = false;
            $model->keyType = 'string';
            $model->{$model->getKeyName()} = Str::uuid()->toString();
        });
    }
}
