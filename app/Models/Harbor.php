<?php

namespace App\Models;

use Database\Factories\HarborsFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Harbor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'capacity',
        'open'
    ];

    public function ships()
    {
        return $this->hasMany(Ship::class);
    }

    protected static function newFactory()
    {
        return HarborsFactory::new();
    }
}
