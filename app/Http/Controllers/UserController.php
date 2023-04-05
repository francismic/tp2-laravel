<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login()
    {
        if (Auth::check()) {
            session()->forget('etudiant_id');
            Auth::logout(); /* Si on retourne a la page de login, on sort de la session */    
        }
        return view('auth.login');
    }

    // Authentification of the user
    public function auth(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        
        if(!Auth::validate($credentials)):
            return redirect()->back()->withErrors(trans('auth.password'))->withInput();
        endif;
       
        $user = Auth::getProvider()->retrieveByCredentials($credentials);
     
        Auth::login($user);
       
        return redirect()->intended(route('blog.index'));

        // return  $credentials;
    }

    // Logout of the user
    public function logout(){
        Auth::logout();
        return redirect()->intended(route('auth.login'));
    }
    
    public function destroy(User $user)
{
    // Supprime l'utilisateur et tous les articles liés à cet utilisateur
    $user->delete();

    // Redirige vers la liste des utilisateurs
    return redirect()->route('users.index');
}
}
