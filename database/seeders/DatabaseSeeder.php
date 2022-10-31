<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Tweet;
use App\Models\User;
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

        // Create 50 users and their tweets
        $nUsers = 50;
        \App\Models\User::factory()
            ->count($nUsers)
            ->has(
                Tweet::factory()
                    ->count(rand(0, 100))
                    ->randomType()
            )
            ->create();

        // Define followings relations beetween users created
        $list = [];
        for ($follower = 1; $follower <= $nUsers; $follower++) {
            $list[$follower] = [];

            // Define the number of followers for the user
            $nFollowers = rand(0, $nUsers);

            // Iterate each new followed user
            for ($j = 0; $j <= $nFollowers; $j++) {

                // Random user to follow
                $followed = rand(1, $nUsers);

                // Check if the followed user is distinct to the follower, and if the followed user has not been added before
                if (($followed != $follower) && (!in_array($followed, $list[$follower]))) {
                    $list[$follower][] = $followed;
                }
            }
        }

        // Create all followings's models
        foreach ($list as $follower => $following) {
            $user = User::find($follower);
            $user->following()->sync($following);
        }

        // Update the email for the first user
        $user = User::find(1);
        $user->email = 'hola@koombea.com';
        $user->save();
    }
}
