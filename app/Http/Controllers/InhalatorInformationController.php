<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InhalatorInformation;
use Illuminate\Support\Facades\DB;

class InhalatorInformationController extends Controller
{
    public function retrieve(Request $request) {
        $myArray = explode(',', $request->values);
        return DB::table('inhalator_information')->whereIn('gebruikMedicijn', $myArray)->get();
    }
    public function show(Request $request) {
        $myArray = explode(',', $request->values);
        return DB::table('inhalator_information')->whereIn('id', $myArray)->get();
    }
}
