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
        $expected = Str::limit($description, User::SMALL_DESCRIPTION_LIMIT);
        $this->assertEquals($expected, $user->small_description);
    }
}
