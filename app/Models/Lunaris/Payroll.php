<?php

namespace App\Models\Lunaris;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;

    protected $table = 'lunaris_payrolls';

    protected $fillable = [
        'fiche_no',
        'date_',
        'transaction',
    ];

    public $timestamps = false;
}
