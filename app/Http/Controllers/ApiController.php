<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    //

    public function register(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'email_verified_at',
            'password' => 'required',
        ]);

        $user = new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->email_verified_at=$request->email_verified_at;
        $user->password=Hash::make($request->password);
        $user->save();
        return response()->json(["mensaje" => "usuario registrado correctamente"], 201);

    }

    public function login(Request $request){

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where("email", "=", $request->email);
        if (isset($user)) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken("auth_token")->plainTextToken;
                return response()->json(["mensaje" => "usuario inicio sesion", "acces_token" => $token], 200);
            }else{
                return response()->json(["mensaje" => "clave incorrecta", "error" => true], 404);
            }
        }else {
            return response()->json(["mensaje" => "usuario no existe", "error" => true], 404);
        }

    }
}
