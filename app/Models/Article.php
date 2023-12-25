<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $table = 'article';

    protected $fillable = [
        'forum_id',
        'members_id',
        'Name',
        'Content',
    ];

    protected $guarded = ['*'];

    public function forum()
    {
        return $this->belongsTo(Forum::class);
    }

    public function user()
    {
        return $this->belongsTo(Member::class);
    }


    public function comments()
    {
        return $this->haveMany(Comments::class);
    }
}
