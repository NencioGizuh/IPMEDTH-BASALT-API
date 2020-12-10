<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Passport\Client;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;

class AuthController extends Controller
{
    use IssueTokenTrait;

    private $client;

    public function __construct()
    {
        $this->client = Client::find(1);
    }

    public function register(Request $request){

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'patient_number' => 'required|integer|unique:users',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|min:6|',
            'age' => 'required|integer',
            'height' => 'required|integer'
        ]);

        return $user = User::create([
            'name' => request('name'),
            'patient_number' => request('patient_number'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'age' => request('age'),
            'height' => request('height'),
        ]);
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        $params = [
            'grant_type' => 'password',
            'client_id' => $this->client->id,
            'client_secret' => $this->client->secret,
            'username' => request('username'),
            'password' => request('password'),
            'scope' => '*'

        ];

        $request->request->add($params);

        $proxy = Request::create('oauth/token', 'POST');

        return Route::dispatch($proxy);
    }

    public function refresh(Request $request) {
        $this.validate($request, [
            'refresh_token' => 'required'
        ]);

        $params = [
            'grant_type' => 'refresh_token',
            'client_id' => $this->client->id,
            'client_secret' => $this->client->secret,
            'username' => request('username'),
            'password' => request('password'),
        ];

        $request->request->add($params);

        $proxy = Request::create('oauth/token', 'POST');

        return Route::dispatch($proxy);
    }

    public function logout(Request $request) {
        auth()->user()->tokens->each(function ($token, $key){
            $token->delete();
        });

        return response()->json('Logged out succesfully', 200);
    }
}
