<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         //$this->call(CommentTableSeeder::class);
    	/*DB::table('comments')->insert([
            'author' => str_random(10),
            'text' => str_random(10).'@gmail.com'
        ]);*/
        for ($i=0; $i < 30; $i++) { 
         DB::table('comments')->insert([
            'author' => str_random(20),
            'text' => str_random(100),
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),

    	    ]);
	    }

    }
}
