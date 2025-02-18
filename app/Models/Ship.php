<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'height',
        'harbor_id'
    ];

    public function harbor()
    {
        return $this->belongsTo(Ship::class);
    }
}
