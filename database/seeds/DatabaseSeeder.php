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
        // $this->call(UserSeeder::class);
        factory('App\Products',100)->create();
        factory(App\User::class, 10)->create()->each(function($user) {
            $user->activation()->save(factory(App\Activation::class)->make());
        });    }
}
