<?php

namespace App\Models\Lunaris;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'lunaris_items';

    protected $fillable = ['code', 'name', 'unit_set_id'];

    public function unitSet()
    {
        return $this->belongsTo(UnitSet::class, 'unit_set_id');
    }
}
