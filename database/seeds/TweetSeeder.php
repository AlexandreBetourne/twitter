<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Tweet;
use Illuminate\Support\Facades\DB;

class TweetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker, Tweet $tweet)
    {
      foreach (range(1,20) as $i) {
        $tweet->create([
          'username' => $faker->userName,
          'message' => $faker->realText($maxNbChars = 100)
        ]);
      }

    }
}
