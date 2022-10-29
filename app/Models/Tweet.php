<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
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
         * Sets the 'id' to a UUID using Str::uuid() on the instance being created
        */
        static::creating(function ($model) {

            // Dynamically set the primary key
            $model->setAttribute('uuid', Str::uuid()->toString());
        });
    }

}
