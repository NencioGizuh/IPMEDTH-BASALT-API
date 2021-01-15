<?php

namespace Tests\Unit;

use App\User;
use App\ActionPlan;
use Tests\TestCase;

class ActionPlanTest extends TestCase
{
    public function test_get_actionplan() {
        $user = factory(User::class)->create();
        $this->actingAs($user, 'api');

        factory(ActionPlan::class)->create([
            'user_id' => $user->id
        ]);

        $this->json('GET', 'api/getactionplanuser')->assertStatus(200)->assertJsonStructure([
            "id",
            "user_id",
            "zone_green_peakflow_before_medicines",
            "zone_green_peakflow_after_medicines",
            "zone_green_explanation",
            "zone_yellow_peakflow_below",
            "zone_yellow_peakflow_above",
            "zone_yellow_medicines",
            "zone_yellow_explanation",
            "phonenumber_gp",
            "phonenumber_lung_specialist",
            "zone_orange_explanation",
            "zone_red_peakflow",
            "zone_red_medicines",
            "zone_red_explanation",
            "created_at",
            "updated_at"
        ]);
    }

    public function test_get_actionplan_not_found() {
        $user = factory(User::class)->create();
        $this->actingAs($user, 'api');

        $this->json('GET', 'api/getactionplanuser')->assertStatus(404);
    }

    public function test_create_actionplan() {
        $user = factory(User::class)->create();
        $this->actingAs($user, 'api');

        $data = [
            "zone_green_peakflow_before_medicines" => 670,
            "zone_green_peakflow_after_medicines" => 750,
            "zone_green_explanation" => "Medicatie nemen zoals gewend",
            "zone_yellow_peakflow_below" => 669,
            "zone_yellow_peakflow_above" => 420,
            "zone_yellow_medicines" => "Medicine 2",
            "zone_yellow_explanation" => "Extra medicijnen nemen om weer naar de groene zone te gaan",
            "phonenumber_gp" => "0612345678",
            "phonenumber_lung_specialist" => "0687654321",
            "zone_orange_explanation" => "Niet te lang blijven hangen in de oranje zone",
            "zone_red_peakflow" => 419,
            "zone_red_medicines" => "Medicine 1",
            "zone_red_explanation" => "Direct contact opnemen met de longarts"
        ];

        $this->json('POST', 'api/createactionplan', $data)->assertStatus(201)->assertJsonFragment($data);
    }

    public function test_update_actionplan() {
        $user = factory(User::class)->create();
        $this->actingAs($user, 'api');

        $actionplan = factory(ActionPlan::class)->create([
            'user_id' => $user->id
        ]);

        $data = [
            "phonenumber_gp" => "0687654321",
            "phonenumber_lung_specialist" => "0612345678",
        ];

        $this->json('PUT', 'api/updateactionplan', $data)->assertStatus(200)->assertJsonStructure([
            "id",
            "user_id",
            "zone_green_peakflow_before_medicines",
            "zone_green_peakflow_after_medicines",
            "zone_green_explanation",
            "zone_yellow_peakflow_below",
            "zone_yellow_peakflow_above",
            "zone_yellow_medicines",
            "zone_yellow_explanation",
            "phonenumber_gp",
            "phonenumber_lung_specialist",
            "zone_orange_explanation",
            "zone_red_peakflow",
            "zone_red_medicines",
            "zone_red_explanation",
            "created_at",
            "updated_at"
        ]);
    }

    public function test_update_actionplan_not_found() {
        $user = factory(User::class)->create();
        $this->actingAs($user, 'api');

        $data = [
            "phonenumber_gp" => "0687654321",
            "phonenumber_lung_specialist" => "0612345678",
        ];

        $this->json('PUT', 'api/updateactionplan', $data)->assertStatus(404);
    }

    public function test_delete_actionplan() {
        $user = factory(User::class)->create();
        $this->actingAs($user, 'api');

        $actionplan = factory(ActionPlan::class)->create([
            'user_id' => $user->id
        ]);

        $this->json('DELETE', 'api/deleteactionplan')->assertStatus(204);
    }

    public function test_delete_actionplan_not_found() {
        $user = factory(User::class)->create();
        $this->actingAs($user, 'api');

        $this->json('DELETE', 'api/deleteactionplan')->assertStatus(404);
    }
}
