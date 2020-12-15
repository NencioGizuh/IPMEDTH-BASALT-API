<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trigger;

class TriggerController extends Controller
{
    public function index(Request $request) {
        $user_id = $request->user()->id;
        $triggers = Trigger::where('user_id', '=', $user_id)->get();

        if(count($triggers) === 0) {
            return response()->json("Not Found", 404);
        } else {
            return response()->json($triggers[0], 200);
        }
    }

    public function create(Request $request) {
        $user_id = $request->user()->id;
        $triggers = Trigger::where('user_id', '=', $user_id)->get();
        if (count($triggers) > 0) {
            // Trigger for user already exist, so update instead of create
            $updateTrigger = Trigger::findOrFail($triggers[0]['id']);
            $updateTrigger->update($request->all());
            return response()->json($updateTrigger, 200);
        }

        $newTrigger = Trigger::create([
            'user_id' => $request->user()->id,
            'tobacco_smoke' => request('tobacco_smoke', false),
            'dust_mites' => request('dust_mites', false),
            'air_pollution' => request('air_pollution', false),
            'pets' => request('pets', false),
            'fungi' => request('fungi', false),
            'fire_smoke' => request('fire_smoke', false),
            'infections' => request('infections', false),
            'effort' => request('effort', false),
            'weather_conditions' => request('weather_conditions', false),
            'hyperventilation' => request('hyperventilation', false),
            'pollen' => request('pollen', false),
        ]);
        return response()->json($newTrigger, 201);
    }

    public function update(Request $request) {
        $user_id = $request->user()->id;
        $triggers = Trigger::where('user_id', '=', $user_id)->get();

        if(count($triggers) === 0) {
            return response()->json("Not Found", 404);
        } else {
            $triggers = $triggers[0];
            $triggers->update($request->all());
            return response()->json($triggers, 200);
        }
    }

    public function delete(Request $request) {
        $user_id = $request->user()->id;
        $triggers = Trigger::where('user_id', '=', $user_id)->get();

        if(count($triggers) === 0) {
            return response()->json("Not Found", 404);
        } else {
            $triggers = $triggers[0];
            $triggers->delete();
            return response()->json(null, 204);
        }
    }
}
