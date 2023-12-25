<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $table = 'vote';
    protected $fillable =[
         'Total_vote',
         'Result',
    ];
    protected $guarded = ['*'];
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}