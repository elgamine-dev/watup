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
        // $this->call(UsersTableSeeder::class);
        factory(App\User::class)->create([
            "email"=>"admin@admin.com",
            "is_admin"=>true
        ]);
        factory(App\User::class, 10)->create()->each(function($user) {
            $year = 2018;
            for($week=1;$week<52;$week++) {
                $user->feelings()->save(factory(App\Feeling::class)->make([
                    "year"=>$year,
                    "week"=>$week
                ]));
            }
        });
        
    }
}
