<?php

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;


class JobFactory extends Factory
{

	protected $model = Job::class;

	public function definition()
	{

		return [
			'title' => $this->faker->jobTitle,
			'description' => $this->faker->paragraph,
			'location' => $this->faker->city,
			'remote_policy' => $this->faker->randomElement(['Yes', 'No', 'Partial']),
			'job_type' => $this->faker->randomElement(['Full-time', 'Part-time', 'Contract']),
			'company_name' => $this->faker->company,
			'salary' => $this->faker->randomFloat(2, 30000, 150000),
			'experience_level' => $this->faker->randomElement(['Entry Level', 'Mid Level', 'Senior Level']),
			'photo_path' => null, // You can customize this based on your needs
			'created_at' => now(),
			'updated_at' => now(),
		];
	}
}
