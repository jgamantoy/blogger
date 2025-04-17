<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $requst)
    {
        return User::all();
    }

    public function find(Request $request): User|RedirectResponse
    {
        return $request->user() ?? redirect('/');
    }

    public function store(UserRequest $request): RedirectResponse
    {
        User::create([
            'name' => 'Jozi',
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return redirect('/login');
    }

    public function flush(Request $request): string
    {
        $request->session()->flush();

        return 'Session Flushed!';
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->only(['email', 'password']);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('/home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
