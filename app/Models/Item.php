<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'name', 'unit_set_id'];

    public function unitSet()
    {
        return $this->belongsTo(UnitSet::class, 'unit_set_id');
    }
}
