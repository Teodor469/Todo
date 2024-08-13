<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_does_not_provide_good_enough_password()
    {
        $response = $this->post('/register', [
            'name' => 'John Doe',
            'email' => 'johndoe@mail.com',
            'password' => 'short',
            'password_confirmation' => 'short',
        ]);

        $response->assertSessionHasErrors([
            'password' => 'The password field must be at least 8 characters.',
        ]);

        $this->assertDatabaseMissing('users', [
            'email' => 'johndoe@mail.com',
        ]);
    }

    public function test_user_password_if_is_matching_with_confirmation_password()
    {
        $response = $this->post('/register', [
            'name' => 'John Doe',
            'email' => 'johndoe@mail.com',
            'password' => 'short',
            'password_confirmation' => 'short1',
        ]);

        $response->assertSessionHasErrors([
            'password' => 'The password field confirmation does not match.',
        ]);

        $this->assertDatabaseMissing('users', [
            'email' => 'johndoe@mail.com',
        ]);
    }

    public function test_if_user_email_is_being_used()
    {
        User::factory()->create([
            'email' => 'existing@example.com',
        ]);

        $response = $this->post('/register', [
            'name' => 'John Doe',
            'email' => 'existing@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertSessionHasErrors([
            'email' => 'The email has already been taken.',
        ]);

        $this->assertCount(1, User::where('email', 'existing@example.com')->get());
    }

    public function test_if_login_credentials_are_correct_for_the_user_to_login()
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => Hash::make('password123'),
        ]);

        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'password123',
        ]);

        $this->assertAuthenticatedAs($user);

        $response->assertRedirect('/');
    }

    public function test_user_has_incorrect_credentials_and_cannot_login()
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => Hash::make('password123'),
        ]);

        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'wrongpassword',
        ]);

        $this->assertGuest();

        $response->assertRedirect('/login');

        $response->assertSessionHas('error', 'Email or Password is incorrect!');
    }
}
