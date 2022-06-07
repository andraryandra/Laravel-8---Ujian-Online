<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function index()
    {
        $datas = User::get();
        return response()->json($datas);
    }
    public function indexSuperAdmin()
    {
        $datas = User::where('role', 'superadmin')->get();
        return response()->json($datas);
    }

    public function indexAdmin()
    {
        $datas = User::where('role', 'admin')->get();
        return response()->json($datas);
    }

    public function indexGuru()
    {
        $datas = User::where('role', 'guru')->get();
        return response()->json($datas);
    }

    public function indexSiswa()
    {
        $datas = User::where('role', 'siswa')->get();
        return response()->json($datas);
    }

    public function register(Request $req)
    {
        // Validate
        $rules=[
          'role'=>'required|string',
          'name'=>'required|string',
          'username'=>'required|string|unique:users',
          'password'=>'required|string|min:6',
        ];
        $validator = Validator::make($req->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        // Create New User in User table
        $user = User::create([
            'role'=>$req->role,
            'name'=>$req->name,
            'username'=>$req->email,
            'password'=>Hash::make($req->password),
        ]);
        $token = $user->createToken('Personal Access Token')->plainTextToken;
        $response = ['user'=> $user, 'token'=>$token];
        return response()->json($response, 200);

    }

    public function login(Request $req)
    {

         // Validate Inputs
         $rules = [
            'role' => 'required',
            'username' => 'required',
            'password' => 'required|string',
        ];
        $req->validate($rules);
        // find user email and role in users table
        $user = User::where('username', $req->username)->where('role', $req->role)->first();
        // if user email found and password is correct
        if($user && Hash::check($req->password, $user->password)){
            // $token = $user->createToken('Personal Access Token')->plainTextToken;
            // $response=['user'=> $user, 'token'=> $token];
            $response=['user'=> $user];
            return response()->json($response, 200);
        }
        $response = ['message'=>'Incorrect role or email or password'];
        return response()->json($response, 400);

    }

    public function logout(Request $req)
    {
        $req->user()->token()->revoke();
        $response = ['message'=>'Successfully logged out'];
        return response()->json($response, 200);
    }

    public function userDetail(Request $req)
    {
        $user = auth()->user();

        return response()->json([
            'success' => true,
            'message' => 'Data fetched successfully.',
            'data' => $user
        ], 200);
    }


}
