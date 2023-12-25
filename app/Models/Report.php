<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $table = 'report';

    protected $fillable = [
        'Com_id',
        'Reason',
        'Acc_id',
    ];

    protected $guarded = ['*'];
}
