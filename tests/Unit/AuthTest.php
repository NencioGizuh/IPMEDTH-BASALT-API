<?php

namespace Tests\Unit;

use App\User;
use Laravel\Passport\Passport;
use Tests\TestCase;

class AuthTest extends TestCase
{
    public function test_required_fields_registration() {
        $this->json('POST', 'api/register')
            ->assertStatus(422)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    "name" => ["The name field is required."],
                    "patient_number" => ["The patient number field is required."],
                    "email" => ["The email field is required."],
                    "password" => ["The password field is required."],
                    "password_confirmation" => ["The password confirmation field is required."],
                    "age" => ["The age field is required."],
                    "height" => ["The height field is required."]
                ]
        ]);
    }

    public function test_successful_registration() {
        $data = [
            'name' => 'John Doe',
            'patient_number' => '123456789',
            'email' => 'jdoe@example.com',
            'password' => '123456',
            'password_confirmation' => '123456',
            'age' => 50,
            'height' => 180
        ];

        $this->postJson('/api/register', $data)->assertStatus(201)->assertJsonStructure([
            "id",
            "name",
            "patient_number",
            "email",
            "age",
            "height",
            "created_at",
            "updated_at"
        ]);
    }

    public function test_required_fields_login() {
        $this->json('POST', 'api/login')
            ->assertStatus(422)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    'username' => ["The username field is required."],
                    'password' => ["The password field is required."]
                ]
        ]);
    }

    public function test_get_user_failed() {
        $this->json('GET', 'api/user')->assertStatus(401)->assertJson([
            "message" => "Unauthenticated."
        ]);
    }

    public function test_get_user_successful() {
        $user = factory(User::class)->create();
        $this->actingAs($user, 'api');

        $this->json('GET', 'api/user')->assertStatus(200)->assertJsonStructure([
            "id",
            "name",
            "patient_number",
            "email",
            "email_verified_at",
            "age",
            "height",
            "created_at",
            "updated_at"
        ]);
    }

    public function test_logout_failed() {
        $this->json('POST', 'api/logout')->assertStatus(401)->assertJson([
            "message" => "Unauthenticated."
        ]);
    }

    public function test_logout_successful() {
        $user = factory(User::class)->create();
        $this->actingAs($user, 'api');

        $this->json('POST', 'api/logout')->assertStatus(200);
    }

    public function test_user_update() {
        $user = factory(User::class)->create();
        $this->actingAs($user, 'api');

        $data = [
            'username' => 'jdoe@example.com',
            'age' => '51'
        ];

        $this->json('PUT', 'api/updateuser', $data)->assertStatus(200)->assertJsonStructure([
            "id",
            "name",
            "patient_number",
            "email",
            "email_verified_at",
            "age",
            "height",
            "created_at",
            "updated_at"
        ]);
    }

    public function test_reset_password() {
        $user = factory(User::class)->create([
            'password' => bcrypt('123456')
        ]);
        $this->actingAs($user, 'api');

        $data = [
            'old_password' => '123456',
            'new_password' => '654321'
        ];

        $this->json('PUT', 'api/changepassword', $data)->assertStatus(200);
    }
}
