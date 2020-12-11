<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ActionPlan;

class ActionPlanController extends Controller
{
    public function index(Request $request) {
        $user_id = $request->user()->id;
        $actionplan = ActionPlan::where('user_id', '=', $user_id)->get();

        if(count($actionplan) === 0) {
            return response()->json("Not Found", 404);
        } else {
            return response()->json($actionplan[0], 200);
        }
    }

    public function create(Request $request) {
        $user_id = $request->user()->id;
        $actionplan = ActionPlan::where('user_id', '=', $user_id)->get();
        if (count($actionplan) > 0) {
            // Actionplan for user already exist, so update instead of create
            $updateActionplan = ActionPlan::findOrFail($actionplan[0]['id']);
            $updateActionplan->update($request->all());
            return response()->json($updateActionplan, 200);
        }

        $newActionplan = ActionPlan::create([
            'user_id' => $request->user()->id,
            'zone_green_peakflow_before_medicines' => request('zone_green_peakflow_before_medicines'),
            'zone_green_peakflow_after_medicines' => request('zone_green_peakflow_after_medicines'),
            'zone_green_explanation' => request('zone_green_explanation'),
            'zone_yellow_peakflow_below' => request('zone_yellow_peakflow_below'),
            'zone_yellow_peakflow_above' => request('zone_yellow_peakflow_above'),
            'zone_yellow_medicines' => request('zone_yellow_medicines'),
            'zone_yellow_explanation' => request('zone_yellow_explanation'),
            'phonenumber_gp' => request('phonenumber_gp'),
            'phonenumber_lung_specialist' => request('phonenumber_lung_specialist'),
            'zone_orange_explanation' => request('zone_orange_explanation'),
            'zone_red_peakflow' => request('zone_red_peakflow'),
            'zone_red_medicines' => request('zone_red_medicines'),
            'zone_red_explanation' => request('zone_red_explanation'),
        ]);
        return response()->json($newActionplan, 201);
    }

    public function update(Request $request) {
        $user_id = $request->user()->id;
        $actionplan = ActionPlan::where('user_id', '=', $user_id)->get();

        if(count($actionplan) === 0) {
            return response()->json("Not Found", 404);
        } else {
            $actionplan = $actionplan[0];
            $actionplan->update($request->all());
            return response()->json($actionplan, 200);
        }
    }

    public function delete(Request $request) {
        $user_id = $request->user()->id;
        $actionplan = ActionPlan::where('user_id', '=', $user_id)->get();

        if(count($actionplan) === 0) {
            return response()->json("Not Found", 404);
        } else {
            $actionplan = $actionplan[0];
            $actionplan->delete();
            return response()->json(null, 204);
        }
    }
}
