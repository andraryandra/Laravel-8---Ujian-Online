<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PassportController extends Controller
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

    /**
     * Register user.
     *
     * @return json
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'role'=>'required|string',
          'name'=>'required|string',
          'username'=>'required|string|unique:users',
          'password'=>'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::create([
            'role'=>$request->role,
            'name'=>$request->name,
            'username'=>$request->username,
            'password'=>Hash::make($request->password),
            'password' => Hash::make($request->get('password')),
        ]);

        $token = $user->createToken('Laravel Password Grant Client')->accessToken;

        return response()->json(['success' => true,
        'message' => 'User registered succesfully, Use Login method to receive token.',
        'token' => $token], 200);
    }

    /**
     * Login user.
     *
     * @return json
     */
    public function login(Request $request)
    {
        // Validate Inputs
        $rules = [
            'role' => 'required',
            'username' => 'required',
            'password' => 'required|string',
        ];
        $request->validate($rules);
        // find user email and role in users table
        $user = User::where('username', $request->username)->where('role', $request->role)->first();
        // if user email found and password is correct
        if($user && Hash::check($request->password, $user->password)){
            $token = $user->createToken('Laravel Password Grant Client')->accessToken;
            return response()->json(['success' => true,
            'message' => 'User logged in succesfully',
            'token' => $token], 200);
        }
        $response = ['message'=>'Incorrect role or email or password'];
        return response()->json($response, 400);
        // $input = $request->only(['role','username', 'password']);

        // $validate_data = [
        //     'role'=>'required|string',
        //   'username'=>'required|string|unique:users',
        //   'password'=>'required|string|min:6',
        // ];

        // $validator = Validator::make($input, $validate_data);

        // if ($validator->fails()) {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Please see errors parameter for all errors.',
        //         'errors' => $validator->errors()
        //     ]);
        // }

        // $user = User::where('username', $request->username)->where('role', $request->role)->first();

        // if (!$user) {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'User not found.'
        //     ], 404);
        // }

        // if (!Hash::check($input['password'], $user->password)) {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Password is incorrect.'
        //     ], 401);
        // }

        // $token = $user->createToken('MyApp')->accessToken;

        // return response()->json([
        //     'success' => true,
        //     'message' => 'User logged in succesfully.',
        //     'token' => $token
        // ], 200);
    }

    /**
     * Access method to authenticate.
     *
     * @return json
     */
    public function userDetail()
    {
        if(Auth::check()) {
            return response()->json([
                'success' => true,
                'message' => 'User authenticated succesfully.',
                'user' => Auth::user()
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'User authentication failed.'
            ], 401);
        }
    }

    /**
     * Logout user.
     *
     * @return json
     */
    public function logout()
    {
        if(Auth::check()) {
            auth()->user()->tokens->each(function ($token, $key) {
                $token->delete();
            });

            return response()->json([
                'success' => true,
                'message' => 'User logout succesfully.'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'User authentication failed.'
            ], 401);
        }
    }
}
