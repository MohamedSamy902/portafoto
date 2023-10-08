<?php

namespace App\Http\Controllers\Auth;

use App\Models\Client;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;


class ClientRegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.client-register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:clients',
            'password' => 'required|confirmed|min:8',
        ]);

        $client = Client::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($client));

        Auth::guard('client')->login($client);

        return redirect()->route('client.dashboard');
    }
}
