<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Hash;
use DB;
use Carbon\Carbon;  
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function register()
    {
        $role = DB::table('role_type_users')->get();
        return view('auth.register',compact('role'));
    }
    public function storeUser(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'role_name' => 'required|string|max:255',
            'password'  => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        $dt       = Carbon::now();
        $todayDate = $dt->toDayDateTimeString();
        
        User::create([
            'name'      => $request->name,
            'avatar'    => $request->image,
            'email'     => $request->email,
            'join_date' => $todayDate,
            'role_name' => $request->role_name,
            'password'  => Hash::make($request->password),
        ]);

        // Si le rôle est "teacher", ajouter l'utilisateur dans la table Professeur
        if ($request->role_name === 'teacher') {
            DB::table('teachers')->insert([
                'user_id'     => $user->id,
                'name'        => $user->name,
                'email'       => $user->email,
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
        Toastr::success('Nouvel utilisateur crée avec succès :)','Succès');
        return redirect('login');
    }
}
