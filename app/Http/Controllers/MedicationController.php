<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medication;

class MedicationController extends Controller
{
    public function index() {
        return Medication::all(); 
    }

    public function create(Request $request) {
        $medication = Medication::create($request->all());
        return response()->json($medication, 201);
    }

    public function update(Request $request, $id) {
        $medication = Medication::find($id);
        $medication->update($request->all());
        return response()->json($medication, 200);
    }

    public function delete($id) {
        $medication = Medication::find($id);
        $medication->delete();
        return response()->json(null, 204);
    }
}
