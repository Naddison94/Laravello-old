<?php

namespace Tests\Unit;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\TestCase;

class CreatePostTest extends TestCase
{
    public function startUp()
    {
        return User::factory()->create(
            [
                'username' => 'Test_User',
                'password' => Hash::make('kek'),
                'email' => 'testuser@test.com',
                'email_verified_at' => now(),
            ]);
    }

    public function testCreatePost() {
        $user = $this->startUp();
        Post::factory()->create(['user_id' => $user->id]);
    }

}
