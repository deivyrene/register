<?php

use Illuminate\Database\Seeder;
use Siac\Activity;

class ActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Activity::class, 80)->create();
    }
}
