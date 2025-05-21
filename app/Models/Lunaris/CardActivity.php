<?php

namespace App\Models\Lunaris;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardActivity extends Model
{
    use HasFactory;

    protected $table = 'lunaris_card_activities';

    protected $fillable = [
        'card_id',
        'type',
        'virman_id',
        'subject_id',
        'sign',
        'date_',
        'total',
        'description',
    ];

    public $timestamps = false;
}
