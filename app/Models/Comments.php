<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'members_id',
        'article_id',
        'Content',
    ];

    protected $guarded = ['*'];
    
    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
