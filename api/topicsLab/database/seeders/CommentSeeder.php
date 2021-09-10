<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'id' => '1',
            'user_id' => '2',
            'topic_id' => '1',
            'body' => '水筒を使ってゴミや購入頻度をへらすことが一番かなと思います。',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('comments')->insert([
            'id' => '2',
            'user_id' => '2',
            'topic_id' => '2',
            'body' => "やっぱり、いまの技術力で、\nどうにかしないと。",
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
