<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tweet extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        // Boot other traits on the Model
        parent::boot();

        /**
         * Listen for the 'creating' event on the Track Model.
         */
        static::creating(function ($model) {
            $model->setAttribute('uuid', Str::uuid()->toString());
        });
    }
}