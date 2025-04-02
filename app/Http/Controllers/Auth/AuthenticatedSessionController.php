<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{

    public function create()
    {
        return view('auth.login');
    }

      public function store(Request $request)
    {

        $request->validate([
            'credencial' => ['required', 'regex:/^[a-zA-Z]{3}\d{3}$/', 'exists:users,credencial'],
            'password' => ['required', 'regex:/^\d{6}$/'],
        ], [
            'credencial.regex' => 'A credencial deve conter 3 letras seguidas de 3 números.',
            'password.regex' => 'A senha deve ter exatamente 6 dígitos numéricos.',
            'credencial.exists' => 'Credenciais não encontradas.',
        ]);


        $user = User::where('credencial', $request->credencial)->first();


        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'credencial' => 'Credenciais inválidas.',
                'password' => 'Credenciais inválidas.',
            ])->withInput();
        }


        Auth::login($user);


        return redirect()->intended('/dashboard');
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
