<?php

namespace App\Models\Lunaris;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'unit_set_id',
        'code',
        'name',
        'line_number',
    ];

    // Bağlı olduğu birim seti
    public function unitSet()
    {
        return $this->belongsTo(UnitSet::class);
    }
}