<?php
namespace App\Http\Controllers;
use App\Models\administrateur;
use App\Models\Personnel;
use App\Models\professeur;
use App\Models\utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use function Laravel\Prompts\password;
class loginController extends Controller
{
    public function show()
    {
        return view('showLogin');
    }
    public function login(Request $request)   
    {
        // dd($request->all());
        
        
        
        $user_email = $request->email;    
        $user_n_som = $request->n_som;
        $user = Personnel::where('ppr', $user_n_som)->where('email', $user_email)->first();
        $pers = Personnel::where('ppr', $user_n_som)->first();
        if ($user) {
            $emaildb = $user->email;  
            $pprdb = $user->ppr;
            if ($user_email == $emaildb && $user_n_som == $pprdb) { 
                $request->session()->put('pers', $pers);
                $request->session()->regenerate();
                if($pers->status == "sg"){ 
                    return redirect()->route('administration');
                }
                elseif($pers->status == "admin") {
                    return redirect()->route('profile');
                }
                else{ 
                    return redirect()->route('profile');
                }     
            }
        } else {
            return back()->withErrors([
                'email' => 'Votre Email ou PPR est incorrect.',
            ])->onlyInput('email');
        }
    }
    public function logout(){
        
        session()->flush();
         Auth::logout();
        return to_route('login');
    }
}

