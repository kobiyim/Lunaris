<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitSet extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'code',
        'name',
    ];

    public function units()
    {
        return $this->hasMany(Unit::class);
    }
}
