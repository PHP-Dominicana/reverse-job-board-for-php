<?php

namespace App\Actions\Job;

use App\Models\Job;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class CreateJobAction
{

    /**
     * Validate and update the given user's social links.
     *
     * @param array<string, string|null> $input
     *
     * @throws ValidationException
     */
    public function create(array $input): void
    {
        Validator::make($input, [
            'title' => ['required', 'string', 'max:255'],
            'company_name' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string'],
            'remote_policy' => ['required', 'string', 'max:255'],
            'job_type' => ['required', 'string', 'max:255'],
            'experience_level' => ['required', 'string', 'max:255'],
            'salary' => ['required', 'numeric'],
            'description' => ['required', 'string'],
        ])->validateWithBag('createJobForm');
        $job = new Job();

        $job->forceFill([
            'title' => $input['title'],
            'company_name' => $input['company_name'],
            'remote_policy' => $input['remote_policy'],
            'job_type' => $input['job_type'],
            'experience_level' => $input['experience_level'],
            'salary' => $input['salary'],
            'description' => $input['description'],
            'location' => $input['location'],
        ])->save();

        if(isset($input['photo'])){
            $job->updatePhoto($input['photo']);
        }


    }
}
