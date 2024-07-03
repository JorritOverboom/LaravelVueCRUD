<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ForumPostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('forumPosts')->insert([
            [
                'user_id' => 1,
                'content' => 'This is a post by JohnDoe',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'content' => 'This is a post by JaneSmith',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 12,
                'content' => 'This is a post by Henk',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 13,
                'content' => 'This is a post by Gerda',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
