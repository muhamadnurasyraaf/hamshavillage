<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function autho(){
        $user = auth()->user();
        return $user;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $validatedData = $request->validate([
                'username' => 'required|string|min:4|max:20',
                'email' => 'required|email|',
                'password' => 'string|min:7|max:25',
            ]);
            $validatedData['password'] = bcrypt($request->password);
            User::create($validatedData);
            return $validatedData;
        }catch(ValidationException $e){
            return $e;
        }

    }


    public function show(string $id)
    {

    }

    public function login(Request $request){
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt($credentials)){
            $user = Auth::user();
            $token = $user->createToken('authToken')->accessToken;

            return response()->json(['message' => 'Success', 'token' => $token]);
        } else {
            return response()->json(['message' => 'Invalid Credentials'], 401);
        }
    }

    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
