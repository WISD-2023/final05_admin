<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;


class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach(range(1,20) as $number) {
            Article::create([
                'forum_id' => rand(1,7), 
                'members_id' => rand(1,3),
                'Name' => 'Name '.$number,
                'Content' => 'content '.$number,
            ]);            
        }
    }
}
