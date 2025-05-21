<?php

namespace App\Models\Lunaris;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    protected $table = 'lunaris_items';

    protected $fillable = ['code', 'name', 'unit_set_id'];

    public $timestamps = false;

    public function unitSet(): BelongsTo
    {
        return $this->belongsTo(UnitSet::class, 'unit_set_id');
    }
}
