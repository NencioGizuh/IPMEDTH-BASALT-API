<?php

namespace Tests\Unit;

use App\User;
use App\Peakflow;
use Tests\TestCase;

class PeakflowTest extends TestCase
{
    public function test_get_peakflow() {
        $user = factory(User::class)->create();
        $this->actingAs($user, 'api');

        factory(Peakflow::class)->create([
            'user_id' => $user->id
        ]);

        factory(Peakflow::class)->create([
            'user_id' => $user->id
        ]);

        $this->json('GET', 'api/getpeakflowuser')->assertStatus(200)->assertJsonStructure([
            [
                "id",
                "user_id",
                "date",
                "time",
                "measurement_one",
                "measurement_two",
                "measurement_three",
                "taken_medicines",
                "explanation",
                "created_at",
                "updated_at"
            ],
            [
                "id",
                "user_id",
                "date",
                "time",
                "measurement_one",
                "measurement_two",
                "measurement_three",
                "taken_medicines",
                "explanation",
                "created_at",
                "updated_at"
            ]
        ]);
    }

    public function test_create_peakflow() {
        $user = factory(User::class)->create();
        $this->actingAs($user, 'api');

        $data = [
            "date" => "2020-01-14",
            "time" => "19:02",
            "measurement_one" => 400,
            "measurement_two" => 410,
            "measurement_three" => 420,
            "taken_medicines" => true,
            "explanation" => "Het gaat prima"
        ];

        $this->json('POST', 'api/createpeakflow', $data)->assertStatus(201)->assertJsonFragment($data);
    }

    public function test_update_peakflow() {
        $user = factory(User::class)->create();
        $this->actingAs($user, 'api');

        $peakflow = factory(Peakflow::class)->create([
            'user_id' => $user->id
        ]);

        $data = [
            "date" => "2020-01-14",
            "time" => "19:02",
            "measurement_one" => 400,
            "measurement_two" => 410,
            "measurement_three" => 420,
            "taken_medicines" => true,
            "explanation" => "Het gaat prima"
        ];

        $this->json('PUT', 'api/updatepeakflow/'.$peakflow->id, $data)->assertStatus(200)->assertJsonFragment($data);
    }

    public function test_delete_peakflow() {
        $user = factory(User::class)->create();
        $this->actingAs($user, 'api');

        $peakflow = factory(Peakflow::class)->create([
            'user_id' => $user->id
        ]);

        $this->json('DELETE', 'api/deletepeakflow/'.$peakflow->id)->assertStatus(204);
    }
}
