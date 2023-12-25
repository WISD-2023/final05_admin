<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comments;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach(range(1,20) as $number) {
            Comments::create([
                'members_id' => rand(1,3),
                'article_id' => rand(1,20),
                'Content' => 'content '.$number,
            ]);            
        }
    }
}
