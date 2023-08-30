<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Job;

class JobSeeder extends Seeder
{

	public function run()
	{

		Job::factory(100)->create();
	}
}
