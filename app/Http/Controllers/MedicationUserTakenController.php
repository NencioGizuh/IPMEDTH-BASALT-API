<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MedicationUserTaken;
use App\Medication;

class MedicationUserTakenController extends Controller
{
    public function index(Request $request) {
        $user_id = $request->user()->id;
        return MedicationUserTaken::where('user_id', '=', $user_id)->with('medication')->get(); 
    }

    public function create(Request $request) {
        // Check if medicine id exist
        if(!Medication::find(request('medicine_id'))) {
            return response()->json("Medicine_id doesn't exist", 400);
        }

        $medicationUserTaken = MedicationUserTaken::create([
            'user_id' => $request->user()->id,
            'date' => request('date'),
            'time' => request('time'),
            'medicine_id' => request('medicine_id')
        ]);

        return response()->json($medicationUserTaken, 201);
    }

    public function update(Request $request, $id) {
        $user_id = $request->user()->id;
        $medicationUserTaken = MedicationUserTaken::find($id);

        if(!$medicationUserTaken) {
            return response()->json("Not Found", 404);
        }

        if ($medicationUserTaken["user_id"] === $user_id) {
            $medicationUserTaken->update($request->all());;
            return response()->json($medicationUserTaken, 200);
        } else {
            return response()->json("Unauthorized", 401);
        }
    }

    public function delete(Request $request, $id) {
        $user_id = $request->user()->id;
        $medicationUserTaken = MedicationUserTaken::find($id);

        if(!$medicationUserTaken) {
            return response()->json("Not Found", 404);
        }

        if ($medicationUserTaken["user_id"] === $user_id) {
            $medicationUserTaken->delete();
            return response()->json(null, 204);
        } else {
            return response()->json("Unauthorized", 401);
        }
    }
}
