<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Illuminate\Support\Testing\Fakes\Fake;
use Tests\TestCase;

class PostsTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testCreateNewUserAndLogin(): void
    {
        $email = 'johndoe' . rand(1, 1000) . '@example.com';

        $user = User::create([
            'name' => 'John Doe',
            'email' => $email,
            'password' => bcrypt('password'),
        ]);

        // Log the user in
        $this->actingAs($user);
        // Assert that the user is authenticated
        $this->assertAuthenticated();

        // Add additional assertions as needed

        return;
    }

    public function testCreatePost(): void
    {
        // Call the testCreateNewUserAndLogin method to log the user in
        $this->testCreateNewUserAndLogin();

        // Use the ID of the logged-in user instead of hardcoding the value
        $user_id = auth()->user()->id;

        $uuid = \Illuminate\Support\Str::uuid();
        Post::create([
            'title' => 'fdf',
            'body' => 'tset',
            'user_id' => $user_id,
            'uuid' => $uuid,
            'writer'=>auth()->user()->name,
        ]);

        $response = $this->get('/posts');

        $response->assertStatus(200);
    }

    public function testDeleteAllUsersAndPosts(): void
    {
        // Delete all posts
        Post::query()->delete();

        // Delete all users
        User::query()->delete();

        // Check if the tables are empty
        $this->assertEquals(0, User::count());
        $this->assertEquals(0, Post::count());
    }
}
