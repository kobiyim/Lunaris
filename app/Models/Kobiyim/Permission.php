<?php

namespace App\Models\Kobiyim;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'kobiyim_permissions';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'key',
    ];

    public $timestamps = true;

    protected $dates = ['created_at', 'updated_at'];
}
