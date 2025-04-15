<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankFiche extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'date_',
        'ficheno',
        'transaction',
        'sign',
        'depit',
        'credit',
        'description',
    ];

    public function lines()
    {
        return $this->hasMany(BankFicheLine::class);
    }
}
