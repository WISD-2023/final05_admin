<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class voting_record extends Model
{
    use HasFactory;
        
    protected $table = 'voting_record';
    protected $fillable =[
         'members_id',
         'vote_id',
         'Selection',
    ];

    protected $guarded = ['*'];

}
