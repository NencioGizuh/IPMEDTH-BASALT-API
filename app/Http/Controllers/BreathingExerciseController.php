<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BreathingExercise;

class BreathingExerciseController extends Controller
{
    public function index(Request $request) {
        $user_id = $request->user()->id;
        return BreathingExercise::where('user_id', '=', $user_id)->get(); 
    }

    public function create(Request $request) {
        $user_id = $request->user()->id;
        $breathingexercise = BreathingExercise::where('user_id', '=', $user_id)->where('date', '=', request('date'))->get();
        if(count($breathingexercise) > 0) {
            // Breathingexercise for user/date combination already exist, so update instead of create
            $updateBreathingexercise = BreathingExercise::findOrFail($breathingexercise[0]['id']);
            $updateBreathingexercise->update($request->all());
            return response()->json($updateBreathingexercise, 200);
        }

        $newBreathingexercise = BreathingExercise::create([
            'user_id' => $request->user()->id,
            'date' => request('date'),
            'cp_measurement_one' => request('cp_measurement_one'),
            'cp_measurement_two' => request('cp_measurement_two'),
            'interval' => request('interval', false),
            'buteyko' => request('buteyko', false),
            'papworth' => request('papworth', false),
            'middenrifspier' => request('middenrifspier', false),
            'wim_hof' => request('wim_hof', false),
        ]);
        return response()->json($newBreathingexercise, 201);
    }

    public function update(Request $request, $id) {
        $user_id = $request->user()->id;
        $breathingexercise = BreathingExercise::find($id);

        if(!$breathingexercise) {
            return response()->json("Not Found", 404);
        }

        if ($breathingexercise["user_id"] === $user_id) {
            $breathingexercise->update($request->all());;
            return response()->json($breathingexercise, 200);
        } else {
            return response()->json("Unauthorized", 401);
        }
    }

    public function delete(Request $request, $id) {
        $user_id = $request->user()->id;
        $breathingexercise = BreathingExercise::find($id);

        if(!$breathingexercise) {
            return response()->json("Not Found", 404);
        }

        if ($breathingexercise["user_id"] === $user_id) {
            $breathingexercise->delete();
            return response()->json(null, 204);
        } else {
            return response()->json("Unauthorized", 401);
        }
    }
}
