<?php

namespace App\Models\Traits;

use Illuminate\Support\Str;


trait HasUuid
{
    protected static function bootHasUuid()
    {
        // parent::boot();
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Str::uuid();
            }
        });
    }
}
