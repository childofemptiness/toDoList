<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'name',

        'description',
    ];

    public function statuses(): HasMany {

        return $this->hasMany(Status::class);
    }

    public function status(): HasOne {

        return $this->hasOne(Status::class)->latest('id');
    }
}
