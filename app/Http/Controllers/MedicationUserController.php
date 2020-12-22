<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MedicationUser;
use App\Medication;

class MedicationUserController extends Controller
{
    public function index(Request $request) {
        $user_id = $request->user()->id;
        return MedicationUser::where('user_id', '=', $user_id)->with('medication')->get(); 
    }

    public function create(Request $request) {
        // Check if medicine id exist
        if(!Medication::find(request('medicine_id'))) {
            return response()->json("Medicine_id doesn't exist", 400);
        }

        $medicationUser = MedicationUser::create([
            'user_id' => $request->user()->id,
            'time' => request('time'),
            'medicine_id' => request('medicine_id')
        ]);

        return response()->json($medicationUser, 201);
    }

    public function update(Request $request, $id) {
        $user_id = $request->user()->id;
        $medicationUser = MedicationUser::find($id);

        if(!$medicationUser) {
            return response()->json("Not Found", 404);
        }

        if ($medicationUser["user_id"] === $user_id) {
            $medicationUser->update($request->all());;
            return response()->json($medicationUser, 200);
        } else {
            return response()->json("Unauthorized", 401);
        }
    }

    public function delete(Request $request, $id) {
        $user_id = $request->user()->id;
        $medicationUser = MedicationUser::find($id);

        if(!$medicationUser) {
            return response()->json("Not Found", 404);
        }

        if ($medicationUser["user_id"] === $user_id) {
            $medicationUser->delete();
            return response()->json(null, 204);
        } else {
            return response()->json("Unauthorized", 401);
        }
    }
}
