<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peakflow;

class PeakflowController extends Controller
{
    public function index(Request $request) {
        $user_id = $request->user()->id;
        return Peakflow::where('user_id', '=', $user_id)->get(); 
    }

    public function create(Request $request) {
        $peakflow = Peakflow::create([
            'user_id' => $request->user()->id,
            'date' => request('date'),
            'time' => request('time'),
            'measurement_one' => request('measurement_one'),
            'measurement_two' => request('measurement_two'),
            'measurement_three' => request('measurement_three'),
            'taken_medicines' => request('taken_medicines'),
            'explanation' => request('explanation'),
        ]);
        return response()->json($peakflow, 201);
    }

    public function update(Request $request, $id) {
        $user_id = $request->user()->id;
        $peakflow = Peakflow::find($id);

        if(!$peakflow) {
            return response()->json("Not Found", 404);
        }

        if ($peakflow["user_id"] === $user_id) {
            $peakflow->update($request->all());
            return response()->json($peakflow, 200);
        } else {
            return response()->json("Unauthorized", 401);
        }
    }

    public function delete(Request $request, $id) {
        $user_id = $request->user()->id;
        $peakflow = Peakflow::find($id);

        if(!$peakflow) {
            return response()->json("Not Found", 404);
        }

        if ($peakflow["user_id"] === $user_id) {
            $peakflow->delete();
            return response()->json(null, 204);
        } else {
            return response()->json("Unauthorized", 401);
        }
    }
}
