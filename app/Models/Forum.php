<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;
    protected $table = 'forum';

    public function article()
    {
        return $this->haveMany(Article::class);
    }
}
