<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peakflow;

class PeakflowController extends Controller
{
    public function index() {
        return Peakflow::all();
    }

    // TODO: Return peakflow based on user
    public function getPeakflowUser($user) {
        return Peakflow::all();
    }

    public function create(Request $request) {
        $peakflow = Peakflow::create($request->all());
        return response()->json($peakflow, 201);
    }

    public function update(Request $request, Peakflow $peakflow) {
        $peakflow->update($request->all());
        return response()->json($peakflow, 200);
    }

    public function delete(Peakflow $peakflow) {
        $peakflow->delete();
        return response()->json(null, 204);
    }
}
