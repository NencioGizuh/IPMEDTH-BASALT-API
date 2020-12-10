<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\User;
use Laravel\Passport\Client;

class RegisterController extends Controller
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
            'password' => 'required|string|min:6',
            'password_confirmation' => 'required|confirmed',
            'age' => 'required|integer',
            'height' => 'required|numeric'
        ]);

        $user = User::create([
            'name' => request('name'),
            'patient_number' => request('patient_number'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'age' => request('age'),
            'height' => request('height'),
        ]);

        $params = [
            'grant_type' => 'password',
            'client_id' => $this->client->id,
            'client_secret' => $this->client->secret,
            'username' => request('email'),
            'password' => request('password'),
            'scope' => '*'

        ];

        $request->request->add($params);

        $proxy = Request::create('oauth/token', 'POST');

        return Route::dispatch($proxy);
    }
}
