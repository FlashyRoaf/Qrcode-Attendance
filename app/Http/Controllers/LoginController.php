<?php
namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

use function Laravel\Prompts\error;

class LoginController extends Controller
{
    //
    public function index(): Response {
        return Inertia::render("Login");
    }

    public function store(Request $request): RedirectResponse {
        $request->validate([
            "name"=> "required|string",
            "password"=> "required|string",
        ]);

        
        if (!Auth::attempt(["name"=> $request->name, "password" => $request->password], $request->remember)) {
            return back()->withErrors([
                'name' => 'Credentials do not match',
            ]);
        }
        
        $user = Auth::user();
        $request->session()->regenerate();
        
        if ($user->role == 'admin') {
            return redirect()->route('admin'); 
        }
        
        return redirect()->route('home');
    }

    public function destroy(Request $request): RedirectResponse {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('home');
    }


}

