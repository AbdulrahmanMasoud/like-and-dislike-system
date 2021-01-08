<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // THIS TO CHECK LOGIN IF THIS USER IN DB WILL SAVE A SESSION IF NOT WILL DISPLAY MESSAG
    public function login(Request $req){
        $user = User::where(['email'=>$req->email])->first();
        if(!$user || !Hash::check($req->password, $user->password)){
            return 'Password Or Email Not Mached';
            
        }else{
            $req->session()->put('user', $user);
            return redirect('posts');
        }
        
    }
}
