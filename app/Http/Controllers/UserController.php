<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;


class UserController extends Controller
{
    public function update(Request $request) {
        $user_id = $request->user()->id;
        $user = User::find($user_id);

        $errors = [];

        if (request('patient_number')) {
            $patientNumberUser = User::where('patient_number', '=', request('patient_number'))->get();
            if(count($patientNumberUser) > 0) { 
                if($user['patient_number'] != request('patient_number')) {
                    array_push($errors, [ 'id' => 'patient_number', 'err' => 'The patient number has already been taken.']);
                }
            }
        }

        if (request('email')) {
            $emailUser = User::where('email', '=', request('email'))->get();
            if(count($emailUser) > 0) { 
                if($user['email'] != request('email')) {
                    array_push($errors, [ 'id' => 'email', 'err' => 'The email has already been taken.']);
                }
            }
        }

        if(count($errors) > 0) {
            return response()->json($errors, 400);
        }

        if(!$user) {
            return response()->json("Not Found", 404);
        }

        $user->update($request->all());
        return response()->json($user, 200);
    }

    public function changePassword(Request $request) {
        if (!request('old_password') || !request('new_password')) {
            return response()->json("Old password and new password required", 400);
        }

        if ((Hash::check(request('old_password'), Auth::user()->password)) == true) {
            $user = User::find($request->user()->id);
            $user->update([
                "password" => bcrypt(request('new_password'))
            ]);
            return response()->json("Password succesfully changed", 200);
        } else {
            return response()->json("Incorrect information", 400);
        }
    }
}
