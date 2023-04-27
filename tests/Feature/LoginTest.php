<?php

namespace Tests\Feature;


use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{

    use RefreshDatabase, WithFaker;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testLoginPageForMouid()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
        $response->assertSee('Email');
    }

    public function testHomeToPageLoginIfYouNotRegister()
    {
        $response = $this->get('/');
        $response->assertRedirect('/login');
        $response->assertStatus(302);

    }

    public function testUserCanLogin(): void
    {
        // create a user
        $user = User::factory()->create([
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
        ]);

        // send a login request with valid credentials
        $response = $this->post('/login', [
            'email' => 'user@example.com',
            'password' => 'password',
        ]);

        // assert that the user is redirected to the home page
        $response->assertRedirect('/posts');

        // assert that the authenticated user is the expected user
        $this->assertAuthenticatedAs($user);
    }

}
