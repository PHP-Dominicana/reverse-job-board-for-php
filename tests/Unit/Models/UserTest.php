<?php

namespace Tests\Unit\Models;

use App\Models\User;
use Illuminate\Support\Str;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    /**
     * User small description.
     */
    public function test_small_description(): void
    {
        $description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla euismod, nisl eget aliquam ultricies, nunc nisl aliquet nunc, quis aliquam nis';
        $user = new User;
        $user->description = $description;
        $expected = Str::limit($description, User::SHORT_DESCRIPTION_LENGTH);
        $this->assertEquals($expected, $user->short_description);
    }

    /**
     * User short description is null should return emptu.
     */
    public function test_when_short_description_is_null_should_return_empty(): void
    {
        $user = new User;
        $user->description = null;
        $this->assertEquals('', $user->short_description);
    }
}
