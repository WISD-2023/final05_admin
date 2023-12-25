<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Votelist extends Model
{
    use HasFactory;

    protected $table = 'votelists';
    protected $fillable =[
         'Total_vote',
         'Result',
    ];
    protected $guarded = ['*'];
    public function member()
    {
        return $this->belongsTo(User::class);
    }
}
